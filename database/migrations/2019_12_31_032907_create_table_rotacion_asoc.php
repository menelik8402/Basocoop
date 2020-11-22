<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRotacionAsoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rotacionasoc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ingreso');
            $table->integer('hombres_ing');
            $table->integer('mujeres_ing');
            $table->integer('retiro');
            $table->integer('hombres_ret');
            $table->integer('mujeres_ret');
            $table->integer('id_ano')->unsigned();
            $table->foreign('id_ano')->references('id')->on('ano');
            $table->integer('id_cooperativa')->unsigned();
            $table->foreign('id_cooperativa')->references('id')->on('cooperativa');
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
        Schema::dropIfExists('rotacionasoc');
    }
}
