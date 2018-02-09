<?php

use Illuminate\Database\Seeder;

class IntervalosinvitadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new \Carbon\Carbon();
        for ($i = 0; $i<10; $i++){
            for ($j = 1; $j<10; $j++) {
                if ($i < 4) {
                    DB::table('IntervalosInvitados')->insert([
                        'targeta_rfid' => '4A2B2FD' . $i,
                        'desde' => $carbon->now()->addHour(1),
                        'hasta' => $carbon->now()->addHour(2),
                        'invitado_id' => $j,
                        'fecha' => $carbon->now()->subDays($i),
                    ]);


                } elseif ($i < 8) {
                    DB::table('IntervalosInvitados')->insert([
                        'targeta_rfid' => '4A2B2FD' . $i,
                        'desde' => $carbon->now()->subHour(4),
                        'hasta' => $carbon->now()->subHour(3),
                        'invitado_id' => $j,
                        'fecha' => $carbon->now(),
                    ]);
                    DB::table('llaves')
                        ->insert([
                            'tipo'=> '1',//tipo 0 es el indicativo de funcionario
                            'llave_rfid' =>'4A2B2FD' . $i,
                            'id_asociado' =>  $i+100000,
                            'fecha_expiracion' => \Carbon\Carbon::now()->addDays(1)->toDateString(),
                        ]);
                } else {
                    DB::table('IntervalosInvitados')->insert([
                        'targeta_rfid' => '4A2B2FD' . $i,
                        'desde' => $carbon->now()->addHour(2),
                        'hasta' => $carbon->now()->addHour(4),
                        'invitado_id' => $j,
                        'fecha' => $carbon->now()->addDays($i-7),
                    ]);
                    DB::table('llaves')
                        ->insert([
                            'tipo'=> '1',//tipo 0 es el indicativo de funcionario
                            'llave_rfid' =>'4A2B2FD' . $i,
                            'id_asociado' =>  $i+100000,
                            'fecha_expiracion' => \Carbon\Carbon::now()->addDays($i+8)->toDateString(),
                        ]);
                }
            }
        }
    }
}
