<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdCoopCompporedadesasoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compporedadesasoc', function (Blueprint $table) {
            //
            $table->integer('id_cooperativa')->unsigned();
            $table->foreign('id_cooperativa')->references('id')->on('cooperativa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compporedadesasoc', function (Blueprint $table) {
            //
            $table->dropForeign('compporedadesasoc_id_cooperativa_foreign');
            $table->dropColumn('id_cooperativa');
        });
    }
}
