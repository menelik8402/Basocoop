<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdFedCoopFedracionRelacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cooperativa', function (Blueprint $table) {
            $table->integer('fed_id')->unsigned();
            $table->foreign('fed_id')->references('id')->on('federacion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cooperativa', function (Blueprint $table) {
            //
            $table->dropForeign('cooperativa_fed_id_foreign');
            $table->dropColumn('fed_id');
        });
    }
}
