<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilegios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomb_priv');
            $table->string('codigo_priv');
            $table->boolean('accion_add')->default(false)->nullable();
            $table->boolean('accion_edit')->default(false)->nullable();
            $table->boolean('accion_elim')->default(false)->nullable();
            $table->boolean('accion_inf')->default(true)->nullable();

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
        Schema::dropIfExists('privilegios');
    }
}
