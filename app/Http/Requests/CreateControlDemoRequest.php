<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateControlDemoRequest extends FormRequest
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
                        'convocadas'=>'required|integer',
                        'efectuadas'=>'required|integer',
                        'delegados'=>'required|integer',
                        //Participacion socio
                        'soc_conv'=>'required|integer',
                        'soc_asist'=>'required|integer',

                        //estado de cumplimiento
                        'cumplido'=>'required|integer',
                        'proc_cump'=>'required|integer',

          /**
           *     commentaios
           *
           *
           */
                        'hombres'=>'required|integer',
                        'mujeres'=>'required|integer',

        ];
    }
    public function messages()
    {
        return [

                        'convocadas.required'=>'Campo requerido',
                        'efectuadas.required'=>'Campo requerido',
                        'delegados.required'=>'Campo requerido',
                        //Participacion socio
                        'soc_conv.required'=>'Campo requerido',
                        'soc_asist.required'=>'Campo requerido',
                        //estado de cumplimiento
                        'cumplido.required'=>'Campo requerido',
                        'proc_cump.required'=>'Campo requerido',

                        //equidad
                        'hombres.required'=>'Campo requerido',
                        'mujeres.required'=>'Campo requerido',


                        'convocadas.integer'=>'Se requiere número entero',
                        'efectuadas.integer'=>'Se requiere número entero',
                        'delegados.integer'=>'Se requiere número entero',
                        //Participacion socio
                        'soc_conv.integer'=>'Se requiere número entero',
                        'soc_asist.integer'=>'Se requiere número entero',
                        //estado de cumplimiento
                        'cumplido.integer'=>'Se requiere número entero',
                        'proc_cump.integer'=>'Se requiere número entero',

                        //equidad
                        'hombres.integer'=>'Se requiere número entero',
                        'mujeres.integer'=>'Se requiere número entero',

        ];
    }

}
