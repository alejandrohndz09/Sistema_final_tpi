<?php

use App\Models\Persona;
use App\Models\Canton;
use App\Models\Consumo;
use App\Https\Controllers\ResumenController;
?>
@extends('layouts.master')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
<br>

                <div class="card mb-4 shadow-lg">
                <div class="col-12 d-flex justify-content-between card-header ">
                        <div class="fs-5 text-center align-self-center">
                            <i class="fas fa-table me-1"></i>
                            Recibos Pagados
                        </div>     
                    </div>

                    <div class="card-body">
                        <table id="datatablesSimple" class="table">
                            <thead class="table-dark">
                                <tr>
                                    
                                    <th>Medidor</th>
                                    <th>Propietario</th>
                                    <th></th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach ($consumo as $cm)
                                    
                                    <tr>
                                        <th>{{ $cm->medidores->idMedidores }}</th>
                                        <td>{{ $cm->personas->nombre}}</td>
                                        <td>{{ $cm->personas->apellidos }}</td>
                                        <td>{{ $cm->monto }}</td>
                                        <td >
                                        </td>
                                    </tr>
                                    
                                @endforeach
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </main>
    </div>
    
@endsection
