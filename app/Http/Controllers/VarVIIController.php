<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use BasoCoop\Comunidad;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Premisas;
use BasoCoop\Http\Requests\CreateIntComunidadRequest;

class VarVIIController extends Controller
{

    public function index() {
        $user=Auth::user();
        $privilegios=session('IC'.$user->id);
        $premisas=Premisas::where('id_cooperativa','=',$user->id_coop)->get();
        $año = collect();
        foreach ($premisas as $premisa)
        {
            $año->push($premisa->GetAno);
        }
        $pe_total=Comunidad::where('id_cooperativa','=',$user->id_coop)->get();
        $pe=array();
        foreach ($pe_total as $key => $cant)
        {
            $pe[$key]=$cant->id_ano;
        }

        return view('IntComuniadad', [ 'ano' => $año,'pe_ano'=>$pe,'privilegios'=>$privilegios,'id_cooperativa'=>$user->id_coop ]);

    }
    public function modComunidad($id_ano){

        $user=Auth::user();
        $comunidad=Comunidad::where('id_cooperativa','=',$user->id_coop)->where('id_ano','=',$id_ano)->first();


        return response()->json(['comunidad'=>$comunidad]);


    }

    public function addComunidad(CreateIntComunidadRequest $request){

        Comunidad::create($request->all());


    }
    public function actComunidad(CreateIntComunidadRequest $request,$idcom){

        $comunidad=Comunidad::find($idcom);

        $comunidad->cant_act_real=$request->input('cant_act_real');
        $comunidad->cant_part_act_desr_com=$request->input('cant_part_act_desr_com');
        $comunidad->apoy_ints_comun=$request->input('apoy_ints_comun');

        $comunidad->save();

        return redirect('/VarVII');



    }

}
