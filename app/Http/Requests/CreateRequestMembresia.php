<?php

namespace BasoCoop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestMembresia extends FormRequest
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



            'hombres'=>'required|numeric|integer|same:hom_act_inact',
            'mujeres'=>'required|numeric|integer|same:muj_act_inact',
            'hom_act'=>'required|numeric|integer',
            'hom_inact'=>'required|numeric|integer',
            'muj_act'=>'required|numeric|integer',
            'muj_inact'=>'required|numeric|integer',

            'soltero' =>'required|numeric|integer',
            'casado' =>'required|numeric|integer',
            'unionlibre'=>'required|numeric|integer',

            'edad_18_25'=>'required|numeric|integer',
            'edad_26_35'=>'required|numeric|integer',
            'edad_36_45'=>'required|numeric|integer',
            'edad_46_55'=>'required|numeric|integer',
            'edad_56_60'=>'required|numeric|integer',
            'edad_61_70'=>'required|numeric|integer',
            'mas70'=>'required|numeric|integer',


            'time_0_1'=>'required|numeric|integer',
            'timemas50'=>'required|numeric|integer',
            'time_1_2'=>'required|numeric|integer',
            'time_3_5'=>'required|numeric|integer',
            'time_5_10'=>'required|numeric|integer',
            'time_10_15'=>'required|numeric|integer',
            'time_15_20'=>'required|numeric|integer',
            'time_20_25'=>'required|numeric|integer',
            'time_25_30'=>'required|numeric|integer',
            'time_30_35'=>'required|numeric|integer',
            'time_35_40'=>'required|numeric|integer',
            'time_40_48'=>'required|numeric|integer',


            'incorporaciones'=>'required|numeric|integer',
            'bajas'=>'required|numeric|integer',
            'voluntarias'=>'required|numeric|integer',
            'expulsados'=>'required|numeric|integer',



            'ninguno'=>'required|numeric|integer',
            'basico1'=>'required|numeric|integer',
            'medio1'=>'required|numeric|integer',
            'universitario1'=>'required|numeric|integer',
            'postgrado1'=>'required|numeric|integer',

            //categoria ocupacional


            'empsectpub'=>'required|numeric|integer',
            'empsectpri'=>'required|numeric|integer',
            'comerc'=>'required|numeric|integer',
            'product'=>'required|numeric|integer',
            'estudiat'=>'required|numeric|integer',
            'jubilado'=>'required|numeric|integer',
            'profind'=>'required|numeric|integer',
            'otroscat'=>'required|numeric|integer',



            //rotaciones de asociados

            'ingreso'=>'required|numeric|integer',
            'hombres_ing'=>'required|numeric|integer',
            'mujeres_ing'=>'required|numeric|integer',
            'retiro'=>'required|numeric|integer',
            'hombres_ret'=>'required|numeric|integer',
            'mujeres_ret'=>'required|numeric|integer',


            //retiro asociados

            'retvoluntario'=>'required|numeric|integer',
            'fallecimiento'=>'required|numeric|integer',
            'sanciones'=>'required|numeric|integer',
            'otrosret'=>'required|numeric|integer',



            //solicitudes de afiliados

            'realizada'=>'required|numeric|integer',
            'aprobada'=>'required|numeric|integer',
            'rechazada'=>'required|numeric|integer',


            //Empleados
            'hom_emp'=>'required|integer',
            'muj_emp'=>'required|numeric|integer',


            'total_est_civil'=>'same:total_asoc',
            'total_comp_edad'=>'same:total_asoc1',
            'total_tiempo_afili'=>'same:total_asoc2',


        ];
    }
    public function messages()
    {
        return [

            'total_est_civil.same'=>'La cantidad de asociados de la cooperativa no se corresponde con la cantidad de asociados que presentan estado civil.',
            'total_comp_edad.same'=>'La cantidad de asociados de la cooperativa no se corresponde con la cantidad de asociados por composicion de edad.',
            'total_tiempo_afili.same'=>'El total de los asociados en la cooperativa no se corresponde con el total de asociados afiliados.',
            'hombres.same'=>'El total de hombres no concide con el total de hombres activos más el total de hombre inactivos.',
            'mujeres.same'=>'El total de muejeres no concide con el total de mujeres activos más el total de mujeres inactivos.',



            'hombres.required'=>'Campo Requerido',
            'mujeres.required'=>'Campo Requerido',
            'hom_act.required'=>'Campo Requerido',
            'hom_inact.required'=>'Campo Requerido',
            'muj_act.required'=>'Campo Requerido',
            'muj_inact.required'=>'Campo Requerido',

            'soltero.required' =>'Campo Requerido',
            'casado.required' =>'Campo Requerido',
            'unionlibre.required'=>'Campo Requerido',

            'edad_18_25.required'=>'Campo Requerido',
            'edad_26_35.required'=>'Campo Requerido',
            'edad_36_45.required'=>'Campo Requerido',
            'edad_46_55.required'=>'Campo Requerido',
            'edad_56_60.required'=>'Campo Requerido',
            'edad_61_70.required'=>'Campo Requerido',
            'mas70.required'=>'Campo Requerido',


            'time_0_1.required'=>'Campo Requerido',
            'timemas50.required'=>'Campo Requerido',
            'time_1_2.required'=>'Campo Requerido',
            'time_3_5.required'=>'Campo Requerido',
            'time_5_10.required'=>'Campo Requerido',
            'time_10_15.required'=>'Campo Requerido',
            'time_15_20.required'=>'Campo Requerido',
            'time_20_25.required'=>'Campo Requerido',
            'time_25_30.required'=>'Campo Requerido',
            'time_30_35.required'=>'Campo Requerido',
            'time_35_40.required'=>'Campo Requerido',
            'time_40_48.required'=>'Campo Requerido',


            'incorporaciones.required'=>'Campo Requerido',
            'bajas.required'=>'Campo Requerido',
            'voluntarias.required'=>'Campo Requerido',
            'expulsados.required'=>'Campo Requerido',



            'ninguno.required'=>'Campo Requerido',
            'basico1.required'=>'Campo Requerido',
            'medio1.required'=>'Campo Requerido',
            'universitario1.required'=>'Campo Requerido',
            'postgrado1.required'=>'Campo Requerido',

            //categoria ocupacional


            'empsectpub.required'=>'Campo Requerido',
            'empsectpri.required'=>'Campo Requerido',
            'comerc.required'=>'Campo Requerido',
            'product.required'=>'Campo Requerido',
            'estudiat.required'=>'Campo Requerido',
            'jubilado.required'=>'Campo Requerido',
            'profind.required'=>'Campo Requerido',
            'otroscat.required'=>'Campo Requerido',



            //rotaciones de asociados

            'ingreso.required'=>'Campo Requerido',
            'hombres_ing.required'=>'Campo Requerido',
            'mujeres_ing.required'=>'Campo Requerido',
            'retiro.required'=>'Campo Requerido',
            'hombres_ret.required'=>'Campo Requerido',
            'mujeres_ret.required'=>'Campo Requerido',


            //retiro asociados

            'retvoluntario.required'=>'Campo Requerido',
            'fallecimiento.required'=>'Campo Requerido',
            'sanciones.required'=>'Campo Requerido',
            'otrosret.required'=>'Campo Requerido',



            //solicitudes de afiliados

            'realizada.required'=>'Campo Requerido',
            'aprobada.required'=>'Campo Requerido',
            'rechazada.required'=>'Campo Requerido',


            //Empleados
            'hom_emp.required'=>'Campo Requerido',
            'muj_emp.required'=>'Campo Requerido',


            //nuemrico
            'hombres.numeric'=>'Se requiere campo numérico',
            'mujeres.numeric'=>'Se requiere campo numérico',
            'hom_act.numeric'=>'Se requiere campo numérico',
            'hom_inact.numeric'=>'Se requiere campo numérico',
            'muj_act.numeric'=>'Se requiere campo numérico',
            'muj_inact.numeric'=>'Se requiere campo numérico',

            'soltero.numeric' =>'Se requiere campo numérico',
            'casado.numeric' =>'Se requiere campo numérico',
            'unionlibre.numeric'=>'Se requiere campo numérico',

            'edad_18_25.numeric'=>'Se requiere campo numérico',
            'edad_26_35.numeric'=>'Se requiere campo numérico',
            'edad_36_45.numeric'=>'Se requiere campo numérico',
            'edad_46_55.numeric'=>'Se requiere campo numérico',
            'edad_56_60.numeric'=>'Se requiere campo numérico',
            'edad_61_70.numeric'=>'Se requiere campo numérico',
            'mas70.numeric'=>'Se requiere campo numérico',


            'time_0_1.numeric'=>'Se requiere campo numérico',
            'timemas50.numeric'=>'Se requiere campo numérico',
            'time_1_2.numeric'=>'Se requiere campo numérico',
            'time_3_5.numeric'=>'Se requiere campo numérico',
            'time_5_10.numeric'=>'Se requiere campo numérico',
            'time_10_15.numeric'=>'Se requiere campo numérico',
            'time_15_20.numeric'=>'Se requiere campo numérico',
            'time_20_25.numeric'=>'Se requiere campo numérico',
            'time_25_30.numeric'=>'Se requiere campo numérico',
            'time_30_35.numeric'=>'Se requiere campo numérico',
            'time_35_40.numeric'=>'Se requiere campo numérico',
            'time_40_48.numeric'=>'Se requiere campo numérico',


            'incorporaciones.numeric'=>'Se requiere campo numérico',
            'bajas.numeric'=>'Se requiere campo numérico',
            'voluntarias.numeric'=>'Se requiere campo numérico',
            'expulsados.numeric'=>'Se requiere campo numérico',



            'ninguno.numeric'=>'Se requiere campo numérico',
            'basico1.numeric'=>'Se requiere campo numérico',
            'medio1.numeric'=>'Se requiere campo numérico',
            'universitario1.numeric'=>'Se requiere campo numérico',
            'postgrado1.numeric'=>'Se requiere campo numérico',

            //categoria ocupacional


            'empsectpub.numeric'=>'Se requiere campo numérico',
            'empsectpri.numeric'=>'Se requiere campo numérico',
            'comerc.numeric'=>'Se requiere campo numérico',
            'product.numeric'=>'Se requiere campo numérico',
            'estudiat.numeric'=>'Se requiere campo numérico',
            'jubilado.numeric'=>'Se requiere campo numérico',
            'profind.numeric'=>'Se requiere campo numérico',
            'otroscat.numeric'=>'Se requiere campo numérico',



            //rotaciones de asociados

            'ingreso.numeric'=>'Se requiere campo numérico',
            'hombres_ing.numeric'=>'Se requiere campo numérico',
            'mujeres_ing.numeric'=>'Se requiere campo numérico',
            'retiro.numeric'=>'Se requiere campo numérico',
            'hombres_ret.numeric'=>'Se requiere campo numérico',
            'mujeres_ret.numeric'=>'Se requiere campo numérico',


            //retiro asociados

            'retvoluntario.numeric'=>'Se requiere campo numérico',
            'fallecimiento.numeric'=>'Se requiere campo numérico',
            'sanciones.numeric'=>'Se requiere campo numérico',
            'otrosret.numeric'=>'Se requiere campo numérico',



            //solicitudes de afiliados

            'realizada.numeric'=>'Se requiere campo numérico',
            'aprobada.numeric'=>'Se requiere campo numérico',
            'rechazada.numeric'=>'Se requiere campo numérico',


            //Empleados
            'hom_emp.numeric'=>'Se requiere campo numérico',
            'muj_emp.numeric'=>'Se requiere campo numérico',


            ///entero
            ///
            'hombres.integer'=>'Se requiere número entero',
            'mujeres.integer'=>'Se requiere número entero',
            'hom_act.integer'=>'Se requiere número entero',
            'hom_inact.integer'=>'Se requiere número entero',
            'muj_act.integer'=>'Se requiere número entero',
            'muj_inact.integer'=>'Se requiere número entero',

            'soltero' =>'Se requiere número entero',
            'casado' =>'Se requiere número entero',
            'unionlibre.integer'=>'Se requiere número entero',

            'edad_18_25.integer'=>'Se requiere número entero',
            'edad_26_35.integer'=>'Se requiere número entero',
            'edad_36_45.integer'=>'Se requiere número entero',
            'edad_46_55.integer'=>'Se requiere número entero',
            'edad_56_60.integer'=>'Se requiere número entero',
            'edad_61_70.integer'=>'Se requiere número entero',
            'mas70.integer'=>'Se requiere número entero',


            'time_0_1.integer'=>'Se requiere número entero',
            'timemas50.integer'=>'Se requiere número entero',
            'time_1_2.integer'=>'Se requiere número entero',
            'time_3_5.integer'=>'Se requiere número entero',
            'time_5_10.integer'=>'Se requiere número entero',
            'time_10_15.integer'=>'Se requiere número entero',
            'time_15_20.integer'=>'Se requiere número entero',
            'time_20_25.integer'=>'Se requiere número entero',
            'time_25_30.integer'=>'Se requiere número entero',
            'time_30_35.integer'=>'Se requiere número entero',
            'time_35_40.integer'=>'Se requiere número entero',
            'time_40_48.integer'=>'Se requiere número entero',


            'incorporaciones.integer'=>'Se requiere número entero',
            'bajas.integer'=>'Se requiere número entero',
            'voluntarias.integer'=>'Se requiere número entero',
            'expulsados.integer'=>'Se requiere número entero',



            'ninguno.integer'=>'Se requiere número entero',
            'basico1.integer'=>'Se requiere número entero',
            'medio1.integer'=>'Se requiere número entero',
            'universitario1.integer'=>'Se requiere número entero',
            'postgrado1.integer'=>'Se requiere número entero',

            //categoria ocupacional


            'empsectpub.integer'=>'Se requiere número entero',
            'empsectpri.integer'=>'Se requiere número entero',
            'comerc.integer'=>'Se requiere número entero',
            'product.integer'=>'Se requiere número entero',
            'estudiat.integer'=>'Se requiere número entero',
            'jubilado.integer'=>'Se requiere número entero',
            'profind.integer'=>'Se requiere número entero',
            'otroscat.integer'=>'Se requiere número entero',



            //rotaciones de asociados

            'ingreso.integer'=>'Se requiere número entero',
            'hombres_ing.integer'=>'Se requiere número entero',
            'mujeres_ing.integer'=>'Se requiere número entero',
            'retiro.integer'=>'Se requiere número entero',
            'hombres_ret.integer'=>'Se requiere número entero',
            'mujeres_ret.integer'=>'Se requiere número entero',


            //retiro asociados

            'retvoluntario.integer'=>'Se requiere número entero',
            'fallecimiento.integer'=>'Se requiere número entero',
            'sanciones.integer'=>'Se requiere número entero',
            'otrosret.integer'=>'Se requiere número entero',



            //solicitudes de afiliados

            'realizada.integer'=>'Se requiere número entero',
            'aprobada.integer'=>'Se requiere número entero',
            'rechazada.integer'=>'Se requiere número entero',


            //Empleados
            'hom_emp.integer'=>'Se requiere número entero',
            'muj_emp.integer'=>'Se requiere número entero',

        ];
    }
}
