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
                        <i class="fas fa-tint" style="color: #3196cf"></i>&nbsp;Consumo De Agua Promedio
                    </div>
                </div>

                <div class="card mb-4 shadow-lg">
                   
                    <div class="card-body">

                        <div class="container-fluid">
                            <div class="row">

                                @foreach ($consumo as $c)
                                    <div class="col-sm-3">
                                            <div class="card shadow p-3 mb-5 bg-body rounded" style="max-width: 300px;">
                                                <div class="row g-0">
                                                <div class="col-md-3 d-flex align-items-center justify-content-center">
                                                    <span class="font-weight-bold"><i class="fa fa-location-dot" style="color: #72c151; font-size: 55px"></i></span>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <h5 class="card-title fw-bold">{{ $c->nombre }}</h5>
                                                        <p class="card-text mb-0 fw-semibold">Total  {{ $c->lectura }} m³</p>
                                                        <p class="card-text fs-6"><small class="text-muted"></small></p>
                                                    </div>
                                                   
                                            </div>
                                        </div>
                                    

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        

                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
