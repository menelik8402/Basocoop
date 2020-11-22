<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIntComunidadRequest extends FormRequest
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
            'cant_act_real' => 'required|integer',
            'cant_part_act_desr_com'  => 'required|integer',
            'apoy_ints_comun' =>'required|integer',

        ];
    }
    public function messages()
    {
        return[
            'cant_act_real.required'=>'Campo requerido',
            'cant_part_act_desr_com.required'=>'Campo requerido',
            'apoy_ints_comun.required'=>'Campo requerido',

            'cant_act_real.integer'=>'Se requiere número entero',
            'cant_part_act_desr_com.integer'=>'Se requiere número entero',
            'apoy_ints_comun.integer'=>'Se requiere número entero',

        ];
    }
}
