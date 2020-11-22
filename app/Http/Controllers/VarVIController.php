<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BasoCoop\OpeFinCoop;
use BasoCoop\IntegrCoop;
use BasoCoop\Premisas;
use BasoCoop\Http\Requests\CreateOpFinCoopRequest;
class VarVIController extends Controller
{
    public function index() {
        $user=Auth::user();
        $privilegios=session('CC'.$user->id);
        $premisas=Premisas::where('id_cooperativa','=',$user->id_coop)->get();
        $año = collect();
        foreach ($premisas as $premisa)
        {
            $año->push($premisa->GetAno);
        }
        $pe_total=OpeFinCoop::where('id_cooperativa','=',$user->id_coop)->get();
        $pe=array();
        foreach ($pe_total as $key => $cant)
        {
            $pe[$key]=$cant->id_ano;
        }

        return view('Opfincoop', [ 'ano' => $año,'pe_ano'=>$pe,'privilegios'=>$privilegios,'id_cooperativa'=>$user->id_coop ]);

    }

    public function modCC($id_ano){

        $user=Auth::user();
        $opefin=OpeFinCoop::where('id_cooperativa','=',$user->id_coop)->where('id_ano','=',$id_ano)->first();
        $intercoop=IntegrCoop::where('id_cooperativa','=',$user->id_coop)->where('id_ano','=',$id_ano)->first();

        return response()->json(['opefin'=>$opefin,'intercoop'=>$intercoop]);

    }
    public function addOpFinCoop(CreateOpFinCoopRequest $request){

        //dd($request->input('id_cooperativa'));
        //dd($request->input('id_cooperativa'));

        IntegrCoop::create($request->all());
        OpeFinCoop::create($request->all());


        return redirect('/VarVI');


    }

    public function actOpFinCoop(CreateOpFinCoopRequest $request,$idcc,$idint){

        $opfincoop=OpeFinCoop::find($idcc);

        $opfincoop->cant_oper_red_act  = $request->input('cant_oper_red_act');
        $opfincoop->usuario_red_act   = $request->input('usuario_red_act');
        $opfincoop->pto_serv_red_act = $request->input('pto_serv_red_act');
        $opfincoop->cant_oper_caj_aut = $request->input('cant_oper_caj_aut');
        $opfincoop->usuario_caj_aut   = $request->input('usuario_caj_aut');
        $opfincoop->pto_serv_caj_aut = $request->input('pto_serv_caj_aut');

        $opfincoop->save();

        $intercoop=IntegrCoop::find($idint);
        $intercoop->cant_asoc_part_asamb_coop = $request->input('cant_asoc_part_asamb_coop');
        $intercoop->cant_ali_est_inst = $request->input('cant_ali_est_inst');
        $intercoop->cant_ali_est_interinst = $request->input('cant_ali_est_interinst');

        $intercoop->save();


        return redirect('/VarVI');


    }
}
