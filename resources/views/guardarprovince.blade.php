@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<form action="{{ route('province.store') }}" method="POST">
    @csrf


    <label for="name">nombre de la Provincia:</label>
    <input type="text" name="name" id="name" required>




    <button type="submit">Guardar</button>
</form>
