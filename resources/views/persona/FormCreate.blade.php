<?php
use App\Models\Persona;
use App\Models\Canton;
?>
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" type="text/css">

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-self-center fs-5 fw-semibold">
                    <i class="fas fa-tachometer-alt" style="color: #3196cf"></i>&nbsp;<h1 class="fs-5"
                        id="editModalLabel">Crear Registro</h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-create" name="form" method="POST">

                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">DUI</label>
                        <input type="text" id="dui" name="dui" class="form-control" tabindex="1">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" tabindex="1">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" tabindex="3">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telefono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" tabindex="3">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Canton</label>
                        <select class="form-select" name="canton" tabindex="1" id="canton" required>
                            <option value="-1" selected>Seleccione</option>

                            @foreach (Canton::all() as $c)
                                <option value="{{ $c->idCanton }}">{{ $c->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Correo</label>
                        <input type="text" id="correo" name="correo" class="form-control" tabindex="3">
                    </div>
                    <a class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Cancelar</a>
                    <button type="button" id="guardar" class="btn btn-success" tabindex="4">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Archivos JavaScript de Select2 -->

<script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@10.3.5/dist/sweetalert2.min.js') }}"></script>
<script>
    let selects = ['#canton', '#persona'];

    $('#createModal').on('shown.bs.modal', function() {
        $(this).find('form')[0].reset();
        for (var sl of selects) {
            $(sl).select2({
                dropdownParent: $('#createModal'),
                placeholder: 'Seleccione',
            });
        }
    });

    $('#createModal').on('hidden.bs.modal', function() {
        for (var sl of selects) {
            $(sl).select2('destroy');
        }

    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
        iconColor: 'white',
        
        customClass: {
            popup: 'colored-toast'
        },
        
    });
</script>

<script>
    // Función para validar campos vacíos

    $('#guardar').click(function() {

        if (document.getElementById('dui').value != '-1' &&
            document.getElementById('nombre').value != '-1' &&
            document.getElementById('apellido').value != '-1' &&
            document.getElementById('telefono').value != '-1' &&
            document.getElementById('canton').value != '-1'  {
            document.getElementById('form-create').submit();
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Campos vacíos'
            });
        }
    });
    // Función para validar campos vacíos
</script>

@if (session()->has('alert'))
    <script>
        Toast.fire({
            icon: "{{ session()->get('alert')['type'] }}",
            title: "{{ session()->get('alert')['message'] }}",
        });

        @php
            session()->forget('alert');
        @endphp
    </script>
@endif
