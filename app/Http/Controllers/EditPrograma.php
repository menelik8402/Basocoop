<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Http\Requests\create_Programa_Request;
use BasoCoop\Metas;
use Illuminate\Http\Request;
use BasoCoop\Ano;
use BasoCoop\Programa;
use BasoCoop\Premisas;
use BasoCoop\Cond_material_coop;


class EditPrograma extends Controller
{
    public function EditPrograma($id)
    {

        $proy = Programa::find($id);
       // $año = Ano::all();
        $metas= Metas::find($id);

        return view('EditPrograma', ['proy' => $proy,'metas'=>$metas]);
    }

    public function edit(create_Programa_Request $request){

        //validacion del pesupuesto del programa que se quiere editar



        $programa = Programa::find($request-> id);
        //busco en la tabbla premisa el id de la premisa filtrada porel anno
        $premisa=Premisas::where('id_ano','=',$programa->id_ano)->where('id_cooperativa','=',$programa->id_cooperativa)->get()->first();
        //dd($premisa);
        //Voy a la tabla condicion material y obtengo elpresupuesto filtrado porla premisa obtenida
        $cond_mat=Cond_material_coop::where('id_premisas','=',$premisa->id)->get()->first();

        //obtengo el presupuesto para este anno
        $presup_anual=($cond_mat->utilidades * $cond_mat->presupuesto_coop/100) + $cond_mat->fondo_educacion + $cond_mat->mercadeo + $cond_mat->cmte_genero + $cond_mat->otros_ingresos;

        //tengo restarle el pesupeusto de los demas programs del mismo ano
         $presup_prog_ano=Programa::where('id_ano','=',$programa->id_ano)->sum('presupuesto_prog');
//dd($presup_prog_ano);


        $presup_prog_ano=$presup_prog_ano-$programa->presupuesto_prog;//lee estoy quitando el pesupuesto del programa queq quiero edsitar
       // dd($programa->presupuesto_prog);
        //presupuesto disponible paa el programa a editar
        $presup_disp_prog=$presup_anual-$presup_prog_ano;

        //presupuesto de las metas asociadas a este programa
        $presup_met=Metas::where('id_programa','=',$programa->id)->sum('presupuesto');

//dd($presup_disp_prog);
        if($request->presupuestoP<=$presup_disp_prog && $request->presupuestoP>= $presup_met){

            $programa->nomb_prog = $request->nombre;
            $programa->objetivo = $request->objetivo;
            $programa->metodologia = $request->metodologia;
            $programa->presupuesto_prog = $request->presupuestoP;
            $programa->id_ano = $request->anno;





            $programa->save();


            return redirect('proyectos');


        }
        else
        {
           echo ('<div class="alert alert-danger alert-dismissable fade show" role="alert" >
                        <button type="button" class="close" datadismiss="alert">&times;</button>
                       El presupuesto señalado no es correcto <a href="/proyectos"> Continue</a>
                    </div>');
        }





    }

    public function eliminar(Request $request){

        $programa = Programa::find($request-> eliminar);
        $metas = Metas::where('id_programa','=',$request-> eliminar)->get();


        if($metas->isEmpty() ==false){
            foreach ($metas as $meta)
            {

                $meta->delete();
            }
        }


        $programa->delete();

        return redirect('proyectos');
    }
}
