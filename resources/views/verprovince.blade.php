<div>
    <table>
        <thead>
            <tr>
                <th>provincia ID</th>
                <th>nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- provincias --}}
            @foreach($provinces as $province)
                    <tr>
                        <td>{{ $province->id }}</td>
                        <td>{{ $province->name }}</td>
                          <td class="px-3">
                            <form action="{{ route('province.destroy', $province->id) }}" method="POST" 
                                onsubmit="return confirm('¿Eliminar esta provincia?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                            <a href="{{ route('province.edit', $province->id) }}">
                                <button type="button" class="btn btn-secondary btn-sm ms-2" onclick="return confirm('¿Editar esta provincia?');">Editar</button>
                            </a>
                        </td>
                    </tr>

            @endforeach

        </tbody>
    </table>
</div>
