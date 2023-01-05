@extends('layouts.app')

@section('template_title')
    {{ $medidore->name ?? 'Show Medidore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Medidore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medidores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idmedidores:</strong>
                            {{ $medidore->idMedidores }}
                        </div>
                        <div class="form-group">
                            <strong>Ruta:</strong>
                            {{ $medidore->ruta }}
                        </div>
                        <div class="form-group">
                            <strong>Referencia:</strong>
                            {{ $medidore->referencia }}
                        </div>
                        <div class="form-group">
                            <strong>Idusuario:</strong>
                            {{ $medidore->idUsuario }}
                        </div>
                        <div class="form-group">
                            <strong>Idcanton:</strong>
                            {{ $medidore->idCanton }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
