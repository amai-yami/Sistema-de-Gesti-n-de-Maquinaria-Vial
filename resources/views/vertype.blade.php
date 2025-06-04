{{-- resources/views/machine_types/index.blade.php --}}
<div>
    <h2>Listado de Tipos de Máquina</h2>

    <table>
        <thead>
            <tr>
                <th>ID del Tipo</th>
                <th>Nombre del Tipo</th>
                <th>Máquinas Asignadas</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($machineTypes as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->type }}</td>
                    <td>{{ optional($type->machine)->count() ?? 0 }}</td>
                    <td>
                        @if($type->machine->isNotEmpty())
                            ✔ Tiene máquinas asignadas
                        @else
                            🚫 Sin máquinas asignadas
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('machinetype.edit', $type->id) }}">
                            <button type="button">Editar</button>
                        </a>

                        <form action="{{ route('machinetype.destroy', $type->id) }}"
                              method="POST"
                              style="display:inline-block;"
                              onsubmit="return confirm('¿Eliminar este tipo de máquina? Las máquinas quedarán sin tipo.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
