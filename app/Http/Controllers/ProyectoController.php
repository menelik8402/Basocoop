<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Ano;
use BasoCoop\Programa;
use BasoCoop\Premisas;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Cooperativa;
use Illuminate\Support\Collection as Colletion;
use BasoCoop\Metas;
use BasoCoop\Seguimientometa;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    //
    public function index()
    {

        //aqui deben salir todos los programas que tiene el usuario
        //logueado de la cooperativa de dicho usuario
        if(Auth::check()) {
            $user= Auth::user();
            $privilegios=session('GP'.$user->id);
            if($user->Rol->nomb_rol=='Gestor Social' || $user->Rol->nomb_rol=='Usuario') {
                $id_coop = $user->id_coop;
               $año=collect();//iniciacializando el anno vacio
                $proy = Programa::where('id_cooperativa','=',$id_coop)->get();

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
            return view('proyectos', ['proy' => $proy, 'ano' => $año,'privilegios'=>$privilegios]);
        }
        else
            return redirect('/logout');
    }
    public function indexRep(){
        $user= Auth::user();
        $cooperativa=Cooperativa::find($user->id_coop);
        return view('programasrep',[
            'cooperativa'=>$cooperativa

        ]);



}
public function repFecha(Request $request,$id_coop=null){

        $id_cooperativa=0;
        if($id_coop=='coop'){
            $id_cooperativa=$request->input('coop');
        }
        else
        {
            $user= Auth::user();
            $id_cooperativa=$user->id_coop;
        }

        $seguimientos=collect();
          $programas=Programa::where('id_cooperativa','=',$id_cooperativa)->get();
        foreach ($programas as $programa)
        {
            foreach ($programa->Metas as $meta)
            {
               // dd($meta->GetSeguimientos);
                foreach ($meta->GetSeguimientos as $seg) {
                    $seguimientos->push($seg);
                }
            }
        }
//dd($seguimientos);

        $cooperativa=Cooperativa::find($id_cooperativa);
        //$seguimientos=Seguimientometa::where('id_cooperativa','=',$id_cooperativa)->orderBy('created_at')->get();
    return view('Reportefecha',[
        'seguimientos' => $seguimientos,
        'cooperativa'=>$cooperativa

    ]);
}

public function repacttotal(){

    $cooperativas=Cooperativa::all();
    if(Auth::user()->Rol->nomb_rol=='Usuario'){
        //$coops=Cooperativa::find(Auth::user()->id_coop);
        //Seleccionando la cooperativa perteneciente al usuario
        $cooperativas=$cooperativas->filter(function ($item, $key) {
            return $item->id==Auth::user()->id_coop;
        });
        //dd($coops);
    }
    return view('users.federativo.repactfedtotal',[
        'cooperativas'=>$cooperativas
    ]);

}


public function reporteFecha($fecha){
    $user= Auth::user();

$metas=collect();
        $programas=Programa::where('id_cooperativa','=',$user->id_coop)->where('created_at','>=',$fecha)->get();

        foreach ($programas->sortBy('id') as $prog)
        {

            $metas->push($prog->Metas);

        }



    return response()->json(['programas' => $programas,'metas'=>$metas]);

}

    public function AdicionarProyecto()
    {
        $p = new Programa();

        $ano = request()->input('ano');
        $nombre = request()->input('nombre');
        $uf = request()->input('uf');
        $mn = request()->input('mn');
        $id_cooperativa= '1';

        $p->id_ano = $ano;
        $p->nombre = $nombre;
        $p->unidades_fisicas = $uf;
        $p->manifestaciones_numericas = $mn;
        $p->id_cooperativa = $id_cooperativa;

        $p->save();

        return response()->json(['proy' => $p]);


    }

    public function Programas(){
        $user= Auth::user();
        $idcoop=$user->id_coop;
        $proy = Programa::where('id_cooperativa','=',$idcoop)->get();

        return view('programas', ['proy' => $proy]);
    }
}
