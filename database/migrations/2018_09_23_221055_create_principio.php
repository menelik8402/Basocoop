<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrincipio extends Migration
{
    public function up()
    {
        Schema::create('principio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_principio');
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
        Schema::dropIfExists('principio');
    }
}
