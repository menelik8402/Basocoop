<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistribucionUtilidades extends Migration
{
    public function up()
    {
        Schema::create('distribucionutilidades', function (Blueprint $table) {
            $table->increments('id');
            $table->float('excedente');
            $table->float('capitalizar_coop');
            $table->float('distribucion_socios');
            $table->float('reservas');
            $table->float('fondo_sociales');//capital social
            $table->float('capital_per');
            $table->integer('id_ano')->unsigned();
            $table->foreign('id_ano')->references('id')->on('ano');
           // $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distribucionutilidades');
    }
}
