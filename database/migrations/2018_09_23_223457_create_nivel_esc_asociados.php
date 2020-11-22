<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelEscAsociados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nivelescasociados', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('id_var_I');
//            $table->foreign('id_var_I')->references('id')->on('var_I');
            $table->string('primario');
            $table->string('secundario');
            $table->string('tecnico');
            $table->string('universitario');
            $table->string('postgrado');
            $table->string('maestria');
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
        Schema::dropIfExists('nivelescasociados');
    }
}
