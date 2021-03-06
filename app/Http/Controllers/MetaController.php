<?php

namespace BasoCoop\Http\Controllers;
use BasoCoop\Http\Requests\Create_Metas_Request;
use BasoCoop\Metas;
use Illuminate\Http\Request;
use BasoCoop\Programa;
use BasoCoop\Seguimientometa;
use Illuminate\Support\Facades\Auth;
class MetaController extends Controller
{
    public function index($id)
    {
        if(Auth::check()) {
            $user = Auth::user();
            $privilegios = session('AA' . $user->id);
            $proy = Programa::find($id);
            $metas = $proy->Metas()->getResults();

            return view('metas', ['proy' => $proy, 'metas' => $metas,'privilegios'=>$privilegios]);
        }
    }

    public function AddMeta($id)
    {
//
        $proy = Programa::find($id);
        //voy a calcular la dispinibilidad de pesupuesto para la meta nueva
        $metas=Metas::where('id_programa','=',$id)->get();
        $presupuesto=0;
        foreach ($metas as $meta)
        {
            $presupuesto=$meta->presupuesto +$presupuesto;
        }

        return view('AddMeta',['proy' => $proy,'presup_disp'=>$proy->presupuesto_prog-$presupuesto]);
    }

    public function create(Create_Metas_Request $request)
    {


        $responsable = $request->responsable;
        $presupuesto1 = $request->presupuesto;
        $descUnidadesFisicas = $request->descUnidadesFisicas;
       // $manifNum = $request->manifNum;
        $planUF = $request->planUF;
        $beneficiosPlan = $request->beneficiosPlan;
       /* $unidFisicasReales = $request->unidFisicasReales;
        $benefReales = $request->benefReales;
        $ufSatif = $request->ufSatif;
        $benSatif = $request->benSatif;*/
        //$fechaCumplimiento = $request->fechaCumplimiento;


//
        $idProg = $request->idProg;
/*
        Metas::create(['responsable'=>$responsable,'presupuesto'=>$presupuesto1,
            'desc_unid_fisicas'=>$descUnidadesFisicas,'manif_num'=>$manifNum,'unid_fisicas_plan'=>$planUF,
            'beneficiarios_plan'=>$beneficiosPlan,'unid_fisicas_real'=>$unidFisicasReales,
            'beneficiarios_real'=>$benefReales,'unid_fisicas_satif'=>$ufSatif,'beneficiarios_satif'=>$benSatif,
            'fecha_cumplimiento'=>$fechaCumplimiento,'id_programa'=>$idProg]);*/

        Metas::create(['responsable'=>$responsable,'presupuesto'=>$presupuesto1,
            'desc_unid_fisicas'=>$descUnidadesFisicas,'unid_fisicas_plan'=>$planUF,
            'beneficiarios_plan'=>$beneficiosPlan,'id_programa'=>$idProg]);

        return redirect('Meta/'.$idProg);

    }

    public function EditMeta($id)
    {

//        $año = Ano::all();
        $metas= Metas::find($id);
        $mensaje_error='Si';

        return view('EditMeta', ['metas'=>$metas,'mensaje_error'=>$mensaje_error]);
    }

    public function edit(Create_Metas_Request $request){

        $meta = Metas::find($request-> id);

//

        //calculando el presupuesto total de los seguimientos para esta meta
        $seg_tot=Seguimientometa::where('id_meta','=',$meta->id)->sum('presup_con');
        //calculando el presupuesto disponible teniendo en cuenta el presupuesto actual del programa al que pertenece esta meta
        $presp_programa=$meta->Programa->presupuesto_prog;
        $presup_disp_metas=Metas::where('id_programa','=',$meta->Programa->id)->sum('presupuesto')- $meta->presupuesto;

        //presupeusto disponible paara asignarle a la meta que se quiere actualizar
        $presupuesto_general=$presp_programa-$presup_disp_metas;

        //presupuesto nuevo debe ser menor que el presupuesto del programa y mayorque la suma de los presupuesto del seguimiento
        if($presupuesto_general>=$request->presupuesto && $request->presupuesto >=$seg_tot) {


            $meta->responsable = $request->responsable;
            $meta->presupuesto = $request->presupuesto;
            $meta->desc_unid_fisicas = $request->descUnidadesFisicas;
           // $meta->manif_num = $request->manifNum;
            $meta->unid_fisicas_plan = $request->planUF;
            $meta->beneficiarios_plan = $request->beneficiosPlan;
            //$meta->fecha_cumplimiento = $request->fechaCumplimiento;

//        $programa->save();
            $meta->save();
            return redirect('Meta/'.$meta->id_programa);
        }
        else
        {
            $mensaje_error='';
            if($presupuesto_general < $request->presupuesto) {
                //$metas= Metas::find($id);
                // return redirect('/EditMeta/'.$meta->id);
                $mensaje_error='El presupuesto de esta meta ('. $request->presupuesto .') es mayor que el presupuesto disponible para este programa  ('. $presupuesto_general .').!!!Revise!!!';
                return view('EditMeta', ['metas' => $meta,'mensaje_error'=>$mensaje_error]);
            }
            if($request->presupuesto < $seg_tot){
                $mensaje_error='El presupuesto de esta meta ('. $request->presupuesto .') es menor que la suma del presupuesto de todos los seguimientos que pertenecen a ella ('. $seg_tot .').!!!Revise!!!';
                return view('EditMeta', ['metas' => $meta,'mensaje_error'=>$mensaje_error]);
            }
        }


    }

