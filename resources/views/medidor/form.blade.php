<?php
use App\Models\Persona;
use App\Models\Canton;
?>
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" type="text/css">

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/medidor/{{ $medidor->idPersona }}" name="form" method="POST">
                    @csrf
                    @if ($medidor->idMedidores != null)
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label for="" class="form-label">Cliente Poseedor</label>
                        <select class="form-select" name="persona" tabindex="1" id="persona" required>
                            @if ($medidor->idMedidor == null)

                                <option value="-1" selected>Seleccione</option>

                                @foreach (Persona::all() as $t)
                                    <option value="{{ $t->idPersona }}">{{ $t }}</option>
                                @endforeach
                            @else
                                <option value="{{ $medidor->idPersona }}"selected>
                                    {{ $medidor->persona }}</option>
                                @foreach (Persona::all() as $t)
                                    <?php if($t->idPersona!=$medidor->idPersona){?>
                                    <option value="{{ $t->idPersona }}">{{ $t }}</option>
                                    <?php }?>
                                @endforeach
                            @endif
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Cantón</label>
                        <select class="form-select" name="canton" tabindex="1" id="canton" required>
                            @if ($medidor->idCanton == null)

                                <option value="-1" selected>Seleccione</option>

                                @foreach (Canton::all() as $c)
                                    <option value="{{ $c->idCanton }}">{{ $c->nombre }}</option>
                                @endforeach
                            @else
                                <option value="{{ $medidor->idCanton }}"selected>
                                    {{ $medidor->canton->nombre }}</option>
                                @foreach (Canton::all() as $c)
                                    <?php if($c->idCanton!=$medidor->idCanton){?>
                                    <option value="{{ $t->idCanton }}">{{ $t->nombre }}</option>
                                    <?php }?>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Ruta</label>
                        <input type="text" id="ruta" name="ruta" value="{{ $medidor->ruta }}"
                            class="form-control" tabindex="1">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Referencia</label>
                        <input type="text" id="referencia" name="referencia" value="{{ $medidor->referencia }}"
                            class="form-control" tabindex="3">
                    </div>


                    <a href="/medidor" class="btn btn-secondary" tabindex="5">Cancelar</a>
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
    // Mostrar alerta cuando se despliegue el select


    var selectOriginal = $("#persona").html();
    $('#exampleModal').on('shown.bs.modal', function() {
        $('.form-select').select2({
            dropdownParent: $('#exampleModal'),
            placeholder: 'Seleccione',

        });
    });

    $('#exampleModal').on('hidden.bs.modal', function() {
        $('.form-select').select2('destroy');
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
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
@if (Session::has('type') && Session::has('message'))
    <script>
        Toast.fire({
            icon: "{{ Session::get('type') }}",
            title: "{{ Session::get('message') }}",
        }).then(() => {
            @session()->forget('message', 'type']);
        });  
    </script>
@endif
