<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePartEconRequest extends FormRequest
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
            'capitalizar_coop'=>'required|integer',
            'distribucion_socios'=>'required|integer',
            'fondo_sociales'=>'required|integer',
            'reservas'=>'required|integer',
            'excedente'=>'required|integer',
            'capital_per'=>'required|integer'
        ];
    }
    public function messages()
    {
        return [

                        'capitalizar_coop.required'=>'Campo requerido',
                        'distribucion_socios.required'=>'Campo requerido' ,
                        'fondo_sociales.required'=>'Campo requerido' ,
                        'reservas.required'=>'Campo requerido',
                        'excedente.required'=>'Campo requerido' ,
                        'capital_per.required'=>'Campo requerido',

            'capitalizar_coop.integer'=>'Se requiere número entero',
            'distribucion_socios.integer'=>'Se requiere número entero' ,
            'fondo_sociales.integer'=>'Se requiere número entero' ,
            'reservas.integer'=>'Se requiere número entero',
            'excedente.integer'=>'Se requiere número entero' ,
            'capital_per.integer'=>'Se requiere número entero',





        ];
    }
}
