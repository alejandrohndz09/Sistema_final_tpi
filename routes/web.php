<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes


amo a flavio y el es mi novio  y kevin la amante
|--------------------------------------------------------------------------
|La Karen No se baña 
| He
*/


Route::get('/dashboard', function () {
    return view('dashboard.dashboard'); 
});


Route::get('/',[LoginController::class,'show'])->name('login');
Route::post('/',[LoginController::class,'login']);

Route::get('show-modal', 'App\Http\Controllers\MedidorController@showModal')->name('show-modal');

Route::resource('consumo', 'App\Http\Controllers\ConsumoController');
Route::resource('medidor', 'App\Http\Controllers\MedidorController');