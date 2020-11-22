<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestaPregunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestapregunta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_encuesta')->unsigned();
            $table->integer('id_pregunta')->unsigned();
            $table->foreign('id_encuesta')->references('id')->on('encuesta');
            $table->foreign('id_pregunta')->references('id')->on('pregunta');
            $table->rememberToken();
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
        Schema::dropIfExists('encuestapregunta');
    }
}
