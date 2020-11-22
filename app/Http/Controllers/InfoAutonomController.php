<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Ano;
use BasoCoop\AutonIndep;
use BasoCoop\Http\Requests\CreateRequestFed;

class InfoAutonomController extends Controller
{
    public function indexFed(CreateRequestFed $request){

        $id_cooperativa=$request->input('coop');
        $id_ano=$request->input('ano');

        session(['id_coop_fed'=>$id_cooperativa]);
        session(['id_ano_fed'=>$id_ano]);
        // $this->index($id_ano);
        return redirect('/InfoAutonom/'.$id_ano);
    }



    public function index($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id_cooperativa = $año = 0;

            if ($user->Rol->nomb_rol == 'Usuario Federativo') {

                $id_cooperativa = session('id_coop_fed');
                $id_ano = session('id_ano_fed');
                $ano = Ano::find($id_ano);
                // dd($id_ano);


            } else {
                $id_cooperativa = $user->id_coop;
                $ano = Ano::find($id);


            }


            $total = $total_ant = 0;
            $autindp = AutonIndep::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $total = $autindp->capital_prop + $autindp->capital_ext + $autindp->acu_cump_cap_prop + $autindp->acu_cump_cap_ext + $autindp->acu_cump_ini_prop + $autindp->acu_cump_inj_ext;

            $autindp_ant = AutonIndep::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

            if ($autindp_ant != null)
                $total_ant = $autindp_ant->capital_prop + $autindp_ant->capital_ext + $autindp_ant->acu_cump_cap_prop + $autindp_ant->acu_cump_cap_ext + $autindp_ant->acu_cump_ini_prop + $autindp_ant->acu_cump_inj_ext;

            return view('InfoAutonom', ['ano' => $ano, 'autindp' => $autindp, 'autindp_ant' => $autindp_ant, 'total' => $total, 'total_ant' => $total_ant]);
        }
    }
}
