<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Relación Máquina - Trabajo</title>
</head>
<body>

<h1>Editar Relación Máquina - Trabajo (ID: {{ $machineWork->id }})</h1>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('machineswork.update', $machineWork->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="machine_id">Máquina:</label>
        <select name="machine_id" id="machine_id" required>
            <option value="">Seleccione una máquina</option>
            @foreach ($machines as $machine)
                <option value="{{ $machine->id }}" 
                    {{ old('machine_id', $machineWork->machine_id) == $machine->id ? 'selected' : '' }}>
                    {{ $machine->Serial_Number }} - {{ $machine->make_model }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="work_id">Trabajo:</label>
        <select name="work_id" id="work_id" required>
            <option value="">Seleccione un trabajo</option>
            @foreach ($works as $work)
                <option value="{{ $work->id }}" 
                    {{ old('work_id', $machineWork->work_id) == $work->id ? 'selected' : '' }}>
                    {{ $work->Description }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="start_date">Fecha de inicio:</label>
        <input type="date" name="start_date" id="start_date" 
            value="{{ old('start_date', $machineWork->start_date) }}" required>
    </div>

    <div>
        <label for="end_date">Fecha de fin:</label>
        <input type="date" name="end_date" id="end_date" 
            value="{{ old('end_date', $machineWork->end_date) }}">
    </div>

    <div>
        <label for="Reason_for_end">Motivo de fin:</label>
        <input type="text" name="Reason_for_end" id="Reason_for_end" 
            value="{{ old('Reason_for_end', $machineWork->Reason_for_end) }}">
    </div>

    <div>
        <label for="Mileage_traveled">Kilometraje:</label>
        <input type="number" name="Mileage_traveled" id="Mileage_traveled" 
            value="{{ old('Mileage_traveled', $machineWork->Mileage_traveled) }}">
    </div>

    <p><em>⚠️ Si completás alguno de los campos de finalización (fecha de fin, motivo o kilometraje), los tres serán obligatorios.</em></p>

    <button type="submit">Actualizar</button>
</form>

</body>
</html>
