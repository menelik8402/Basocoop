<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Ano;
use BasoCoop\Preguntas_Encuesta;
use Illuminate\Http\Request;
class estadisticaEncController extends Controller
{
    public function index()
    {
        $est = estadisticaEnc::all();


        return view('estadisticaEnc', ['estadisticaEnc' => $est]);
    }
}