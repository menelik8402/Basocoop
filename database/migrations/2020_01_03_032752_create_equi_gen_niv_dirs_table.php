<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiGenNivDirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EquiGenNivDir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hombres');
            $table->integer('mujeres');
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
        Schema::dropIfExists('EquiGenNivDir');
    }
}
