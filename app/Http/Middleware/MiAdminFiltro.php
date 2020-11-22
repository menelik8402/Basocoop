<?php

namespace BasoCoop\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class MiAdminFiltro
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
            if ($user->Rol->nomb_rol == 'Administador') {

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
