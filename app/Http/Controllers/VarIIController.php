<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Ano;
use BasoCoop\Comportamiento_Asamb_Asoc;
use BasoCoop\Comportamiento_Reuniones_Dir;
use BasoCoop\Var_II;
use Illuminate\Http\Request;
use BasoCoop\Premisas;
use Illuminate\Support\Facades\Auth;
use BasoCoop\PartAsamGenAsoc;
use BasoCoop\EstadoCumpAsamGenAsoc;
use BasoCoop\EquiGenNivDir;
use BasoCoop\Http\Requests\CreateControlDemoRequest;

class VarIIController extends Controller
{
    public function index()
    {

        $user=Auth::user();
        $privilegios=session('GD'.$user->id);
        $premisas=Premisas::where('id_cooperativa','=',$user->id_coop)->get();
        $año = collect();
        foreach ($premisas as $premisa)
        {
            $año->push($premisa->GetAno);
        }
        $comp_reun=Comportamiento_Asamb_Asoc::where('id_cooperativa','=',$user->id_coop)->get();
        $comp=array();
        foreach ($comp_reun as $key => $co)
        {
            $comp[$key]=$co->id_ano;
        }


        return view('ControlDemo', [ 'ano' => $año,'comportamiento'=>$comp,'privilegios' => $privilegios]);
    }



    public function modControldemo($id_ano)
    {
        $user=Auth::user();
        $caa=Comportamiento_Asamb_Asoc::where('id_cooperativa','=',$user->id_coop)->where('id_ano','=',$id_ano)->firstOrFail();
       // $crd=Comportamiento_Reuniones_Dir::where('id_cooperativa','=',$user->id_coop)->where('id_ano','=',$id_ano)->firstOrFail();
        $est=EstadoCumpAsamGenAsoc::where('id_cooperativa','=',$user->id_coop)->where('id_ano','=',$id_ano)->firstOrFail();
        $part=PartAsamGenAsoc::where('id_cooperativa','=',$user->id_coop)->where('id_ano','=',$id_ano)->firstOrFail();
        $eq=EquiGenNivDir::where('id_cooperativa','=',$user->id_coop)->where('id_ano','=',$id_ano)->firstOrFail();

        return response()->json(['caa'=>$caa,'est'=>$est,'part'=>$part,'eq'=>$eq  ]);
    }

    public function ActControlDem($id_caa,$id_est,$id_part,$id_eq,CreateControlDemoRequest $request){

        $user=Auth::user();


        $caa=Comportamiento_Asamb_Asoc::find($id_caa);
        //$crd=Comportamiento_Reuniones_Dir::find($id_crd);
        $est=EstadoCumpAsamGenAsoc::find($id_est);
        $part=PartAsamGenAsoc::find($id_part);
        $eq=EquiGenNivDir::find($id_eq);

        $convocadas = request()->input('convocadas');
        $efectuadas = request()->input('efectuadas');
        $delegados = request()->input('delegados');

       /* $asistieron = request()->input('asistieron');*/

        $caa->convocadas=$convocadas;
        $caa->efectuadas=$efectuadas;
        $caa->delegados=$delegados;

       /* $caa->asistieron=$asistieron;*/
        $caa->save();

        $est->cumplido=request()->input('cumplido');
        $est->proc_cump=request()->input('proc_cump');
        $est->save();


        $part->soc_conv=request()->input('soc_conv');
        $part->soc_asist=request()->input('soc_asist');
        $part->save();


        $eq->hombres=request()->input('hombres');
        $eq->mujeres=request()->input('mujeres');
        $eq->save();



        /*$consejo_administracion = request()->input('consejo_administracion');
        $consejo_directivo = request()->input('consejo_directivo');
        $comite_educacion = request()->input('comite_educacion');
        $comite_vigilancia = request()->input('comite_vigilancia');
        $comite_credito = request()->input('comite_credito');

        $consejo_administracion_real = request()->input('consejo_administracion_real');
        $consejo_directivo_real = request()->input('consejo_directivo_real');
        $comite_educacion_real = request()->input('comite_educacion_real');
        $comite_vigilancia_real = request()->input('comite_vigilancia_real');
        $comite_credito_real = request()->input('comite_credito_real');


        $crd->consejo_administracion=$consejo_administracion;
        $crd->consejo_directivo=$consejo_directivo;
        $crd->comite_educacion=$comite_educacion;
        $crd->comite_vigilancia=$comite_vigilancia;
        $crd->comite_credito=$comite_credito;

        $crd->consejo_administracion_real=$consejo_administracion_real;
        $crd->consejo_directivo_real=$consejo_directivo_real;
        $crd->comite_educacion_real=$comite_educacion_real;
        $crd->comite_vigilancia_real=$comite_vigilancia_real;
        $crd->comite_credito_real=$comite_credito_real;
        $crd->save();*/


        return response()->json(['caa' => $caa,'est'=>$est,'part'=>$part,'eq'=>$eq]);

    }

