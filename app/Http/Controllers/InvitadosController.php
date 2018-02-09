<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Invitado;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Session;
use Redirect;

class InvitadosController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('GestionarInvitadosMiddleware');
    }
    /**
     * No hace nada en concreto solo llama a la vista index donde se listan todos los invitados
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de cargos
     * y le paso
     * $invitados coleccion con todos los invitados
     */
    public function index()
    {

        return view('invitados.index');
    }

    public function lista_invitados()
    {
        $invitados= \App\Invitado::select(['id','nombre','apellido','cedula','celular','correo']);
        return \Datatables::of($invitados)
            ->addColumn('action', function ($invitado) {
                $aciones ="";
                $aciones ="<div class='btn btn-group'>";
                $aciones =$aciones.'<a href="'.route('invitados.edit',$invitado->id).'" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
                $aciones =$aciones."</div>";
            return $aciones;
            })
            ->make(true);
    }
    /**
     * No hace nada en concreto solo llama a la vista create de invitados
     *
     * @return \Illuminate\Http\Response devuelve la vista create de invitados
     */
    public function create()
    {
        return view('invitados.create');
    }
    /**
     * Crea un nuevo invitados con los datos que recibe del formulario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciona a la vista edit del invitado que se acaba de crear
     * @param Request $request con los datos del formulario
     */

    public function store(Request $request)
    {

        $this->validate($request, [
            'nombre'=>'required|min:4|max:15',
            'apellido'=>'required|min:4|max:15',
            'cedula'=>'required|min:10000000|max:9999999999|numeric|unique:Invitados',
           // 'celular'=>'required|min:1000000000|max:9999999999|numeric',
            'fecha_nacimiento'=>'required|date_format:"Y-m-d"',
            'correo'=>'required|max:40|email',
        ]);

        try{
            DB::beginTransaction();
            Invitado::create([
                'nombre'=>$request->nombre,
                'apellido'=>$request->apellido,
                'cedula'=>$request->cedula,
                'celular'=>$request->celular,
                'correo'=>$request->correo,
                'fecha_nacimiento'=>$request->fecha_nacimiento,
                'foto'=>"NO HAY"
            ]);

            //obtengo el ultimo invitado que se creo es decir la que acabamos de crear
            $invitado = DB::table('Invitados')
                ->select('id')
                ->orderBy('created_at', 'desc')
                ->first();

            DB::commit();
        }
        catch (\Exception $ex){
            DB::rollback();
            return redirect('/invitados/create')->with(['message'=>'A ocurrido un error','tipo'=>'error']);
        }
        return redirect('/invitados/'.$invitado->id.'/edit')->with(['message'=>'El Invitado se ha registrado correctamente','tipo'=>'message']);
    }

    /**
     * No hace nada en concreto solo llama a la vista edit de invitados
     * la cual tiene el formulario de invitados
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de invitados
     * y le paso
     * $invitado  objeto del invitado asociado al $id que llega por parametro.
     * @param integer $id id del invitado a editar
     */
    public function edit($id)
    {
        $invitado = Invitado::find($id);
        return view('invitados.edit',['invitado'=>$invitado]);
    }

    /**
     * Actualiza el invitado asociado al $id con los datos que trae el $request
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response redirecciono a la vita index de invitados.
     * @param Request $request con los datos del formulario
     * @param integer $id id del invitado que se quiere actualizar
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre'=>'required|min:4|max:15',
            'apellido'=>'required|min:4|max:15',
            'cedula'=>'required|min:10000000|max:9999999999|numeric|unique:Invitados,cedula,'.$id,
            'celular'=>'required|min:1000000000|max:9999999999|numeric',
            'fecha_nacimiento'=>'required|date_format:"Y-m-d"',
            'correo'=>'required|max:30|email',
        ]);

        try{
            DB::beginTransaction();

            Invitado::find($id)
                ->update([
                    'nombre'=>$request->nombre,
                    'apellido'=>$request->apellido,
                    'cedula'=>$request->cedula,
                    'celular'=>$request->celular,
                    'correo'=>$request->correo,
                    'fecha_nacimiento'=>$request->fecha_nacimiento,
                    'foto'=>"NO HAY",
                ]);

            DB::commit();
        }
        catch (\Exception $ex){
            DB::rollback();
            return redirect('/invitados/'.$id.'/edit')->with(['message'=>'A ocurrido un error','tipo'=>'error']);
        }
        return redirect('/invitados')->with(['message'=>'El invitado se ha actualizado correctamente','tipo'=>'message']);
    }


}
