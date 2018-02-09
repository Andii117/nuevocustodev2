<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PermisosTableSeeder::class);
        $this->call(PermisosUsersTableSeeder::class);
            /*
        $this->call(CargosTableSeeder::class);
        $this->call(PuertasTableSeeder::class);
        $this->call(PuertasUsersTableSeeder::class);
        $this->call(SeccionesTableSeeder::class);
        $this->call(FuncionariosTableSeeder::class);
        $this->call(InvitadosTableSeeder::class);
        $this->call(IntervalosinvitadosTableSeeder::class);
        $this->call(IntervalosinvitadosPuertasTableSeeder::class);
        $this->call(LicenciasTableSeeder::class);
        $this->call(IntervalosFuncionariosTableSeeder::class);
        $this->call(IntervalosfuncionariosPuertasTableSeeder::class);
        $this->call(IntervalosseccionesTableSeeder::class);
        $this->call(HorariogeneralTableSeeder::class);
        */
    }
}
