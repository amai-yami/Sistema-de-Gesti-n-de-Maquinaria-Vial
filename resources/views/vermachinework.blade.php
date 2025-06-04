<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relaciones Máquina - Trabajo</title>
</head>
<body>

<h1>Relaciones Guardadas</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<form method="GET" action="{{ route('machineswork.index') }}">
    <label for="search">Buscar por ID de relación:</label>
    <input type="text" name="search" id="search" placeholder="ID de relación" value="{{ request('search') }}">
    <button type="submit">Buscar</button>
</form>


<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Máquina</th>
            <th>Trabajo</th>
            <th>Motivo</th>
            <th>Kilometraje</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($relations as $rel)
            <tr>
                <td>{{ $rel->id }}</td>
                <td>{{ $rel->machine->Serial_Number ?? 'N/A' }} - {{ $rel->machine->make_model ?? 'N/A' }}</td>
                <td>{{ $rel->work->Description ?? 'N/A' }}</td>
                <td>{{ $rel->Reason_for_end }}</td>
                <td>{{ $rel->Mileage_traveled }}</td>
                <td>{{ $rel->start_date }}</td>
                <td>{{ $rel->end_date }}</td>
                <td>
                    <a href="{{ route('machineswork.edit', $rel->id) }}">
                        <button type="button">Editar</button>
                    </a>
                    <form action="{{ route('machineswork.destroy', $rel->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar esta relación?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align:center;">No se encontraron relaciones.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
