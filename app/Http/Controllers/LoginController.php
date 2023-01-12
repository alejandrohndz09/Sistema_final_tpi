<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show() {
        return view('layouts.login');
    }

    public function login(Request $request, Redirector $redirect) {
        $user = Usuario::where('nickname', $request->user)->first();
    

        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            toastr()->info('Que disfrutes del sistema.','¡Bienvenido/a, '. $user->organizador->nombre . '!') ;

            return redirect('/Inicio');
        }
    }

    public function authenticated(Request $request, $usuario) {
        return redirect('/Inicio');
    }
}