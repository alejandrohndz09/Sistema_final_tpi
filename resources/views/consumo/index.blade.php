<?php

use App\Models\Medidor;
use App\Models\Canton;

?>
@extends('layouts.master')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="card shadow-lg align-self-center my-4 ">
                    <div class="my-3 mx-2 fs-1 fw-semibold">
                        <i class="fas fa-tachometer-alt" style="color: #3196cf"></i>&nbsp;Medidores
                    </div>
                </div>


                <div class="card mb-4 shadow-lg">
                    <div class="col-12 d-flex justify-content-between card-header ">
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
                                                <div class="col-md-4">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Medidor No. {{ $m->idMedidores }}</h5>
                                                        <p class="card-text">CANTON {{ $m->canton->nombre }}</p>
                                                        <p class="card-text"><small class="text-muted">
                                                                <td>{{ $m->referencia }}</td>
                                                            </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @include('medidor.dropdown')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @include('medidor.FormCreate')
                        @include('medidor.FormEdit')



                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
