<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
*/


Route::get('/dashboard', function () {
    return view('dashboard.dashboard'); 
});

Route::get('/',[LoginController::class,'show'])->name('login');
Route::post('/',[LoginController::class,'login']);


Route::get('show-modal', 'App\Http\Controllers\MedidorController@showModal')->name('show-modal');

Route::resource('consumo', 'App\Http\Controllers\ConsumoController');
Route::resource('medidor', 'App\Http\Controllers\MedidorController');
<<<<<<< HEAD
Route::post('/medidor/update', 'App\Http\Controllers\MedidorController@update');
=======
Route::resource('persona', 'App\Http\Controllers\PersonaController');
>>>>>>> a92e6575721b8662c17ae1045530d7fa1c543cc9
