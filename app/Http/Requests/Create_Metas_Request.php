<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Create_Metas_Request extends FormRequest
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
            'descUnidadesFisicas' =>'required',
            'presupuesto' => 'required|min:0|numeric',
            'responsable'=> 'required',
            'planUF'=>'required|min:1|numeric',
            'beneficiosPlan'=>'required|min:1|numeric'

        ];
    }
    public function messages()
    {
        return [
            'descUnidadesFisicas.required' => 'El campo descripcion de actividad es requerido',
            'presupuesto.required'=> 'Se requiere el pesupuesto',
            'presupuesto.min'=> 'El pesupuesto debe ser mayor que cero',
            'presupuesto.numeric'=> 'Se espera un  valor numérico en el presupuesto',
            'planUF.required'=> 'Se requiere el Plan de unidades fisícas',
            'planUF.min'=> 'El Plan de unidades fisícas debe ser mayor que cero',
            'planUF.numeric'=> 'Se espera un  valor numérico en el Plan de unidades fisícas',
            'beneficiosPlan.required'=> 'Se requiere el número de beneficiarios ',
            'beneficiosPlan.min'=> 'El número de beneficiarios debe ser mayor que cero',
            'beneficiosPlan.numeric'=> 'Se espera un  valor numérico en el número de beneficiarios',
            'responsable.required'=> 'Se requiere el reponsable'


        ];
    }
}
