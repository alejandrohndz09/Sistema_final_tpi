<?php
use App\Models\Canton;
?>

@php
    $canton = new Canton();
    $canton = session('canton');
@endphp

<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" type="text/css">

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-self-center fs-5 fw-semibold">
                    <i class="fas fa-location-dot" style="color: #3196cf"></i>&nbsp;<h1 class="fs-5" id="editModalLabel">Editar Registro</h1>
                </div>
                

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form-edit" name="form" method="POST">
                    @csrf
                    @method('PUT')
                   
                    <input type="hidden" id="id-e" name="id-e" value="" class="form-control"
                        tabindex="1">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" id="nombre-e" name="nombre-e" value="" class="form-control"
                            tabindex="1">
                    </div>
                    

                    <a href="/canton" class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Cancelar</a>
                    <button type="button" id="envio" class="btn btn-success" tabindex="4">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>




<script>
    let obj = null;
    $('body').on('click', '#editarCanton', function() {
        var customer_id = $(this).data('id');
        $.get('canton/' + customer_id + '/edit', function(data) {
            obj = data;
            document.getElementById("editModalLabel").innerHTML = "Editar Registro No." + obj.idCanton;
            document.getElementById("form-edit").setAttribute("action", "/canton/update");
            $("#form-edit input[name='id-e']").val(obj.idCanton);
            $("#form-edit input[name='nombre-e']").val(obj.nombre);
        });
    });
   
</script>

<script>
    $('#envio').click(function() {
        if (document.getElementById('nombre-e').value != '') {
            document.getElementById('form-edit').submit();
            $("#form-edit")[0].reset();
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Campos vacíos'
            });
        }
    })

    $("#form-edit").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "{{ url('/canton/') }}",
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
