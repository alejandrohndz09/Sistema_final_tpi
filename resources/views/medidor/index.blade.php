<?php

use App\Models\Medidor;
use App\Models\Canton;

?>
@extends('layouts.master')

@section('content')
    <div id="layoutSidenav_content" >
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
                        <table id="datatablesSimple" class="table">
                            <thead class="table-dark">
                                <tr>


                                    <th class="col-sm-1">Código</th>
                                    <th>Ubicación/Sector</th>
                                    <th>Dueño</th>
                                    <th class="col-sm-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cantonActual = '';
                                @endphp
                                @foreach ($medidores as $m)
                                    @if ($m->canton->nombre != $cantonActual)
                                        <tr scope="col" class="table-secondary">
                                            <th colspan="5" style="">CANTÓN {{ $m->canton->nombre }}
                                            </th>
                                        </tr>
                                        @php
                                            $cantonActual = $m->canton->nombre;
                                        @endphp
                                    @endif
                                    <tr>

                                        <th scope="row">{{ $m->idMedidores }}</th>
                                        <td>{{ $m->referencia }}</td>
                                        <td>{{ $m->persona == null ? 'No asignado' : $m->persona }}
                                        </td>
                                        <td>
                                            @include('medidor.dropdown')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        @include('medidor.FormCreate')
                        @include('medidor.FormEdit')
                        
                        

                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
