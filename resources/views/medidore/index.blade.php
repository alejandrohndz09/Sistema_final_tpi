@extends('layouts.master')



@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tables</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tables</li>
                </ol>
               
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="articulos/create" class="btn btn-secondary">CREAR</a>
                        <table id="articulos" class="table table-secondary tabla-bordered shadow-lg mt-5"
                            style="width:100%">

                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>

                                    <th>Idmedidores</th>
                                    <th>Ruta</th>
                                    <th>Referencia</th>
                                    <th>Idusuario</th>
                                    <th>Idcanton</th>

                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($medidores as $medidore)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $medidore->idMedidores }}</td>
                                        <td>{{ $medidore->ruta }}</td>
                                        <td>{{ $medidore->referencia }}</td>
                                        <td>{{ $medidore->idUsuario }}</td>
                                        <td>{{ $medidore->idCanton }}</td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    @endsection
