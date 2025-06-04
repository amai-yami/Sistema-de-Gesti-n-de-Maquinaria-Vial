<h2>Editar Provincia</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('province.update', $province->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nombre de la Provincia:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $province->name) }}" required>

    <button type="submit">Actualizar</button>
</form>
