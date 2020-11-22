<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Privilegios;
use BasoCoop\User;

class PrivilegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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

    public function privilegios($userid){



        $user=User::find($userid);
       /* $priv=Privilegios::where('id_user','=',$userid)->get();*/

        /*if($priv->count()!=0){
            return view('users.admcoop.accesos',[
                'privilegios' => $priv,
                'user' => $user
            ]);

        }
        else{
            ///crear los privilegios
            $this->crearAccesos($userid);
            $priv=Privilegios::where('id_user','=',$userid)->get();

            return view('users.admcoop.accesos',[
                /*'privilegios' => $priv,
                'user' => $user]);
        }*/




    }
    private function crearAccesos($iduser){
  //dd($iduser);
        /*Privilegios::create(['nomb_priv'=> 'Condición Material','codigo_priv'=>'CM','id_user'=>$iduser ]);
        Privilegios::create(['nomb_priv'=> 'Adhesión Voluntaria','codigo_priv'=>'AD','id_user'=>$iduser ]);
        Privilegios::create(['nomb_priv'=> 'Gestión Democrática','codigo_priv'=>'GD','id_user'=>$iduser ]);
        Privilegios::create(['nomb_priv'=> 'Participacion Económica','codigo_priv'=>'PE','id_user'=>$iduser ]);
        Privilegios::create(['nomb_priv'=> 'Autonomia e Independencia','codigo_priv'=>'AI','id_user'=>$iduser ]);
        Privilegios::create(['nomb_priv'=> 'Educación,fomación e Información ','codigo_priv'=>'EFI','id_user'=>$iduser ]);
        Privilegios::create(['nomb_priv'=> 'Cooperación entre cooperativas ','codigo_priv'=>'CC','id_user'=>$iduser ]);
        Privilegios::create(['nomb_priv'=> 'Interés por la comunidad ','codigo_priv'=>'IC','id_user'=>$iduser ]);


        Privilegios::create(['nomb_priv'=> 'Encuesta','codigo_priv'=>'EC','id_user'=>$iduser ]);
        Privilegios::create(['nomb_priv'=> 'Añadir Actividad','codigo_priv'=>'AA','id_user'=>$iduser ]);
       // Privilegios::create(['nomb_priv'=> 'Tabular Encuesta','codigo_priv'=>'TE','id_user'=>$iduser ]);
        Privilegios::create(['nomb_priv'=> 'Gestión de Programas','codigo_priv'=>'GP','id_user'=>$iduser ]);
        Privilegios::create(['nomb_priv'=> 'Detalles de Actividades de Programas','codigo_priv'=>'DTP','id_user'=>$iduser ]);*/


    }
    public function insertarAccesos(Request $request,$iduser){

        $accesos_user=Privilegios::where('id_user','=',$iduser)->get();

        foreach ($accesos_user as $acc){

           /* $acc->accion_add=$request->input($acc->codigo_priv . '_add');
            $acc->accion_edit=$request->input($acc->codigo_priv . '_edit');
            $acc->accion_elim=$request->input($acc->codigo_priv . '_elim');
            $acc->accion_inf=$request->input($acc->codigo_priv . '_inf');*/

           //dd($request);

            if($request->input($acc->codigo_priv . '_add')=='0' || $request->input($acc->codigo_priv . '_add')=='on'){
                $acc->accion_add=true;
            }
            else{
                $acc->accion_add=false;
            }
            if ($request->input($acc->codigo_priv . '_edit')=='0' || $request->input($acc->codigo_priv . '_edit')=='on') {
                $acc->accion_edit = true;
            }else {
                $acc->accion_edit = false;
            }if($request->input($acc->codigo_priv . '_elim')=='0' || $request->input($acc->codigo_priv . '_elim')=='on') {
                $acc->accion_elim = true;
            }else {
                $acc->accion_elim = false;
            }
            if($request->input($acc->codigo_priv . '_inf')=='0' || $request->input($acc->codigo_priv . '_inf')=='on') {
                $acc->accion_inf = true;
            }else {
                $acc->accion_inf = false;
            }

            $acc->save();

        }
        return redirect('/main');

    }

    /*  */

}
