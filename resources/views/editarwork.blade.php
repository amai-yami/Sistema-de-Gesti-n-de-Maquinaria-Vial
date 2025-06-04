<form action="{{ route('work.update', $work->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="Description">Descripción</label>
    <input type="text" name="Description" id="Description" value="{{ old('Description', $work->Description) }}" required>

    <label for="start_date">Fecha inicio</label>
    <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $work->start_date) }}" required>

    <label for="end_date">Fecha fin</label>
    <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $work->end_date) }}">

    <label for="province_id">Provincia</label>
    <select name="province_id" id="province_id" required>
        @foreach ($provinces as $province)
            <option value="{{ $province->id }}" {{ (old('province_id', $work->province_id) == $province->id) ? 'selected' : '' }}>
                {{ $province->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Actualizar</button>
</form>
