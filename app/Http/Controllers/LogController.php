<?php

namespace BasoCoop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        $login=$request->input('login');
        $password=$request->input('password');

        if (Auth::attempt(['login' => $login, 'password' => $password])) {
            // Authentication passed...
          //  dd('in');
            return redirect()->intended('/main');
        }
    }

}
