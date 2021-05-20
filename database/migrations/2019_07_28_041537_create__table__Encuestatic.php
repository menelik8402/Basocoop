<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEncuestatic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestatic', function (Blueprint $table) {

            $table->increments('id');
            $table->char('tipo',1);
            $table->char('sexo',1);
            $table->enum('rango',['18-25','26-35','36-45','46-55','56-60','61-70','mas70'])->default('15-25');
            $table->enum('nivel_esc',['Ninguno','Basico','Medio','Superior','Postgrado'])->default('Ninguno');
            $table->integer('cant_pers_fam');
            $table->enum('tipo_viv',['Propia','Alquilada','Financiada','Otra'])->default('Propia');
            $table->char('neces_vivienda',1)->default('D');
            $table->enum('vivienda_necesidad',['Construccion Total','Reparacion Total','Reparacion Media','Reparacion Ligera']);

            $table->char('capa_emprend',1)->default('N');
            $table->char('capa_filos_coop',1)->default('N');
            $table->char('capa_edu_financ',1)->default('N');
            $table->char('capa_edu_ambient',1)->default('N');
            $table->char('capa_intel_emoc',1)->default('N');
            $table->char('capa_fundam_legal',1)->default('N');
            $table->char('capa_adult_mayor',1)->default('N');
            $table->char('capa_oficio',1)->default('N');
            $table->string('capa_ofic_cual')->nullable();
            $table->string('otroscursos')->nullable();

            $table->char('auto',1)->default('D');
            $table->char('rep_auto',1)->default('D');

            $table->enum('recreacion',['Buena','Mala','Regular'])->default('Regular');

            $table->char('act_soc_fiest_nino',1)->default('D');
            $table->char('act_soc_dia_pad',1)->default('D');
            $table->char('act_soc_dia_mad',1)->default('D');
            $table->char('act_soc_dia_int_muj',1)->default('D');
            $table->char('act_soc_adult_mayor',1)->default('D');
            $table->char('act_soc_enc_asoc',1)->default('D');
            $table->char('act_soc_festiv',1)->default('D');
            $table->text('act_soc_festiv_cuales')->nullable();
            $table->text('actividades')->nullable();//actividades recreativas


            $table->char('seguro_vida',1)->default('D');
            $table->string('seguro_vida_no')->nullable();//explicacion de pq no tiene seguro de vida
            /* $table->char('seguro_salud',1)->default('D');*/
           /* $table->string('seguro_salud_no');//explicacion de pq no tiene seguro de salud*/
            $table->char('seguro_vehic',1)->default('D');
            $table->text('seguro_vehic_no')->nullable();////explicacion de pq no tiene seguro de de vehiculo


            $table->char('pers_enferm',1)->default('D');
            $table->string('tipo_enferm')->nullable();//tipo de enfermedad o incapacidad
            $table->string('neces_apoyo')->nullable();

            $table->char('ninos',1)->default('D');
            $table->char('ayuda_ninos',1)->default('D');//ayuda a ninos
            $table->text('ayuda_ninos_si')->nullable();//que tipo de ayuda pudiea dar la cooperativa en caso de que si el anterior

            $table->char('serv_funerarios',1)->default('D');
            $table->string('arg_serv_fun')->nullable();
            $table->char('ayuda_serv_fun',1)->default('D');

            $table->text('part_act_sociales')->nullable();//cuales actividades sociales
            $table->text('act_coop_jov_nin')->nullable();

            $table->char('linea_cred',1)->default('D');
            $table->text('otras_act_des_med_am')->nullable();

            $table->char('act_reforest',1)->default('D');//actividad de reforestacion
            $table->text('act_reforest_donde')->nullable();
            $table->char('caj_aut',1);
            $table->char('nec_caj_aut',1);


          /*  $table->string('neces_sociales')->default('NINGUNO');
            $table->string('accione_necesid_sociales')->default('NINGUNO');
            $table->char('part_act_soc',1)->default('D');





            $table->char('pres_result_gestsoc',1)->default('D');*/



            //$table->date('fecha')->default();


            $table->integer('ano')->unsigned();
           /* $table->foreign('id_ano')->references('id')->on('ano');*/
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
        Schema::dropIfExists('encuestatic');
    }
}
