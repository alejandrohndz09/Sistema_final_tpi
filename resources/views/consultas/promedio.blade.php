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
                        <i class="fas fa-location-dot" style="color: #3196cf"></i>&nbsp;Cantones
                    </div>
                </div>

                <div class="card mb-4 shadow-lg">
                    <div class="col-12 d-flex justify-content-between card-header ">
                        <div class="fs-5 text-center align-self-center">
                            <i class="fa fa-tint"></i>
                            Consumo De Agua Promedio
                        </div>
                        
                    </div>
                    <div class="card-body">

                        <div class="container-fluid">
                            <div class="row">

                                @foreach ($consumo as $c)
                                    <div class="col-sm-3">
                                        <div class="card shadow p-3 mb-5 bg-body rounded" style="max-width: 300px;">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                </div>
                                                <div class="col-md-10">
                                                    <i class="fa fa-map-pin" aria-hidden="true" ></i>
                                                    <div class="card-body">
                                                        
                                                        <h5 class="card-title">{{ $c->nombre }}</h5>
                                                        <p class="card-text">Total ${{ $c->lectura }}</p>
                                                        <p class="card-text"><small class="text-muted">
                                                            </small></p>
                                                    </div>
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
