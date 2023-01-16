<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
*/

$inicio="App\Http\Controllers\LoginController";

Route::get('/dashboard', function () {
    
    return session()->has('usuario')?view('dashboard.dashboard'):view('layouts.login'); 
});

 Route::get('/',[LoginController::class,'show'])->name('login');
// Route::post('/',[LoginController::class,'login']);

Route::post('/iniciar-sesion', 'App\Http\Controllers\LoginController@login');
Route::post('/cerrar-sesion', 'App\Http\Controllers\LoginController@logout');


Route::resource('medidor', !auth()->user()?'App\Http\Controllers\MedidorController':$inicio);
Route::post('/medidor/update', 'App\Http\Controllers\MedidorController@update');


Route::resource('canton', !session()->has('usuario')?'App\Http\Controllers\CantonController':$inicio);
Route::resource('montoTotal', !session()->has('usuario')?'App\Http\Controllers\ConsultasController':$inicio);
Route::post('/canton/update', 'App\Http\Controllers\CantonController@update');
Route::resource('persona', !session()->has('usuario')?'App\Http\Controllers\PersonaController':$inicio);

function validar($ruta){
    if( session()->has('usuario')){
        return $ruta;
    }else{
        return view('layouts.login');
    }
}
