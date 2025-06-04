<form action="{{ route('work.store') }}" method="POST">
    @csrf
    <label>Descripción:</label>
    <input type="text" name="Description" required>

    <label>Fecha de inicio:</label>
    <input type="date" name="start_date" required>

    <label>Fecha de finalización:</label>
    <input type="date" name="end_date">

    <label>Provincia:</label>
   <select name="province_id" required>
        @foreach($provinces as $province)
            <option value="{{ $province->id }}">{{ $province->name }}</option>
        @endforeach
    </select>


    <button type="submit">Guardar</button>
</form>
