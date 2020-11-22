<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCoperativaRequest extends FormRequest
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
            //
            'nombre' => 'required',
            'direccion'=> 'required',
            'municipio' => 'required',
            'provincia' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Se requiere la entrada del nombre.',
            'direccion.required' => 'Se requiere la entrada de la direccion de la cooperativa.',
            'municipio.required' => 'Se requiere la entrada del municipio.',
            'provincia.required' => 'Se requiere la entrada de la provincia.',
        ];
    }
}
