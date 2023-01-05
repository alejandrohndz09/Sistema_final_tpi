<?php

use App\Models\Medidor;
use App\Models\Canton;

?>
@extends('layouts.master')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Medidores</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Medidores</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@mdo">
                            <i class="bi bi-plus-circle"></i> Agregar
                        </button>

                        @include('medidor.form')
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Registros
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table">
                            <thead class="table-dark">
                                <tr>
                                    
                                    
                                    <th>Ubicación</th>
                                    <th>Sector</th>
                                    <th>Responsable</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cantonActual = '';
                                @endphp
                                @foreach ($medidores as $medidor)
                                    @if ($medidor->canton->nombre != $cantonActual)
                                        <tr scope="col" class="table-secondary">
                                            <th colspan="5" style="">CANTÓN {{ $medidor->canton->nombre }}
                                            </th>
                                        </tr>
                                        @php
                                            $cantonActual = $medidor->canton->nombre;
                                        @endphp
                                    @endif  
                                    <tr>
                                        
                                        <td>{{ $medidor->idMedidores }}</td>
                                        <td>{{ $medidor->referencia }}</td>
                                        <td>{{$medidor->persona==null?'No asignado':$medidor->persona->toString}}</td>
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
