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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/medidor" id="edit" name="form" method="POST">
                    @csrf

                    @method('PUT')

                    <div class="mb-3">
                        <label for="" class="form-label">Cliente Poseedor</label>
                        <select class="form-select" name="persona" tabindex="1" id="persona-e" required>
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
                                <option value="{{ $c->idCanton }}">{{ $c->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Ruta</label>
                        <input type="text" id="ruta" name="ruta" value="" class="form-control"
                            tabindex="1">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Referencia</label>
                        <input type="text" id="referencia" name="referencia" value="" class="form-control"
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
    //Recuperar inputs del formulario
    let modalEditar = $('#editModal');
    let urlEditar = "{{ url('/medidor') }}";
    let formEditarVideo = document.querySelector('#edit');
    let ePersona = document.querySelector('#persona');
    let eCanton = document.querySelector('#canton');
    let eRuta = document.querySelector('#ruta');
    let eReferencia = document.querySelector('#referencia');
</script>


<script>
    let obj=null;
    $('body').on('click', '#editarMedidor', function() {
        var customer_id = $(this).data('id');
        $.get('medidor/' + customer_id + '/edit', function(data) {
            obj = data;

            // $('#editModal').modal('show');
        });
    });
    $('#editModal').on('shown.bs.modal', function() { //Cuando el modal se muestreee
        console.log(obj);
        $('.form-select').select2({
            dropdownParent: $('#editModal'),
            placeholder: 'Seleccione',

        });
        document.getElementById("persona-e").value=obj.idPersona;
        $("#edit select[name='canton']").val(obj.idcanton);
        $("#edit input[name='ruta']").val(obj.ruta);
        $("#edit input[name='referencia']").val(obj.referencia);
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
