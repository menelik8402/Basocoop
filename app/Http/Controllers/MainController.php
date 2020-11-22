<?php

namespace BasoCoop\Http\Controllers;

use BasoCoop\Privilegios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BasoCoop\User;
use BasoCoop\Roles;
use BasoCoop\Cooperativa;
class MainController extends Controller
{

    public function controlador_principal()
    {


        if (Auth::check()) {

            $coops=Cooperativa::all();

            $user = Auth::user();
            /*$privilegios=Privilegios::where('id_user','=',$user->id)->get();*/

           // session(['privilegios'=> $privilegios]);
            /*foreach ($privilegios as $pri)
            {
                session([$pri->codigo_priv.$user->id => $pri]);
            }*/

            // dd( $user);
            if ($user->Rol->nomb_rol == 'Administador') {

                ///administrador
                /// session del administador
                ///
                $users = User::where('id', '!=', $user->id)->get();
                $roles = Roles::all();

                return view('users.admin.users', [
                    'users' => $users,
                    'roles' => $roles,
                    'coops' => $coops,

                ]);

            } elseif ($user->Rol->nomb_rol == 'Usuario Federativo') {
                //usuario federativo
                //antes de enviar las cooperativas quitar la federacion'



                return view('users.federativo.federativo',[
                    'coops' => $coops,

                ]);

            }
            elseif ($user->Rol->nomb_rol == 'Administador Cooperativo') {
                //administrador cooperativo

                $users = User::where('id', '!=', $user->id)->where('id_coop','=',$user->id_coop)->get();
                $roles = Roles::all();
                $cooperativa=$user->Cooperativa;

                return view('users.admcoop.users',[
                    'users' => $users,
                    'roles' => $roles,
                    'coop' =>$cooperativa,
                    'id_coop' => $user->id_coop,

                    ]);
            } elseif($user->Rol->nomb_rol == 'Gestor Social' /*&& Privilegios::where('id_user','=',$user->id)->get()->count()!=0*/) {
                //usuario basico
                //aqui tienees que enviar al usuario para la cooperativa a la que pertenece


               return redirect('/home');
            } elseif($user->Rol->nomb_rol == 'Usuario'/*&& Privilegios::where('id_user','=',$user->id)->get()->count()!=0*/) {

                //usuario basico
                //aqui tienees que enviar al usuario para la cooperativa a la que pertenece

                return redirect('/home');
            }else{

                return view('errors.503');
            }

        }
    }

}
