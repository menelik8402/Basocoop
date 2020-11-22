<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOpFinCoopRequest extends FormRequest
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

            'cant_oper_red_act'=>'required|integer',
            'usuario_red_act'=>'required|integer',
            'pto_serv_red_act'=>'required|integer',
            'cant_oper_caj_aut'=>'required|integer',
            'usuario_caj_aut'=>'required|integer',
            'pto_serv_caj_aut'=>'required|integer',
            'cant_asoc_part_asamb_coop'=>'required|integer',
            'cant_ali_est_inst'=>'required|integer',
            'cant_ali_est_interinst'=>'required|integer',
        ];


    }
   public function messages()
   {
       return [
           'cant_oper_red_act.required'=>'Campo requerido',
           'usuario_red_act.required'=>'Campo requerido',
           'pto_serv_red_act.required'=>'Campo requerido',
           'cant_oper_caj_aut.required'=>'Campo requerido',
           'usuario_caj_aut.required'=>'Campo requerido',
           'pto_serv_caj_aut.required'=>'Campo requerido',
           'cant_asoc_part_asamb_coop.required'=>'Campo requerido',
           'cant_ali_est_inst.required'=>'Campo requerido',
           'cant_ali_est_interinst.required'=>'Campo requerido',
           'cant_oper_red_act.integer'=>'Se requiere número entero',
           'usuario_red_act.integer'=>'Se requiere número entero',
           'pto_serv_red_act.integer'=>'Se requiere número entero',
           'cant_oper_caj_aut.integer'=>'Se requiere número entero',
           'usuario_caj_aut.integer'=>'Se requiere número entero',
           'pto_serv_caj_aut.integer'=>'Se requiere número entero',
           'cant_asoc_part_asamb_coop.integer'=>'Se requiere número entero',
           'cant_ali_est_inst.integer'=>'Se requiere número entero',
           'cant_ali_est_interinst.integer'=>'Se requiere número entero',

       ];
   }
}
