<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes


amo a flavio y el es mi novio  y kevin la amante
|--------------------------------------------------------------------------
|
| He
*/


Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/', function () {
    return view('login');
});

Route::get('/', function () {
    return view('medidor.g');
});
Route::resource('consumo', 'App\Http\Controllers\ConsumoController');
Route::resource('medidor', 'App\Http\Controllers\MedidorController');