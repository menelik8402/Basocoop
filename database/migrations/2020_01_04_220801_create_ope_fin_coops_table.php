<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeFinCoopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OpeFinCoop', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cant_oper_red_act');
            $table->integer('usuario_red_act');
            $table->integer('pto_serv_red_act');
            $table->integer('cant_oper_caj_aut');
            $table->integer('usuario_caj_aut');
            $table->integer('pto_serv_caj_aut');
           /* $table->integer('int_coop');
            $table->integer('cant_asoc_part_asamb_coop');
            $table->integer('cant_ali_est_inst');
            $table->integer('cant_ali_est_interinst');*/


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
        Schema::dropIfExists('OpeFinCoop');
    }
}
