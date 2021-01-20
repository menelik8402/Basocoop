<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Ano;
use BasoCoop\Cond_material_coop;
use BasoCoop\Premisas;
use BasoCoop\Programa;
use Illuminate\Http\Request;
use BasoCoop\Cooperativa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection as Colletion;
use BasoCoop\Http\Requests\CreateConMatRequest;
use Illuminate\Support\Facades\DB;

class CoopController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            $cond_legal_ant=" ";
            $cond_educ_ant=" ";
            $ano_actual=date('Y');

            $user = Auth::user();
            //$privilegios=session('CM'.$user->id);
            $ano=collect();
            $ano_simple=collect();
            if ($user->Rol->nomb_rol == 'Gestor Social' || $user->Rol->nomb_rol == 'Usuario' ) {
                $id_coop = $user->id_coop;

                $coop = Cooperativa::find($id_coop);

                $cond_mat = Cond_material_coop::all();

                $id_ult_pre = Premisas::where('id_cooperativa','=',$id_coop)->get()->max('id');

                if($id_ult_pre!=null) {
                    $ult_premisa = Premisas::find($id_ult_pre);
                }
                else {
                    $ult_premisa = new Premisas();
                }
                $desabilitar_new=false;
                if($id_ult_pre!=null && $ult_premisa->GetAno->ano == $ano_actual)
                {
                    $desabilitar_new=true;

                }
              /*  dd($ult_premisa->GetAno);*/

                $premisas = Premisas::where('id_cooperativa','=',$id_coop)->get();///se le agregaria la cooperativa en dependencia de los roles de usuarios

                foreach ($premisas as $pre)
                {
                    $ano->push($pre->GetAno);///estoy mandando los annos de una cooperativa determinada
                    $ano_simple->push($pre->GetAno->ano);

                }


                return view('coop', ['nombre' => $coop->nombre, 'cm' => $cond_mat, 'ano' => $ano,'ano_simple'=>$ano_simple,'ult_premisa'=>$ult_premisa ,'pre' => $premisas,'desabilitar_new'=>$desabilitar_new]);
            }
        }
    }

    public function addCondMat(CreateConMatRequest $request){
        //Iniciando una  trasaccion
        DB::beginTransaction();
        try {
            $ano = Ano::create(['ano' => request()->input('ano')]);

            $pre = new Premisas();
            $legal = request()->input('legal');
            $educativa = request()->input('educ');
            $id_ano = $ano->id;
            $id_cooperativa = Auth::user()->id_coop;////aqui tieene que venir el id de cooperativa
            $pre->cond_legal = $legal;
            $pre->cond_educativa = $educativa;
            $pre->id_ano = $id_ano;
            $pre->id_cooperativa = $id_cooperativa;

            $pre->save();


            $cm = new Cond_material_coop();
            $utilidades = request()->input('utilidades');
            $presupuesto_coop = request()->input('presupuesto_coop');
            $fondo_educacion = request()->input('fondo_educacion');
            $mercadeo = request()->input('mercadeo');
            $cmte_genero = request()->input('cmte_genero');
            $otros_ingresos = request()->input('otrosI');


            $cm->utilidades = round($utilidades,2);
            $cm->presupuesto_coop = round($presupuesto_coop,2);
            $cm->fondo_educacion = round($fondo_educacion,2);
            $cm->mercadeo = round($mercadeo,2);
            $cm->cmte_genero = round($cmte_genero,2);
            $cm->otros_ingresos = round($otros_ingresos,2);
            $cm->id_premisas = $pre->id;
            $cm->save();
            DB::commit();
        }catch (\Exception $e){
            DB::rollback();
            throw $e;
        }



        return response()->json(['ano' => $ano,'cm'=>$cm,'pre'=>$pre]);
    }

    public function buscarCondMat($id)
    {
        //dd($id);
        //este id es el id del año pero tenemos que mejorar la busqueda paa que sea mas precisa
        $aut_editar=true;
        $pre=new Premisas();
        $ano=new Ano();
        $cm=new Cond_material_coop();
        $sum_prog=0;
        if(Auth::check()) {
            $user = Auth::user();
            $id_coop=0;


            if ($user->Rol->nomb_rol == 'Gestor Social'||$user->Rol->nomb_rol == 'Usuario') {
                $id_coop = $user->id_coop;

                try {
                    $pre = Premisas::where('id_cooperativa', '=', $id_coop)->where('id_ano', '=', $id)->get();
                }catch (\Exception $exception){
                    throw $exception;
                }

                $ano=Ano::find($id);

                $cm=Cond_material_coop::where('id_premisas','=',$pre[0]->id)->get();
            }


        }

        try {

            $sum_prog = Programa::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_coop)->sum('presupuesto_prog'); //sumatoria del presupuesto de los  programas para un ano
        }catch (\Exception $e){
            throw $e;
        }


        return response()->json(['ano' => $ano[0],'cm'=>$cm[0],'pre'=>$pre[0],'sum_prog'=>$sum_prog]);

    }

    public function editCondMat($id,CreateConMatRequest $request){

      DB::beginTransaction();
      try {
          $ano = Ano::find($id);
          $ano->ano = $request->input('ano');
          $ano->save();

          $pre = Premisas::find($id);
          $legal = $request->input('legal');
          $educativa = $request->input('educ');
          $id_ano = $ano->id;
          $id_cooperativa = Auth::user()->id_coop;
          $pre->cond_legal = $legal;
          $pre->cond_educativa = $educativa;
          $pre->id_ano = $id_ano;
          $pre->id_cooperativa = $id_cooperativa;
          $pre->save();


          $cm = Cond_material_coop::find($id);

          $utilidades = $request->input('utilidades');
          $presupuesto_coop = $request->input('presupuesto_coop');
          $fondo_educacion = $request->input('fondo_educacion');
          $mercadeo = $request->input('mercadeo');
          $cmte_genero = $request->input('cmte_genero');
          $otros_ingresos = $request->input('otrosI');


          $cm->utilidades = $utilidades;
          $cm->presupuesto_coop = $presupuesto_coop;
          $cm->fondo_educacion = $fondo_educacion;
          $cm->mercadeo = $mercadeo;
          $cm->cmte_genero = $cmte_genero;
          $cm->otros_ingresos = $otros_ingresos;
          $cm->id_premisas = $pre->id;
          $cm->save();

          DB::commit();
      }catch (\Exception $exception){
          DB::rollback();
          throw $exception;
      }


        return response()->json(['ano' => $ano,'cm'=>$cm,'pre'=>$pre]);
    }

    public function deleteCondMat(){
        $id=request()->input('id');
        if(Auth::check()) {
            $user = Auth::user();
            try {
                if ($user->Rol->nomb_rol == 'Gestor Social') {
                    $id_coop = $user->id_coop;
                    $pre = Premisas::where('id_cooperativa', '=', $id_coop)->where('id_ano', '=', $id)->first();

                    Premisas::find($pre->id)->delete();
                    Cond_material_coop::where('id_premisas', '=', $pre->id)->delete();
                    Ano::find($id)->delete();
                }
            }catch (\Exception $exception){
                throw $exception;
            }
        }

        return response()->json(['id' => $id]);

    }


    //funcion para buscar el presupuesto que quda al momento d adicionar un programa
    public function presup_Disp($idano,$idcoop){
            try {
                //primero bsuco en la tabla premisa en anno en cuestiob y obtengo el id de la premisa que esta en la tabla condioion material

                $pre = Premisas::where('id_cooperativa', '=', $idcoop)->where('id_ano', '=', $idano)->get();//tengo la premisa por ano y cooperativa
                //ahora busco los datos en la tabla condicion material que es donde esta el presupuesto

                $cm = Cond_material_coop::where('id_premisas', '=', $pre[0]->id)->get();

                //tengo aqui el total del presupuesto
                //$utilid=$cm[0]->utilidades*$cm[0]->presupuesto_coop/100 ;// este es el porcientoa utiliza de la cooperativa
                $presup_total = $cm[0]->fondo_educacion + $cm[0]->mercadeo + $cm[0]->cmte_genero + $cm[0]->otros_ingresos;
                //vrifico y actualizo si es necesario el presupuesto para el nuevo programa
                $programas = Programa::where('id_cooperativa', '=', $idcoop)->where('id_ano', '=', $idano)->get();
                ///calculo el presupuesto total de todos los programas de una cooperativa en un anno
                $preaux = 0;
                foreach ($programas as $prg) {

                    $preaux += $prg->presupuesto_prog;
                }
                ////
                $presup = $presup_total - $preaux;
            }catch (\Exception $exception){
                throw $exception;
            }
        return response()->json(['presup' => $presup]);
    }
}
