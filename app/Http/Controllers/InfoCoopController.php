<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use BasoCoop\OpeFinCoop;
use BasoCoop\IntegrCoop;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Ano;

use BasoCoop\Http\Requests\CreateRequestFed;

class InfoCoopController extends Controller
{
    public function indexFed(CreateRequestFed $request){

        $id_cooperativa=$request->input('coop');
        $id_ano=$request->input('ano');

        session(['id_coop_fed'=>$id_cooperativa]);
        session(['id_ano_fed'=>$id_ano]);
        // $this->index($id_ano);
        return redirect('/InfoCoopCoop/'.$id_ano);
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


            //$total=$total_ant=0;
            $opefin = OpeFinCoop::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $intgra = IntegrCoop::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();


            $opefin_ant = OpeFinCoop::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $intgra_ant = OpeFinCoop::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();


            return view('InfoCoopCoop', ['ano' => $ano, 'opefin' => $opefin, 'opefin_ant' => $opefin_ant, 'intgra' => $intgra, 'intgra_ant' => $intgra_ant]);
        }
    }
}
