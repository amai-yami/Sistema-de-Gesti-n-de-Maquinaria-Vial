<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Relación Máquina - Trabajo</title>
</head>
<body>

<h1>Crear Relación Máquina - Trabajo</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
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

<form action="{{ route('machineswork.store') }}" method="POST">
    @csrf

    <div>
        <label for="machine_id">Máquina:</label>
        <select name="machine_id" id="machine_id" required>
            <option value="">Seleccione una máquina</option>
            @foreach($machines as $machine)
                <option value="{{ $machine->id }}" 
                    {{ old('machine_id') == $machine->id ? 'selected' : '' }}>
                    {{ $machine->Serial_Number }} - {{ $machine->make_model }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="work_id">Trabajo:</label>
        <select name="work_id" id="work_id" required>
            <option value="">Seleccione un trabajo</option>
            @foreach($works as $work)
                <option value="{{ $work->id }}" 
                    {{ old('work_id') == $work->id ? 'selected' : '' }}>
                    {{ $work->Description }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="start_date">Fecha de inicio:</label>
        <input type="date" name="start_date" id="start_date" 
            value="{{ old('start_date', now()->toDateString()) }}" required>
    </div>

    <div>
        <label for="end_date">Fecha de fin:</label>
        <input type="date" name="end_date" id="end_date" 
            value="{{ old('end_date') }}" placeholder="Opcional, completar si finaliza">
    </div>

    <div>
        <label for="Reason_for_end">Motivo de fin:</label>
        <input type="text" name="Reason_for_end" id="Reason_for_end" 
            value="{{ old('Reason_for_end') }}" placeholder="Opcional, completar si finaliza">
    </div>

    <div>
        <label for="Mileage_traveled">Kilometraje:</label>
        <input type="number" name="Mileage_traveled" id="Mileage_traveled" min="0" 
            value="{{ old('Mileage_traveled') }}" placeholder="Opcional, completar si finaliza">
    </div>

    <p><em>⚠️ Si completás alguno de los campos de finalización (fecha de fin, motivo o kilometraje), los tres serán obligatorios.</em></p>

    <button type="submit">Guardar</button>
</form>

</body>
</html>
