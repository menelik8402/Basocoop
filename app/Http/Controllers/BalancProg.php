<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Cooperativa;
use Illuminate\Http\Request;
use BasoCoop\Http\Requests\CreateRequestFed;
use BasoCoop\Ano;
use BasoCoop\Programa;
use BasoCoop\Metas;
Use BasoCoop\Seguimientometa;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Cant_Asociados;
use BasoCoop\Incorporaciones_Bajas;
use BasoCoop\Nivel_Esc_Asociados;
use BasoCoop\Nivel_Esc_Empleados;
use BasoCoop\estadocivilasoc;
use BasoCoop\compporedadesasoc;
use BasoCoop\tiempoafilasoc;
use BasoCoop\Cond_material_coop;
use BasoCoop\Premisas;

use BasoCoop\categoriaocupasoc;
use BasoCoop\retiroasoc;
use BasoCoop\rotacionasoc;
use BasoCoop\solicafiliasoc;
use BasoCoop\CantEmpleado;

use BasoCoop\Comportamiento_Asamb_Asoc;
use BasoCoop\EstadoCumpAsamGenAsoc;
use BasoCoop\PartAsamGenAsoc;
use BasoCoop\EquiGenNivDir;
use BasoCoop\Comportamiento_Reuniones_Dir;

use BasoCoop\Distribucion_Utilidades;

use BasoCoop\AutonIndep;

use BasoCoop\EduForInf;

use BasoCoop\OpeFinCoop;
use BasoCoop\IntegrCoop;

use BasoCoop\Comunidad;

use Barryvdh\DomPDF\Facade as PDF;

