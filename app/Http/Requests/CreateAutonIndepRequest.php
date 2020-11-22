<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAutonIndepRequest extends FormRequest
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

            'capital_prop'=>'required|integer',
            'capital_ext'=>'required|integer',
            'acu_cump_cap_prop'=>'required|integer',
            'acu_cump_cap_ext'=>'required|integer',
            'acu_cump_ini_prop'=>'required|integer',
            'acu_cump_inj_ext'=>'required|integer',

        ];
    }
    public function messages()
    {
        return [

                'capital_prop.required'=>'Campo requerido',
                'capital_ext.required'=>'Campo requerido',
                'acu_cump_cap_prop.required'=>'Campo requerido',
                'acu_cump_cap_ext.required'=>'Campo requerido',
                'acu_cump_ini_prop.required'=>'Campo requerido',
                'acu_cump_inj_ext.required'=>'Campo requerido',

            'capital_prop.integer'=>'Se requiere número entero',
            'capital_ext.integer'=>'Se requiere número entero',
            'acu_cump_cap_prop.integer'=>'Se requiere número entero',
            'acu_cump_cap_ext.integer'=>'Se requiere número entero',
            'acu_cump_ini_prop.integer'=>'Se requiere número entero',
            'acu_cump_inj_ext.integer'=>'Se requiere número entero',

        ];
    }
}
