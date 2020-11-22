<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdCoopComportamientoreunionesdir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comportamientoreunionesdir', function (Blueprint $table) {
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
        Schema::table('comportamientoreunionesdir', function (Blueprint $table) {
            //
            $table->dropForeign('comportamientoreunionesdir_id_cooperativa_foreign');
            $table->dropColumn('id_cooperativa');
        });
    }
}