class BalancProg extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ind=null)
    {

        //
        $user= Auth::user();
        $anos=collect();
        $id_coop=$user->id_coop;
        if($user->Rol->nomb_rol=='Gestor Social' || $user->Rol->nomb_rol=='Usuario' ) {

            //$id_coop=$user->id_coop;
            $programas=Programa::where('id_cooperativa','=',$id_coop)->get();

            foreach ($programas as $programa)
            {
               if($anos->contains($programa->Ano)==false){
                     $anos->push($programa->Ano);
               }
            }

        }else
        {
            $anos=Ano::all();
        }
        return view('BalanProg',[
            'anos' => $anos->sortByDesc('ano'),
            'id_coop'=>$id_coop,
            'ind' => $ind
        ]);
    }
    public function indice()
    {
        //
        $user= Auth::user();
        $anos=collect();
        if($user->Rol->nomb_rol=='Gestor Social' || $user->Rol->nomb_rol=='Usuario' ) {

            $id_coop=$user->id_coop;
            $programas=Programa::where('id_cooperativa','=',$id_coop)->get();

            foreach ($programas as $programa)
            {
                if($anos->contains($programa->Ano)==false){
                    $anos->push($programa->Ano);
                }
            }

        }else
        {
            $anos=Ano::all();
        }



        return view('BalanProgAct',[
            'anos' => $anos->sortByDesc('ano'),
            // 'progs' => $progs
        ]);
    }

    public function indiceSeg()
    {
        //
        $user= Auth::user();
        $anos=collect();
        if($user->Rol->nomb_rol=='Gestor Social' || $user->Rol->nomb_rol=='Usuario' ) {

            $id_coop=$user->id_coop;
            $programas=Programa::where('id_cooperativa','=',$id_coop)->get();

            foreach ($programas as $programa)
            {
                if($anos->contains($programa->Ano)==false){
                    $anos->push($programa->Ano);
                }
            }

        }else
        {
            $anos=Ano::all();
        }



        return view('BalanProgActSeg',[
            'anos' => $anos->sortByDesc('ano'),
            // 'progs' => $progs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        //CreateRequestFed
    public function showBalanFed( CreateRequestFed $request){
       
        $id_ano=$request->input('ano');
        $id_coop=$request->input('coop');
        $ind=$request->input('ind');

        if($ind=='ind'){
            return redirect('/generar/' . $id_ano . '/' . $id_coop .'/'. $ind);
        }else {
            return redirect('/generar/' . $id_ano . '/' . $id_coop);
        }
       // $this->show($id_ano,$id_coop);
    }
    public function show($id,$id_coop=null,$ind=null)
    {


        $id_cooperativa=0;
        $cooperativa_actual=new Cooperativa();

        $user= Auth::user();

        if($user->Rol->nomb_rol=='Gestor Social' || $user->Rol->nomb_rol=='Usuario' ) {

            $id_cooperativa=$user->id_coop;
            $cooperativa_actual=$user->Cooperativa;
            $año = Ano::find($id);

        }
        elseif ($user->Rol->nomb_rol=='Usuario Federativo')
        {
            $id_cooperativa=$id_coop;
            $cooperativa_actual=Cooperativa::find($id_cooperativa);
            $año = Ano::find($id);
        }

        if($ind!=null) {

            //indicadores
            $total=0;

            ////////////////////////////////////////////////Membressiaa

            $cantAsoc = Cant_Asociados::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
             if($cantAsoc!=null)
            $total = $cantAsoc->mujeres + $cantAsoc->hombres;

            $incBaj = Incorporaciones_Bajas::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            // $nivEscAsoc = Nivel_Esc_Asociados::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $nivEscEmp = Nivel_Esc_Empleados::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $est_civil = estadocivilasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $comp_edad_asoc = compporedadesasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $tiempo_afili = tiempoafilasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();

            $cat_ocup_asoc = categoriaocupasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '=', $id)->first();


            $ret_asoc = retiroasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $rot_asoc = rotacionasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $soli_afili_asoc = solicafiliasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $emp = CantEmpleado::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();

            //Buscando annos anteriores por cada caract


            $cantAsoc_ant = Cant_Asociados::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();


            $incBaj_ant = Incorporaciones_Bajas::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            // $nivEscAsoc_ant = Nivel_Esc_Asociados::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano','desc')->first();
            $nivEscEmp_ant = Nivel_Esc_Empleados::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $est_civil_ant = estadocivilasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $comp_edad_asoc_ant = compporedadesasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $tiempo_afili_ant = tiempoafilasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

            $cat_ocup_asoc_ant = categoriaocupasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

//dd($cat_ocup_asoc_ant);

            $ret_asoc_ant = retiroasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $rot_asoc_ant = rotacionasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $soli_afili_asoc_ant = solicafiliasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $emp_ant = CantEmpleado::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

////////////////////////////////////////////////////////////Control democraticco de los miembros
            $totalcd = $total_ant = 0;
            $compAsam = Comportamiento_Asamb_Asoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            if($compAsam!=null)
                $totalcd = $compAsam->convocadas + $compAsam->efectuadas + $compAsam->delegadas;

            $est_cump_asam = EstadoCumpAsamGenAsoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $part_asm_gen = PartAsamGenAsoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $equi_gen_niv_dir = EquiGenNivDir::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();


            //$compReu = Comportamiento_Reuniones_Dir::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();

            //Buscando annos anteriores por cada caract

            $compAsam_ant = Comportamiento_Asamb_Asoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $est_cump_asam_ant = EstadoCumpAsamGenAsoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $part_asm_gen_ant = PartAsamGenAsoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $equi_gen_niv_dir_ant = EquiGenNivDir::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

            $total_ant=0;
            if ($compAsam_ant != null)
                $total_ant = $compAsam_ant->convocadas + $compAsam_ant->efectuadas + $compAsam_ant->delegadas;


////////////////////////////////////distribucion de excedente
            $total_utl = $total_ant_utl = 0;
            $distribucion_utilidades = Distribucion_Utilidades::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            if ($distribucion_utilidades != null)
            $total_utl = $distribucion_utilidades->excedente + $distribucion_utilidades->capitalizar_coop + $distribucion_utilidades->distribucion_socios + $distribucion_utilidades->reservas + $distribucion_utilidades->fondo_sociales + $distribucion_utilidades->capital_per;

            $distribucion_utilidades_ant = Distribucion_Utilidades::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            if ($distribucion_utilidades_ant != null)
                $total_ant_utl = $distribucion_utilidades_ant->excedente + $distribucion_utilidades_ant->capitalizar_coop + $distribucion_utilidades_ant->distribucion_socios + $distribucion_utilidades_ant->reservas + $distribucion_utilidades_ant->fondo_sociales + $distribucion_utilidades_ant->capital_per;


/////////////////////////AAUTONOMIA E INDEPENDENCIA
            $total_autind = $total_ant_autind = 0;
            $autindp = AutonIndep::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            if ($autindp != null)
            $total_autind = $autindp->capital_prop + $autindp->capital_ext + $autindp->acu_cump_cap_prop + $autindp->acu_cump_cap_ext + $autindp->acu_cump_ini_prop + $autindp->acu_cump_inj_ext;

            $autindp_ant = AutonIndep::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

            if ($autindp_ant != null)
                $total_ant_autind = $autindp_ant->capital_prop + $autindp_ant->capital_ext + $autindp_ant->acu_cump_cap_prop + $autindp_ant->acu_cump_cap_ext + $autindp_ant->acu_cump_ini_prop + $autindp_ant->acu_cump_inj_ext;


///////////////////////////educacion formacion e informacio
            $educ_form_inf = EduForInf::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $educ_form_inf_ant = EduForInf::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();


/////////////////////////////////////////////Cooperacion entre cooperativas
            $opefin = OpeFinCoop::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $intgra = IntegrCoop::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();


            $opefin_ant = OpeFinCoop::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $intgra_ant = OpeFinCoop::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

//////////////////////////////////////////////////intetres por la comunidad
            $intcom = Comunidad::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $intcom_ant = Comunidad::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();


        }
        else
        {

        }


        //premisas y condicion  material
        $pre=Premisas::where('id_ano','=',$id)->where('id_cooperativa','=',$id_cooperativa)->firstOrFail();
        $cond_mat=Cond_material_coop::where('id_premisas','=',$pre->id)->firstOrFail();




        //enviando los programas para ese ano y cooperativa
        $progs=Programa::where('id_ano','=',$id )->where('id_cooperativa','=',$id_cooperativa)->get();
        $ano=$progs[0]->Ano;

       // dd($ano);

        //esta variable es para saber si todos programas de este ano tienen metas , pq ni no la entonces no se reliza el balance
        $si_tiene_metas=true;
        $nomb_prog='';


        //calculando el activo social
        $act_social=0;
        $total_NB=0;
        $uni_fis_real=$num_ben_real=0;
        $sum_und_fis_real=$sum_num_ben_real=0;

        foreach ($progs as $prog){
          if( $prog->Metas->count()==0)
          {
              $si_tiene_metas=false;
              $nomb_prog=$prog->nomb_prog;
          }

           $total_NB= $prog->Metas->sum('beneficiarios_plan')+$total_NB;


    }
     /// dd($user->Cooperativa);
        ///
        if($ind!=null) {
            return view('GenerarBalance', [
                'progs' => $progs,
                'total_NB' => $total_NB, 'sum_und_fis_real' => $sum_und_fis_real,
                'sum_num_ben_real' => $sum_num_ben_real, 'si_tiene_metas' => $si_tiene_metas, 'nomb_prog' => $nomb_prog, 'ano' => $ano, 'premisa' => $pre,
                'cond_mat' => $cond_mat, 'nomb_coop' => $cooperativa_actual,

                //membresia
                'ano_memb' => $año, 'total' => $total, 'cantAsoc' => $cantAsoc,
                'incBaj' => $incBaj, 'nivEscEmp' => $nivEscEmp, 'est_civil' => $est_civil, 'comp_edad_asoc' => $comp_edad_asoc,
                'tiempo_afili' => $tiempo_afili, 'cat_ocup_asoc' => $cat_ocup_asoc, 'ret_asoc' => $ret_asoc, 'rot_asoc' => $rot_asoc, 'soli_afili_asoc' => $soli_afili_asoc, 'emp' => $emp
                , 'cantAsoc_ant' => $cantAsoc_ant, 'incBaj_ant' => $incBaj_ant, 'nivEscEmp_ant' => $nivEscEmp_ant, 'est_civil_ant' => $est_civil_ant,
                'comp_edad_asoc_ant' => $comp_edad_asoc_ant, 'tiempo_afili_ant' => $tiempo_afili_ant, 'cat_ocup_asoc_ant' => $cat_ocup_asoc_ant, 'ret_asoc_ant' => $ret_asoc_ant, 'rot_asoc_ant' => $rot_asoc_ant,
                'soli_afili_asoc_ant' => $soli_afili_asoc_ant, 'emp_ant' => $emp_ant,
                //Contol democratico de los miembros
                'compAsam' => $compAsam, 'compAsam_ant' => $compAsam_ant, 'totalcd' => $totalcd, 'total_ant' => $total_ant, 'est_cump_asam' => $est_cump_asam,
                'est_cump_asam_ant' => $est_cump_asam_ant, 'part_asm_gen' => $part_asm_gen, 'part_asm_gen_ant' => $part_asm_gen_ant, 'equi_gen_niv_dir' => $equi_gen_niv_dir,
                'equi_gen_niv_dir_ant' => $equi_gen_niv_dir_ant,

                //distribucion de excedentes
                'distribucion_utilidades' => $distribucion_utilidades, 'distribucion_utilidades_ant' => $distribucion_utilidades_ant, 'total_utl' => $total_utl, 'total_ant_utl' => $total_ant_utl,

                ///autonomia independencia
                'autindp' => $autindp, 'autindp_ant' => $autindp_ant, 'total_autind' => $total_autind, 'total_ant_autind' => $total_ant_autind,

                //edcuc informacion
                'educ_form_inf' => $educ_form_inf, 'educ_form_inf_ant' => $educ_form_inf_ant,

                //cooperacion entre coopeativas
                'opefin' => $opefin, 'opefin_ant' => $opefin_ant, 'intgra' => $intgra, 'intgra_ant' => $intgra_ant,

                ///Interes por la cumunidad
                'intcom' => $intcom, 'intcom_ant' => $intcom_ant,

                'indicadores' => $ind


            ]);
        }
        else
        {
            return view('GenerarBalance', [
                'progs' => $progs,
                'total_NB' => $total_NB, 'sum_und_fis_real' => $sum_und_fis_real,
                'sum_num_ben_real' => $sum_num_ben_real, 'si_tiene_metas' => $si_tiene_metas, 'nomb_prog' => $nomb_prog, 'ano' => $ano, 'premisa' => $pre,
                'cond_mat' => $cond_mat, 'nomb_coop' => $cooperativa_actual,

                /*//membresia
                'ano_memb' => $año, 'total' => $total, 'cantAsoc' => $cantAsoc,
                'incBaj' => $incBaj, 'nivEscEmp' => $nivEscEmp, 'est_civil' => $est_civil, 'comp_edad_asoc' => $comp_edad_asoc,
                'tiempo_afili' => $tiempo_afili, 'cat_ocup_asoc' => $cat_ocup_asoc, 'ret_asoc' => $ret_asoc, 'rot_asoc' => $rot_asoc, 'soli_afili_asoc' => $soli_afili_asoc, 'emp' => $emp
                , 'cantAsoc_ant' => $cantAsoc_ant, 'incBaj_ant' => $incBaj_ant, 'nivEscEmp_ant' => $nivEscEmp_ant, 'est_civil_ant' => $est_civil_ant,
                'comp_edad_asoc_ant' => $comp_edad_asoc_ant, 'tiempo_afili_ant' => $tiempo_afili_ant, 'cat_ocup_asoc_ant' => $cat_ocup_asoc_ant, 'ret_asoc_ant' => $ret_asoc_ant, 'rot_asoc_ant' => $rot_asoc_ant,
                'soli_afili_asoc_ant' => $soli_afili_asoc_ant, 'emp_ant' => $emp_ant,
                //Contol democratico de los miembros
                'compAsam' => $compAsam, 'compAsam_ant' => $compAsam_ant, 'totalcd' => $totalcd, 'total_ant' => $total_ant, 'est_cump_asam' => $est_cump_asam,
                'est_cump_asam_ant' => $est_cump_asam_ant, 'part_asm_gen' => $part_asm_gen, 'part_asm_gen_ant' => $part_asm_gen_ant, 'equi_gen_niv_dir' => $equi_gen_niv_dir,
                'equi_gen_niv_dir_ant' => $equi_gen_niv_dir_ant,

                //distribucion de excedentes
                'distribucion_utilidades' => $distribucion_utilidades, 'distribucion_utilidades_ant' => $distribucion_utilidades_ant, 'total_utl' => $total_utl, 'total_ant_utl' => $total_ant_utl,

                ///autonomia independencia
                'autindp' => $autindp, 'autindp_ant' => $autindp_ant, 'total_autind' => $total_autind, 'total_ant_autind' => $total_ant_autind,

                //edcuc informacion
                'educ_form_inf' => $educ_form_inf, 'educ_form_inf_ant' => $educ_form_inf_ant,

                //cooperacion entre coopeativas
                'opefin' => $opefin, 'opefin_ant' => $opefin_ant, 'intgra' => $intgra, 'intgra_ant' => $intgra_ant,

                ///Interes por la cumunidad
                'intcom' => $intcom, 'intcom_ant' => $intcom_ant,*/

                'indicadores' => $ind,'presup_real'=>0


            ]);
        }


    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    //CreateRequestFed//
    public function balanceTotal( CreateRequestFed $request){
              // dd('dd') ;
        $cooper=Cooperativa::all();
        if(Auth::user()->Rol->nomb_rol=='Usuario'){
            //$coops=Cooperativa::find(Auth::user()->id_coop);
            //Seleccionando la cooperativa perteneciente al usuario
            $cooper=$cooper->filter(function ($item, $key) {
                return $item->id==Auth::user()->id_coop;
            });
            //dd($coops);
        }
        $id=$request->input('ano');

        $coleccion_coop=collect();
        $cooperativas=collect();
        foreach ($cooper   as $key => $cooperativa ){

            $lista=$cooperativa->Programas()->get();

            foreach ($lista as $i => $item)
            {
                $anual=Ano::find($id);

                if($item->Ano->ano==$anual->ano) {

                    $cooperativas->put($item->Ano->id,$cooperativa);
                    //dd($cooperativas);
                    //return 0;
                   // $i=$lista->count();
                    break;
                }
            }
        }

        $keyes=$cooperativas->keys();

        for ($int=0 ; $int<$keyes->count();$int++ ){


    //premisas y condicion  material
                        $pre = Premisas::where('id_ano', '=', $keyes[$int])->where('id_cooperativa', '=', $cooperativas[$keyes[$int]]->id)->firstOrFail();


                        $cond_mat = Cond_material_coop::where('id_premisas', '=', $pre->id)->firstOrFail();

                        $coleccion_coop['pre' .$cooperativas[$keyes[$int]]->id] = $pre;
                        $coleccion_coop['cond_mat' . $cooperativas[$keyes[$int]]->id] = $cond_mat;


                        //enviando los programas para ese ano y cooperativa
                        $progs = Programa::where('id_ano', '=', $keyes[$int])->where('id_cooperativa', '=', $cooperativas[$keyes[$int]]->id)->get();
                        $ano = $progs[0]->Ano;

                        $coleccion_coop['progs' . $cooperativas[$keyes[$int]]->id] = $progs;
                        $coleccion_coop['ano' . $cooperativas[$keyes[$int]]->id] = $ano;

                        // dd($ano);

                        //esta variable es para saber si todos programas de este ano tienen metas , pq ni no la entonces no se reliza el balance
                        $si_tiene_metas = true;
                        $nomb_prog = '';


                        //calculando el activo social
                        $act_social = 0;
                        $total_NB = 0;
                        $uni_fis_real = $num_ben_real = 0;
                        $sum_und_fis_real = $sum_num_ben_real = 0;

                        foreach ($progs as $prog) {
                            if ($prog->Metas->count() == 0) {
                                $si_tiene_metas = false;
                                $nomb_prog = $prog->nomb_prog;
                            }

                            $total_NB = $prog->Metas->sum('beneficiarios_plan') + $total_NB;


                        }
                        $coleccion_coop['nomb_prog' . $cooperativas[$keyes[$int]]->id] = $nomb_prog;
                        $coleccion_coop['total_NB' . $cooperativas[$keyes[$int]]->id] = $total_NB;
                        $coleccion_coop['si_tiene_metas' . $cooperativas[$keyes[$int]]->id] = $si_tiene_metas;
                        $coleccion_coop['sum_und_fis_real' . $cooperativas[$keyes[$int]]->id] = $sum_und_fis_real;
                        $coleccion_coop['sum_num_ben_real' . $cooperativas[$keyes[$int]]->id] = $sum_num_ben_real;

    /// dd($user->Cooperativa);


        }
           // dd($coleccion_coop);
        return view('GenerarBalanceTotal',[
            'coleccion'=>$coleccion_coop,
            'cooperativas'=>$cooperativas,
            'id'=>$id



        ]);

    }


    public function show_act($id,$id_coop=null){

        $id_cooperativa=0;

        $user= Auth::user();

        if($user->Rol->nomb_rol=='Gestor Social' || $user->Rol->nomb_rol=='Usuario' ) {

            $id_cooperativa=$user->id_coop;
        }elseif ($user->Rol->nomb_rol=='Usuario Federativo')
        {
            $id_cooperativa=$id_coop;

        }


        //premisas y condicion  material
        $pre=Premisas::where('id_ano','=',$id)->where('id_cooperativa','=',$id_cooperativa)->firstOrFail();
        $cond_mat=Cond_material_coop::where('id_premisas','=',$pre->id)->firstOrFail();



        //generar balance por actividades

        //enviando los programas para ese ano
        $progs=Programa::where('id_ano','=',$id )->where('id_cooperativa','=',$id_cooperativa)->get();
        $ano=$progs[0]->Ano;
        //esta variable es para saber si todos programas de este ano tienen metas , pq ni no la entonces no se reliza el balance
        $si_tiene_metas=true;


        //calculando el activo social
         $total_NB=0;
        $nomb_prog='';
        $nomb_met='';

        foreach ($progs as $prog){
           foreach ($prog->Metas as $met) {
               if ($met->GetSeguimientos->count() == 0) {
                   $si_tiene_metas = false;
                   $nomb_prog = $prog->nomb_prog;
                   $nomb_met=$met->desc_unid_fisicas;
               }

           }


        }

        return view('GenerarBalanceAct',[
            'progs'=>$progs,
            'total_NB' => $total_NB,'ano'=>$ano,'si_tiene_metas'=>$si_tiene_metas,'nomb_prog'=>$nomb_prog,'nomb_met'=>$nomb_met,'premisa'=>$pre,
            'cond_mat'=>$cond_mat,'nomb_coop'=> $user->Cooperativa
            /*'cantAsoc'=>$cantAsoc,'incBaj'=>$incBaj, 'nivEscAsoc'=>$nivEscAsoc, 'nivEscEmp'=>$nivEscEmp,'est_civil'=>$est_civil,'comp_edad_asoc'=>$comp_edad_asoc,
            'tiempo_afili'=>$tiempo_afili*/
        ]);

    }

    public function show_actseg($id,$id_coop=null){

        $id_cooperativa=0;

        $user= Auth::user();

        if($user->Rol->nomb_rol=='Gestor Social' || $user->Rol->nomb_rol=='Usuario' ) {

            $id_cooperativa=$user->id_coop;
        }elseif ($user->Rol->nomb_rol=='Usuario Federativo')
        {
            $id_cooperativa=$id_coop;

        }


        //premisas y condicion  material
        $pre=Premisas::where('id_ano','=',$id)->where('id_cooperativa','=',$id_cooperativa)->firstOrFail();
        $cond_mat=Cond_material_coop::where('id_premisas','=',$pre->id)->firstOrFail();



        //generar balance por actividades

        //enviando los programas para ese ano
        $progs=Programa::where('id_ano','=',$id )->where('id_cooperativa','=',$id_cooperativa)->get();
        $ano=$progs[0]->Ano;
        //esta variable es para saber si todos programas de este ano tienen metas , pq ni no la entonces no se reliza el balance
        $si_tiene_metas=true;


        //calculando el activo social
        $total_NB=0;
        $nomb_prog='';
        $nomb_met='';

        foreach ($progs as $prog){
            foreach ($prog->Metas as $met) {
                if ($met->GetSeguimientos->count() == 0) {
                    $si_tiene_metas = false;
                    $nomb_prog = $prog->nomb_prog;
                    $nomb_met=$met->desc_unid_fisicas;
                }

            }


        }
   

        return view('GenerarBalanceActSeg',[
            'progs'=>$progs,
            'total_NB' => $total_NB,'ano'=>$ano,'si_tiene_metas'=>$si_tiene_metas,'nomb_prog'=>$nomb_prog,'nomb_met'=>$nomb_met,'premisa'=>$pre,
            'cond_mat'=>$cond_mat,'nomb_coop'=> $user->Cooperativa
            
        ]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function pdf($id,$id_coop=null,$ind=null)
    {
        $id_cooperativa=0;
        $cooperativa_actual=new Cooperativa();
        $pdf=null;

        $user= Auth::user();

        if($user->Rol->nomb_rol=='Gestor Social' || $user->Rol->nomb_rol=='Usuario' ) {

            $id_cooperativa=$user->id_coop;
            $cooperativa_actual=$user->Cooperativa;
            $año = Ano::find($id);

        }
        elseif ($user->Rol->nomb_rol=='Usuario Federativo')
        {
            $id_cooperativa=$id_coop;
            $cooperativa_actual=Cooperativa::find($id_cooperativa);
            $año = Ano::find($id);
        }

        if($ind!=null) {

            //indicadores
            $total=0;

            ////////////////////////////////////////////////Membressiaa

            $cantAsoc = Cant_Asociados::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            if($cantAsoc!=null)
                $total = $cantAsoc->mujeres + $cantAsoc->hombres;

            $incBaj = Incorporaciones_Bajas::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            // $nivEscAsoc = Nivel_Esc_Asociados::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();
            $nivEscEmp = Nivel_Esc_Empleados::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $est_civil = estadocivilasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $comp_edad_asoc = compporedadesasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $tiempo_afili = tiempoafilasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();

            $cat_ocup_asoc = categoriaocupasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '=', $id)->first();


            $ret_asoc = retiroasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $rot_asoc = rotacionasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $soli_afili_asoc = solicafiliasoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $emp = CantEmpleado::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();

            //Buscando annos anteriores por cada caract


            $cantAsoc_ant = Cant_Asociados::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();


            $incBaj_ant = Incorporaciones_Bajas::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            // $nivEscAsoc_ant = Nivel_Esc_Asociados::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano','desc')->first();
            $nivEscEmp_ant = Nivel_Esc_Empleados::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $est_civil_ant = estadocivilasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $comp_edad_asoc_ant = compporedadesasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $tiempo_afili_ant = tiempoafilasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

            $cat_ocup_asoc_ant = categoriaocupasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

//dd($cat_ocup_asoc_ant);

            $ret_asoc_ant = retiroasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $rot_asoc_ant = rotacionasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $soli_afili_asoc_ant = solicafiliasoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $emp_ant = CantEmpleado::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

////////////////////////////////////////////////////////////Control democraticco de los miembros
            $totalcd = $total_ant = 0;
            $compAsam = Comportamiento_Asamb_Asoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            if($compAsam!=null)
                $totalcd = $compAsam->convocadas + $compAsam->efectuadas + $compAsam->delegadas;

            $est_cump_asam = EstadoCumpAsamGenAsoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $part_asm_gen = PartAsamGenAsoc::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $equi_gen_niv_dir = EquiGenNivDir::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();


            //$compReu = Comportamiento_Reuniones_Dir::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->firstOrFail();

            //Buscando annos anteriores por cada caract

            $compAsam_ant = Comportamiento_Asamb_Asoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $est_cump_asam_ant = EstadoCumpAsamGenAsoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $part_asm_gen_ant = PartAsamGenAsoc::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $equi_gen_niv_dir_ant = EquiGenNivDir::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

            $total_ant=0;
            if ($compAsam_ant != null)
                $total_ant = $compAsam_ant->convocadas + $compAsam_ant->efectuadas + $compAsam_ant->delegadas;


////////////////////////////////////distribucion de excedente
            $total_utl = $total_ant_utl = 0;
            $distribucion_utilidades = Distribucion_Utilidades::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            if ($distribucion_utilidades != null)
                $total_utl = $distribucion_utilidades->excedente + $distribucion_utilidades->capitalizar_coop + $distribucion_utilidades->distribucion_socios + $distribucion_utilidades->reservas + $distribucion_utilidades->fondo_sociales + $distribucion_utilidades->capital_per;

            $distribucion_utilidades_ant = Distribucion_Utilidades::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            if ($distribucion_utilidades_ant != null)
                $total_ant_utl = $distribucion_utilidades_ant->excedente + $distribucion_utilidades_ant->capitalizar_coop + $distribucion_utilidades_ant->distribucion_socios + $distribucion_utilidades_ant->reservas + $distribucion_utilidades_ant->fondo_sociales + $distribucion_utilidades_ant->capital_per;


/////////////////////////AAUTONOMIA E INDEPENDENCIA
            $total_autind = $total_ant_autind = 0;
            $autindp = AutonIndep::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            if ($autindp != null)
                $total_autind = $autindp->capital_prop + $autindp->capital_ext + $autindp->acu_cump_cap_prop + $autindp->acu_cump_cap_ext + $autindp->acu_cump_ini_prop + $autindp->acu_cump_inj_ext;

            $autindp_ant = AutonIndep::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

            if ($autindp_ant != null)
                $total_ant_autind = $autindp_ant->capital_prop + $autindp_ant->capital_ext + $autindp_ant->acu_cump_cap_prop + $autindp_ant->acu_cump_cap_ext + $autindp_ant->acu_cump_ini_prop + $autindp_ant->acu_cump_inj_ext;


///////////////////////////educacion formacion e informacio
            $educ_form_inf = EduForInf::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $educ_form_inf_ant = EduForInf::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();


/////////////////////////////////////////////Cooperacion entre cooperativas
            $opefin = OpeFinCoop::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $intgra = IntegrCoop::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();


            $opefin_ant = OpeFinCoop::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();
            $intgra_ant = OpeFinCoop::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();

//////////////////////////////////////////////////intetres por la comunidad
            $intcom = Comunidad::where('id_ano', '=', $id)->where('id_cooperativa', '=', $id_cooperativa)->first();
            $intcom_ant = Comunidad::where('id_cooperativa', '=', $id_cooperativa)->where('id_ano', '<', $id)->orderBy('id_ano', 'desc')->first();


        }
        else
        {

        }


        //premisas y condicion  material
        $pre=Premisas::where('id_ano','=',$id)->where('id_cooperativa','=',$id_cooperativa)->firstOrFail();
        $cond_mat=Cond_material_coop::where('id_premisas','=',$pre->id)->firstOrFail();




        //enviando los programas para ese ano y cooperativa
        $progs=Programa::where('id_ano','=',$id )->where('id_cooperativa','=',$id_cooperativa)->get();
        $ano=$progs[0]->Ano;

        // dd($ano);

        //esta variable es para saber si todos programas de este ano tienen metas , pq ni no la entonces no se reliza el balance
        $si_tiene_metas=true;
        $nomb_prog='';


        //calculando el activo social
        $act_social=0;
        $total_NB=0;
        $uni_fis_real=$num_ben_real=0;
        $sum_und_fis_real=$sum_num_ben_real=0;

        foreach ($progs as $prog){
            if( $prog->Metas->count()==0)
            {
                $si_tiene_metas=false;
                $nomb_prog=$prog->nomb_prog;
            }

            $total_NB= $prog->Metas->sum('beneficiarios_plan')+$total_NB;


        }
        /// dd($user->Cooperativa);
        ///
        if($ind!=null) {
            $pdf = PDF::loadView('pdf.GenerarBalance', [
                'progs' => $progs,
                'total_NB' => $total_NB, 'sum_und_fis_real' => $sum_und_fis_real,
                'sum_num_ben_real' => $sum_num_ben_real, 'si_tiene_metas' => $si_tiene_metas, 'nomb_prog' => $nomb_prog, 'ano' => $ano, 'premisa' => $pre,
                'cond_mat' => $cond_mat, 'nomb_coop' => $cooperativa_actual,

                //membresia
                'ano_memb' => $año, 'total' => $total, 'cantAsoc' => $cantAsoc,
                'incBaj' => $incBaj, 'nivEscEmp' => $nivEscEmp, 'est_civil' => $est_civil, 'comp_edad_asoc' => $comp_edad_asoc,
                'tiempo_afili' => $tiempo_afili, 'cat_ocup_asoc' => $cat_ocup_asoc, 'ret_asoc' => $ret_asoc, 'rot_asoc' => $rot_asoc, 'soli_afili_asoc' => $soli_afili_asoc, 'emp' => $emp
                , 'cantAsoc_ant' => $cantAsoc_ant, 'incBaj_ant' => $incBaj_ant, 'nivEscEmp_ant' => $nivEscEmp_ant, 'est_civil_ant' => $est_civil_ant,
                'comp_edad_asoc_ant' => $comp_edad_asoc_ant, 'tiempo_afili_ant' => $tiempo_afili_ant, 'cat_ocup_asoc_ant' => $cat_ocup_asoc_ant, 'ret_asoc_ant' => $ret_asoc_ant, 'rot_asoc_ant' => $rot_asoc_ant,
                'soli_afili_asoc_ant' => $soli_afili_asoc_ant, 'emp_ant' => $emp_ant,
                //Contol democratico de los miembros
                'compAsam' => $compAsam, 'compAsam_ant' => $compAsam_ant, 'totalcd' => $totalcd, 'total_ant' => $total_ant, 'est_cump_asam' => $est_cump_asam,
                'est_cump_asam_ant' => $est_cump_asam_ant, 'part_asm_gen' => $part_asm_gen, 'part_asm_gen_ant' => $part_asm_gen_ant, 'equi_gen_niv_dir' => $equi_gen_niv_dir,
                'equi_gen_niv_dir_ant' => $equi_gen_niv_dir_ant,

                //distribucion de excedentes
                'distribucion_utilidades' => $distribucion_utilidades, 'distribucion_utilidades_ant' => $distribucion_utilidades_ant, 'total_utl' => $total_utl, 'total_ant_utl' => $total_ant_utl,

                ///autonomia independencia
                'autindp' => $autindp, 'autindp_ant' => $autindp_ant, 'total_autind' => $total_autind, 'total_ant_autind' => $total_ant_autind,

                //edcuc informacion
                'educ_form_inf' => $educ_form_inf, 'educ_form_inf_ant' => $educ_form_inf_ant,

                //cooperacion entre coopeativas
                'opefin' => $opefin, 'opefin_ant' => $opefin_ant, 'intgra' => $intgra, 'intgra_ant' => $intgra_ant,

                ///Interes por la cumunidad
                'intcom' => $intcom, 'intcom_ant' => $intcom_ant,

                'indicadores' => $ind


            ]);
        }
        else
        {
            $pdf = PDF::loadView('pdf.GenerarBalance', [
                'progs' => $progs,
                'total_NB' => $total_NB, 'sum_und_fis_real' => $sum_und_fis_real,
                'sum_num_ben_real' => $sum_num_ben_real, 'si_tiene_metas' => $si_tiene_metas, 'nomb_prog' => $nomb_prog, 'ano' => $ano, 'premisa' => $pre,
                'cond_mat' => $cond_mat, 'nomb_coop' => $cooperativa_actual,

                /*//membresia
                'ano_memb' => $año, 'total' => $total, 'cantAsoc' => $cantAsoc,
                'incBaj' => $incBaj, 'nivEscEmp' => $nivEscEmp, 'est_civil' => $est_civil, 'comp_edad_asoc' => $comp_edad_asoc,
                'tiempo_afili' => $tiempo_afili, 'cat_ocup_asoc' => $cat_ocup_asoc, 'ret_asoc' => $ret_asoc, 'rot_asoc' => $rot_asoc, 'soli_afili_asoc' => $soli_afili_asoc, 'emp' => $emp
                , 'cantAsoc_ant' => $cantAsoc_ant, 'incBaj_ant' => $incBaj_ant, 'nivEscEmp_ant' => $nivEscEmp_ant, 'est_civil_ant' => $est_civil_ant,
                'comp_edad_asoc_ant' => $comp_edad_asoc_ant, 'tiempo_afili_ant' => $tiempo_afili_ant, 'cat_ocup_asoc_ant' => $cat_ocup_asoc_ant, 'ret_asoc_ant' => $ret_asoc_ant, 'rot_asoc_ant' => $rot_asoc_ant,
                'soli_afili_asoc_ant' => $soli_afili_asoc_ant, 'emp_ant' => $emp_ant,
                //Contol democratico de los miembros
                'compAsam' => $compAsam, 'compAsam_ant' => $compAsam_ant, 'totalcd' => $totalcd, 'total_ant' => $total_ant, 'est_cump_asam' => $est_cump_asam,
                'est_cump_asam_ant' => $est_cump_asam_ant, 'part_asm_gen' => $part_asm_gen, 'part_asm_gen_ant' => $part_asm_gen_ant, 'equi_gen_niv_dir' => $equi_gen_niv_dir,
                'equi_gen_niv_dir_ant' => $equi_gen_niv_dir_ant,

                //distribucion de excedentes
                'distribucion_utilidades' => $distribucion_utilidades, 'distribucion_utilidades_ant' => $distribucion_utilidades_ant, 'total_utl' => $total_utl, 'total_ant_utl' => $total_ant_utl,

                ///autonomia independencia
                'autindp' => $autindp, 'autindp_ant' => $autindp_ant, 'total_autind' => $total_autind, 'total_ant_autind' => $total_ant_autind,

                //edcuc informacion
                'educ_form_inf' => $educ_form_inf, 'educ_form_inf_ant' => $educ_form_inf_ant,

                //cooperacion entre coopeativas
                'opefin' => $opefin, 'opefin_ant' => $opefin_ant, 'intgra' => $intgra, 'intgra_ant' => $intgra_ant,

                ///Interes por la cumunidad
                'intcom' => $intcom, 'intcom_ant' => $intcom_ant,*/

                'indicadores' => $ind


            ]);
        }

       // $pdf = PDF::loadView('pdf.GenerarBalance', compact('products'));

        return $pdf->download('listado.pdf');
    }


    public function pdf_act($id,$id_coop=null){
        $pdf=null;
       // dd($id);
        /* $cantAsoc = Cant_Asociados::where('id_ano','=',$id)->firstOrFail();
         //dd($cantAsoc);
         $incBaj = Incorporaciones_Bajas::where('id_ano','=',$id)->firstOrFail();
         $nivEscAsoc = Nivel_Esc_Asociados::where('id_ano','=',$id)->firstOrFail();
         $nivEscEmp = Nivel_Esc_Empleados::where('id_ano','=',$id)->firstOrFail();
         $est_civil= estadocivilasoc::where('id_ano','=',$id)->firstOrFail();
         $comp_edad_asoc=compporedadesasoc::where('id_ano','=',$id)->firstOrFail();
         $tiempo_afili=tiempoafilasoc::where('id_ano','=',$id)->firstOrFail();*/

        $id_cooperativa=0;

        $user= Auth::user();

        if($user->Rol->nomb_rol=='Gestor Social' || $user->Rol->nomb_rol=='Usuario' ) {

            $id_cooperativa=$user->id_coop;
        }elseif ($user->Rol->nomb_rol=='Usuario Federativo')
        {
            $id_cooperativa=$id_coop;

        }


        //premisas y condicion  material
        $pre=Premisas::where('id_ano','=',$id)->where('id_cooperativa','=',$id_cooperativa)->firstOrFail();
        $cond_mat=Cond_material_coop::where('id_premisas','=',$pre->id)->firstOrFail();



        //generar balance por actividades

        //enviando los programas para ese ano
        $progs=Programa::where('id_ano','=',$id )->where('id_cooperativa','=',$id_cooperativa)->get();

        $ano=$progs[0]->Ano;
        //esta variable es para saber si todos programas de este ano tienen metas , pq ni no la entonces no se reliza el balance
        $si_tiene_metas=true;


        //calculando el activo social
        $total_NB=0;
        $nomb_prog='';
        $nomb_met='';

        foreach ($progs as $prog){
            foreach ($prog->Metas as $met) {
                if ($met->GetSeguimientos->count() == 0) {
                    $si_tiene_metas = false;
                    $nomb_prog = $prog->nomb_prog;
                    $nomb_met=$met->desc_unid_fisicas;
                }

            }


        }

        $pdf = PDF::loadView('pdf.GenerarBalanceAct',[
            'progs'=>$progs,
            'total_NB' => $total_NB,'ano'=>$ano,'si_tiene_metas'=>$si_tiene_metas,'nomb_prog'=>$nomb_prog,'nomb_met'=>$nomb_met,'premisa'=>$pre,
            'cond_mat'=>$cond_mat,'nomb_coop'=> $user->Cooperativa

        ]);
        return $pdf->download('balance_act.pdf');

    }

    public function pdf_total($id_ano){
    $pdf=null;
    $cooper=Cooperativa::all();
    $id=$id_ano;

    $coleccion_coop=collect();
    $cooperativas=collect();
    foreach ($cooper   as $key => $cooperativa ){

        $lista=$cooperativa->Programas()->get();

        foreach ($lista as $i => $item)
        {
            $anual=Ano::find($id);

            if($item->Ano->ano==$anual->ano) {

                $cooperativas->put($item->Ano->id,$cooperativa);
                //dd($cooperativas);
                //return 0;
                // $i=$lista->count();
                break;
            }
        }
    }

    $keyes=$cooperativas->keys();
    //  dd($cooperativas);
    /*  $anual=Ano::find($id);///de este id te sirve el ano
      $todos_id=Ano::where('ano','=',$anual->ano)->get();*/

    for ($int=0 ; $int<$keyes->count();$int++ ){


        //premisas y condicion  material
        $pre = Premisas::where('id_ano', '=', $keyes[$int])->where('id_cooperativa', '=', $cooperativas[$keyes[$int]]->id)->firstOrFail();


        $cond_mat = Cond_material_coop::where('id_premisas', '=', $pre->id)->firstOrFail();

        $coleccion_coop['pre' .$cooperativas[$keyes[$int]]->id] = $pre;
        $coleccion_coop['cond_mat' . $cooperativas[$keyes[$int]]->id] = $cond_mat;


        //enviando los programas para ese ano y cooperativa
        $progs = Programa::where('id_ano', '=', $keyes[$int])->where('id_cooperativa', '=', $cooperativas[$keyes[$int]]->id)->get();
        $ano = $progs[0]->Ano;

        $coleccion_coop['progs' . $cooperativas[$keyes[$int]]->id] = $progs;
        $coleccion_coop['ano' . $cooperativas[$keyes[$int]]->id] = $ano;

        // dd($ano);

        //esta variable es para saber si todos programas de este ano tienen metas , pq ni no la entonces no se reliza el balance
        $si_tiene_metas = true;
        $nomb_prog = '';


        //calculando el activo social
        $act_social = 0;
        $total_NB = 0;
        $uni_fis_real = $num_ben_real = 0;
        $sum_und_fis_real = $sum_num_ben_real = 0;

        foreach ($progs as $prog) {
            if ($prog->Metas->count() == 0) {
                $si_tiene_metas = false;
                $nomb_prog = $prog->nomb_prog;
            }

            $total_NB = $prog->Metas->sum('beneficiarios_plan') + $total_NB;


        }
        $coleccion_coop['nomb_prog' . $cooperativas[$keyes[$int]]->id] = $nomb_prog;
        $coleccion_coop['total_NB' . $cooperativas[$keyes[$int]]->id] = $total_NB;
        $coleccion_coop['si_tiene_metas' . $cooperativas[$keyes[$int]]->id] = $si_tiene_metas;
        $coleccion_coop['sum_und_fis_real' . $cooperativas[$keyes[$int]]->id] = $sum_und_fis_real;
        $coleccion_coop['sum_num_ben_real' . $cooperativas[$keyes[$int]]->id] = $sum_num_ben_real;

        /// dd($user->Cooperativa);


    }

    $pdf = PDF::loadView('pdf.GenerarBalanceTotal',[
        'coleccion'=>$coleccion_coop,
        'cooperativas'=>$cooperativas


        /*'progs'=>$progs,
        'total_NB' => $total_NB,'sum_und_fis_real'=>$sum_und_fis_real,
        'sum_num_ben_real'=>$sum_num_ben_real,'si_tiene_metas'=>$si_tiene_metas,'nomb_prog'=>$nomb_prog,'ano'=>$ano,
        'premisa'=>$pre,
        'cond_mat'=>$cond_mat,*/
    ]);
    return $pdf->download('balanceTotal.pdf');

}


    public function pdf_actseg($id,$id_coop=null){
        $pdf=null;
        // dd($id);
        /* $cantAsoc = Cant_Asociados::where('id_ano','=',$id)->firstOrFail();
         //dd($cantAsoc);
         $incBaj = Incorporaciones_Bajas::where('id_ano','=',$id)->firstOrFail();
         $nivEscAsoc = Nivel_Esc_Asociados::where('id_ano','=',$id)->firstOrFail();
         $nivEscEmp = Nivel_Esc_Empleados::where('id_ano','=',$id)->firstOrFail();
         $est_civil= estadocivilasoc::where('id_ano','=',$id)->firstOrFail();
         $comp_edad_asoc=compporedadesasoc::where('id_ano','=',$id)->firstOrFail();
         $tiempo_afili=tiempoafilasoc::where('id_ano','=',$id)->firstOrFail();*/

        $id_cooperativa=0;

        $user= Auth::user();

        if($user->Rol->nomb_rol=='Gestor Social' || $user->Rol->nomb_rol=='Usuario' ) {

            $id_cooperativa=$user->id_coop;
        }elseif ($user->Rol->nomb_rol=='Usuario Federativo')
        {
            $id_cooperativa=$id_coop;

        }


        //premisas y condicion  material
        $pre=Premisas::where('id_ano','=',$id)->where('id_cooperativa','=',$id_cooperativa)->firstOrFail();
        $cond_mat=Cond_material_coop::where('id_premisas','=',$pre->id)->firstOrFail();



        //generar balance por actividades

        //enviando los programas para ese ano
        $progs=Programa::where('id_ano','=',$id )->where('id_cooperativa','=',$id_cooperativa)->get();

        $ano=$progs[0]->Ano;
        //esta variable es para saber si todos programas de este ano tienen metas , pq ni no la entonces no se reliza el balance
        $si_tiene_metas=true;


        //calculando el activo social
        $total_NB=0;
        $nomb_prog='';
        $nomb_met='';

        foreach ($progs as $prog){
            foreach ($prog->Metas as $met) {
                if ($met->GetSeguimientos->count() == 0) {
                    $si_tiene_metas = false;
                    $nomb_prog = $prog->nomb_prog;
                    $nomb_met=$met->desc_unid_fisicas;
                }

            }


        }

        $pdf = PDF::loadView('pdf.GenerarBalanceActSeg',[
            'progs'=>$progs,
            'total_NB' => $total_NB,'ano'=>$ano,'si_tiene_metas'=>$si_tiene_metas,'nomb_prog'=>$nomb_prog,'nomb_met'=>$nomb_met,'premisa'=>$pre,
            'cond_mat'=>$cond_mat,'nomb_coop'=> $user->Cooperativa

        ]);
        return $pdf->download('balance_act.pdf');

    }



}



