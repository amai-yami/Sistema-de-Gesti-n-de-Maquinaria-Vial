<div>
    <table>
        <thead>
            <tr>
                <th>Máquina ID</th>
                <th>Número de serie</th>
                <th>Marca/Modelo</th>
                <th>Tipo de Máquina</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($machines as $machine)
                <tr>
                    <td>{{ $machine->id }}</td>
                    <td>{{ $machine->Serial_Number }}</td>
                    <td>{{ $machine->make_model }}</td>
                    <td>{{ $machine->machineType->type ?? 'Sin asignación' }}</td>
                    <td>
                        @if($machine->machinework->isNotEmpty())
                            ✔ Con trabajos
                        @else
                            <span style="color: #999;">🚫 Sin trabajos asignados</span>
                        @endif
                    </td>
                    <td>
                        @if($machine->machineType)
                            <a href="{{ route('machine.edit', $machine->id) }}">
                                <button type="button">Editar</button>
                            </a>
                            <form action="{{ route('machine.destroy', $machine->id) }}"
                                  method="POST"
                                  style="display:inline-block;"
                                  onsubmit="return confirm('¿Eliminar esta máquina?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        @else
                            <span style="color: #888;">Sin tipo asignado</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
