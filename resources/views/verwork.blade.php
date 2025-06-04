@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
        <a href="{{ route('index') }}" class="btn btn-primary ms-3">Volver</a>
    </div>
@else
<table class="table align-middle">
    <thead>
        <tr>
            <th class="px-3">/id proyecto/</th>
            <th class="px-3">/Descripcion/</th>
            <th class="px-3">/fecha inicio/</th>
            <th class="px-3">/fecha fin/</th>
            <th class="px-3">/id Provincia/</th>
            <th class="px-3">/nombre Provincia/</th>
            <th class="px-3">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($works as $work)
            <tr>
                <td class="px-3">{{ $work->id }}</td>
                <td class="px-3">{{ $work->Description }}</td>
                <td class="px-3">{{ $work->start_date }}</td>
                <td class="px-3">{{ $work->end_date ?? 'Sin finalizacion' }}</td>
                <td class="px-3">{{ $work->province_id }}</td>
                <td class="px-3">{{ $work->province?->name ?? 'Provincia no asignada' }}</td>
                <td class="px-3">
                    <form action="{{ route('work.destroy', $work->id) }}" method="POST" 
                          onsubmit="return confirm('¿Eliminar este proyecto?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                    <a href="{{ route('work.edit', $work->id) }}">
                        <button type="button" class="btn btn-secondary btn-sm ms-2" onclick="return confirm('¿Editar este proyecto?');">Editar</button>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No hay proyectos asignados</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endif
