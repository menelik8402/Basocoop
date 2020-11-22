<?php

namespace BasoCoop;

use Illuminate\Database\Eloquent\Model;

class EduForInf extends Model
{
    protected $table = 'eduforinf';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inv_proc_form_cap','inv_edu_form_inform_jov','inv_edu_form_inform_muj','inv_edu_form_inform_emp','inv_edu_form_inform_direct','inv_edu_form_inform_ninos',
        'inv_edu_form_inform_comun','num_act_edu_form_inf','num_act_edu_form_inf_jov','num_act_edu_form_inf_muj','num_act_edu_form_inf_asoc','num_act_edu_form_inf_emp',
        'num_act_edu_form_inf_direct','num_act_edu_form_inf_ninos','num_act_edu_form_inf_comun','cant_part_act_educ_form_inform','cant_part_act_educ_form_inform_jov','cant_part_act_educ_form_inform_muj',
        'cant_part_act_educ_form_inform_asoc','cant_part_act_educ_form_inform_emp','cant_part_act_educ_form_inform_direct','cant_part_act_educ_form_inform_ninos',
        'cant_part_act_educ_form_inform_comun','cant_part_act_educ_form_inform_fil_coop','cant_act_form_hab','cant_part_act_form_hab', 'id_ano','id_cooperativa'
    ];

    protected $hidden = [

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function Ano(){
        return $this->belongsTo('BasoCoop\Ano','id_ano');
    }
}
