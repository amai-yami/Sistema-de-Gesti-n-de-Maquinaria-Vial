<h2>Editar Máquina</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('machine.update', $machine->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="Serial_Number">numero de serie:</label>
    <input type="text" name="Serial_Number" id="Serial_Number" value="{{ old('Serial_Number', $machine->Serial_Number) }}" required>

    <label for="make_model">marca/modelo:</label>
    <input type="text" name="make_model" id="make_model" value="{{ old('make_model', $machine->make_model) }}" required>

        <label for="machine_type_id">tipo de maquina:</label>
        <select name="machine_type_id" id="machine_type_id" required>
            @foreach($machineTypes as $type)
                <option value="{{ $type->id }}" {{ $machine->machine_type_id == $type->id ? 'selected' : '' }}>
                    {{ $type->type }}
                </option>
            @endforeach
        </select>


    <button type="submit">Actualizar</button>
</form>
