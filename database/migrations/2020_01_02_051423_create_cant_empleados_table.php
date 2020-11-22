<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCantEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cant_empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hom_emp');
            $table->integer('muj_emp');
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
        Schema::dropIfExists('cant_empleados');
    }
}
