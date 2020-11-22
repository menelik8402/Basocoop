<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Create_Encuestastatic_request extends FormRequest
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
        return [
            'tipo' => 'required',
            'sexo' => 'required',
            'rango' => 'required',
            'nivel_esc' => 'required',
            'cantidad' => 'required',
            'vivienda' => 'required',
            'neces_vivienda' => 'required',
            'vivienda_necesita' => 'required',
            /*'capa_emprend' => 'required',
            'capa_filos_coop' => 'required',
            'capa_edu_financ' => 'required',
            'capa_edu_ambient' => 'required',
            'capa_intel_emoc' => 'required',
            'capa_fundam_legal' => 'required',
            'capa_adult_mayor' => 'required',
            'capa_oficio' => 'required',
            'capa_ofic_cual' => 'required',*/
          /*  'otroscursos' => 'required',*/
            'capa_ofic_cual'=>'required_if:capa_oficio,==,Oficios',
            'tiene_auto' => 'required',
            'rep_auto' => 'required',
            'recreacion' => 'required',
           /* 'act_soc_fiest_nino' => 'required',
            'act_soc_dia_pad' => 'required',
            'act_soc_dia_mad' => 'required',
            'act_soc_dia_int_muj' => 'required',
            'act_soc_adult_mayor' => 'required',
            'act_soc_enc_asoc' => 'required',
            'act_soc_festiv' => 'required',*/
            'act_soc_festiv_cuales' => 'required_if:act_soc_festiv,==,Festival',
           /* 'actividades' => 'required',*/
            'segdevida' => 'required',
            'seguro_vida_no' => 'required_if:segdevida,==,N',
            'seguro_vehic' => 'required',
            'seguro_vehic_no' => 'required_if:seguro_vehic,==,N',
            'per_enfer' => 'required',
            'enfer_padece' => 'required_if:per_enfer,==,S',
            'enfer_padece_apoyo' => 'required_if:per_enfer,==,S',
            'ninos_menores' => 'required',
            'ninos_cuidados' => 'required',
            'cuidados' => 'required_if:ninos_cuidados,==,S',
            'serv_funeb' => 'required',
            'serv_funb_ayu' => 'required',
            'serv_funb_argum' => 'required_if:serv_funeb,==,S',
            /*'part_act_sociales' => 'required',*/
          /*  'act_coop_jov_nin' => 'required',*/
            'linea_cred' => 'required',
           /* 'otras_act_des_med_am' => 'required',*/
            'act_reforest' => 'required',
          /*  'act_reforest_donde' => 'required',*/
            'caj_aut' => 'required',
            'nec_caj_aut' => 'required'
        ];
    }
    public function messages()
    {
       return [
           'act_soc_festiv_cuales.required_if'=>'Campo requerido.Nombre algun Festival.',
           'tipo.required' => 'Seleccione el tipo de encuestado',
           'rango.required' => 'Seleccione el rango de edad',
           'sexo.required' => 'Seleccione  el sexo',
           'nivel_esc.required' => 'Selecciones el nivel de escolariadad ',
           'cantidad.required' => 'Se requiere cantidad de personas que integran su familia',
           'cantidad.numeric' => 'Se requiere que el campo cantidad de personas que viven con usted sea numerico',
           'vivienda.required' => 'Se requiere el tipo de vivienda',
           'neces_vivienda.required' => 'Se requiere necesidad de vivienda',
           'vivienda_necesita.required' => 'Diga que tipo de contruccion o reparacion necesita su vivienda',
          // 'cursos.required' =>  'Seleccione al menos un curso de capacitacion',
          /* 'otroscursos.required' => 'Diga otros cursos',*/
           'tiene_auto.required' => 'Diga si tiene auto o no',
           'rep_auto.required' => 'Diga si necesita una repaacion de auto o no',
           'recreacion.required' => 'Diga como es la recreacion en la cooperativa',
           //'otrasact.required' => 'campo requerido',
           'seguro_vehic.required' => 'Diga si tiene seguro de vehiculo o no',
           'segdevida.required' => 'Diga si tiene seguro de vida o no',
           'seguro_vida_no.required_if' => 'Campo requerido',
           //'seguro_salud_no.required' => 'campo requerido',
           'per_enfer.required' => 'Diga si convive con personas enfermas',
           'enfer_padece.required_if' => 'Campo requerido',
           'enfer_padece_apoyo.required_if' => 'Campo requerido',
           'ninos_menores.required' => 'Diga si vive con niños menores o no ',
           'ninos_cuidados.required' => 'Diga si la cooperativa pudiera brindar ayuda en el cuidado de los niños ',
           'cuidados.required_if' => 'Campo requerido.Mencione algún cuidado.',
           'serv_funeb.required' => 'Diga si usted ha accedido a algun servicio  fúnebre',
          // 'serv_funb_argum.required' => 'campo requerido',
           'serv_funb_ayu.required' => 'Diga si la cooperativa deberia ayudar en este sentido',
           /*'part_act_sociales.required'=>'En que actividades deberia participar la cooperativa',*/
            /*'act_coop_jov_nin.required'=> 'Especifique algguna actividad en funcion de los jovenes',*/
           'linea_cred.required' => 'Diga si las lineas de credito juegan su papel en la coopeativa',
        /* 'otras_act_des_med_am.required'=>'Mencione alguna actividad relacionada con el medio ambiente',*/
         'act_reforest.required'=>'Diga si es necesario realizar alguna actividad de reforestación',
         /*'act_reforest_donde.required'=>'Se requiere',*/
         'caj_aut.required'=>'Se requiere cajero automatico',
         'nec_caj_aut.required'=>'Se requiere ',


         //  'nece_soc.required' => 'campo requerido',
         //  'nece_soc_acc.required' => 'campo requerido',
           'act_coop.required' => 'Diga si participa su familia en las actividades organizadas por la cooperativa',
           //'act_coop_text.required' => 'campo requerido',
           //'act_nin_jov.required' => 'campo requerido',
           'result_econ.required' => 'Diga si se presentan en las asambleas los resultados economicos de la cooperativa',
           'pres_result_gestsoc.required' => 'Diga si se presentan los resultados de lagestion social en la cooperativa',

           //'otroserv_coop.required' => 'campo requerido',
           //'otra_idea_coop.required' => 'campo requerido'

        ];
    }
}
