<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequestEdit extends FormRequest
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
            'name1' => 'required',
            'ci'=>'required|max:9|unique:users,ci,'.request()->get("id1"),
            'email1'=>'required|email',
            'login'=> 'required|unique:users,login,'.request()->get("id1"),
            'id_rol1'=> 'required|not_in:0',
            'password1'=>'required|min:8|alpha_dash',
            'password_confir1'=>'required|min:8|alpha_dash|same:password1',
            'fecha_act_psw1' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name1.required'=> 'Campo requerido',
            'ci.required'=> 'Número de Identificación requerida',
            'ci.max'=>'DUI no puede exceder los 9 caracteres',
            'ci.unique'=>'Número de identificación repetido',
            'email1.required'=>'Campo requerido',
            'email1.email'=>'Formato incorrecto',
            'login.required'=>'Campo requerido',
            'login.unique'=>'Este login ya pertenece a otra persona',
            'id_rol1.not_in'=> 'Seleccione el rol válido',
            'password1.required'=>'Campo Requerido',
            'password_confir1.required'=>'Campo Requerido',
            'password1.min'=>'Longitud mínima es 8 caracteres',
            'password_confir1.min'=>'Longitud mínima es 8 caracteres',
            'password1.alpha_dash'=>'Este campo solo puede contener letras, números, guiones y guiones bajos',
            'password_confir1.alpha_dash'=>'Este campo solo puede contener letras, números, guiones y guiones bajos',
            'password_confir1.same'=>'La contraseña y la contraseña confirmada no coinciden',
            'fecha_act_psw1.required'=>'Fecha Requerida'



        ];
    }
}
