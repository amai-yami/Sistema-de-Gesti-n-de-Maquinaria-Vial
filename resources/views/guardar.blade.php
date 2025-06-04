@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<form action="{{ route('machine.store') }}" method="POST">
    @csrf

    <label for="Serial_Number">numero de serie:</label>
    <input type="text" name="Serial_Number" id="Serial_Number" required>

    <label for="make_model">marca/modelo:</label>
    <input type="text" name="make_model" id="make_model" required>


   <label for="machine_type_id">tipo de maquina:</label>
    <select name="machine_type_id" id="machine_type_id" required>
        <option value="" disabled selected>Seleccione un tipo</option>
        @foreach($machineTypes as $type)
            <option value="{{ $type->id }}">{{ $type->type }}</option>
        @endforeach
    </select>


    <button type="submit">Guardar</button>
</form>
