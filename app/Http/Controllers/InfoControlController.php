<?php

namespace BasoCoop\Http\Controllers;
use BasoCoop\Ano;
use BasoCoop\Comportamiento_Asamb_Asoc;
use BasoCoop\EstadoCumpAsamGenAsoc;
use BasoCoop\PartAsamGenAsoc;
use BasoCoop\EquiGenNivDir;
use BasoCoop\Comportamiento_Reuniones_Dir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Http\Requests\CreateRequestFed;

class InfoControlController extends Controller
{

    public function indexFed(CreateRequestFed $request){

        $id_cooperativa=$request->input('coop');
        $id_ano=$request->input('ano');

        session(['id_coop_fed'=>$id_cooperativa]);
        session(['id_ano_fed'=>$id_ano]);
        // $this->index($id_ano);
        return redirect('/InfoControl/'.$id_ano);
    }

    public function index($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id_cooperativa=$año=0;

            if($user->Rol->nomb_rol == 'Usuario Federativo'){

                $id_cooperativa = session('id_coop_fed');
                $id_ano=session('id_ano_fed');
                $ano = Ano::find($id_ano);
                // dd($id_ano);




            }
            else {
                $id_cooperativa = $user->id_coop;
                $ano = Ano::find($id);


            }



            $total=$total_ant=0;
            $compAsam = Comportamiento_Asamb_Asoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $total=$compAsam->convocadas+$compAsam->efectuadas+$compAsam->delegadas;
            $est_cump_asam=EstadoCumpAsamGenAsoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $part_asm_gen=PartAsamGenAsoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $equi_gen_niv_dir=EquiGenNivDir::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();



            //$compReu = Comportamiento_Reuniones_Dir::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();

            //Buscando annos anteriores por cada caract

            $compAsam_ant = Comportamiento_Asamb_Asoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano','desc')->first();
            $est_cump_asam_ant=EstadoCumpAsamGenAsoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano','desc')->first();
            $part_asm_gen_ant=PartAsamGenAsoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano','desc')->first();
            $equi_gen_niv_dir_ant=EquiGenNivDir::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano','desc')->first();

            if($compAsam_ant!=null)
            $total_ant=$compAsam_ant->convocadas+$compAsam_ant->efectuadas+$compAsam_ant->delegadas;

            return view('InfoControl', ['ano' => $ano, 'compAsam' => $compAsam,'compAsam_ant' => $compAsam_ant ,'total'=>$total,'total_ant'=>$total_ant,'est_cump_asam'=>$est_cump_asam,
                'est_cump_asam_ant'=>$est_cump_asam_ant,'part_asm_gen'=>$part_asm_gen,'part_asm_gen_ant'=>$part_asm_gen_ant,'equi_gen_niv_dir'=>$equi_gen_niv_dir,'equi_gen_niv_dir_ant'=>$equi_gen_niv_dir_ant ]);

        }
    }
}
