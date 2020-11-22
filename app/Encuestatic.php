<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class Encuestatic extends Model
{
    protected $table = 'encuestatic';

    protected $fillable = [
        'tipo','sexo', 'rango', 'nivel_esc', 'cant_pers_fam', 'tipo_viv', 'neces_vivienda', 'vivienda_necesidad',
        'capa_emprend','capa_filos_coop','capa_edu_financ','capa_edu_ambient','capa_intel_emoc','capa_fundam_legal','capa_adult_mayor','capa_oficio','capa_ofic_cual',
        'otroscursos', 'auto','rep_auto',  'recreacion','act_soc_fiest_nino','act_soc_dia_pad','act_soc_dia_int_muj','act_soc_adult_mayor','act_soc_enc_asoc','act_soc_festiv',
        'act_soc_festiv_cuales','actividades', 'seguro_vehic','seguro_vehic_no', 'seguro_vida_no', 'seguro_vida', 'pers_enferm',
        'tipo_enferm', 'neces_apoyo', 'ninos', 'ayuda_ninos', 'ayuda_ninos_si', 'serv_funerarios', 'arg_serv_fun', 'ayuda_serv_fun', 'part_act_sociales','act_coop_jov_nin',
        'linea_cred','otras_act_des_med_am','act_reforest','act_reforest_donde','caj_aut','nec_caj_aut','ano','id_cooperativa'
    ];




}
