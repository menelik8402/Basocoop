<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
                      'name' => 'required',
                      'ci'=>'required|unique:users|max:9',
                      'email'=>'required|email',
                      'login'=> 'required|unique:users',
                      'id_rol'=> 'required|not_in:0',
                      'password'=>'required|min:8|alpha_dash',
                       'password_confir'=>'required|min:8|alpha_dash|same:password',
                      'fecha_act_psw' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'Campo requerido',
            'ci.required'=> 'Número de Identificación requerida',
            'ci.unique'=>'Número de identificación repetido',
            'ci.max'=>'DUI no puede exceder los 9 caracteres',
            'email.required'=>'Campo requerido',
            'email.email'=>'Formato incorrecto',
            'login.required'=>'Campo requerido',
            'login.unique'=>'Este login ya pertenece a otra persona',
            'id_rol.not_in'=> 'Seleccione el rol válido',
            'password.required'=>'Campo Requerido',
            'password_confir.required'=>'Campo Requerido',
            'password.min'=>'Longitud mínima es 8 caracteres',
            'password_confir.min'=>'Longitud mínima es 8 caracteres',
            'password.alpha_dash'=>'Este campo solo puede contener letras, números, guiones y guiones bajos',
            'password_confir.alpha_dash'=>'Este campo solo puede contener letras, números, guiones y guiones bajos',
            'fecha_act_psw.required'=>'Fecha Requerida'



        ];
    }
}
