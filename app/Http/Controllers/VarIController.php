<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Ano;
use BasoCoop\Cant_Asociados;
use BasoCoop\Incorporaciones_Bajas;
use BasoCoop\Nivel_Esc_Asociados;
use BasoCoop\Nivel_Esc_Empleados;
use Illuminate\Http\Request;
use BasoCoop\estadocivilasoc;
use BasoCoop\compporedadesasoc;
use BasoCoop\tiempoafilasoc;
use BasoCoop\Premisas;
use Illuminate\Support\Facades\Auth;
use BasoCoop\categoriaocupasoc;
use BasoCoop\retiroasoc;
use BasoCoop\rotacionasoc;
use BasoCoop\solicafiliasoc;
use BasoCoop\CantEmpleado;
use BasoCoop\Http\Requests\CreateRequestMembresia;

class VarIController extends Controller
{


    public function index()
    {
        //enviar los annos que tienen membresia
        $user=Auth::user();
        $privilegios=session('AD'.$user->id);
        $premisas=Premisas::where('id_cooperativa','=',$user->id_coop)->get();
        $año = collect();
        foreach ($premisas as $premisa)
        {
            $año->push($premisa->GetAno);
        }
        $cant_asoc=Cant_Asociados::where('id_cooperativa','=',$user->id_coop)->get();
        $asoc=array();
        foreach ($cant_asoc as $key => $cant)
        {
            $asoc[$key]=$cant->id_ano;
        }


        return view('Membresia', ['ano' => $año,'cant_asoc'=>$asoc,'privilegios' => $privilegios]);
    }
    public function ActMemb($id_asoc,$id_ib,$id_nee,$id_eca,$id_cea,$id_taa,$id_rasoc , $id_sol , $id_rot, $id_catopa,$id_emp,CreateRequestMembresia $request){
        $user=Auth::user();
       // dd($user);
        $cant_asoc=Cant_Asociados::find($id_asoc);
        $inc_baj=Incorporaciones_Bajas::find($id_ib);
       // $niv_esc_asoc=Nivel_Esc_Asociados::find($id_nea);
        $niv_esc_emp=Nivel_Esc_Empleados::find($id_nee);
        $est_civ_asoc=estadocivilasoc::find($id_eca);
        $comp_por_edad_asoc=compporedadesasoc::find($id_cea);
        $tiempo_afili=tiempoafilasoc::find($id_taa);
        $cat_ocup_asoc=categoriaocupasoc::find($id_catopa);
        $rot_asoc=rotacionasoc::find($id_rot);
        $ret_asoc=retiroasoc::find($id_rasoc);
        $soli_afili_asoc=solicafiliasoc::find($id_sol);
        $emp=CantEmpleado::find($id_emp);



        $hombres = request()->input('hombres');
        $mujeres = request()->input('mujeres');
        $hom_act = request()->input('hom_act');
        $muj_act = request()->input('muj_act');
        $hom_inact = request()->input('hom_inact');
        $muj_inact = request()->input('muj_inact');

        //estado civil de los asociados
        $soltero = request()->input('soltero');
        $casado = request()->input('casado');
        $unionlibre = request()->input('unionlibre');

        //composicion por edad de los asociados
        $edad_18_25 = request()->input('edad_18_25');
        $edad_26_35 = request()->input('edad_26_35');
        $edad_36_45 = request()->input('edad_36_45');
        $edad_46_55 = request()->input('edad_46_55');
        $edad_56_60 = request()->input('edad_56_60');
        $edad_61_70 = request()->input('edad_61_70');
        $mas70 = request()->input('mas70');

        //tiempo de afiliacion
        $time_0_1=request()->input('time_0_1');
        $time_1_2=request()->input('time_1_2');
        $time_2_3=request()->input('time_2_3');
        $time_3_5=request()->input('time_3_5');
        $time_5_10=request()->input('time_5_10');
        $time_10_15=request()->input('time_10_15');
        $time_15_20=request()->input('time_15_20');
        $time_20_25=request()->input('time_20_25');
        $time_25_30=request()->input('time_25_30');
        $time_30_35=request()->input('time_30_35');
        $time_35_40=request()->input('time_35_40');
        $time_40_48=request()->input('time_40_48');



        $incorporaciones = request()->input('incorporaciones');
        $bajas = request()->input('bajas');
        $voluntarias = request()->input('voluntarias');
        $expulsados = request()->input('expulsados');


      /*  $primario = request()->input('primario');
        $secundario = request()->input('secundario');
        $tecnico = request()->input('tecnico');
        $universitario = request()->input('universitario');
        $postgrado      = request()->input('postgrado');
        $maestria = request()->input('maestria');*/


        $ninguno = request()->input('ninguno');
        $basico1 = request()->input('basico1');
        $medio1 = request()->input('medio1');
        $universitario1 = request()->input('universitario1');
        $postgrado1 = request()->input('postgrado1');


        ///categoria ocupacional
        ///
        $empsectpub=request()->input('empsectpub');
        $empsectpri=request()->input('empsectpri');
        $comerc=request()->input('comerc');
        $product=request()->input('product');
        $estudiat=request()->input('estudiat');
        $jubilado=request()->input('jubilado');
        $profind=request()->input('profind');
        $otroscat=request()->input('otroscat');

        //rotaciones de asociados
        $ingreso=request()->input('ingreso');
        $hombres_ing=request()->input('hombres_ing');
        $mujeres_ing=request()->input('mujeres_ing');
        $retiro=request()->input('retiro');
        $hombres_ret=request()->input('hombres_ret');
        $mujeres_ret=request()->input('mujeres_ret');


        //retiros de asociados
        $retvoluntario=request()->input('retvoluntario');
        $fallecimiento=request()->input('fallecimiento');
        $sanciones=request()->input('sanciones');
        $otrosret=request()->input('otrosret');

        //retiro de solicitudes de afiliados

        $realizada=request()->input('realizada');
        $aprobada=request()->input('aprobada');
        $rechazada=request()->input('rechazada');

        //empleados
        $hom_emp = request()->input('hom_emp');
        $muj_emp = request()->input('muj_emp');






        $cant_asoc->hombres = $hombres;
        $cant_asoc->mujeres = $mujeres;
        $cant_asoc->hom_inact = $hom_inact;
        $cant_asoc->hom_act = $hom_act;
        $cant_asoc->muj_act = $muj_act;
        $cant_asoc->muj_inact = $muj_inact;


        $cant_asoc->save();

      //  $est_civ_asoc=new estadocivilasoc();

        $est_civ_asoc->soltero=$soltero;
        $est_civ_asoc->casado=$casado;
        $est_civ_asoc->unionlibre=$unionlibre;


        $est_civ_asoc->save();



        //composicion por edades
       // $comp_por_edad_asoc = new compporedadesasoc();

        $comp_por_edad_asoc->edad_18_25 = $edad_18_25;
        $comp_por_edad_asoc->edad_26_35 = $edad_26_35;
        $comp_por_edad_asoc->edad_36_45 = $edad_36_45;
        $comp_por_edad_asoc->edad_46_55 = $edad_46_55;
        $comp_por_edad_asoc->edad_56_60 = $edad_56_60;
        $comp_por_edad_asoc->edad_61_70 = $edad_61_70;
        $comp_por_edad_asoc->mas70 = $mas70;






        $comp_por_edad_asoc->save();

        //tiempo de afiliacion
       // $tiempo_afili = new tiempoafilasoc();

        $tiempo_afili->time_0_1 = $time_0_1;
        $tiempo_afili->time_1_2 = $time_1_2;
       // $tiempo_afili->time_2_3 = $time_2_3;
        $tiempo_afili->time_3_5 = $time_3_5;
        $tiempo_afili->time_5_10 = $time_5_10;
        $tiempo_afili->time_10_15 = $time_10_15;
        $tiempo_afili->time_15_20 = $time_15_20;
        $tiempo_afili->time_20_25 = $time_20_25;
        $tiempo_afili->time_25_30 = $time_25_30;
        $tiempo_afili->time_30_35 = $time_30_35;
        $tiempo_afili->time_35_40 = $time_35_40;
        $tiempo_afili->time_40_48 = $time_40_48;
        //$tiempo_afili->id_ano=$;

        $tiempo_afili->save();



        $inc_baj->incorporaciones = $incorporaciones;
        $inc_baj->bajas = $bajas;
        $inc_baj->voluntarias = $voluntarias;
        $inc_baj->expulsados = $expulsados;

        $inc_baj->save();



       /* $niv_esc_asoc->primario = $primario;
        $niv_esc_asoc->secundario = $secundario;
        $niv_esc_asoc->tecnico = $tecnico;
        $niv_esc_asoc->universitario = $universitario;
        $niv_esc_asoc->postgrado = $postgrado;
        $niv_esc_asoc->maestria = $maestria;


        $niv_esc_asoc->save();*/


        $niv_esc_emp->ninguno = $ninguno;
        $niv_esc_emp->basico = $basico1;
        $niv_esc_emp->medio = $medio1;
        $niv_esc_emp->universitario = $universitario1;
        $niv_esc_emp->postgrado=$postgrado1;
        $niv_esc_emp->save();



        //categoria ocupacional
        $cat_ocup_asoc->empsectpub=$empsectpub;
        $cat_ocup_asoc->empsectpri=$empsectpri;
        $cat_ocup_asoc->comerc=$comerc;
        $cat_ocup_asoc->product=$product;
        $cat_ocup_asoc->estudiat=$estudiat;
        $cat_ocup_asoc->jubilado=$jubilado;
        $cat_ocup_asoc->profind=$profind;
        $cat_ocup_asoc->otroscat=$otroscat;
       // $cat_ocup_asoc->id_ano = $idAnno;
        //$cat_ocup_asoc->id_cooperativa=$user->id_coop;
        $cat_ocup_asoc->save();


        //rotaciones de asociados
        $rot_asoc->ingreso=$ingreso;
        $rot_asoc->hombres_ing=$hombres_ing;
        $rot_asoc->mujeres_ing=$mujeres_ing;
        $rot_asoc->retiro=$retiro;
        $rot_asoc->hombres_ret=$hombres_ret;
        $rot_asoc->mujeres_ret=$mujeres_ret;
       // $rot_asoc->id_ano=$idAnno;
       // $rot_asoc->id_cooperativa=$user->id_coop;
        $rot_asoc->save();


        //retiro asociados
        $ret_asoc->retvoluntario=$retvoluntario;
        $ret_asoc->fallecimiento=$fallecimiento;
        $ret_asoc->sanciones=$sanciones;
        $ret_asoc->otrosret=$otrosret;
       // $ret_asoc->id_ano=$idAnno;
      //  $ret_asoc->id_cooperativa=$user->id_coop;
        $ret_asoc->save();


        //solicitudes de afiliados

        $soli_afili_asoc->realizada=$realizada;
        $soli_afili_asoc->aprobada=$aprobada;
        $soli_afili_asoc->rechazada=$rechazada;
       // $soli_afili_asoc->id_ano=$idAnno;
       // $soli_afili_asoc->id_cooperativa=$user->id_coop;
        $soli_afili_asoc->save();


        //Empleados
        $emp->hom_emp=$hom_emp;
        $emp->muj_emp=$muj_emp;
        $emp->save();



    }


