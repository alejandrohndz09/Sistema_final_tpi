<?php
use App\Models\Persona;
use App\Models\Canton;
use App\Models\Medidor;
?>

@php
    $medidor = new Medidor();
    $medidor = session('medidor');
@endphp

<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" type="text/css">

<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/medidor" id="" name="form" method="POST">
                    @csrf

                    @method('PUT')

                    <div class="mb-3">
                        <label for="" class="form-label">Cliente Poseedor</label>
                        <select class="form-select" name="persona" tabindex="1" id="persona" required>
                            {{-- <option value="{{ $medidor->idPersona }}"selected>
                                {{ $medidor->persona }}</option> --}}
                            @foreach (Persona::all() as $t)
                                
                                <option value="{{ $t->idPersona }}">{{ $t }}</option>
                                
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Cantón</label>
                        <select class="form-select" name="canton" tabindex="1" id="canton" required>
                            {{-- <option value="{{ $medidor->idCanton }}"selected>
                                {{ $medidor->canton->nombre }}</option> --}}
                            @foreach (Canton::all() as $c)
                               
                                <option value="{{ $t->idCanton }}">{{ $t->nombre }}</option>
                                
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Ruta</label>
                        <input type="text" id="ruta" name="ruta" value=""
                            class="form-control" tabindex="1">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Referencia</label>
                        <input type="text" id="referencia" name="referencia" value=""
                            class="form-control" tabindex="3">
                    </div>


                    <a href="/medidor" class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Cancelar</a>
                    <button type="button" id="envio" class="btn btn-success" tabindex="4">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <script src="{{ asset('js/jquery.js') }}"></script>

<!-- Archivos JavaScript de Select2 -->
<script src="{{ asset('js/select2.min.js')}}"></script> --}}
<script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@10.3.5/dist/sweetalert2.min.js') }}"></script>
<script>
    var selectOriginal = $("#persona").html();
    $('#exampleModalEdit').on('shown.bs.modal', function() {
        $(this).find('form')[0].reset();
        let botonPresionado = $(event.relatedTarget);
        console.log(botonPresionado);
        $('.form-select').select2({
            dropdownParent: $('#exampleModalEdit'),
            placeholder: 'Seleccione',

        });
    });

    // $('#exampleModalEdit').on('hidden.bs.modal', function() {
    //     $('.form-select').select2('destroy');
    // });
    
</script>

<script>
    $('#envio').click(function() {
        if (document.getElementById('persona').value != '-1' &&
            document.getElementById('canton').value != '-1') {
            document.form.submit();
        } else {
            Toast.fire({
                icon: 'error',
                title: 'La selección de Persona y Cantón son necesarias'
            });
        }
    })
</script>

@if (session()->has('alert'))
    <script>
        Toast.fire({
            icon: "{{ session()->get('alert')['type'] }}",
            title: "{{ session()->get('alert')['message'] }}",
        });
        @if (session()->has('alert'))
            @php
                session()->forget('alert');
            @endphp
        @endif
    </script>
@endif
