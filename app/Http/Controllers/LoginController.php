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
    public function index(){
        return view('layouts.login');
    }

    public function show(){
        return view('layouts.login');
    }

   public function login(Request $request){
        $usuario=Usuario::where('contraseña',$request->get('contraseña'))
                    ->where('correo', $request->get('correo'))
                    ->first();
        
    

        if(!$usuario){
            $url='/';
            $type='error';
            $message='Credenciales incorrectas';
            
        }else{
            $url='dashboard';
            $type='success';
            $message='Bienvenido';
            session()->put('usuario', $usuario);
        }
       
        $alert = array(
            'type' => $type,
            'message' =>$message
        );
        
        session()->flash('alert',$alert);
        return  redirect($url);
   }
   public function logout(){
       session()->forget('usuario');
       return view('layouts.login');
    }
    
   public function authenticated(Request $request,$user){
    return view('dashboard.dashboard');
   }
}