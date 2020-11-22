<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompXEdadesAsoc extends Migration
{
    /**
     * Run the migrations.
     *0 a 5 años
    5 a 15 años
    15 a 20 años
    20 a 40 años
    40 a 60 años
    60 a 65 años
    65 a 75 años
    + de 75 años

     * @return void
     */
    public function up()
    {
        Schema::create('compporedadesasoc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('edad_18_25');
            $table->integer('edad_26_35');
            $table->integer('edad_36_45');
            $table->integer('edad_46_55');
            $table->integer('edad_56_60');
            $table->integer('edad_61_70');
            /*$table->integer('edad_66_75');*/
            $table->integer('mas70');
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
        Schema::dropIfExists('compporedadesasoc');
    }
}
