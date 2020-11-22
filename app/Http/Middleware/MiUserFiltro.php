<?php

namespace BasoCoop\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MiUserFiltro
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            $user = Auth::user();
            if ($user->Rol->nomb_rol == 'Gestor Social') {

                //
                return $next($request);

            }
            else
            {
                return redirect('/logout');
            }

        }else{
            return redirect('/logout');
        }


    }
}
