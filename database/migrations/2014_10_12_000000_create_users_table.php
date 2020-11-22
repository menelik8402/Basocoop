<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ci')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('login')->unique();
            $table->string('password');
            $table->char('primeravez');
           // $table->boolean('logueado')->default(false)->nullable(true);
            $table->date('fecha_act_psw');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**84090200525
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
