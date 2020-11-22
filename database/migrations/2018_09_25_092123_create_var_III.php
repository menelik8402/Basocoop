<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVarIII extends Migration
{
    public function up()
    {
        Schema::create('var_III', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_principio')->unsigned();
            $table->foreign('id_principio')->references('id')->on('principio');
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
        Schema::dropIfExists('var_III');
    }
}
