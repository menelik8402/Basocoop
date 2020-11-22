<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_programa')->unsigned();
            $table->foreign('id_programa')->references('id')->on('programa')->onDelete('cascade');
            $table->string('responsable');
            $table->float('presupuesto');
            $table->string('desc_unid_fisicas');///este es la descripcion de la actividad o meta
           // $table->integer('manif_num');
            $table->integer('unid_fisicas_plan');
            $table->integer('beneficiarios_plan');
         //   $table->date('fecha_cumplimiento');// revisar si esta bien el tipo de dato


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
        Schema::dropIfExists('metas');
    }
}
