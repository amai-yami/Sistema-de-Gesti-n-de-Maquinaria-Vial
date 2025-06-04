<h2>Editar tipo de Máquina</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('machinetype.update', $machinetype->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="type">tipo de maquina:</label>
    <input type="text" name="type" id="type" value="{{ old('type', $machinetype->type) }}" required>


    <button type="submit">Actualizar</button>
</form>