    public function eliminar(Request $request){

//        $programa = Programa::find($request-> eliminar);
        $meta = Metas::find($request-> eliminar);
        $id = $meta->id_programa;
        $meta->delete();
//        $programa->delete();

        return redirect('Meta/'.$id);
    }
    public function Seguimientos($idmet)
    {
        $met=Metas::find($idmet);//busco la meta
        $seg_met=$met->GetSeguimientos;
        $prog=$met->Programa;

        //dd($prog);

        return response()->json(['seg_met' => $seg_met,'meta'=>$met,'prog'=>$prog]);

    }

    ///seguimientos
    ///
    ///
    public function EliminarUltSeg($idmet){

        $met=Metas::find($idmet);//busco la meta
        $seg_met=$met->GetSeguimientos;//lista de seguimientos para esa meta
        $seg=$seg_met[$seg_met->count()-1];
        $seguimiento=Seguimientometa::find($seg->id)->delete();

        return response()->json(['seg' => $seg,'meta'=>$met]);

    }

    public function InsertarSeg(Request $request){

        $seg=new Seguimientometa();



        $descripcion =$request->descripcion;
        $presup_con =$request->presup_con;
        $unid_fisicas_planif =$request->unid_fisicas_planif;
        $num_benef_planif=$request->num_benef_planif;
        $fecha_seguimiento =$request->fecha_seguimiento;
        $unid_fisicas_real=$request->unid_fisicas_real;
        $num_beneficiarios_real=$request->num_beneficiarios_real;
        $presup_real=$request->presup_real;
        $fecha_real=$request->fecha_real;
        $id_meta=$request->id_meta;




        Seguimientometa::create([
            'descripcion'=>$descripcion,'presup_con'=>$presup_con,'unid_fisicas_planif'=>$unid_fisicas_planif,'num_benef_planif'=>$num_benef_planif,
            'unid_fisicas_real' =>$unid_fisicas_real,'num_beneficiarios_real'=>$num_beneficiarios_real,'fecha_seguimiento'=>$fecha_seguimiento,'id_meta'=>$id_meta,
            'presup_real'=>$presup_real,'fecha_real'=>$fecha_real,'estado'=>'F'
        ]);

       // $seg->save();

    }
    public function ActSeguimiento($idseg, Request $request){
        //dd($request);
        $seg=Seguimientometa::find($idseg);
        $presup_con = $seg->presup_con;
        $presup_real = $request->input('presup_real');

        if($seg->estado!='V' && $presup_real != 0) {


            //devolviendo el presupuesto si el prresupuesto real es menor que el planificado
            if ($presup_real < $presup_con && $presup_real != 0) {
                /* dd($presup_con);*/


                $meta = Metas::find($seg->id_meta);
                $programa = Programa::find($meta->id_programa);

                $dif_presup = $presup_con - $presup_real;
               // dd($dif_presup);
                $presup_met = $meta->presupuesto;
                $presup_progra = $programa->presupuesto_prog;

                $meta->presupuesto = $presup_met - $dif_presup;

                $programa->presupuesto_prog = $presup_progra - $dif_presup;

                $meta->save();
                $programa->save();


            }


            // dd($request->input('unid_fisicas_real_'.$idseg));
            $seg->unid_fisicas_real = $request->input('unid_fisicas_real');
            $seg->num_beneficiarios_real = $request->input('num_beneficiarios_real');
            $seg->fecha_real = $request->input('fecha_real');
            $seg->presup_real = $request->input('presup_real');
            $seg->estado = 'V';
        }

//actualizar presupuesto


        $seg->save();


    }

}
