<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use BasoCoop\Http\Requests\Create_Encuestastatic_request;
use BasoCoop\Encuestatic;

use Illuminate\Support\Facades\Auth;

class EncuestaticController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // dd($request);
        $id_cooperativa=$request->input('coop');

                        return view('encuestastatic',[
            'encuesta'=>'Si',
                      'id_cooperativa'=>$id_cooperativa
        ]);

    }
    public function index2()
    {
        return view('encuestastatic2');
    }
    public function tabular_encuesta(Request $request)
    {

        $this->validate($request,[
            'fecha' => ['required','date'],
            'fechafin' => ['required','date'],

        ],[
            'fecha.required' => 'La fecha es requerida',
            'fecha.date'=> 'La fecha no es válida',
            'fechafin.required' => 'La fecha es requerida',
            'fechafin.date'=> 'La fecha no es válida',

        ]);

        $fecha=$request->input('fecha');
        $fechafin=$request->input('fecha');


        if (Auth::check()) {
            $user = Auth::user();
            $encuestas = Encuestatic::where('id_cooperativa','=',$user->id_coop)->where('created_at','>=',$fecha)->where('created_at','<=',$fechafin)->get();
            $id_cooperativa=$user->id_coop;

            if ($encuestas->count()) {
                //tipo de encuestados
                $cant_asoc=0;
                $cant_emp=0;
                $cant_direct=0;
                $cant_noasoc=0;
                //segun sexo de encuestados
                $cantidad = 0;
                $cant_mujeres = 0;
                $cantidad_hombres = 0;
                //rangos de edad
                $rang_18_25 = $rang_26_35 = $rang_36_45 = $rang_46_55 = $rang_56_60= $rang_61_70 = $rang_70mas = 0;



                //nivle de escolaridad
                $ninguno = $basico = $medio = $superior = $postgrado = 0;
                //necesidades en las viviendas
                $conttotal = $reptotal = $repligera = $repmedia = $total_casas_prob = 0;
                //cursos de caapacitacion
                $capa_emprend=0;
                $capa_filos_coop=0;
                $capa_edu_financ=0;
                $capa_edu_ambient=0;
                $capa_intel_emoc=0;
                $capa_fundam_legal=0;
                $capa_adult_mayor=0;
                $capa_oficio=0;
                //Acerca de los autos
                $auto = $repauto =  0;
                //cappos d si o no
                $necesida_viv_si = $necesida_viv_no = 0;
                //seguros
                $seguro_vehic_si=$seguro_vehic_no  = $seguro_vida_si = $seguro_vida_no = 0;
                //
                //convivencia con personas enfermas
                $per_enfermas_si = $per_enfermas_no = 0;
                //recreacion en la coop
                $buena = $mala = $regular = 0;
                //ninnos
                $ninos_si = $ninos_no = $ninos_ayu_si = $ninos_ayu_no = 0;
                //servicios funerarios
                $serv_funerarios_si = $serv_funerarios_no = $ayuda_serv_fun_si = $ayuda_serv_fun_no = 0;



                //detalles de oficios
                $capa_ofic_cual='';

                //varibles opiniones de cursos
                $curos_op = '';

                //actividades socioculturales
                $act_soc_fiest_nino=$act_soc_dia_pad=$act_soc_dia_mad=$act_soc_dia_int_muj=$act_soc_adult_mayor=$act_soc_enc_asoc=$act_soc_festiv=$act_soc_festiv=0;


                //detalles de los oficios
                $act_soc_festiv_cuales='';

                //acividades sociocultarales
                $actividades = '';

                //motivos por los que no segguro
                $inseguro = '';
                $seguro_vehic_neg='';
                //tipo dee enfermedad
                $tipo_enferm = '';
                //apoyo
                $apoyo = '';
                //ayuda a los ninos
                $ayuda_ninos_si = '';
                //servicio funebre
                $arg_serv_fun = '';
                //necesidados sociales
               /* $neces_sociales = '';
                $accione_necesid_sociales = '';*/
                $part_act_sociales = '';
                //ninos y jovenes
                $act_coop_jov_nin = '';
                //otros servicios e ideas


                //tenencia de vivienda
                $tipo_viv_alq = $tipo_viv_pro = $tipo_viv_noposee =$tipo_viv_financ= $tipo_viv_otra= 0;



                $linea_cred_si = $linea_cred_no = 0;
                //act desarrollo medio ambiental
                $otras_act_des_med_am='';

                //refoestacion
                $act_reforest_si=$act_reforest_no=0;
                $act_reforest_donde='';

                //cajeros automaticos
                $caj_aut_si = $caj_aut_no = 0;
                $nec_caj_aut_si=$nec_caj_aut_no=0;

                foreach ($encuestas as $key => $enc) {
                    $cantidad = $cantidad + 1;
                    // dd($enc);
                    if($enc->tipo == 'A'){
                        $cant_asoc++;
                    }elseif($enc->tipo=='E')
                    {
                        $cant_emp++;
                    }elseif ($enc->tipo=='D')
                    {
                        $cant_direct++;
                    }
                    elseif ($enc->tipo=='N'){
                        $cant_noasoc++;
                    }

                    //dd($enc->sexo);
                    if ($enc->sexo == 'M') {
                        $cantidad_hombres = $cantidad_hombres + 1;

                    } elseif ($enc->sexo == 'F') {

                        $cant_mujeres = $cant_mujeres + 1;
                    }
                    //rango de edad
                    if ($enc->rango == '18-25') {
                        $rang_18_25++;
                    } elseif ($enc->rango == '26-35') {
                        $rang_26_35++;
                    } elseif ($enc->rango == '36-45') {
                        $rang_36_45++;
                    } elseif ($enc->rango == '46-55') {
                        $rang_46_55++;
                    } elseif ($enc->rango == '56-60') {
                        $rang_56_60++;
                    } elseif($enc->rango=='61-70') {
                        $rang_61_70++;
                    }elseif($enc->rango=='70mas'){
                        $rang_70mas++;

                    }
                    //escolaidad
                    if ($enc->nivel_esc == 'Ninguno') {
                        $ninguno++;
                    } elseif ($enc->nivel_esc == 'Basico') {
                        $basico++;
                    } elseif ($enc->nivel_esc == 'Medio') {
                        $medio++;
                    } elseif ($enc->nivel_esc == 'Superior') {
                        $superior++;
                    } elseif ($enc->nivel_esc == 'Postgrado') {
                        $postgrado++;
                    }
                    //necesidad vivienda

                    // 'Construccion total','Reparacion Total','Reparacion Media','Reparacion ligera'

                    if ($enc->vivienda_necesidad == 'Construccion Total') {
                        $conttotal++;
                        $total_casas_prob++;
                    } elseif ($enc->vivienda_necesidad == 'Reparacion Total') {
                        $reptotal++;
                        $total_casas_prob++;
                    } elseif ($enc->vivienda_necesidad == 'Reparacion Media') {
                        $repmedia++;
                        $total_casas_prob++;
                    } elseif($enc->vivienda_necesidad == 'Reparacion Ligera') {
                        $repligera++;
                        $total_casas_prob++;
                    }
                    //tenencia de tipo de vivienda
                    if ($enc->tipo_viv == 'Propia') {
                        $tipo_viv_pro++;
                    }

                    if ($enc->tipo_viv == 'Alquilada') {
                        $tipo_viv_alq++;
                    }
                    if ($enc->tipo_viv == 'Financiada') {
                        $tipo_viv_financ++;
                    }
                    if ($enc->tipo_viv == 'Otra') {
                        $tipo_viv_otra++;
                    }

                    //cursos de capacitacion+
                    if ($enc->capa_emprend == 'S') {
                        $capa_emprend++;
                    }

                    if ($enc->capa_filos_coop == 'S') {
                        $capa_filos_coop++;

                    }

                    if ($enc->capa_edu_financ == 'S') {
                        $capa_edu_financ++;

                    }
                    if ($enc->capa_edu_ambient == 'S') {
                        $capa_edu_ambient++;

                    }
                    if ($enc->capa_intel_emoc == 'S') {
                        $capa_intel_emoc++;

                    }
                    if ($enc->capa_fundam_legal == 'S') {
                        $capa_fundam_legal++;

                    }
                    if ($enc->capa_adult_mayor == 'S') {
                        $capa_adult_mayor++;
                    }
                    if ($enc->capa_oficio == 'S') {
                        $capa_oficio++;
                    }


                    if ($enc->auto == 'S') {
                        $auto++;
                    }
                    if ($enc->rep_auto == 'S') {
                        $repauto++;
                    }


                    //recreacion


                    if ($enc->recreacion == 'Buena') {
                        $buena++;
                    }
                    if ($enc->recreacion == 'Mala') {
                        $mala++;
                    }
                    if ($enc->recreacion == 'Regular') {
                        $regular++;
                    }

                    //actividades socioculturales
                    if($enc->act_soc_fiest_nino=='S'){
                        $act_soc_fiest_nino++;
                    }
                    if($enc->act_soc_dia_pad=='S'){
                        $act_soc_dia_pad++;
                    }
                    if($enc->act_soc_dia_mad=='S'){
                        $act_soc_dia_mad++;
                    }
                   if($enc->act_soc_dia_int_muj=='S'){
                        $act_soc_dia_int_muj++;
                    }
                    if($enc->act_soc_adult_mayor=='S'){
                        $act_soc_adult_mayor++;
                    }
                    if($enc->act_soc_enc_asoc=='S'){
                        $act_soc_enc_asoc++;
                    }
                    if($enc->act_soc_festiv=='S'){
                        $act_soc_festiv++;
                    }




                    //campos de si o no

                    // viviendas
                    if ($enc->neces_vivienda == 'S') {
                        $necesida_viv_si++;
                    }
                    if ($enc->neces_vivienda == 'N') {
                        $necesida_viv_no++;
                    }
                    //seguro

                    if ($enc->seguro_vehic == 'S') {
                        $seguro_vehic_si++;
                    }
                    if ($enc->seguro_vehic == 'N') {
                        $seguro_vehic_no++;
                    }
                    if ($enc->seguro_vida == 'S') {
                        $seguro_vida_si++;
                    }
                    if ($enc->seguro_vida == 'N') {
                        $seguro_vida_no++;
                    }

                    //convivencia con personas enfermas
                    if ($enc->pers_enferm == 'S') {
                        $per_enfermas_si++;
                    }
                    if ($enc->pers_enferm == 'N') {
                        $per_enfermas_no++;
                    }

                    //ninnos
                    if ($enc->ninos == 'S') {
                        $ninos_si++;
                    } elseif ($enc->ninos == 'N') {
                        $ninos_no++;
                    }
                    if ($enc->ayuda_ninos == 'S') {
                        $ninos_ayu_si++;
                    }
                    elseif($enc->ayuda_ninos == 'N') {
                        $ninos_ayu_no++;
                    }

                    //servicios funebres

                    if ($enc->serv_funerarios == 'S') {
                        $serv_funerarios_si++;
                    }
                    if ($enc->serv_funerarios == 'N') {
                        $serv_funerarios_no++;
                    }
                    if ($enc->ayuda_serv_fun == 'S') {
                        $ayuda_serv_fun_si++;
                    }
                    if ($enc->ayuda_serv_fun == 'N') {
                        $ayuda_serv_fun_no++;
                    }



                    if ($enc->linea_cred == 'S') {
                        $linea_cred_si++;
                    }
                    elseif($enc->linea_cred == 'N') {
                        $linea_cred_no++;
                    }
                    if ($enc->act_reforest == 'S') {
                        $act_reforest_si++;
                    }
                    elseif($enc->act_reforest == 'N') {
                        $act_reforest_no++;
                    }
                    if ($enc->caj_aut == 'S') {
                        $caj_aut_si++;
                    }
                    elseif($enc->caj_aut == 'N') {
                        $caj_aut_no++;
                    }
                    if ($enc->nec_caj_aut == 'S') {
                        $nec_caj_aut_si++;
                    }
                    elseif($enc->nec_caj_aut == 'N') {
                        $nec_caj_aut_no++;
                    }


                    //revisar esto paa esto campos vacios
                    $curos_op = $enc->otroscursos . ',' . $curos_op;
                    $capa_ofic_cual=$enc->capa_ofic_cual . ','. $capa_ofic_cual;
                    $act_soc_festiv_cuales=$enc->act_soc_festiv_cuales . ',' . $act_soc_festiv_cuales;
                    $actividades = $enc->actividades . ',' . $actividades;
                    $inseguro = $enc->seguro_salud_no . ',' . $enc->seguro_vida_no . ',' . $inseguro;
                    $seguro_vehic_neg=$enc->$seguro_vehic_no.','.$enc->$seguro_vehic_neg;
                    $tipo_enferm = $enc->tipo_enferm . ',' . $tipo_enferm;
                    $apoyo = $enc->neces_apoyo . ',' . $apoyo;
                    $ayuda_ninos_si = $enc->ayuda_ninos_si . ',' . $ayuda_ninos_si;
                    $arg_serv_fun = $enc->arg_serv_fun . ',' . $arg_serv_fun;
                    $otras_act_des_med_am = $enc->otras_act_des_med_am . ',' . $otras_act_des_med_am;
                    $act_reforest_donde =$enc->act_reforest_donde .','.$act_reforest_donde;
                   /* $neces_sociales = $enc->neces_sociales . ',' . $neces_sociales;
                    $accione_necesid_sociales = $enc->accione_necesid_sociales . ',' . $accione_necesid_sociales;*/
                    $part_act_sociales = $enc->part_act_sociales . ',' . $part_act_sociales;
                    $act_coop_jov_nin = $enc->act_coop_jov_nin . ',' . $act_coop_jov_nin;



                }


                /*'capa_Economia_solidaria'=>$capa_Economia_solidaria,'capa_desarrollo_com'=>$capa_desarrollo_com,*/


                return view('EncuesTabulada', [
                    'total' => $cantidad,'cant_asoc'=>$cant_asoc,'cant_emp'=>$cant_emp,'cant_direct'=>$cant_direct,'cant_noasoc'=>$cant_noasoc, 'hombres' => $cantidad_hombres, 'mujeres' => $cant_mujeres,
                    'rang_18_25' => $rang_18_25, 'rang_26_35' => $rang_26_35, 'rang_36_45' => $rang_36_45,'rang_46_55' => $rang_46_55, 'rang_56_60' => $rang_56_60,
                    'rang_61_70' => $rang_61_70,'rang_70mas' => $rang_70mas, 'ninguno' => $ninguno, 'basico' => $basico, 'medio' => $medio,'superior'=>$superior,'postgrado'=>$postgrado,
                    'tipo_viv_financ' => $tipo_viv_financ,'tipo_viv_otra'=>$tipo_viv_otra, 'tipo_viv_alq' => $tipo_viv_alq, 'tipo_viv_pro' => $tipo_viv_pro,'reptotal' => $reptotal,
                    'repmedia' => $repmedia, 'repligera' => $repligera, 'conttotal' => $conttotal,'total_casas_prob' => $total_casas_prob, 'capa_emprend' => $capa_emprend,
                    'capa_filos_coop' => $capa_filos_coop, 'capa_edu_financ' => $capa_edu_financ, 'capa_edu_ambient' => $capa_edu_ambient, 'capa_intel_emoc' => $capa_intel_emoc,
                    'capa_fundam_legal' => $capa_fundam_legal, 'capa_adult_mayor' => $capa_adult_mayor,'capa_oficio'=>$capa_oficio,'capa_ofic_cual'=>$capa_ofic_cual,'auto' => $auto,
                    'repauto' => $repauto, 'buena' => $buena, 'mala' => $mala, 'regular' => $regular,'act_soc_fiest_nino'=>$act_soc_fiest_nino,'act_soc_dia_pad'=>$act_soc_dia_pad,
                    'act_soc_dia_mad'=>$act_soc_dia_mad,'act_soc_dia_int_muj'=>$act_soc_dia_int_muj,'act_soc_adult_mayor'=>$act_soc_adult_mayor,'act_soc_enc_asoc'=>$act_soc_enc_asoc,
                    'act_soc_festiv'=>$act_soc_festiv,'act_soc_festiv_cuales'=>$act_soc_festiv_cuales,'actividades' => $actividades,'necesida_viv_no' => $necesida_viv_no, 'necesida_viv_si' => $necesida_viv_si,
                    'seguro_vehic_si' => $seguro_vehic_si,'seguro_vehic_no' => $seguro_vehic_no,'seguro_vehic_neg' => $seguro_vehic_neg,
                     'seguro_vida_si' => $seguro_vida_si, 'seguro_vida_no' => $seguro_vida_no, 'per_enfermas_si' => $per_enfermas_si,
                    'per_enfermas_no' => $per_enfermas_no, 'ninos_si' => $ninos_si, 'ninos_no' => $ninos_no,'ninos_ayu_si' => $ninos_ayu_si, 'ninos_ayu_no' => $ninos_ayu_no,
                    'serv_funerarios_si' => $serv_funerarios_si, 'serv_funerarios_no' => $serv_funerarios_no,  'ayuda_serv_fun_si' => $ayuda_serv_fun_si, 'ayuda_serv_fun_no' => $ayuda_serv_fun_no,
                    'linea_cred_si' => $linea_cred_si, 'linea_cred_no' => $linea_cred_no, 'curos_op' => $curos_op,  'inseguro' => $inseguro, 'tipo_enferm' => $tipo_enferm,
                    'apoyo' => $apoyo, 'ayuda_ninos_si' => $ayuda_ninos_si, 'arg_serv_fun' => $arg_serv_fun,'otras_act_des_med_am'=>$otras_act_des_med_am,
                    'part_act_sociales' => $part_act_sociales, 'act_coop_jov_nin' => $act_coop_jov_nin,'act_reforest_si'=>$act_reforest_si,'act_reforest_no'=>$act_reforest_no,
                    'act_reforest_donde'=>$act_reforest_donde,'caj_aut_si'=>$caj_aut_si,'caj_aut_no'=>$caj_aut_no,'nec_caj_aut_si'=>$nec_caj_aut_si,'nec_caj_aut_no'=>$nec_caj_aut_no




                ]);
            } else {
                return view('encuestastatic', [
                    'encuesta' => 'No',
                    'id_cooperativa'=>$id_cooperativa
                ]);
            }
        }
    }

    public function tabFecha(){

        return view('encuestatabulfecha');
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
    public function store_aux(Request $request){


       // dd($this->request_aux);
        return view('encuestastatic2');

    }
    public function store(Create_Encuestastatic_request $request)
    {

       // dd($request);

       // dd($request);
        $ano=0;
        if (Auth::check()) {
            $user = Auth::user();
            $ano=date('Y');
            //dd($ano);
            $id_cooperativa=$user->id_coop;


        $capa_emprend='N';
        $capa_filos_coop='N';
        $capa_edu_financ='N';
        $capa_edu_ambient='N';
        $capa_intel_emoc='N';
        $capa_fundam_legal='N';
        $capa_adult_mayor='N';
        $capa_oficio='N';



            if($request->input('capa_emprend')=='Emprendedurismo')
            {
                $capa_emprend='S';

            }
            if ($request->input('capa_filos_coop')=='Filosofía Cooperativa'){
                $capa_filos_coop='S';
            }
            if ($request->input('capa_edu_financ')=='Educación financiera'){
                $capa_edu_financ='S';
            }
            if ($request->input('capa_edu_ambient')=='Educación ambiental'){
                $capa_edu_ambient='S';
            }
            if ($request->input('capa_intel_emoc')=='Inteligencia emocional'){
                $capa_intel_emoc='S';
            }
            if ($request->input('capa_fundam_legal')=='Fundamentos'){
                $capa_fundam_legal='S';
            }
            if ($request->input('capa_adult_mayor')=='Adulto'){
                $capa_adult_mayor='S';
            }
            if ($request->input('capa_oficio')=='Oficios'){
                $capa_oficio='S';
            }
            ///
            ///
            $act_soc_fiest_nino=$act_soc_dia_pad=$act_soc_dia_mad=$capa_oficio=$act_soc_dia_int_muj=$act_soc_dia_int_muj=$act_soc_adult_mayor=$act_soc_enc_asoc=$act_soc_festiv='N';

            if ($request->input('act_soc_fiest_nino')=='Fiesta'){
                $act_soc_fiest_nino='S';
            }
            if ($request->input('act_soc_dia_pad')=='Padre'){
                $act_soc_dia_pad='S';
            }
            if ($request->input('act_soc_dia_mad')=='Madre'){
                $act_soc_dia_mad='S';
            }
            if ($request->input('act_soc_dia_int_muj')=='Mujer'){
                $act_soc_dia_int_muj='S';
            }
            if ($request->input('act_soc_adult_mayor')=='AdultoMay'){
                $act_soc_adult_mayor='S';
            }
            if ($request->input('act_soc_enc_asoc')=='EncAsoc'){
                $act_soc_enc_asoc='S';
            } if ($request->input('act_soc_festiv')=='Festival'){
                $act_soc_festiv='S';
            }

//dd($act_soc_fiest_nino);





        /*'capa_economia_solidaria'=>$capa_Economia_solidaria,
            'capa_desarrollo_comunitario'=>$capa_desarrollo_com*/

        Encuestatic::create([
            'tipo'=>$request->input('tipo') ,'rango'=>$request->input('rango'),'sexo'=>$request->input('sexo'),'nivel_esc'=>$request->input('nivel_esc'),'cant_pers_fam'=>$request->input('cantidad'),
            'tipo_viv'=>$request->input('vivienda'),'neces_vivienda' =>$request->input('neces_vivienda'),'vivienda_necesidad'=>$request->input('vivienda_necesita'),
            'capa_emprend' => $capa_emprend,  'capa_filos_coop'=> $capa_filos_coop, 'capa_edu_financ'=>$capa_edu_financ,'capa_edu_ambient'=>$capa_edu_ambient,
            'capa_intel_emoc'=>$capa_intel_emoc,'capa_fundam_legal'=>$capa_fundam_legal,'capa_adult_mayor'=>$capa_adult_mayor,'capa_oficio'=>$capa_oficio,'capa_ofic_cual'=>$request->input('capa_ofic_cual'),
            'otroscursos' => $request->input('otroscursos'),'auto'=>$request->input('tiene_auto'),'rep_auto'=>$request->input('rep_auto'),
            'recreacion'=>$request->input('recreacion'),'act_soc_fiest_nino'=>$act_soc_fiest_nino,'act_soc_dia_pad'=>$act_soc_dia_pad,'act_soc_dia_mad'=>$act_soc_dia_mad,
            'act_soc_dia_int_muj'=>$act_soc_dia_int_muj,'act_soc_adult_mayor'=>$act_soc_adult_mayor,'act_soc_enc_asoc'=>$act_soc_enc_asoc,
            'act_soc_festiv'=>$act_soc_festiv,'act_soc_festiv_cuales'=>$request->input('act_soc_festiv_cuales'),
            'actividades'=>$request->input('actividades'),'seguro_vida'=>$request->input('segdevida'),'seguro_vida_no'=> $request->input('seguro_vida_no')
            ,'seguro_vehic'=>$request->input('seguro_vehic'),'seguro_vehic_no'=> $request->input('seguro_vehic_no'),'pers_enferm'=>$request->input('per_enfer'),
            'tipo_enferm'=>$request->input('enfer_padece'),'neces_apoyo'=>$request->input('enfer_padece_apoyo'),'ninos'=>$request->input('ninos_menores'),'ayuda_ninos'=>$request->input('ninos_cuidados'),
            'ayuda_ninos_si'=>$request->input('cuidados'),'serv_funerarios'=>$request->input('serv_funeb'),'arg_serv_fun'=>$request->input('serv_funb_argum'),'ayuda_serv_fun'=>$request->input('serv_funb_ayu'),
            'part_act_sociales'=>$request->input('part_act_sociales'),'act_coop_jov_nin'=>$request->input('act_coop_jov_nin'),'linea_cred'=>$request->input('linea_cred'),
            'otras_act_des_med_am'=>$request->input('otras_act_des_med_am'),'act_reforest'=>$request->input('act_reforest'), 'act_reforest_donde'=>$request->input('act_reforest_donde'),
            'caj_aut'=>$request->input('caj_aut'),'nec_caj_aut'=>$request->input('nec_caj_aut'),'ano' => $ano,'id_cooperativa'=>$id_cooperativa
        ]);


       return redirect('/encuestastatic');

        }
        else
        {
            $ano=date('Y');
            //dd($ano);
            $id_cooperativa=$request->input('id_cooperativa');


            $capa_emprend='N';
            $capa_filos_coop='N';
            $capa_edu_financ='N';
            $capa_edu_ambient='N';
            $capa_intel_emoc='N';
            $capa_fundam_legal='N';
            $capa_adult_mayor='N';
            $capa_oficio='N';



            if($request->input('capa_emprend')=='Emprendedurismo')
            {
                $capa_emprend='S';

            }
            if ($request->input('capa_filos_coop')=='Filosofía Cooperativa'){
                $capa_filos_coop='S';
            }
            if ($request->input('capa_edu_financ')=='Educación financiera'){
                $capa_edu_financ='S';
            }
            if ($request->input('capa_edu_ambient')=='Educación ambiental'){
                $capa_edu_ambient='S';
            }
            if ($request->input('capa_intel_emoc')=='Inteligencia emocional'){
                $capa_intel_emoc='S';
            }
            if ($request->input('capa_fundam_legal')=='Fundamentos'){
                $capa_fundam_legal='S';
            }
            if ($request->input('capa_adult_mayor')=='Adulto'){
                $capa_adult_mayor='S';
            }
            if ($request->input('capa_oficio')=='Oficios'){
                $capa_oficio='S';
            }
            ///
            ///
            $act_soc_fiest_nino=$act_soc_dia_pad=$act_soc_dia_mad=$capa_oficio=$act_soc_dia_int_muj=$act_soc_dia_int_muj=$act_soc_adult_mayor=$act_soc_enc_asoc=$act_soc_festiv='N';

            if ($request->input('act_soc_fiest_nino')=='Fiesta'){
                $act_soc_fiest_nino='S';
            }
            if ($request->input('act_soc_dia_pad')=='Padre'){
                $act_soc_dia_pad='S';
            }
            if ($request->input('act_soc_dia_mad')=='Madre'){
                $act_soc_dia_mad='S';
            }
            if ($request->input('act_soc_dia_int_muj')=='Mujer'){
                $act_soc_dia_int_muj='S';
            }
            if ($request->input('act_soc_adult_mayor')=='AdultoMay'){
                $act_soc_adult_mayor='S';
            }
            if ($request->input('act_soc_enc_asoc')=='EncAsoc'){
                $act_soc_enc_asoc='S';
            } if ($request->input('act_soc_festiv')=='Festival'){
            $act_soc_festiv='S';
        }

//dd($act_soc_fiest_nino);





            /*'capa_economia_solidaria'=>$capa_Economia_solidaria,
                'capa_desarrollo_comunitario'=>$capa_desarrollo_com*/

            Encuestatic::create([
                'tipo'=>$request->input('tipo') ,'rango'=>$request->input('rango'),'sexo'=>$request->input('sexo'),'nivel_esc'=>$request->input('nivel_esc'),'cant_pers_fam'=>$request->input('cantidad'),
                'tipo_viv'=>$request->input('vivienda'),'neces_vivienda' =>$request->input('neces_vivienda'),'vivienda_necesidad'=>$request->input('vivienda_necesita'),
                'capa_emprend' => $capa_emprend,  'capa_filos_coop'=> $capa_filos_coop, 'capa_edu_financ'=>$capa_edu_financ,'capa_edu_ambient'=>$capa_edu_ambient,
                'capa_intel_emoc'=>$capa_intel_emoc,'capa_fundam_legal'=>$capa_fundam_legal,'capa_adult_mayor'=>$capa_adult_mayor,'capa_oficio'=>$capa_oficio,'capa_ofic_cual'=>$request->input('capa_ofic_cual'),
                'otroscursos' => $request->input('otroscursos'),'auto'=>$request->input('tiene_auto'),'rep_auto'=>$request->input('rep_auto'),
                'recreacion'=>$request->input('recreacion'),'act_soc_fiest_nino'=>$act_soc_fiest_nino,'act_soc_dia_pad'=>$act_soc_dia_pad,'act_soc_dia_mad'=>$act_soc_dia_mad,
                'act_soc_dia_int_muj'=>$act_soc_dia_int_muj,'act_soc_adult_mayor'=>$act_soc_adult_mayor,'act_soc_enc_asoc'=>$act_soc_enc_asoc,
                'act_soc_festiv'=>$act_soc_festiv,'act_soc_festiv_cuales'=>$request->input('act_soc_festiv_cuales'),
                'actividades'=>$request->input('actividades'),'seguro_vida'=>$request->input('segdevida'),'seguro_vida_no'=> $request->input('seguro_vida_no')
                ,'seguro_vehic'=>$request->input('seguro_vehic'),'seguro_vehic_no'=> $request->input('seguro_vehic_no'),'pers_enferm'=>$request->input('per_enfer'),
                'tipo_enferm'=>$request->input('enfer_padece'),'neces_apoyo'=>$request->input('enfer_padece_apoyo'),'ninos'=>$request->input('ninos_menores'),'ayuda_ninos'=>$request->input('ninos_cuidados'),
                'ayuda_ninos_si'=>$request->input('cuidados'),'serv_funerarios'=>$request->input('serv_funeb'),'arg_serv_fun'=>$request->input('serv_funb_argum'),'ayuda_serv_fun'=>$request->input('serv_funb_ayu'),
                'part_act_sociales'=>$request->input('part_act_sociales'),'act_coop_jov_nin'=>$request->input('act_coop_jov_nin'),'linea_cred'=>$request->input('linea_cred'),
                'otras_act_des_med_am'=>$request->input('otras_act_des_med_am'),'act_reforest'=>$request->input('act_reforest'), 'act_reforest_donde'=>$request->input('act_reforest_donde'),
                'caj_aut'=>$request->input('caj_aut'),'nec_caj_aut'=>$request->input('nec_caj_aut'),'ano' => $ano,'id_cooperativa'=>$id_cooperativa
            ]);


            return redirect('/encuestastatic');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
