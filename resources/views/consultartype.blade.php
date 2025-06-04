<div>
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
            <a href="{{ route('machinetype.index') }}" class="btn btn-primary ms-3">Volver</a>
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Tipo de Máquina</th>
                    <th>Máquinas asociadas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($machinestype as $type)
                    <tr>
                        <td>{{ $type->type }}</td>
                        <td>
                            @if ($type->machine && $type->machine->count() > 0)
                                <ul>
                                    @foreach ($type->machine as $machine)
                                        <li>{{ $machine->Serial_Number }} - {{ $machine->make_model }}</li>
                                    @endforeach
                                </ul>
                            @else
                                Sin máquinas
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('machinetype.edit', $type->id) }}">
                                <button type="button">Editar</button>
                            </a>
                            <form action="{{ route('machinetype.destroy', $type->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar este tipo de máquina?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay tipos de máquinas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endif
</div>
