<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCantAsociados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cant_asociados', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('id_var_I');
//            $table->foreign('id_var_I')->references('id')->on('var_I');
            $table->integer('id_ano')->unsigned();
            $table->foreign('id_ano')->references('id')->on('ano');
            $table->integer('hombres');
            $table->integer('mujeres');
            $table->integer('hom_act');
            $table->integer('muj_act');
            $table->integer('hom_inact');
            $table->integer('muj_inact');
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
        Schema::dropIfExists('cant_asociados');
    }
}
