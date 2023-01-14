<?php
use App\Models\Canton;
?>
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" type="text/css">

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-self-center fs-5 fw-semibold">
                    <i class="fas fa-location-dot" style="color: #3196cf"></i>&nbsp;<h1 class="fs-5" id="editModalLabel">Crear Registro</h1>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-create" name="form" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" tabindex="1">
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
    // Función para validar campos vacíos

    $('#guardar').click(function() {

        if (document.getElementById('nombre').value != '') {
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
