<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestFed extends FormRequest
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
            'coop' => 'required|not_in:0',
            'ano' => 'required|not_in:0',
            'ind' =>  'not_in:0',
        ];
    }

    public function messages()
    {
       return [
           'coop.required' => 'El campo cooperativa es requerido',
           'ano.required' =>'El campo año es requerido ',
           'coop.not_in' => 'Seleccione la Cooperativa',
           'ano.not_in' =>'Seleccione el año ',
       ];
    }
}
