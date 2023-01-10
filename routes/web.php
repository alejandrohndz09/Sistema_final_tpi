<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes


amo a flavio y el es mi novio 
|--------------------------------------------------------------------------
|
| He
*/


Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
Route::resource('consumo', 'App\Http\Controllers\ConsumoController');
Route::resource('medidor', 'App\Http\Controllers\MedidorController');