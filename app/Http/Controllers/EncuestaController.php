<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Ano;

use BasoCoop\Encuesta;
use BasoCoop\Encuesta_pregunta;
use BasoCoop\Preguntas_Encuesta;
use Illuminate\Http\Request;
use BasoCoop\Pregunta;
use BasoCoop\Cooperativa;

class EncuestaController extends Controller
{
    public function index()
    {
        $enc = Encuesta::all();
        $pregunta = Pregunta::all();
        //$cond_mat=Cond_material_coop::all();
        // $ano=Ano::all();

        return view('encuesta', ['encuesta' => $enc, 'pregunta' => $pregunta]);
    }

    public function Preg($id)
    {
        $enc = Encuesta::find($id);
        $pregunta = $enc->Pregunta()->getResults();

        return view('preguntas', ['enc' => $enc, 'pregunta' => $pregunta]);

    }

//    public function AddPreg($id)
//    {
//        //
//        $enc = Encuesta::find($id);
//
//        return view('preguntas', ['enc' => $enc]);
//    }
//
//    public function addPreguntas()
//    {
//
//        $preg = Pregunta::create(['pregunta' => request()->input('pregunta')]);
//        return response()->json(['pregunta' => $preg]);
//    }


    public function AdicionarPreguntas($id)
    {

        $pregunta = request()->input('pregunta');
        $tipo = request()->input('tipo');



        $e = new Pregunta();
        $e->pregunta = $pregunta;

        if ($tipo == 1) {

            $e->tipo = 'Si_No';
            $e->save();
        }

        if ($tipo == 2) {

            $e->tipo = 'Cantidad';
            $e->save();
        }

        if ($tipo == 3) {

            $e->tipo = 'Opinion';
            $e->save();
        }

        if ($tipo == 4) {

            $e->tipo = 'Estado';
            $e->save();
        }

        if ($tipo == 5) {

            $e->tipo = 'Capacitacion';
            $e->save();
        }
        if ($tipo == 6) {

            $e->tipo = 'Rango';
            $e->save();
        }

        $encpreg= new Encuesta_pregunta();
        $encpreg->id_pregunta= $e->id;
        $encpreg->id_encuesta= $id;
        $encpreg->save();


        return response()->json(['e' => $e,'encuestapregunta'=>$encpreg]);
    }



    public function addEncuesta()
    {
        $enc = Encuesta::create(['encuesta' => request()->input('nombre')]);


        return response()->json(['encuesta' => $enc]);
    }

    public function AdicionarEncuesta()
    {
        $e = new Encuesta();
        $nombre = request()->input('nombre');
        $e->nombre = $nombre;
        $e->save();

        return response()->json(['enc' => $e]);


    }

    public function editencuesta()
    {
        $id = request()->input('id');
        $encuesta = Encuesta::find($id);
        $encuesta->nombre = request()->input('nombre');
        $encuesta->save();

        return response()->json(['encuesta' => $encuesta]);
    }

    public function editpreg(Request $request)
    {
        $id = $request->id;
        $pregunta = Pregunta::find($id);
        $pregunta->pregunta = $request->pregunta;
        $pregunta->save();

        return response()->json(['pregunta' => $pregunta]);
    }

    public function eliminar(Request $request)
    {

        $programa = Encuesta::find($request->eliminar);

        $programa->delete();

        return redirect('encuesta');
    }

    public function eliminarpreg(Request $request)
    {
//        dd($request);

        $pregunta = Pregunta::find($request->eliminarpreg);

        $pregunta->delete();

        return redirect()->back();
    }
}
