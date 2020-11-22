<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Ano;
use BasoCoop\Cant_Asociados;
use BasoCoop\Incorporaciones_Bajas;
use BasoCoop\Nivel_Esc_Asociados;
use BasoCoop\Nivel_Esc_Empleados;
use BasoCoop\estadocivilasoc;
use BasoCoop\compporedadesasoc;
use BasoCoop\tiempoafilasoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BasoCoop\categoriaocupasoc;
use BasoCoop\retiroasoc;
use BasoCoop\rotacionasoc;
use BasoCoop\solicafiliasoc;
use BasoCoop\CantEmpleado;
use BasoCoop\Http\Requests\CreateRequestFed;


class InfoMembController extends Controller
{
    public function indexFed(CreateRequestFed $request){

        $id_cooperativa=$request->input('coop');
        $id_ano=$request->input('ano');

        session(['id_coop_fed'=>$id_cooperativa]);
        session(['id_ano_fed'=>$id_ano]);
       // $this->index($id_ano);
        return redirect('/InfoMemb/'.$id_ano);



    }
    public function index($id)
    {
        if (Auth::check()) {

            $user = Auth::user();
            $id_cooperativa=$año=0;
            if($user->Rol->nomb_rol == 'Usuario Federativo'){

                $id_cooperativa = session('id_coop_fed');
                $id_ano=session('id_ano_fed');
                $año = Ano::find($id_ano);
               // dd($id_ano);




            }
            else
            {
                $id_cooperativa = $user->id_coop;


                $año = Ano::find($id);

            }




            $cantAsoc = Cant_Asociados::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $total = $cantAsoc->mujeres + $cantAsoc->hombres;

            $incBaj = Incorporaciones_Bajas::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            // $nivEscAsoc = Nivel_Esc_Asociados::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $nivEscEmp = Nivel_Esc_Empleados::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $est_civil = estadocivilasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $comp_edad_asoc = compporedadesasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $tiempo_afili = tiempoafilasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();

            $cat_ocup_asoc = categoriaocupasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '=', $id)->firstOrFail();


            $ret_asoc = retiroasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $rot_asoc = rotacionasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $soli_afili_asoc = solicafiliasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $emp = CantEmpleado::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();

            //Buscando annos anteriores por cada caract


            $cantAsoc_ant = Cant_Asociados::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();


            $incBaj_ant = Incorporaciones_Bajas::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            // $nivEscAsoc_ant = Nivel_Esc_Asociados::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano','desc')->first();
            $nivEscEmp_ant = Nivel_Esc_Empleados::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $est_civil_ant = estadocivilasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $comp_edad_asoc_ant = compporedadesasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $tiempo_afili_ant = tiempoafilasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

            $cat_ocup_asoc_ant = categoriaocupasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

//dd($cat_ocup_asoc_ant);

            $ret_asoc_ant = retiroasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $rot_asoc_ant = rotacionasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $soli_afili_asoc_ant = solicafiliasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $emp_ant = CantEmpleado::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();


            //'nivEscAsoc_ant' => $nivEscAsoc_ant
            // 'nivEscAsoc' => $nivEscAsoc,
            //dd($emp);

            return view('InfoMembresia', ['ano' => $año, 'total' => $total, 'cantAsoc' => $cantAsoc,
                'incBaj' => $incBaj, 'nivEscEmp' => $nivEscEmp, 'est_civil' => $est_civil, 'comp_edad_asoc' => $comp_edad_asoc,
                'tiempo_afili' => $tiempo_afili, 'cat_ocup_asoc' => $cat_ocup_asoc, 'ret_asoc' => $ret_asoc, 'rot_asoc' => $rot_asoc, 'soli_afili_asoc' => $soli_afili_asoc, 'emp' => $emp
                , 'cantAsoc_ant' => $cantAsoc_ant, 'incBaj_ant' => $incBaj_ant, 'nivEscEmp_ant' => $nivEscEmp_ant, 'est_civil_ant' => $est_civil_ant,
                'comp_edad_asoc_ant' => $comp_edad_asoc_ant, 'tiempo_afili_ant' => $tiempo_afili_ant, 'cat_ocup_asoc_ant' => $cat_ocup_asoc_ant, 'ret_asoc_ant' => $ret_asoc_ant, 'rot_asoc_ant' => $rot_asoc_ant,
                'soli_afili_asoc_ant' => $soli_afili_asoc_ant, 'emp_ant' => $emp_ant
            ]);



        }


    }
}