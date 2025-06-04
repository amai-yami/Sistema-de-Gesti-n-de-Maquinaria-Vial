<div class="container mt-4">
    <h3 class="mb-4">Listado de Proyectos y Máquinas Asignadas</h3>

    @forelse ($work as $item)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <strong>{{ $item->Description }}</strong>
                <span>Provincia: {{ $item->province?->name ?? 'No asignada' }}</span>
            </div>
            <div class="card-body">
                <p><strong>Fecha inicio:</strong> {{ $item->start_date }}</p>
                <p><strong>Fecha fin:</strong> {{ $item->end_date ?? 'En curso' }}</p>

                <h6 class="mt-3">Máquinas asignadas:</h6>
                @if ($item->machinework->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Motivo de finalización</th>
                                    <th>Kilometraje</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th>Máquina</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item->machinework as $mw)
                                    <tr>
                                        <td>{{ $mw->id }}</td>
                                        <td>{{ $mw->Reason_for_end ?? 'N/A' }}</td>
                                        <td>{{ $mw->Mileage_traveled ?? 'N/A' }}</td>
                                        <td>{{ $mw->start_date }}</td>
                                        <td>{{ $mw->end_date ?? 'En uso' }}</td>
                                        <td>{{ $mw->machine?->Serial_Number ?? 'No disponible' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">No hay máquinas asignadas a este proyecto.</p>
                @endif

                {{-- Botones editar y eliminar --}}
                <div class="mt-3">
                    <a href="{{ route('work.edit', $item->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('work.destroy', $item->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar este proyecto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">No hay proyectos registrados.</div>
    @endforelse
</div>
