<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BasoCoop\EduForInf;
use BasoCoop\Ano;
use BasoCoop\Http\Requests\CreateRequestFed;

class InfoEducFormInfController extends Controller
{



    public function indexFed(CreateRequestFed $request){

        $id_cooperativa=$request->input('coop');
        $id_ano=$request->input('ano');

        session(['id_coop_fed'=>$id_cooperativa]);
        session(['id_ano_fed'=>$id_ano]);
        // $this->index($id_ano);
        return redirect('/InfoEducFormInf/'.$id_ano);
    }

            public function index($id){

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
                    $educ_form_inf=EduForInf::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
                    $educ_form_inf_ant=EduForInf::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano','desc')->first();

                    return view('InfoEducFormInf',[

                        'ano' =>$año,'educ_form_inf'=>$educ_form_inf,'educ_form_inf_ant'=>$educ_form_inf_ant

                    ]);
                }

            }


}
