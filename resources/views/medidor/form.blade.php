<?php use App\Models\Persona;
?>
 <link
 href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css"
 rel="stylesheet"
/>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/medidor/{{ $medidor->idPersona }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Cliente Poseedor</label>
                        <select class="form-select" name="persona" id="persona" required tabindex="4">
                            @if ($medidor->idMedidor == null) 

                                <option value="{{ $medidor->idPersona }}" selected>Seleccione</option>

                                @foreach (Persona::all() as $t)
                                    <option value="{{ $t->idPersona }}">{{ $t }}</option>
                                @endforeach
                            @else
                                <option value="{{ $medidor->idPersona }}"selected>
                                    {{ Persona::find($medidor->idPersona)->nombre }}</option>
                                @foreach ($personas as $t)
                                    <?php if($t->idPersona!=$medidor->idPersona){?>
                                    <option value="{{ $t->idPersona }}">{{ $t->nombre }}</option>
                                    <?php }?>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">r</label>
                        <input type="text" readonly id="idPersona" name="idPersona" pattern="[0-9]{8}-[0-9]{1}$"
                            value="{{ $medidor->idPersona }}" minlength="10" maxlength="10" placeholder="xxxxxxxx-x"
                            class="form-control" required tabindex="1">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Cantón</label>
                        <input type="text" id="nombre" name="nombre" value="{{ $medidor->idCanron }}"
                            class="form-control" required tabindex="1">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Referencia</label>
                        <input type="text" id="apellido" name="apellido" value="{{ $medidor->referencia }}"
                            class="form-control" required tabindex="3">
                    </div>


                    <a href="/medidor" class="btn btn-secondary" tabindex="5">Cancelar</a>
                    <button type="submit" class="btn btn-success" tabindex="4">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

  <!-- Archivos JavaScript de Select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#persona').select2({
        theme: 'bootstrap',
        placeholder: 'Select a state',
      });
    });
  </script>
