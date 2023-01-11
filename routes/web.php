<?php

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

Route::get('/', function () {
    return view('login');
});

Route::get('medidor/{id}/edit', 'App\Http\Controllers\MedidorController@edit')->name('medidor.form');

Route::resource('consumo', 'App\Http\Controllers\ConsumoController');
Route::resource('medidor', 'App\Http\Controllers\MedidorController');