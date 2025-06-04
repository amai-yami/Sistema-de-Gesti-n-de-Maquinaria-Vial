<style>
    .action-buttons {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .action-buttons form,
    .action-buttons a {
        margin: 0;
    }
</style>

<div>
    @if (session('success'))
        <div class="alert alert-success mt-3 d-flex justify-content-between align-items-center">
            <span>{{ session('success') }}</span>
            <a href="{{ route('province.index') }}" class="btn btn-sm btn-primary">Volver</a>
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead class="table-light">
            <tr>
                <th>ID Provincia</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($provincies as $province)
        <tr>
            <td>{{ $province->id }}</td>
            <td>{{ $province->name ?? 'Sin nombre' }}</td>
            <td class="px-3 action-buttons">
                <form action="{{ route('province.destroy', $province->id) }}" method="POST" 
                    onsubmit="return confirm('¿Eliminar esta provincia?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>

                <a href="{{ route('province.edit', $province->id) }}">
                    <button type="button" class="btn btn-sm btn-warning" onclick="return confirm('¿Editar esta provincia?');">Editar</button>
                </a>
            </td>


        </tr>

            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">No hay provincias registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
