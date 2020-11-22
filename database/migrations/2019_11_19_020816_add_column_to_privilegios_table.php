<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToPrivilegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('privilegios', function (Blueprint $table) {
            //
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('privilegios', function (Blueprint $table) {
            //
          $table->dropForeign('privilegios_id_user_foreign');
            $table->dropColumn('id_user');
        });
    }
}