    public function guardar(CreateControlDemoRequest $request)
    {
        $user=Auth::user();

        $convocadas = request()->input('convocadas');
        $efectuadas = request()->input('efectuadas');
        $delegados = request()->input('delegados');
      /*  $asistieron = request()->input('asistieron');*/
        $idAnno = request()->input('id_ano');

        $caa= new Comportamiento_Asamb_Asoc();


        $caa->convocadas=$convocadas;
        $caa->efectuadas=$efectuadas;
        $caa->delegados=$delegados;
       /* $caa->asistieron=$asistieron;*/
        $caa->id_ano = $idAnno;
        $caa->id_cooperativa=$user->id_coop;

        $caa->save();

        $est=new EstadoCumpAsamGenAsoc();
        $est->cumplido=request()->input('cumplido');
        $est->proc_cump=request()->input('proc_cump');
        $est->id_ano = $idAnno;
        $est->id_cooperativa=$user->id_coop;
        $est->save();

        $part=new PartAsamGenAsoc();
        $part->soc_conv=request()->input('soc_conv');
        $part->soc_asist=request()->input('soc_asist');
        $part->id_ano = $idAnno;
        $part->id_cooperativa=$user->id_coop;
        $part->save();

        $eq=new EquiGenNivDir();
        $eq->hombres=request()->input('hombres');
        $eq->mujeres=request()->input('mujeres');
        $eq->id_ano = $idAnno;
        $eq->id_cooperativa=$user->id_coop;
        $eq->save();

       /* $consejo_administracion = request()->input('consejo_administracion');
        $consejo_directivo = request()->input('consejo_directivo');
        $comite_educacion = request()->input('comite_educacion');
        $comite_vigilancia = request()->input('comite_vigilancia');
        $comite_credito = request()->input('comite_credito');

        $consejo_administracion_real = request()->input('consejo_administracion_real');
        $consejo_directivo_real = request()->input('consejo_directivo_real');
        $comite_educacion_real = request()->input('comite_educacion_real');
        $comite_vigilancia_real = request()->input('comite_vigilancia_real');
        $comite_credito_real = request()->input('comite_credito_real');



        $crd=new Comportamiento_Reuniones_Dir();

        $crd->consejo_administracion=$consejo_administracion;
        $crd->consejo_directivo=$consejo_directivo;
        $crd->comite_educacion=$comite_educacion;
        $crd->comite_vigilancia=$comite_vigilancia;
        $crd->comite_credito=$comite_credito;
        $crd->id_ano = $idAnno;

        $crd->consejo_administracion_real=$consejo_administracion_real;
        $crd->consejo_directivo_real=$consejo_directivo_real;
        $crd->comite_educacion_real=$comite_educacion_real;
        $crd->comite_vigilancia_real=$comite_vigilancia_real;
        $crd->comite_credito_real=$comite_credito_real;

        $crd->id_cooperativa=$user->id_coop;

        $crd->save();*/

        return response()->json(['caa' => $caa, 'est'=>$est , 'part'=>$part ,'eq' =>$eq]);
    }
}

