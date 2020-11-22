<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTiempoAfiliacionAsoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiempoafilasoc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('time_0_1');
            $table->integer('time_1_2');
            $table->integer('time_3_5');
            $table->integer('time_5_10');
            $table->integer('time_10_15');
            $table->integer('time_15_20');
            $table->integer('time_20_25');
            $table->integer('time_25_30');
            $table->integer('time_30_35');
            $table->integer('time_35_40');
            $table->integer('time_40_48');
            $table->integer('timemas50');

            $table->integer('id_ano')->unsigned();
            $table->foreign('id_ano')->references('id')->on('ano');
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
        Schema::dropIfExists('tiempoafilasoc');
    }
}
