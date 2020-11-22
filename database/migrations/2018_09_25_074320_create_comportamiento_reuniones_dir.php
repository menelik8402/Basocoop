<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComportamientoReunionesDir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comportamientoreunionesdir', function (Blueprint $table) {
    $table->increments('id');
//    $table->integer('id_tipo_reunion');
//    $table->foreign('id_tipo_reunion')->references('id')->on('tiporeunion');
    $table->integer('consejo_administracion');
    $table->integer('consejo_directivo');
    $table->integer('comite_educacion');
    $table->integer('comite_vigilancia');
    $table->integer('comite_credito');
    $table->integer('consejo_administracion_real');
    $table->integer('consejo_directivo_real');
    $table->integer('comite_educacion_real');
    $table->integer('comite_vigilancia_real');
    $table->integer('comite_credito_real');
    $table->integer('id_ano')->unsigned();
    $table->foreign('id_ano')->references('id')->on('ano');
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
    Schema::dropIfExists('comportamientoreunionesdir');
}
}
