<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategoriaOcupAsoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoriaocupasoc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('empsectpri');
            $table->integer('empsectpub');
            $table->integer('comerc');
            $table->integer('product');
            $table->integer('estudiat');
            $table->integer('jubilado');
            $table->integer('profind');
            $table->integer('otroscat');

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
        Schema::dropIfExists('categoriaocupasoc');
    }
}
