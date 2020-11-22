<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Cooperativa;
use BasoCoop\Roles;
use Illuminate\Http\Request;
use BasoCoop\User;
use Illuminate\Support\Facades\Auth;
use BasoCoop\Http\Requests\CreateUserRequest;

use BasoCoop\Http\Requests\CreateUserRequestEdit;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(CreateUserRequest $request)
    {


        User::create([
            'name'=> $request->input ('name'),
            'ci'=> $request->input ('ci'),
            'email'=> $request->input ('email'),
            'login'=> $request->input ('login'),
            'id_rol'=> $request->input ('id_rol'),
            'id_coop'=> $request->input ('id_coop'),
            'password'=> bcrypt($request->input ('password')),
            'primeravez'=> $request->input ('primeravez'),
           // 'logueado'=> $request->input ('logueado'),
            'fecha_act_psw'=> $request->input ('fecha_act_psw'),



        ]);

        return redirect('/main');
    }

    public function getUser($id){

        $user=User::find($id);

        return response()->json(['user' => $user]);
    }
    public function editUser(CreateUserRequestEdit $request,$id)
    {
        $user=User::find($id);
//dd($request);
            $user->name = $request->input('name1');
            $user->ci= $request->input('ci');
            $user->email= $request->input ('email1');
            $user->login= $request->input ('login');
            $user->id_rol= $request->input ('id_rol1');
             $user->id_coop= $request->input ('id_coop1');
            $user->password= bcrypt($request->input ('password1'));
            $user->primeravez= $request->input ('primeravez1');
           // logueado= $request-input (logueado),
            $user->fecha_act_psw= $request->input ('fecha_act_psw1');
      // dd($user);
            $user->save();
        return redirect('/main');

    }
    public function userCoop(){
        $coops=Cooperativa::all();
        return view('users.invitado.invitado',[
            'coops'=>$coops
            ]);
    }

    public function deleteUser($id)
    {

        $user=User::find($id)->delete();


        return response()->json(['id' => $id]);
    }

    public function logout()
    {

        //session_destroy();
        Auth::logout();

        return redirect('/');
    }

    public function miPerfil()
    {
        $user = Auth::user();


       if($user->Rol->nomb_rol=='Administador Cooperativo') {
           return view('users.admcoop.miperfil', [
               'user' => $user


           ]);
       }elseif ($user->Rol->nomb_rol=='Administador'){
           return view('users.admin.miperfil', [
               'user' => $user
           ]);
       }elseif ($user->Rol->nomb_rol=='Usuario Federativo'){
           return view('users.federativo.miperfil', [
               'user' => $user
           ]);
       }elseif($user->Rol->nomb_rol=='Usuario'){
           return view('users.usuario.miperfil', [
               'user' => $user
           ]);
       }elseif($user->Rol->nomb_rol=='Gestor Social'){
           return view('layouts.miperfil', [
               'user' => $user
           ]);
       }

    }

    public function edit(){
        $user = Auth::user();




        if($user->Rol->nomb_rol=='Administador Cooperativo') {

            return view('users.admcoop.miperfilupdate',[
                'user' => $user
            ]);
        }elseif ($user->Rol->nomb_rol=='Administador'){

            return view('users.admin.miperfilupdate',[
                'user' => $user
            ]);
        }elseif ($user->Rol->nomb_rol=='Usuario Federativo'){
            return view('users.federativo.miperfilupdate', [
                'user' => $user
            ]);
        }elseif($user->Rol->nomb_rol=='Usuario'){
            return view('users.usuario.miperfilupdate', [
                'user' => $user
            ]);
        }





    }
    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => ['required'],
            'email' => ['required','email'],
            'ci' => ['required','max:9'],
            'login' => ['required']
        ],[
            'name.required' => 'El nombre es requerido',
            'ci.max'=>'DUI no puede exceder los 9 caracteres',
            'email.required'=> 'Campo requerido',
            'email.email'=> 'Campo con formato incorrecto',
            'ci.required'=> 'Campo requerido',
            'login.required'=> 'Campo requerido',

        ]);

        $user = Auth::user();

        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->ci=$request->input('ci');
        $user->login=$request->input('login');
        $user->save();
        return redirect('/miperfil');


    }
    public function claveShow(){


        $user = Auth::user();

        if($user->Rol->nomb_rol=='Administador Cooperativo') {
            return view('users.admcoop.cambioclave');


        }elseif ($user->Rol->nomb_rol=='Administador'){
            return view('users.admin.cambioclave');

        }elseif ($user->Rol->nomb_rol=='Usuario Federativo'){
            return view('users.federativo.cambioclave');

        }elseif($user->Rol->nomb_rol=='Usuario'){
            return view('users.usuario.cambioclave');
        }
        elseif($user->Rol->nomb_rol=='Gestor Social'){
            return view('layouts.cambioclave');
        }



    }
    public function claveCambio(Request $request){

        $this->validate($request,[

            'clave' => ['required'],
            'clavenv' => ['required','min:8'],
            'claveconfir' => ['required','min:8','same:clavenv'],

        ],[
            'clave.required' => 'La clave actual es requerida',
            'clavenv.required'=> 'La nueva clave es requerida',
            'clavenv.min'=> 'La nueva clave tiene que tener como mímnimo 8 caracteres',
            'claveconfir.required'=> 'La clave de confirmación es requerida',
            'claveconfir.min'=> 'La clave de confirmación tiene que tener como mímnimo 8 caracteres',
            'claveconfir.same'=> 'La nueva clave y la clave de confirmación no son idénticas',
        ]);

        $user = Auth::user();



       if(Hash::check($request->input('clave'),$user->password))
       {

           //averiguar como desencriptar una

           $user->password = bcrypt($request->input('clavenv'));
           $user->save();


           if ($user->Rol->nomb_rol == 'Administador Cooperativo') {
               return redirect('/main');


           } elseif ($user->Rol->nomb_rol == 'Administador') {
               return redirect('/main');


           } elseif ($user->Rol->nomb_rol == 'Usuario Federativo') {
               //return view('users.federativo.cambioclave');

           } elseif ($user->Rol->nomb_rol == 'Usuario') {
               //  return view('users.usuario.cambioclave');
           } elseif ($user->Rol->nomb_rol == 'Gestor Social') {
             // dd('dd');
               return redirect('/main');

           }
       }
       else
       {

           $this->validate($request,[

               'clave' => ['same:10']
               ],[
               'clave.same' => 'La clave actual no  es correcta'
           ]);
       }

    }
    public function registerUser(){
        $coops=Cooperativa::all();
        $roles=Roles::all();
        return view('users.invitado.registerinv',[
            'coops'=>$coops,
            'roles'=>$roles
        ]);
    }


}
