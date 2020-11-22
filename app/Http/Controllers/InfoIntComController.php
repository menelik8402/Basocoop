<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use BasoCoop\Ano;
use BasoCoop\Comunidad;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Http\Requests\CreateRequestFed;

class InfoIntComController extends Controller
{
    public function indexFed(CreateRequestFed $request){

        $id_cooperativa=$request->input('coop');
        $id_ano=$request->input('ano');

        session(['id_coop_fed'=>$id_cooperativa]);
        session(['id_ano_fed'=>$id_ano]);
        // $this->index($id_ano);
        return redirect('/InfoIntCom/'.$id_ano);
    }

    public function index($id){
        if (Auth::check()) {
            $user = Auth::user();
            $id_cooperativa = $ano = 0;

            if ($user->Rol->nomb_rol == 'Usuario Federativo') {

                $id_cooperativa = session('id_coop_fed');
                $id_ano = session('id_ano_fed');
                $ano = Ano::find($id_ano);
                // dd($id_ano);


            } else {
                $id_cooperativa = $user->id_coop;
                $ano = Ano::find($id);


            }



            $intcom=Comunidad::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $intcom_ant=Comunidad::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano','desc')->first();

            return view('InfoIntCom',[

                'ano' =>$ano,'intcom'=>$intcom,'intcom_ant'=>$intcom_ant

            ]);
        }

    }
}
