<div class="dropdown mx-3">
    <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
        aria-expanded="false">
        Acciones
    </button>


    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <li><a href="" id="editarMedidor" class="dropdown-item btn"
                data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $persona->idPersona }}">
                <i class="fas fa-pencil"></i>&emsp;Editar
            </a>
        </li>
        <li>
            <form action="{{ route('medidor.destroy', $persona->idPersona) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">
                    <i class="fas fa-trash"></i>&emsp;Eliminar
                </button>
            </form>
        </li>

    </ul>
</div>

<script>
    
</script>
