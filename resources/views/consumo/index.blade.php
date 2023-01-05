@extends('layouts.app')

@section('template_title')
    Consumo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Consumo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('consumos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Lectura Anterior</th>
										<th>Lectura Actual</th>
										<th>Fecha A Facturar</th>
										<th>Desde</th>
										<th>Hasta</th>
										<th>Monto</th>
										<th>Estado</th>
										<th>Vence</th>
										<th>Idmedidores</th>
										<th>Mora</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consumos as $consumo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $consumo->lectura_anterior }}</td>
											<td>{{ $consumo->lectura_actual }}</td>
											<td>{{ $consumo->fecha_a_facturar }}</td>
											<td>{{ $consumo->desde }}</td>
											<td>{{ $consumo->hasta }}</td>
											<td>{{ $consumo->monto }}</td>
											<td>{{ $consumo->estado }}</td>
											<td>{{ $consumo->vence }}</td>
											<td>{{ $consumo->idMedidores }}</td>
											<td>{{ $consumo->mora }}</td>

                                            <td>
                                                <form action="{{ route('consumos.destroy',$consumo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('consumos.show',$consumo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('consumos.edit',$consumo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $consumos->links() !!}
            </div>
        </div>
    </div>
@endsection
