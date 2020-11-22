<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Premisas;
use BasoCoop\AutonIndep;
use BasoCoop\Http\Requests\CreateAutonIndepRequest;

class VarIVController extends Controller
{

    public function index() {
        $user=Auth::user();
        $privilegios=session('AI'.$user->id);
        $premisas=Premisas::where('id_cooperativa','=',$user->id_coop)->get();
        $año = collect();
        foreach ($premisas as $premisa)
        {
            $año->push($premisa->GetAno);
        }
        $pe_total=AutonIndep::where('id_cooperativa','=',$user->id_coop)->get();
        $pe=array();
        foreach ($pe_total as $key => $cant)
        {
            $pe[$key]=$cant->id_ano;
        }

        return view('AutonIndep', [ 'ano' => $año,'pe_ano'=>$pe,'privilegios'=>$privilegios ]);

    }

    public function addAutIndp(CreateAutonIndepRequest $request){
        $user=Auth::user();

        $autind=new AutonIndep();

        $autind->id_ano=$request->input('id_ano');
        $autind->capital_prop =$request->input('capital_prop');
        $autind->capital_ext =$request->input('capital_ext');
        $autind->acu_cump_cap_prop =$request->input('acu_cump_cap_prop');
        $autind->acu_cump_cap_ext =$request->input('acu_cump_cap_ext');
        $autind->acu_cump_ini_prop =$request->input('acu_cump_ini_prop');
        $autind->acu_cump_inj_ext =$request->input('acu_cump_inj_ext');
        $autind->id_cooperativa=$user->id_coop;

        $autind->save();

        return response()->json(['autind'=>$autind]);



    }
    public function actAutIndp(CreateAutonIndepRequest $request,$id_autind){


        $autind=AutonIndep::find($id_autind);


        $autind->capital_prop =$request->input('capital_prop');
        $autind->capital_ext =$request->input('capital_ext');
        $autind->acu_cump_cap_prop =$request->input('acu_cump_cap_prop');
        $autind->acu_cump_cap_ext =$request->input('acu_cump_cap_ext');
        $autind->acu_cump_ini_prop =$request->input('acu_cump_ini_prop');
        $autind->acu_cump_inj_ext =$request->input('acu_cump_inj_ext');


        $autind->save();

        return response()->json(['autind'=>$autind]);



    }
    public function editarAI($id_ano){
       // dd('fed');

        $user=Auth::user();
        $autind=AutonIndep::where('id_cooperativa','=',$user->id_coop)->where('id_ano','=',$id_ano)->first();
        return response()->json(['autind'=>$autind]);
    }

}
