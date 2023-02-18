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
                        <i class="fas fa-chart-area" style="color: #3196cf"></i>&nbsp;Consumos
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
                        <div class="row g-0" style="max-width: 900px">
                            <div class="col-md-1 d-flex align-items-center justify-content-center">
                                <span class="font-weight-bold"><i class="fa fa-weight-scale"
                                        style="color: #5d5d5d; font-size: 55px"></i></span>
                            </div>
                            <div class="col-md-9">
                                <h5 class="card-title fw-bold">Medidor No. {{ $medidor->idMedidores }}</h5>
                                <p class="card-text mb-0 fw-semibold">CLIENTE:
                                    {{ $medidor->persona->nombre . ' ' . $medidor->persona->apellidos }}</p>
                                <p class="card-text fs-6">
                                    <small class="text-muted">{{ $medidor->ruta . ', ' . $medidor->referencia }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th class="col-sm-1">No.</th>
                                    <th>Consumo</th>
                                    <th>Fecha de Facturación</th>
                                    <th>Fecha de Vencimiento</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                    <th class="col-sm-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($consumos as $m)
                                    <tr>
                                        @php
                                            $i++;
                                        @endphp
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $m->lectura_actual . ' m³' }}</td>
                                        <td>{{ explode(' ', $m->fecha_a_facturar)[0] }}</td>
                                        <td>{{ explode(' ', $m->vence)[0] }}</td>
                                        <td>{{ '$' . $m->monto }}</td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <div>
                                                <span
                                                    class="badge text-bg-{{ $m->estado == 0 ? 'secondary' : ($m->estado == 1 ? 'success' : 'danger') }}">{{ $m->estado == 0 ? 'Emitido' : ($m->estado == 1 ? 'Pagado' : 'En mora') }}</span>
                                            </div>
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
