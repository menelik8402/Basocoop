<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('roles')->insert([
            [
                "nomb_rol" => 'Administador',
                "descrip" => 'Administrador que esta en la federacion nacional ',
            ],
            [
                "nomb_rol" => 'Usuario Federativo',
                "descrip" => 'Personal que se encuentra en la federacion nacional y consulta toda la informción',
            ],
            [
                "nomb_rol" => 'Administador Cooperativo',
                "descrip" => 'Es el administrador que se encarga del sistema en las cooperativas.'
            ],
            [
                "nomb_rol" => 'Gestor Social',
                "descrip" => 'Usuario que realiza todas las operaciones del sistema'
            ],
            [
                "nomb_rol" => 'Usuario',
                "descrip" => 'Usuario del sistema y radica en la cooperativa'
            ],

        ]);
    }
}
