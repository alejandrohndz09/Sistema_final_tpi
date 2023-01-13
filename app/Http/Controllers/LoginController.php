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

   public function login(LoginRequest $request){
    $credenciales = $request->getCredenciales();

    if(!Auth::validate(($credenciales))){
        return redirect('/');
    }
    $user = Auth::getProvider()->retrieveByCredentials($credenciales);

    Auth::login($user);

    return $this->authenticated($request,$user);
   }

   public function authenticated(Request $request,$user){
    return redirect('/dashboard');
   }
}
