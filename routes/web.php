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




Route::resource('medidor', 'App\Http\Controllers\MedidorController');
Route::post('/medidor/update', 'App\Http\Controllers\MedidorController@update');


Route::resource('canton', 'App\Http\Controllers\CantonController');
Route::post('/canton/update', 'App\Http\Controllers\CantonController@update');
Route::resource('persona', 'App\Http\Controllers\PersonaController');
