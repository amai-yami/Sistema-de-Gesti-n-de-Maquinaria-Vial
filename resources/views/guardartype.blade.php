@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<form action="{{ route('machinetype.store') }}" method="POST">
    @csrf

    <label for="type">tipo de maquina:</label>
    <input type="text" name="type" id="type" required>


    <button type="submit">Guardar</button>
</form>
