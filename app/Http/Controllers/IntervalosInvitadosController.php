<?php

namespace App\Http\Controllers;

use App\Intervaloinvitado;
use App\Llave;
use App\Puerta;
use App\IntervaloInvitadoPuerta;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class IntervalosInvitadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('GestionarInvitadosMiddleware');
    }

    /**
     * llama a la vista create de intervalos_invitados
     * y proporciona la informacion necesaria para la creacion de la vista.
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de intervalos_invitados
     * y le paso.
     * @param integer $invitado_id id del invitado al que pertenece
     * @param integer $puertasNormales una coleccion con todas las puestas normales
     * @param integer $puertasEspeciales una coleccion con todas las puertas especiales
     * @param integer $seccion_id id del invitado al que va pertenecer el invitado
     */
    public function create($invitado_id)
    {
        //creo una coleccion con todas las puertas especiales
        $puertasEspeciales =  User::find(Auth::User()->id)->puertas->where('puerta_especial',1);
        //creo una coleccion con todas las puestas normales
        $puertasNormales =  User::find(Auth::User()->id)->puertas->where('puerta_especial',0);

        return view('intervalos_invitados.create',['invitado_id'=>$invitado_id,'puertasNormales'=>$puertasNormales,'puertasEspeciales'=>$puertasEspeciales]);
    }

    /**
     * Crea un nuevo intervalo con los datos que recibe del formulario
     * y lo asocia al invitado relacionado al $invitado_id que llega como parametro
     * Tambien relaciono el intervalo que se crear con todas las puertas selecionadas
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response redirecciona a la vista edit del invitado a la que pertenece el intervalo
     * @param Request $request con los datos del formulario
     * @param integer $invitado_id id del invitado al que va pertenecer el intervalo
     */
    public function store(Request $request,$invitado_id)
    {
        DB::beginTransaction();
            if($request->hasta_minuto < 10 ){
                $request->hasta_minuto = '0'.$request->hasta_minuto;
            }
        if($request->desde_minuto < 10 ){
            $request->desde_minuto = '0'.$request->desde_minuto;
        }
            $llaves = DB::table('llaves')
                ->where([
                    ['llave_rfid','=', $request->targeta_rfid],
                    ['fecha_expiracion','>', Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateString().' '.$request->desde_hora.':'.$request->desde_minuto.':00')]//me trae las activas
                ])->get();
            foreach ($llaves as $llave){
                if ($llave->id_asociado != ($invitado_id+100000)) {
                    return redirect('/IntervalosInvitados/create/' . $invitado_id)->with(['message' => 'Llave RFID ya esta en uso', 'tipo' => 'error']);
                }
            }


            if ($request->hasta_hora > $request->desde_hora) {
                $this->crearIntevaloInvitado($request,$invitado_id);
                Llave::create([
                        'tipo'=> '1',//tipo 0 es el indicativo de funcionario
                        'llave_rfid' => $request->targeta_rfid,
                        'id_asociado' => $invitado_id+100000,
                        'fecha_expiracion' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateString().' '.$request->hasta_hora.':'.$request->hasta_minuto.':00'),
                    ]);
            }
            else if($request->hasta_hora == $request->desde_hora && $request->hasta_minuto > $request->desde_minuto){
                $this->crearIntevaloInvitado($request,$invitado_id);
                Llave::create([
                        'tipo'=> '1',//tipo 0 es el indicativo de funcionario
                        'llave_rfid' => $request->targeta_rfid,
                        'id_asociado' => $invitado_id+100000,
                        'fecha_expiracion' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateString().' '.$request->hasta_hora.':'.$request->hasta_minuto.':00'),
                    ]);
            } else{
                return redirect('IntervalosInvitados/create/'.$invitado_id)->with(['message'=>'Intervalo de tiempo invalido','tipo'=>'error']);
            }
        DB::commit();
        return redirect('/invitados/'.$invitado_id.'/edit')->with(['message'=>'El intervalo se ha registrado correctamente','tipo'=>'message']);
    }

    /**
     *  llama a la vista show de intervalos_invitados la cual muestra la informacion relacionada a un intervalo
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de los intervalos_invitados
     * y le paso
     * $intervalo objeto del intervalo que se quiere mostrar
     * $puertasNormales una coleccion con todas las puestas normales asociadas al intervalo
     * $puertasEspeciales una coleccion con todas las puertas especiales normales asociadas al intervalo
     * @param integer $id id del intervalo que se va a mostrar
     */
    public function show($id)
    {
        $intervalo = Intervaloinvitado::find($id);
        $puertasNormales = Intervaloinvitado::find($id)->puertas()->where('puerta_especial',0)->get();
        $puertasEspeciales = Intervaloinvitado::find($id)->puertas()->where('puerta_especial',1)->get();
        //devuelve la vista edit de los intervalos_invitados
        return view('intervalos_invitados.show',['intervalo'=>$intervalo,'puertasEspeciales'=>$puertasEspeciales,'puertasNormales'=>$puertasNormales]);
    }


    /**
     *  Elimina un intervalo asociado al $id que llega como parametro
     * Tambien elimina todas las interrelaciones entre las puertas y dicho intervalo
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de los invitados
     * @param integer $id id del intervalo que se va a eliminar
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();

                IntervaloInvitadoPuerta::where('intervalo_invitado_id',$id)
                        ->delete();
                $intervalo_invitado = DB::table('IntervalosInvitados')->select('invitado_id','fecha','hasta')->where('id',$id)->first();

                DB::table('llaves')
                    ->where([
                        ['id_asociado','=', $intervalo_invitado->invitado_id+100000],
                        ['fecha_expiracion','=', Carbon::createFromFormat('Y-m-d H:i:s', $intervalo_invitado->fecha.' '.$intervalo_invitado->hasta)]
                    ])->delete();

                Intervaloinvitado::find($id)
                    ->delete();
            DB::commit();
        }
        catch (\Exception $ex){
            dd($ex);
            DB::rollback();
            return redirect('/invitados/'.$intervalo_invitado->invitado_id.'/edit')->with(['message'=>'A ocurrido un error','tipo'=>'error']);
        }
        //devuelve la vista edit de los intervalos_invitados
        return redirect('/invitados/'.$intervalo_invitado->invitado_id.'/edit')->with(['message'=>'El intervalo se registro correctamente','tipo'=>'message']);
    }

    /**
     *  Crea un nuevo intervalo de tiempo al invitado y lo relaciona con las puertas
     * seleccionadas en el formulario.
     *
     * @author Edwin Sandoval
     * @return void
     * @param Request $request con los datos del formulario
     * @param integer $invitado_id id del invitado al que va pertenecer el intervalo
     */

    private function crearIntevaloInvitado(Request $request,$invitado_id)
    {

        try{
            DB::beginTransaction();

                $carbon = new \Carbon\Carbon();
                Intervaloinvitado::create([
                    'desde'=> $request->desde_hora.":".$request->desde_minuto.":0",
                    'hasta'=> $request->hasta_hora.":".$request->hasta_minuto.":0",
                    'targeta_rfid' => $request->targeta_rfid,
                    'invitado_id'=> $invitado_id,
                    'fecha' => $carbon->now(),
                ]);

                //obtengo el ultimo intervalo que se creo es decir la que acabamos de crear
                $intervalo = DB::table('IntervalosInvitados')->orderBy('created_at', 'desc')->first();


                //Relaciono el intervalo que se acabo de crear con todas las puertas selecionadas
                $todasPuertas = Puerta::all();
                foreach($todasPuertas as $puerta){
                    //Si la puerta fue seclecionada en el check se guarda en la relacion secionn-puerta con un 1
                    // indicando que esta seccion tiene permiso sobre ella
                    if($request[$puerta->id]!=null) {
                        IntervaloInvitadoPuerta::create([
                            'intervalo_invitado_id' => $intervalo->id,
                            'puerta_id' => $puerta->id,
                        ]);
                    }
                }
            DB::commit();
        } catch (\Exception $ex){
            DB::rollback();
            return null;
        }

    }


    public function concluirIntevaloInvitado($id)
    {

        try{
            DB::beginTransaction();


                $carbon= new \Carbon\Carbon();
                $intervalo_invitado = Intervaloinvitado::find($id);
                DB::table('llaves')
                    ->where([
                        ['id_asociado','=', $intervalo_invitado->invitado_id+100000],
                        ['fecha_expiracion','=', Carbon::createFromFormat('Y-m-d H:i:s', $intervalo_invitado->fecha.' '.$intervalo_invitado->hasta)->toDateTimeString()]
                    ])->delete();
                $intervalo_invitado->update(['hasta'=>$carbon->now()->subMinutes(1)->toTimeString()]);
            DB::commit();
        } catch (\Exception $ex){
            DB::rollback();
           dd($ex);
        }
        return redirect('/invitados/'.$intervalo_invitado->invitado_id.'/edit')->with(['message'=>'El intervalo se concluyo correctamente','tipo'=>'message']);


    }
}
