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


Route::resource('medidor','App\Http\Controllers\MedidorController');
Route::post('/medidor/update', 'App\Http\Controllers\MedidorController@update');


Route::resource('canton','App\Http\Controllers\CantonController');

Route::post('/canton/update', 'App\Http\Controllers\CantonController@update');
Route::resource('persona','App\Http\Controllers\PersonaController');

//CONSULTAS
Route::resource('montoTotal','App\Http\Controllers\MontoTotalController');
Route::resource('promedio','App\Http\Controllers\PromedioController');

function validar($ruta){
    if( session()->has('usuario')){
        return $ruta;
    }else{
        return view('layouts.login');
    }
}
