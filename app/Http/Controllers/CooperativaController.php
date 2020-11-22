<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use BasoCoop\Cooperativa;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Federacion;
use BasoCoop\Http\Requests\CreateCoperativaRequest;
class CooperativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cooperativas=Cooperativa::all();
        $federaciones=Federacion::all();

        return view('users.admin.cooperativas',[
            'cooperativas'=>$cooperativas,
            'federaciones' =>$federaciones
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCoperativaRequest $request)
    {
        //
          /// dd( $request->input('federacion'));
        ///
        $coperativa=new  Cooperativa();
        $coperativa->nombre = $request->input('nombre');
        $coperativa->direccion = $request->input('direccion');
        $coperativa->provincia = $request->input('provincia');
        $coperativa->municipio = $request->input('municipio');
        $coperativa->fed_id = $request->input('federacion');
        $coperativa->save();





    }
    public function editCooperativa(CreateCoperativaRequest $request ,$id){

        $coperativa=Cooperativa::find($id);

         $coperativa->nombre = $request->input('nombre');
            $coperativa->direccion = $request->input('direccion');
            $coperativa->provincia = $request->input('provincia');
            $coperativa->municipio = $request->input('municipio');
            $coperativa->fed_id = $request->input('federacion');
            $coperativa->save();

        return redirect('/Lista/Cooperativas') ;
    }

    public function deleteCooperativa($id){

        $coperativa=Cooperativa::find($id);
        $coperativa->delete();

        return redirect('/Lista/Cooperativas') ;
    }
    public function getCooperativa($id){

        $cooperativa=Cooperativa::find($id);

        return response()->json(['cooperativa' => $cooperativa]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //esto es cuando se quiere ver la cooperativa por pate del administador cooperativa
        $user = Auth::user();
        $coop=Cooperativa::find($user->id_coop);

        return view('users.admcoop.coop',[
            'coop' => $coop
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //esto es cuando se editar  la cooperativa por pate del administador cooperativa
        $user = Auth::user();
        $cooperativa=Cooperativa::find($user->id_coop);
        return view('users.admcoop.editcoop',[
            'coop' => $cooperativa
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCoperativaRequest $request)
    {
        //

        //esto es cuando se actualiza la cooperativa por pate del administador cooperativa
        $user = Auth::user();
        $cooperativa=Cooperativa::find($user->id_coop);

        $cooperativa->nombre=$request->input('nombre');
        $cooperativa->municipio=$request->input('municipio');
        $cooperativa->provincia=$request->input('provincia');
        $cooperativa->direccion=$request->input('direccion');

        $cooperativa->save();

        return redirect('/cooperativa');


    }
    public function actualizar()
    {



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
}
