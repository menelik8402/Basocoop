<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSeguimientometa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->float('presup_con');
            $table->integer('unid_fisicas_planif');
            $table->integer('num_benef_planif');
            $table->date('fecha_seguimiento');// revisar si esta bien el tipo de dato
            $table->integer('unid_fisicas_real')->default(0);
            $table->integer('num_beneficiarios_real')->default(0);

            $table->float('presup_real')->default(0);
            $table->date('fecha_real')->default('2010-01-01');
            $table->char('estado',1)->default('F');


            $table->integer('id_meta')->unsigned();
            $table->foreign('id_meta')->references('id')->on('metas')->onDelete('cascade');
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
        Schema::dropIfExists('seguimiento_meta');
    }
}
