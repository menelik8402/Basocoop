<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEduFormInfRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       /* $inv=(int)request()->get("inv_edu_form_inform_jov")+(int)request()->get("inv_edu_form_inform_muj")+(int)request()->get("inv_edu_form_inform_emp")+ (int)request()->get("inv_edu_form_inform_direct")+(int)request()->get("inv_edu_form_inform_ninos")+(int)request()->get("inv_edu_form_inform_comun");
        $num=request()->get("num_act_edu_form_inf_jov")+
            request()->get("num_act_edu_form_inf_muj")+
            request()->get("num_act_edu_form_inf_asoc")+
            request()->get("num_act_edu_form_inf_emp")+
            request()->get("num_act_edu_form_inf_direct")+
            request()->get("num_act_edu_form_inf_ninos")+
            request()->get("num_act_edu_form_inf_comun");*/

       /* $cant=request()->get("num_act_edu_form_inf_jov")+*/


        return [

            /*'inv_proc_form_cap'=>'required|same:'. strval($inv),*/
            'inv_proc_form_cap'=>'required',
            'inv_edu_form_inform_jov'=>'required',
            'inv_edu_form_inform_muj'=>'required',
            'inv_edu_form_inform_emp'=>'required',
            'inv_edu_form_inform_direct'=>'required',
            'inv_edu_form_inform_ninos'=>'required',
            'inv_edu_form_inform_comun'=>'required',

           /* 'num_act_edu_form_inf'=>'required|same:'. $num,*/
            'num_act_edu_form_inf'=>'required',
            'num_act_edu_form_inf_jov'=>'required',
            'num_act_edu_form_inf_muj'=>'required',
            'num_act_edu_form_inf_asoc'=>'required',
            'num_act_edu_form_inf_emp'=>'required',
            'num_act_edu_form_inf_direct'=>'required',
            'num_act_edu_form_inf_ninos'=>'required',
            'num_act_edu_form_inf_comun'=>'required',

            'cant_part_act_educ_form_inform'=>'required',
            'cant_part_act_educ_form_inform_jov'=>'required',
            'cant_part_act_educ_form_inform_muj'=>'required',
            'cant_part_act_educ_form_inform_asoc'=>'required',
            'cant_part_act_educ_form_inform_emp'=>'required',
            'cant_part_act_educ_form_inform_direct'=>'required',
            'cant_part_act_educ_form_inform_ninos'=>'required',
            'cant_part_act_educ_form_inform_comun'=>'required',
            'cant_part_act_educ_form_inform_fil_coop'=>'required',
            'cant_act_form_hab'=>'required',
            'cant_part_act_form_hab'=>'required',


        ];
    }

    public function messages()
    {
        return [

            'inv_proc_form_cap.required'=>'Se requiere Inversión realizada en el proceso de formación y capacitación  ',
           /* 'inv_proc_form_cap.same'=>'Las inversiones realizadas no coinciden con el total de la inversión',*/
            'inv_edu_form_inform_jov.required'=>'Se requiere Inversión en educación, formación e información para jóvenes',
            'inv_edu_form_inform_muj.required'=>'Se requiere Inversión en educación, formación e información para mujeres',
            'inv_edu_form_inform_emp.required'=>'Se requiere Inversión en educación, formación e información para empleados',
            'inv_edu_form_inform_direct.required'=>'Se requiere Inversión en educación, formación e información para directivos',
            'inv_edu_form_inform_ninos.required'=>'Se requiere Inversión en educación, formación e información para niños',
            'inv_edu_form_inform_comun.required'=>'Se requiere Inversión en educación, formación e información para miembros de la comunidad',
            'num_act_edu_form_inf.required'=>'Se requiere Número de actividades en educación, formación e información',
            'num_act_edu_form_inf_jov.required'=>'Se requiere Número de actividades en educación, formación e información para jóvenes',
            'num_act_edu_form_inf_muj.required'=>'Se requiere Número de actividades en educación, formación e información para mujeres',
            'num_act_edu_form_inf_asoc.required'=>'Se requiere Número de actividades en educación, formación e información para asociados',
            'num_act_edu_form_inf_emp.required'=>'Se requiere Número de actividades en educación, formación e información para empleados',
            'num_act_edu_form_inf_direct.required'=>'Se requiere Número de actividades en educación, formación e información para directivos',
            'num_act_edu_form_inf_ninos.required'=>'Se requiere Número de actividades en educación, formación e información para niños',
            'num_act_edu_form_inf_comun.required'=>'Se requiere Número de actividades en educación, formación e información para miembros de la comunidad',
            'cant_part_act_educ_form_inform.required'=>'Se requiere Cantidad de participantes en actividades de educación, formación e información ',
            'cant_part_act_educ_form_inform_jov.required'=>'Se requiere Cantidad de participantes en actividades de educación, formación e información para jóvenes',
            'cant_part_act_educ_form_inform_muj.required'=>'Se requiere Cantidad de participantes en actividades de educación, formación e información para mujeres',
            'cant_part_act_educ_form_inform_asoc.required'=>'Se requiere Cantidad de participantes en actividades de educación, formación e información para asociados',
            'cant_part_act_educ_form_inform_emp.required'=>'Se requiere Cantidad de participantes en actividades de educación, formación e información para empleados',
            'cant_part_act_educ_form_inform_direct.required'=>'Se requiere Cantidad de participantes en actividades de educación, formación e información para directivos',
            'cant_part_act_educ_form_inform_ninos.required'=>'Se requiere Cantidad de participantes en actividades de educación, formación e información para niños',
            'cant_part_act_educ_form_inform_comun.required'=>'Se requiere Cantidad de participantes en actividades de educación, formación e información para miembros de la comunidad',
            'cant_part_act_educ_form_inform_fil_coop.required'=>'Se requiere Cantidad de participantes en actividades de educación, formación e información sobre la filosofía cooperativa',
            'cant_act_form_hab.required'=>'Se requiere Cantidad de actividades para la formación de habilidades',
            'cant_part_act_form_hab.required'=>'Se requiere Cantidad de participantes en actividades para la formación de habilidades',

        ];

    }
}
