<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateConMatRequest extends FormRequest
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
            'presupuesto_coop' =>'required|min:0',
            'fondo_educacion' => 'required|min:0',
            'utilidades' => 'required|min:0',
            'otrosI'=>'required|min:0',
            'mercadeo'=>'required|min:0',
            'cmte_genero'=>'required|min:0',
            'legal' =>'required',
            'educ'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'presupuesto_coop.required' => 'Se require campo.',
            'fondo_educacion.required' => 'Se require campo.',
            'utilidades.required' => 'Se require campo.',
            'otrosI.required' => 'Se require campo.',
            'mercadeo.required' => 'Se require campo.',
            'cmte_genero.required' => 'Se require campo.',
            'legal.required' => 'Se require campo.',
            'educ.required' => 'Se require campo.',

        ];
    }
}
