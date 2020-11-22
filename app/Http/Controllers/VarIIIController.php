<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Ano;
use BasoCoop\Distribucion_Utilidades;
use Illuminate\Http\Request;
use BasoCoop\Premisas;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Http\Requests\CreatePartEconRequest;


class VarIIIController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $privilegios=session('PE'.$user->id);
        $premisas=Premisas::where('id_cooperativa','=',$user->id_coop)->get();
        $año = collect();
        foreach ($premisas as $premisa)
        {
            $año->push($premisa->GetAno);
        }
        $pe_total=Distribucion_Utilidades::where('id_cooperativa','=',$user->id_coop)->get();
        $pe=array();
        foreach ($pe_total as $key => $cant)
        {
            $pe[$key]=$cant->id_ano;
        }

        return view('ParticipacionEconomica', [ 'ano' => $año,'pe_ano'=>$pe,'privilegios'=>$privilegios ]);

    }


    public  function ModPE($id_ano){

        $user=Auth::user();

        $pe=Distribucion_Utilidades::where('id_cooperativa','=',$user->id_coop)->where('id_ano','=',$id_ano)->firstOrFail();
        return response()->json(['pe'=>$pe]);
    }


    public function ActPartEcon($id_pe,CreatePartEconRequest $request){
        $pe=Distribucion_Utilidades::find($id_pe);

        $capitalizarcoperativa= request()->input('capitalizar_coop');
        $distribucionsocios= request()->input('distribucion_socios');
        $fondosociales= request()->input('fondo_sociales');
        $reservas= request()->input('reservas');
        $excedente= request()->input('excedente');
        $capital_per=request()->input('capital_per');


        $pe->capitalizar_coop=$capitalizarcoperativa;
        $pe->distribucion_socios=$distribucionsocios;
        $pe->fondo_sociales=$fondosociales;
        $pe->reservas=$reservas;
        $pe->excedente=$excedente;
        $pe->capital_per=$capital_per;

        $pe->save();

    }
    public function AddPartic(CreatePartEconRequest $request){
        $user=Auth::user();

        $capitalizarcoperativa= request()->input('capitalizar_coop');
        $distribucionsocios= request()->input('distribucion_socios');
        $fondosociales= request()->input('fondo_sociales');
        $reservas= request()->input('reservas');
        $idAnno=request()->input('id_ano');
        $excedente= request()->input('excedente');
        $capital_per=request()->input('capital_per');

        $pe =  new Distribucion_Utilidades();


        $pe->capitalizar_coop=$capitalizarcoperativa;
        $pe->distribucion_socios=$distribucionsocios;
        $pe->fondo_sociales=$fondosociales;
        $pe->reservas=$reservas;
        $pe->id_ano=$idAnno;
        $pe->excedente=$excedente;
        $pe->capital_per=$capital_per;
        $pe->id_cooperativa=$user->id_coop;

        $pe->save();

        return response()->json(['pe' => $pe]);
    }
}