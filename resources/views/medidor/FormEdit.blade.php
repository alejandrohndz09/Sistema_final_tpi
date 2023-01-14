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

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-self-center fs-5 fw-semibold">
                    <i class="fas fa-tachometer-alt" style="color: #3196cf"></i>&nbsp;<h1 class="fs-5" id="editModalLabel">Editar Registro</h1>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form-edit" name="form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Cliente Poseedor</label>
                        <select class="form-select" name="persona-e" tabindex="1" id="persona-e" required>
                            {{-- <option value="{{ $medidor->idPersona }}"selected>
                                {{ $medidor->persona }}</option> --}}
                            @foreach (Persona::all() as $t)
                                <option value="{{ $t->idPersona }}">{{ $t }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Cantón</label>
                        <select class="form-select" name="canton-e" tabindex="1" id="canton-e" required>
                            {{-- <option value="{{ $medidor->idCanton }}"selected>
                                {{ $medidor->canton->nombre }}</option> --}}
                            @foreach (Canton::all() as $c)
                                <option value="{{ $c->idCanton }}">{{ $c->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" id="id-e" name="id-e" value="" class="form-control"
                        tabindex="1">
                    <div class="mb-3">
                        <label for="" class="form-label">Ruta</label>
                        <input type="text" id="ruta-e" name="ruta-e" value="" class="form-control"
                            tabindex="1">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Referencia</label>
                        <input type="text" id="referencia-e" name="referencia-e" value="" class="form-control"
                            tabindex="3">
                    </div>


                    <a href="/medidor" class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Cancelar</a>
                    <button type="button" id="envio" class="btn btn-success" tabindex="4">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>




<script>
    let obj = null;
    $('body').on('click', '#editarMedidor', function() {
        var customer_id = $(this).data('id');
        $.get('medidor/' + customer_id + '/edit', function(data) {
            obj = data;
            document.getElementById("editModalLabel").innerHTML = "Editar Registro No." + obj.idMedidores;
            document.getElementById("form-edit").setAttribute("action", "/medidor/update");
            $("#form-edit input[name='id-e']").val(obj.idMedidores);
            document.getElementById("persona-e").value = obj.idPersona;
            document.getElementById("canton-e").value = obj.idCanton;

            $("#form-edit input[name='ruta-e']").val(obj.ruta);
            $("#form-edit input[name='referencia-e']").val(obj.referencia);

            $('.form-select').select2({
                dropdownParent: $('#editModal'),
                placeholder: 'Seleccione',

            });
        });
    });
    $('#editModal').on('shown.bs.modal', function() { //Cuando el modal se muestreee


    });
</script>

<script>
    $('#envio').click(function() {
        if (document.getElementById('persona-e').value != -1 &&
            document.getElementById('canton-e').value != -1) {
            document.getElementById('form-edit').submit();
            $("#form-edit")[0].reset();
        } else {
            Toast.fire({
                icon: 'error',
                title: 'La selección de Persona y Cantón son necesarias'
            });
        }
    })

    $("#form-edit").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "{{ url('/medidor/') }}",
            type: 'POST',
            data: data,
            success: function(response) {
                if (response.success) {
                    $("#form-edit")[0].reset();
                } else {
                    alert("Error al crear el registro");
                }
            }
        });
    });
</script>


@if (session()->has('alert'))
    <script>
        Toast.fire({
            icon: "{{ session()->get('alert')['type'] }}",
            title: "{{ session()->get('alert')['message'] }}",
        });

        @php
            session()->keep('alert');
        @endphp
    </script>
@endif
