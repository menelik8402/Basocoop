<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Ano;
use BasoCoop\Cond_material_coop;
use BasoCoop\Mostrar;
use BasoCoop\Encuesta;
use Illuminate\Http\Request;
use BasoCoop\Cooperativa;

class MostrarController extends Controller
{
    public function index()
    {
        $enc=Encuesta::all();

        return view('mostrar', ['enc' => $enc]);
    }
}