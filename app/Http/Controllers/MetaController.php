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
        $planUF = $request->planUF;
        $beneficiosPlan = $request->beneficiosPlan;
        $idProg = $request->idProg;

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

        if($seg->estado!='V' && $presup_real >= 0) {


            //devolviendo el presupuesto si el prresupuesto real es menor que el planificado
            if ($presup_real < $presup_con && $presup_real != 0) {
                /* dd($presup_con);*/

                 //obteniendo la meta y el programa del seguimiento       
                $meta = Metas::find($seg->id_meta);
                $programa = Programa::find($meta->id_programa);

                 //diferencia entre el presupuesto de real del seguimiento y el presupuesto planificado del seguimiento   
                $dif_presup = $presup_con - $presup_real;
               // dd($dif_presup);
                $presup_met = $meta->presupuesto;
                $presup_progra = $programa->presupuesto_prog;

                 //el presupuesto de la meta es actualizado con el presupuesto actual mennos la diferencia   
                $meta->presupuesto = $presup_met - $dif_presup;

                 //el presupuesto del programa es actualizado con el presupuesto actual mennos la diferencia      
                $programa->presupuesto_prog = $presup_progra - $dif_presup;

                $meta->save();
                $programa->save();

                //falta contabilizar la diferencia y actualizar en caso de que el presupuesto planificado de la actividad no se coja completo


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
    /*
    Este un metodo que ajusta el presupuesto en caso de que el presup planificado  de la 
    * actividad sea menor al presupuesto planificado de los seguimientos , la diferencia se ajusta 
    * quitandosela al presupuesto de la activida y sumandosela a el presupuesto del programa donde
    */
     
    public function buscarPresupPlanif($id_meta){

        $met=Metas::find($id_meta);//busco la meta
        $programa = Programa::find($met->id_programa);
        


        //unidades fisicas reales hasta el momento
        $sum_uunid_fisicas_real=$met->GetSeguimientos->sum('unid_fisicas_real');

        //unidades fisicas planificadas hasa el momento en al actvidad
        $sum_unid_fisicas_planif=$met->unid_fisicas_plan;
        
        if($sum_unid_fisicas_planif <= $sum_uunid_fisicas_real ){
            //entonces la actividad cerro lo que quiere decir que se verifica el presupuesto planificado de los seguiemientos y el de la actividad
            $sum_presup_seg=$met->GetSeguimientos->sum('presup_con');//presupuesto planificado
            
            if($met->presupuesto >  $sum_presup_seg ){

               
                $dif_prsup_planif=$met->presupuesto - $sum_presup_seg ;

               // dd($dif_prsup_planif);

                $met->presupuesto=$sum_presup_seg;

                $met->save();


               

               // $programa->presupuesto_prog = $programa->presupuesto_prog + $dif_prsup_planif;

                //$programa->save();
                return response()->json(['meta'=>$met,'programa'=>$programa,'dif_prsup_planif'=>$dif_prsup_planif]);

            }

           




        }

        return response()->json([]);


    }


}
