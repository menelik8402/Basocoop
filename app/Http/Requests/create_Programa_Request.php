<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class create_Programa_Request extends FormRequest
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
            'nombre'=>'required',
            'objetivo'=>'required',
            'metodologia'=>'required',
            'presupuestoP'=>'required|min:1|numeric',
            'anno'=>'required|not_in:0',


            ];
    }
    public function messages()
    {
        return [

             'nombre.required'=>'Escriba el nombre del programa',
            'objetivo.required'=> 'Escriba el objetivo del programa',
            'metodologia.required'=>'Escriba el metodología del programa',
            'presupuestoP.required' => 'Escriba el presupuesto del programa' ,
            'anno.required'=> 'Seleccione el año',
            'anno.not_in'=>'El valor seleccionado del año es incorrecto',
            'presupuestoP.min'=> 'El presupuesto debe ser mayor que cero',
            'presupuestoP.numeric'=> 'Se espera un  valor numérico en el presupuesto',
            ];

    }
}
