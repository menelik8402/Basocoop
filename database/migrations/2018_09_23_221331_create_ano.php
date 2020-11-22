<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAno extends Migration
{
    public function up()
    {
        Schema::create('ano', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ano');

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
        Schema::dropIfExists('ano');
    }
}
