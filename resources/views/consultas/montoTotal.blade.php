<?php
use App\Models\Consultas;
use App\Models\Cantones;
use App\Models\Medidores;
?>
@extends('layouts.master')

@section('content')
    <div id="layoutSidenav_content" >
        <main>
            <div class="container-fluid px-4">
                <div class="card shadow-lg align-self-center my-4 ">
                    <div class="my-3 mx-2 fs-1 fw-semibold">
                        <i class="fas fa-location-dot" style="color: #3196cf"></i>&nbsp;Consultas
                    </div>
                </div>


                <div class="card mb-4 shadow-lg">
                    <div class="col-12 d-flex justify-content-between card-header ">
                        <div class="fs-5 text-center align-self-center">
                            <i class="fas fa-table me-1"></i>
                            Registros
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th class="col-sm-5">Canton</th>
                                    <th>Monto</th>
                                    <th class="col-sm-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consumo as $consumo)
                                    
                                    <tr>
                                        
                                        <th>{{ $consumo->nombre }}</th>
                                        <td>{{ $consumo->total}}</td>
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
