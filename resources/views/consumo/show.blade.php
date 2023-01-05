@extends('layouts.app')

@section('template_title')
    {{ $consumo->name ?? 'Show Consumo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Consumo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('consumos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Lectura Anterior:</strong>
                            {{ $consumo->lectura_anterior }}
                        </div>
                        <div class="form-group">
                            <strong>Lectura Actual:</strong>
                            {{ $consumo->lectura_actual }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha A Facturar:</strong>
                            {{ $consumo->fecha_a_facturar }}
                        </div>
                        <div class="form-group">
                            <strong>Desde:</strong>
                            {{ $consumo->desde }}
                        </div>
                        <div class="form-group">
                            <strong>Hasta:</strong>
                            {{ $consumo->hasta }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $consumo->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $consumo->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Vence:</strong>
                            {{ $consumo->vence }}
                        </div>
                        <div class="form-group">
                            <strong>Idmedidores:</strong>
                            {{ $consumo->idMedidores }}
                        </div>
                        <div class="form-group">
                            <strong>Mora:</strong>
                            {{ $consumo->mora }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
