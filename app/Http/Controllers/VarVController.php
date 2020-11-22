<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use BasoCoop\Http\Requests\CreateEduFormInfRequest;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Premisas;
use BasoCoop\EduForInf;

class VarVController extends Controller
{
    //

    public function index() {
        $user=Auth::user();
        $privilegios=session('EFI'.$user->id);
        $premisas=Premisas::where('id_cooperativa','=',$user->id_coop)->get();
        $año = collect();
        foreach ($premisas as $premisa)
        {
            $año->push($premisa->GetAno);
        }
        $pe_total=EduForInf::where('id_cooperativa','=',$user->id_coop)->get();
        $pe=array();
        foreach ($pe_total as $key => $cant)
        {
            $pe[$key]=$cant->id_ano;
        }

        return view('EduFormInf', [ 'ano' => $año,'pe_ano'=>$pe,'privilegios'=>$privilegios ]);

    }

    public function nuevoEFI($idano){


        $user=Auth::user();

        return view('EduFormInfNuevo',['idano'=> $idano , 'idcoop'=>$user->id_coop]);


    }
    public function addEFI(CreateEduFormInfRequest $request){


     //   dd($request->all());
        EduForInf::create($request->all());

         return redirect('/VarV');



        //dd($request);
    }
    public function editEFI($id_ano){
        $user=Auth::user();


        $efi=EduForInf::where('id_cooperativa','=',$user->id_coop)->where('id_ano','=',$id_ano)->first();


        return view('EduFormInfModif',['idano'=> $efi->id_ano , 'idcoop'=> $efi->id_cooperativa,'efi' => $efi]);

    }
    public function actEFI(CreateEduFormInfRequest $request,$id_efi){

        $efi=EduForInf::find($id_efi);
        $efi->inv_proc_form_cap=$request->input('inv_proc_form_cap');
        $efi->inv_edu_form_inform_jov=$request->input('inv_edu_form_inform_jov');
        $efi->inv_edu_form_inform_muj=$request->input('inv_edu_form_inform_muj');
        $efi->inv_edu_form_inform_emp=$request->input('inv_edu_form_inform_emp');
        $efi->inv_edu_form_inform_direct=$request->input('inv_edu_form_inform_direct');
        $efi->inv_edu_form_inform_ninos=$request->input('inv_edu_form_inform_ninos');
        $efi->inv_edu_form_inform_comun=$request->input('inv_edu_form_inform_comun');
        $efi->num_act_edu_form_inf=$request->input('num_act_edu_form_inf');
        $efi->num_act_edu_form_inf_jov=$request->input('num_act_edu_form_inf_jov');
        $efi->num_act_edu_form_inf_muj=$request->input('num_act_edu_form_inf_muj');
        $efi->num_act_edu_form_inf_asoc=$request->input('num_act_edu_form_inf_asoc');
        $efi->num_act_edu_form_inf_emp=$request->input('num_act_edu_form_inf_emp');
        $efi->num_act_edu_form_inf_direct=$request->input('num_act_edu_form_inf_direct');
        $efi->num_act_edu_form_inf_ninos=$request->input('num_act_edu_form_inf_ninos');
        $efi->num_act_edu_form_inf_comun=$request->input('num_act_edu_form_inf_comun');
        $efi->cant_part_act_educ_form_inform=$request->input('cant_part_act_educ_form_inform');
        $efi->cant_part_act_educ_form_inform_jov=$request->input('cant_part_act_educ_form_inform_jov');
        $efi->cant_part_act_educ_form_inform_muj=$request->input('cant_part_act_educ_form_inform_muj');
        $efi->cant_part_act_educ_form_inform_asoc=$request->input('cant_part_act_educ_form_inform_asoc');
        $efi->cant_part_act_educ_form_inform_emp=$request->input('cant_part_act_educ_form_inform_emp');
        $efi->cant_part_act_educ_form_inform_direct=$request->input('cant_part_act_educ_form_inform_direct');
        $efi->cant_part_act_educ_form_inform_ninos=$request->input('cant_part_act_educ_form_inform_ninos');
        $efi->cant_part_act_educ_form_inform_comun=$request->input('cant_part_act_educ_form_inform_comun');
        $efi->cant_part_act_educ_form_inform_fil_coop=$request->input('cant_part_act_educ_form_inform_fil_coop');
        $efi->cant_act_form_hab=$request->input('cant_act_form_hab');
        $efi->cant_part_act_form_hab=$request->input('cant_part_act_form_hab');

        $efi->save();


        return redirect('/VarV');

    }

}
