<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Cooperativa;
use BasoCoop\Ano;
use BasoCoop\Cant_Asociados;
use BasoCoop\Comportamiento_Asamb_Asoc;
use BasoCoop\Distribucion_Utilidades;
use BasoCoop\AutonIndep;
use BasoCoop\EduForInf;
use BasoCoop\IntegrCoop;
use BasoCoop\Comunidad;
use BasoCoop\Programa;


class FedController extends Controller
{
    //


    public  function indexInd(){
        //$coops=Cooperativa::all()->except('2');
        //tenemos que validar aqui que si es un usuario pornerle la cooperativa y annos perteneciente a ese usuario

        $coops=Cooperativa::all();

        $annos=Ano::all();
        if(Auth::user()->Rol->nomb_rol=='Usuario'){
            //$coops=Cooperativa::find(Auth::user()->id_coop);
            //Seleccionando la cooperativa perteneciente al usuario
            $coops=$coops->filter(function ($item, $key) {
                return $item->id==Auth::user()->id_coop;
            });
            //dd($coops);
        }

        return view('users.federativo.indexind',[
            'coops' =>$coops,
            'annos' => $annos
        ]);
    }

    public  function indexGestdemo(){
        //$coops=Cooperativa::all()->except('2');
        $coops=Cooperativa::all();
        $annos=Ano::all();
        if(Auth::user()->Rol->nomb_rol=='Usuario' || Auth::user()->Rol->nomb_rol=='Gestor Social' ){

            //Seleccionando la cooperativa perteneciente al usuario
            $coops=$coops->filter(function ($item, $key) {
                return $item->id==Auth::user()->id_coop;
            });
            //dd($coops);
        }
        return view('users.federativo.indexgestdemo',[
            'coops' =>$coops,
            'annos' => $annos
        ]);
    }
    public  function indexPartecon(){
        //$coops=Cooperativa::all()->except('2');
        $coops=Cooperativa::all();
        $annos=Ano::all();
        if(Auth::user()->Rol->nomb_rol=='Usuario'){
            //$coops=Cooperativa::find(Auth::user()->id_coop);
            //Seleccionando la cooperativa perteneciente al usuario
            $coops=$coops->filter(function ($item, $key) {
                return $item->id==Auth::user()->id_coop;
            });
            //dd($coops);
        }
        return view('users.federativo.indexpartecon',[
            'coops' =>$coops,
            'annos' => $annos
        ]);
    }

    public  function indexAutoind(){
        //$coops=Cooperativa::all()->except('2');
        $coops=Cooperativa::all();
        $annos=Ano::all();
        if(Auth::user()->Rol->nomb_rol=='Usuario'){
            //$coops=Cooperativa::find(Auth::user()->id_coop);
            //Seleccionando la cooperativa perteneciente al usuario
            $coops=$coops->filter(function ($item, $key) {
                return $item->id==Auth::user()->id_coop;
            });
            //dd($coops);
        }
        return view('users.federativo.indexAutonInd',[
            'coops' =>$coops,
            'annos' => $annos
        ]);
    }

