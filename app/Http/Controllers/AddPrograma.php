<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Http\Requests\create_Programa_Request;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Metas;
use Illuminate\Http\Request;
use BasoCoop\Ano;
use BasoCoop\Programa;
use BasoCoop\Premisas;

class AddPrograma extends Controller
{
    //
    public function AddPrograma()
    {
//        $proy = Programa::all();
        //$año = Ano::all();
        if(Auth::check()) {
            $user= Auth::user();
            if($user->Rol->nomb_rol=='Gestor Social') {
                $id_coop = $user->id_coop;
                $año=collect();//iniciacializando el anno vacio


                //para obtener los annos tengo que ir a la tabla premisa por el id cooperativa
                $premisas=Premisas::where('id_cooperativa','=',$id_coop)->get();
                /*$premisas->each(function ($item,$key){
                    $año->push($item->GetAno);
                });*/
                foreach ($premisas as $pre)
                {
                    $año->push($pre->GetAno);
                }
                // $año = Ano::all();
            }
            //dd($proy[0]->Ano);
            return view('AddPrograma', [ 'ano' => $año,'id_coop' => $id_coop]);
        }


    }

    public function create(create_Programa_Request $request)
    {
        $nombre = $request->nombre;
        $objetivo = $request->objetivo;
        $metodologia = $request->metodologia;
        $presupuesto = $request->presupuestoP;
        $anno = $request->anno;

        $coop = $request->idcoop;

        try {
            $prog = Programa::create(['nomb_prog' => $nombre, 'objetivo' => $objetivo, 'metodologia' => $metodologia,
                'presupuesto_prog' => $presupuesto, 'id_ano' => $anno, 'id_cooperativa' => $coop]);
        }catch (\Exception $exception){
            throw $exception;
        }

        $idProg =$prog->id;



        return redirect('proyectos');




    }




}
