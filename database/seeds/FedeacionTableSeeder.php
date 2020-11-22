<?php

use Illuminate\Database\Seeder;

class FedeacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('federacion')->insert([
            [
                "descrip" => 'FEDECACES',

            ]
        ]);
    }
}