    public  function indexEduFormInf(){
        //$coops=Cooperativa::all()->except('2');
        $coops=Cooperativa::all();
        $annos=Ano::all();
        if(Auth::user()->Rol->nomb_rol=='Usuario'){
            //$coops=Cooperativa::find(Auth::user()->id_coop);
            //Seleccionando la cooperativa perteneciente al usuario
            $coops=$coops->filter(function ($item, $key) {
                return $item->id==Auth::user()->id_coop;
            });
            //dd($coops);
        }
        return view('users.federativo.indexEduforminf',[
            'coops' =>$coops,
            'annos' => $annos
        ]);
    }
    public  function indexCoopCop(){
        //$coops=Cooperativa::all()->except('2');
        $coops=Cooperativa::all();
        $annos=Ano::all();
        if(Auth::user()->Rol->nomb_rol=='Usuario'){
            //$coops=Cooperativa::find(Auth::user()->id_coop);
            //Seleccionando la cooperativa perteneciente al usuario
            $coops=$coops->filter(function ($item, $key) {
                return $item->id==Auth::user()->id_coop;
            });
            //dd($coops);
        }
        return view('users.federativo.indexCoopCoop',[
            'coops' =>$coops,
            'annos' => $annos
        ]);
    }
    public  function indexIntCoop(){
        //$coops=Cooperativa::all()->except('2');
        $coops=Cooperativa::all();
        $annos=Ano::all();
        if(Auth::user()->Rol->nomb_rol=='Usuario'){
            //$coops=Cooperativa::find(Auth::user()->id_coop);
            //Seleccionando la cooperativa perteneciente al usuario
            $coops=$coops->filter(function ($item, $key) {
                return $item->id==Auth::user()->id_coop;
            });
            //dd($coops);
        }
        return view('users.federativo.indexIntcoop',[
            'coops' =>$coops,
            'annos' => $annos
        ]);
    }


    public function coopBalance(){
        $annos=Ano::all();
        $coleccion=collect();
        $annos_real=collect();

        foreach ($annos as $ano){

            if( $coleccion->contains($ano->ano)==false) {
                $annos_real->push($ano);
                $coleccion->push($ano->ano);
            }
            else
                $coleccion->push($ano->ano);

        }
       

        return view('users.federativo.balanceaAnual',[

            'annos' => $annos_real->sortByDesc('ano')
        ]);
    }

    public  function indexBalance($ind=null){
        $coops=Cooperativa::all();
        $annos=Ano::all();
        if(Auth::user()->Rol->nomb_rol=='Usuario'){

            //Seleccionando la cooperativa perteneciente al usuario
            $coops=$coops->filter(function ($item, $key) {
                return $item->id==Auth::user()->id_coop;
            });
            //dd($coops);
        }
        return view('users.federativo.indexbalance',[
            'coops' =>$coops,
            'annos' => $annos,
            'ind'=>$ind
        ]);
    }

    public function coopAnos($id_coop,$indicad){
        $collection=collect();
        $coleccion=collect();
        //dd($indicad);
        if($indicad=='AD') {
            $lista_anos = Cant_Asociados::where('id_cooperativa', '=', $id_coop)->get();
        }
        if ($indicad=='GD'){
            $lista_anos = Comportamiento_Asamb_Asoc::where('id_cooperativa', '=', $id_coop)->get();
        }
        if($indicad=='PD'){
            $lista_anos = Distribucion_Utilidades::where('id_cooperativa', '=', $id_coop)->get();
        }
        if($indicad=='AI'){
            $lista_anos = AutonIndep::where('id_cooperativa', '=', $id_coop)->get();
        }
        if($indicad=='EFI'){
            $lista_anos = EduForInf::where('id_cooperativa', '=', $id_coop)->get();
        }
        if($indicad=='CC'){
            $lista_anos = IntegrCoop::where('id_cooperativa', '=', $id_coop)->get();
        }
        if($indicad=='IC'){
            $lista_anos = Comunidad::where('id_cooperativa', '=', $id_coop)->get();
        }
        if($indicad=='PS'){
            $lista_anos = Programa::where('id_cooperativa', '=', $id_coop)->get();
        }




        foreach ($lista_anos as $ano){

            if($coleccion->contains($ano->Ano->ano)==false) {
                $collection->push($ano->Ano);
                $coleccion->push($ano->Ano->ano);
            }
            else
                $coleccion->push($ano->Ano->ano);

        }

        return response()->json(['lista_anos'=>$collection]);
    }


    public function repFecha(){
        $coops=Cooperativa::all();
        if(Auth::user()->Rol->nomb_rol=='Usuario'){

            //Seleccionando la cooperativa perteneciente al usuario
            $coops=$coops->filter(function ($item, $key) {
                return $item->id==Auth::user()->id_coop;
            });
            //dd($coops);
        }

        return view('users.federativo.repactfedcoop',[
            'coops'=>$coops
        ]);



    }

}
