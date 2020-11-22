<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        return \DB::table('users')->insert([
            [
               /* "ci" => '84021001621',
                "name" => 'Menelik Mesa Rojas',
                "email" => 'mmesa@s1551.dppr,bandec.cu',
                "login" => 'mmesa',
                "password" => '$2y$10$mYjLLJqC9tMwt3ygVcxI3eXEVxrDKbxYRtRnEl.kVY9CbiQmyYNza',
                'primeravez'=> 'S',
                'fecha_act_psw' => '2019-10-10',
                'id_rol' => '1',
                'id_coop'=>null*/

                "ci" => '84090200525',
                "name" => 'Ramon A Jaime Infante',
                "email" => 'ramon@upr.edu.cu',
                "login" => 'ramon',
                "password" => '$2y$10$mYjLLJqC9tMwt3ygVcxI3eXEVxrDKbxYRtRnEl.kVY9CbiQmyYNza',
                'primeravez'=> 'S',
                'fecha_act_psw' => '2019-10-10',
                'id_rol' => '1',
                'id_coop'=>null


            ],

        ]);
    }
}