    public function AddMemb(CreateRequestMembresia $request)
    {

        $hombres = request()->input('hombres');
        $mujeres = request()->input('mujeres');
        $hom_act = request()->input('hom_act');
        $muj_act = request()->input('muj_act');
        $hom_inact = request()->input('hom_inact');
        $muj_inact = request()->input('muj_inact');
        $idAnno = request()->input('id_ano');

        //estado civil de los asociados
        $soltero = request()->input('soltero');
        $casado = request()->input('casado');
        $unionlibre = request()->input('unionlibre');

        //composicion por edad de los asociados
        $edad_18_25 = request()->input('edad_18_25');
        $edad_26_35 = request()->input('edad_26_35');
        $edad_36_45 = request()->input('edad_36_45');
        $edad_46_55 = request()->input('edad_46_55');
        $edad_56_60 = request()->input('edad_56_60');
        $edad_61_70 = request()->input('edad_61_70');
        $mas70 = request()->input('mas70');

        //tiempo de afiliacion
        $time_0_1=request()->input('time_0_1');
        $time_1_2=request()->input('time_1_2');
        $time_3_5=request()->input('time_3_5');
        $time_5_10=request()->input('time_5_10');
        $time_10_15=request()->input('time_10_15');
        $time_15_20=request()->input('time_15_20');
        $time_20_25=request()->input('time_20_25');
        $time_25_30=request()->input('time_25_30');
        $time_30_35=request()->input('time_30_35');
        $time_35_40=request()->input('time_35_40');
        $time_40_48=request()->input('time_40_48');
        $timemas50=request()->input('timemas50');



        $incorporaciones = request()->input('incorporaciones');
        $bajas = request()->input('bajas');
        $voluntarias = request()->input('voluntarias');
        $expulsados = request()->input('expulsados');


       /* $primario = request()->input('primario');
        $secundario = request()->input('secundario');
        $tecnico = request()->input('tecnico');
        $universitario = request()->input('universitario');
        $postgrado      = request()->input('postgrado');
        $maestria = request()->input('maestria');*/

        $ninguno = request()->input('ninguno');
        $basico1 = request()->input('basico1');
        $medio1 = request()->input('medio1');
        $universitario1 = request()->input('universitario1');
        $postgrado1 = request()->input('postgrado1');

        ///categoria ocupacional
        ///
        $empsectpub=request()->input('empsectpub');
        $empsectpri=request()->input('empsectpri');
        $comerc=request()->input('comerc');
        $product=request()->input('product');
        $estudiat=request()->input('estudiat');
        $jubilado=request()->input('jubilado');
        $profind=request()->input('profind');
        $otroscat=request()->input('otroscat');

        //rotaciones de asociados
        $ingreso=request()->input('ingreso');
        $hombres_ing=request()->input('hombres_ing');
        $mujeres_ing=request()->input('mujeres_ing');
        $retiro=request()->input('retiro');
        $hombres_ret=request()->input('hombres_ret');
        $mujeres_ret=request()->input('mujeres_ret');


        //retiros de asociados
        $retvoluntario=request()->input('retvoluntario');
        $fallecimiento=request()->input('fallecimiento');
        $sanciones=request()->input('sanciones');
        $otrosret=request()->input('otrosret');

        //retiro de solicitudes de afiliados

        $realizada=request()->input('realizada');
        $aprobada=request()->input('aprobada');
        $rechazada=request()->input('rechazada');

        //empleados
        $hom_emp=request()->input('hom_emp');
        $muj_emp=request()->input('muj_emp');

        $user=Auth::user();



        $ca = new Cant_Asociados();

        $ca->hombres = $hombres;
        $ca->mujeres = $mujeres;
        $ca->hom_inact = $hom_inact;
        $ca->hom_act = $hom_act;
        $ca->muj_act = $muj_act;
        $ca->muj_inact = $muj_inact;
        $ca->id_ano = $idAnno;
        $ca->id_cooperativa=$user->id_coop;
        $ca->save();


        $est_civ_asoc=new estadocivilasoc();

        $est_civ_asoc->soltero=$soltero;
        $est_civ_asoc->casado=$casado;
        $est_civ_asoc->unionlibre=$unionlibre;
        $est_civ_asoc->id_ano=$idAnno;
        $est_civ_asoc->id_cooperativa=$user->id_coop;
        $est_civ_asoc->save();


        //composicion por edades
        $comp_por_edad_asoc = new compporedadesasoc();

        $comp_por_edad_asoc->edad_18_25 = $edad_18_25;
        $comp_por_edad_asoc->edad_26_35 = $edad_26_35;
        $comp_por_edad_asoc->edad_36_45 = $edad_36_45;
        $comp_por_edad_asoc->edad_46_55 = $edad_46_55;
        $comp_por_edad_asoc->edad_56_60 = $edad_56_60;
        $comp_por_edad_asoc->edad_61_70 = $edad_61_70;
        $comp_por_edad_asoc->mas70 = $mas70;
        $comp_por_edad_asoc->id_ano=$idAnno;
        $comp_por_edad_asoc->id_cooperativa=$user->id_coop;
        $comp_por_edad_asoc->save();

        //tiempo de afiliacion
        $tiempo_afili = new tiempoafilasoc();

        $tiempo_afili->time_0_1 = $time_0_1;
        $tiempo_afili->time_1_2 = $time_1_2;
        //$tiempo_afili->time_2_3 = $time_2_3;
        $tiempo_afili->time_3_5 = $time_3_5;
        $tiempo_afili->time_5_10 = $time_5_10;
        $tiempo_afili->time_10_15 = $time_10_15;
        $tiempo_afili->time_15_20 = $time_15_20;
        $tiempo_afili->time_20_25 = $time_20_25;
        $tiempo_afili->time_25_30 = $time_25_30;
        $tiempo_afili->time_30_35 = $time_30_35;
        $tiempo_afili->time_35_40 = $time_35_40;
        $tiempo_afili->time_40_48 = $time_40_48;
        $tiempo_afili->timemas50 = $timemas50;
        $tiempo_afili->id_ano=$idAnno;
        $tiempo_afili->id_cooperativa=$user->id_coop;
        $tiempo_afili->save();



        $ib = new Incorporaciones_Bajas();

        $ib->incorporaciones = $incorporaciones;
        $ib->bajas = $bajas;
        $ib->voluntarias = $voluntarias;
        $ib->expulsados = $expulsados;
        $ib->id_ano = $idAnno;
        $ib->id_cooperativa=$user->id_coop;

        $ib->save();

        /* $nea = new Nivel_Esc_Asociados();


      /* $nea->primario = $primario;
         $nea->secundario = $secundario;
         $nea->tecnico = $tecnico;
         $nea->universitario = $universitario;
         $nea->postgrado = $postgrado;
         $nea->maestria = $maestria;
         $nea->id_ano = $idAnno;
         $nea->id_cooperativa=$user->id_coop;
         $nea->save();*/

        $nee = new Nivel_Esc_Empleados();


        $nee->ninguno = $ninguno;
        $nee->basico = $basico1;
        $nee->medio = $medio1;
        $nee->universitario = $universitario1;
        $nee->postgrado=$postgrado1;
        $nee->id_ano = $idAnno;
        $nee->id_cooperativa=$user->id_coop;
        $nee->save();

        //categoria ocupacional
        $cat_ocup_asoc=new categoriaocupasoc();

        $cat_ocup_asoc->empsectpub=$empsectpub;
        $cat_ocup_asoc->empsectpri=$empsectpri;
        $cat_ocup_asoc->comerc=$comerc;
        $cat_ocup_asoc->product=$product;
        $cat_ocup_asoc->estudiat=$estudiat;
        $cat_ocup_asoc->jubilado=$jubilado;
        $cat_ocup_asoc->profind=$profind;
        $cat_ocup_asoc->otroscat=$otroscat;
        $cat_ocup_asoc->id_ano = $idAnno;
        $cat_ocup_asoc->id_cooperativa=$user->id_coop;
        $cat_ocup_asoc->save();


        //rotaciones de asociados
        $rot_asoc=new rotacionasoc();
        $rot_asoc->ingreso=$ingreso;
        $rot_asoc->hombres_ing=$hombres_ing;
        $rot_asoc->mujeres_ing=$mujeres_ing;
        $rot_asoc->retiro=$retiro;
        $rot_asoc->hombres_ret=$hombres_ret;
        $rot_asoc->mujeres_ret=$mujeres_ret;
        $rot_asoc->id_ano=$idAnno;
        $rot_asoc->id_cooperativa=$user->id_coop;
        $rot_asoc->save();

        //retiro asociados
        $ret_asoc=new retiroasoc();
        $ret_asoc->retvoluntario=$retvoluntario;
        $ret_asoc->fallecimiento=$fallecimiento;
        $ret_asoc->sanciones=$sanciones;
        $ret_asoc->otrosret=$otrosret;
        $ret_asoc->id_ano=$idAnno;
        $ret_asoc->id_cooperativa=$user->id_coop;
        $ret_asoc->save();


        //solicitudes de afiliados
        $soli_afili_asoc=new solicafiliasoc();
        $soli_afili_asoc->realizada=$realizada;
        $soli_afili_asoc->aprobada=$aprobada;
        $soli_afili_asoc->rechazada=$rechazada;
        $soli_afili_asoc->id_ano=$idAnno;
        $soli_afili_asoc->id_cooperativa=$user->id_coop;
        $soli_afili_asoc->save();


        //Empleados
        $emp=new CantEmpleado();
        $emp->hom_emp=$hom_emp;
        $emp->muj_emp=$muj_emp;
        $emp->id_ano=$idAnno;
        $emp->id_cooperativa=$user->id_coop;
        $emp->save();



        return response()->json(['ca' => $ca, 'ib' => $ib, 'nee'=>$nee ,'sol' =>$soli_afili_asoc,'ret'=>$ret_asoc,'rot'=>$rot_asoc,'catop'=>$cat_ocup_asoc,'emp'=>$emp]);

    }
    //este metodo esta concebido para una sola cooperativa
    public function ModMemb($id_ano)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id_cooperativa=$user->id_coop;
            $cant_asoc = Cant_Asociados::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();//datos de la tabla cantidad de asociados
            $incop_baj = Incorporaciones_Bajas::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
         //   $niv_esc_asco = Nivel_Esc_Asociados::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $niv_esc_emp = Nivel_Esc_Empleados::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $est_civil_asoc = estadocivilasoc::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $comp_edad_asoc = compporedadesasoc::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $tiemp_afi_asoc = tiempoafilasoc::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $cat_ocup_asoc=categoriaocupasoc::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $ret_asoc=retiroasoc::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $rot_asoc=rotacionasoc::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $soli_afili_asoc=solicafiliasoc::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $emp=CantEmpleado::where('id_ano', '=', $id_ano)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();

           // dd($comp_edad_asoc);

            //dd(response()->json(['ca' => $cant_asoc, 'ib' => $incop_baj, 'nea' => $niv_esc_asco, 'nee'=>$niv_esc_emp]));'nea' => $niv_esc_asco,
            return response()->json(['ca' => $cant_asoc, 'ib' => $incop_baj,  'nee' => $niv_esc_emp,
                'eca' => $est_civil_asoc, 'cea' => $comp_edad_asoc, 'taa' => $tiemp_afi_asoc,'catopa'=>$cat_ocup_asoc,'rasoc'=>$ret_asoc,'rot'=>$rot_asoc,
                'sol'=>$soli_afili_asoc,'emp'=>$emp]);

        }
    }
}
