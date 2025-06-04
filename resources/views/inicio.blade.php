@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
        <a href="{{ route('index') }}" class="btn btn-primary ms-3">Volver</a>
    </div>
@else
    <table>
        <thead>
            <tr>
                <th>/numero de serie/</th>
                <th>/marca/modelo/</th>
                <th>/tipo de maquina/</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($machines as $machine)
                <tr>
                    <td>{{ $machine->Serial_Number }}</td>
                    <td>{{ $machine->make_model }}</td>
                    <td>{{ $machine->machinetype->type ?? 'Sin tipo' }}</td>
                    <td class="px-3">
                            <form action="{{ route('machine.destroy', $machine->id) }}" method="POST" 
                                onsubmit="return confirm('¿Eliminar esta máquina?');"
                                style="display: inline-block; margin-right: 5px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                            
                            <a href="{{ route('machine.edit', $machine->id) }}" style="display: inline-block;">
                                <button type="button" onclick="return confirm('¿Editar esta máquina?');">Editar</button>
                            </a>
                    </td>


                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay máquinas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endif
