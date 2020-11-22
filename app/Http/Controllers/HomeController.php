<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use BasoCoop\Cooperativa;
use BasoCoop\Federacion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio()
    {
        return view('layouts.inicio');
    }

    public function index()
    {
        if (Auth::check()&&  (Auth::user()->Rol->nomb_rol=='Gestor Social' || Auth::user()->Rol->nomb_rol=='Usuario')) {

            $coop = Cooperativa::where('id','=',Auth::user()->id_coop)->get();

            if (count($coop) == 0)
                return view('home', ['nombre' => 'No tiene cooperativa este usuario']);
            else
                return view('home', ['nombre' => $coop[0]]);
        }
        else
           return view('errors.503');
    }
//    public function proyectos()
//    {
//        return view('proyectos');
//    }
    public function logincoop()
    {
        $fed=Federacion::create(['descrip'=>'FEDECACES']);

        $coop= Cooperativa::create(['nombre' => request()->input('nombre'),'fed_id'=>$fed->id]);


        return redirect('/home');
    }
}
