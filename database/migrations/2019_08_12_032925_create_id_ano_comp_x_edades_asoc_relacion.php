<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdAnoCompXEdadesAsocRelacion extends Migration
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
            $table->dropForeign('compporedadesasoc_id_ano_foreign');
            $table->dropColumn('id_ano');
        });
    }
}
