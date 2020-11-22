<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutonIndepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autonIndep', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('capital_prop');
            $table->float('capital_ext');
            $table->integer('acu_cump_cap_prop');
            $table->integer('acu_cump_cap_ext');
            $table->integer('acu_cump_ini_prop');
            $table->integer('acu_cump_inj_ext');
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
        Schema::dropIfExists('autonIndep');
    }
}
