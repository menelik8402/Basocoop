<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduForInfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eduforinf', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('inv_proc_form_cap');
            $table->float('inv_edu_form_inform_jov');
            $table->float('inv_edu_form_inform_muj');
            $table->float('inv_edu_form_inform_emp');

            $table->float('inv_edu_form_inform_direct');
            $table->float('inv_edu_form_inform_ninos');
            $table->float('inv_edu_form_inform_comun');
            $table->integer('num_act_edu_form_inf');

            $table->integer('num_act_edu_form_inf_jov');
            $table->integer('num_act_edu_form_inf_muj');
            $table->integer('num_act_edu_form_inf_asoc');
            $table->integer('num_act_edu_form_inf_emp');

            $table->integer('num_act_edu_form_inf_direct');
            $table->integer('num_act_edu_form_inf_ninos');
            $table->integer('num_act_edu_form_inf_comun');
            $table->integer('cant_part_act_educ_form_inform');

            $table->integer('cant_part_act_educ_form_inform_jov');
            $table->integer('cant_part_act_educ_form_inform_muj');
            $table->integer('cant_part_act_educ_form_inform_asoc');
            $table->integer('cant_part_act_educ_form_inform_emp');

            $table->integer('cant_part_act_educ_form_inform_direct');
            $table->integer('cant_part_act_educ_form_inform_ninos');
            $table->integer('cant_part_act_educ_form_inform_comun');
            $table->integer('cant_part_act_educ_form_inform_fil_coop');

            $table->integer('cant_act_form_hab');
            $table->integer('cant_part_act_form_hab');



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
        Schema::dropIfExists('eduforinf');
    }
}
