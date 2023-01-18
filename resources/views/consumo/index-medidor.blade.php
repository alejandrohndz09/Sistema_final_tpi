<?php

use App\Models\Medidor;
use App\Models\Canton;

?>
@extends('layouts.master')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="card shadow align-self-center my-4 ">
                    <div class="my-3 mx-2 fs-1 fw-semibold">
                        <i class="fas fa-chart-area" style="color: #3196cf"></i>&nbsp;Consumos
                    </div>
                </div>


                <div class="mb-4">
                    <div class="shadow col-12 d-flex justify-content-between card-header ">
                        <div class="fs-5 text-center align-self-center">
                            <i class="fas fa-table me-1"></i>
                            Registros
                        </div>
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"
                            data-bs-whatever="@mdo">
                            <i class="fas fa-add"></i>Agregar
                        </a>

                    </div>
                    <div class="card-body">
                        <!-- -->
                        <div class="container-fluid">
                            <div class="row">

                                @foreach ($medidores as $m)
                                    <div class="col-sm-3">
                                        <div class="card shadow p-3 mb-5 bg-body rounded" style="max-width: 300px;">
                                            <div class="row g-0">
                                                <div class="col-md-3 d-flex align-items-center">
                                                    <span class="font-weight-bold"><i class="fa fa-weight-scale" style="color: #f5a623; font-size: 55px"></i></span>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <h5 class="card-title fw-bold">Medidor No. {{ $m->idMedidores }}</h5>
                                                        <p class="card-text mb-0 fw-semibold">CANTON {{ $m->canton->nombre }}</p>
                                                        <p class="card-text fs-6"><small class="text-muted">
                                                                {{ $m->referencia }}
                                                            </small></p>
                                                    </div>
                                                    <a href="consumo/{{ $m->idMedidores }}"  class="stretched-link"></a>
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
