<?php

namespace BasoCoop\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Ano;
use BasoCoop\Distribucion_Utilidades;
use Illuminate\Http\Request;
use BasoCoop\Http\Requests\CreateRequestFed;

class InfoPartiController extends Controller
{

    public function indexFed(CreateRequestFed $request){

        $id_cooperativa=$request->input('coop');
        $id_ano=$request->input('ano');

        session(['id_coop_fed'=>$id_cooperativa]);
        session(['id_ano_fed'=>$id_ano]);
        // $this->index($id_ano);
        return redirect('/InfoParticip/'.$id_ano);
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
            $distribucion_utilidades = Distribucion_Utilidades::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $total = $distribucion_utilidades->excedente + $distribucion_utilidades->capitalizar_coop + $distribucion_utilidades->distribucion_socios + $distribucion_utilidades->reservas + $distribucion_utilidades->fondo_sociales + $distribucion_utilidades->capital_per;

            $distribucion_utilidades_ant = Distribucion_Utilidades::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            if ($distribucion_utilidades_ant != null)
                $total_ant = $distribucion_utilidades_ant->excedente + $distribucion_utilidades_ant->capitalizar_coop + $distribucion_utilidades_ant->distribucion_socios + $distribucion_utilidades_ant->reservas + $distribucion_utilidades_ant->fondo_sociales + $distribucion_utilidades_ant->capital_per;

            return view('InfoParticipacion', ['ano' => $ano, 'distribucion_utilidades' => $distribucion_utilidades, 'distribucion_utilidades_ant' => $distribucion_utilidades_ant, 'total' => $total, 'total_ant' => $total_ant]);
        }

    }

}
