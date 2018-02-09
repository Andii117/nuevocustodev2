<?php

use Illuminate\Database\Seeder;

class FuncionariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i<11; $i++){
            DB::table('Funcionarios')->insert([
                'id' => $i,
                'cedula' => '112154321'.$i,
                'nombre' => 'Funcionario_'.$i,
                'foto'=>'F'.$i,
                'fecha_nacimiento' => '2017-05-22 16:15:10',
                'apellido' => 'Apellido ',
                'celular' => '321543885'.$i,
                'correo' => 'Funcionario'.$i.'@gmail.com',
                'horario_normal' => 0,
                'estatus_licencia' => 0,
                'licencia' => 0,
                'tarjeta_rfid' => '47A4F2E'.$i,
                'estatus' => 1,
                'cargo_id'=>$i,
                'created_at'=>\Carbon\Carbon::now()->toDateString()
            ]);
            DB::table('llaves')
                ->insert([
                    'tipo'=> '0',//tipo 0 es el indicativo de funcionario
                    'llave_rfid' =>'47A4F2E'.$i,
                    'id_asociado' =>  $i,
                    'fecha_expiracion' => \Carbon\Carbon::now()->addYears(10)->toDateString(),
                ]);
        }
    }
}
