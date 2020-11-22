<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondMaterialCoop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condmaterialcoop', function (Blueprint $table) {
            $table->increments('id');
            $table->double('utilidades');
            $table->double('presupuesto_coop');
            $table->double('fondo_educacion');
            $table->double('mercadeo');
            $table->double('cmte_genero');
            $table->double('otros_ingresos');
            $table->integer('id_premisas')->unsigned();
            $table->foreign('id_premisas')->references('id')->on('premisas')->onDelete('cascade');


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
        Schema::dropIfExists('condmaterialcoop');
    }
}
