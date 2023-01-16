<?php

use App\Models\Persona;
use App\Models\Canton;

?>
@extends('layouts.master')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
             <div class="card shadow-lg align-self-center my-4 ">
                    <div class="my-3 mx-2 fs-1 fw-semibold">
                        <i class="fas fa-users" style="color: #3196cf"></i>&nbsp;Clientes
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
                                    
                                    
                                    <th >DUI</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Teléfono</th>
                                    <th>Cantón</th>
                                    <th class="col-sm-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach ($personas as $persona)
                                    
                                    <tr>
                                        
                                        <th>{{ $persona->idPersona }}</th>
                                        <td>{{ $persona->nombre}}</td>
                                        <td>{{ $persona->apellidos }}</td>
                                        <td>{{ $persona->telefono }}</td>
                                        <td>{{ $persona->canton->nombre}}</td>
                                        <td >
                                          @include('persona.dropdown')
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
