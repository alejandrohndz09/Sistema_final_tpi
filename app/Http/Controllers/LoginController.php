<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Models\Usuario;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    //

    public function show(){
        return view('layouts.login');
    }
    
   public function login(Request $request, Redirector $redirect)
    {
        $user = Usuario::where('correo', $request->correo)->first();

        if (Hash::check($request->contraseña, $user->contraseña)) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect('/dashboard');
        }
    }

    public function authenticated(Request $request, $usuario)
    {
        return redirect('/dashboard');
    }
}
