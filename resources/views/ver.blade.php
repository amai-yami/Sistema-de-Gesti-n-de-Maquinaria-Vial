<div>
    <style>
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 15px 10px;
        }

        th, td {
            padding: 10px 15px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f5f5f5;
            border: 2px solid black;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .no-work {
            text-transform: uppercase;
            font-weight: bold;
            color: #999;
            padding-top: 10px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons form {
            display: inline;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #ffc107;
            color: black;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
    </style>

    <table>
        <thead>
            <tr>
                <th>Relación ID</th>
                <th>Máquina ID</th>
                <th>Número de Serie</th>
                <th>Marca/Modelo</th>
                <th>Tipo de Máquina</th>
                <th>Provincia</th>
                <th>Descripción de Proyecto</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Km Recorridos</th>
                <th>Razón de Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- Mostrar primero las máquinas con trabajos asignados --}}
            @foreach($machines->filter(fn($m) => $m->machinework->isNotEmpty()) as $machine)
                @foreach($machine->machinework as $mw)
                    <tr>
                        <td>{{ $mw->id }}</td>
                        <td>{{ $machine->id }}</td>
                        <td>{{ $machine->Serial_Number }}</td>
                        <td>{{ $machine->make_model }}</td>
                        <td>{{ $machine->machineType->type ?? 'sin tipo maquina asignado' }}</td>
                        <td>{{ $mw->work->province->name ?? 'sin provincia asignada' }}</td>
                        <td>{{ $mw->work->Description ?? 'sin descripcion asignada' }}</td>
                        <td>{{ $mw->work->start_date ?? 'sin fecha inicio' }}</td>
                        <td>{{ $mw->work->end_date ?? 'sin fecha fin' }}</td>
                        <td>{{ $mw->Mileage_traveled ?? 'sin km asignado' }}</td>
                        <td>{{ $mw->Reason_for_end ?? 'sin razón asignada' }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('machineswork.edit', $mw->id) }}" class="btn btn-edit">Editar</a>

                            <form action="{{ route('machineswork.destroy', $mw->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar esta relación?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach

            {{-- Mostrar después las máquinas sin trabajos asignados --}}
            @foreach($machines->filter(fn($m) => $m->machinework->isEmpty()) as $machine)
                <tr>
                    <td></td> <!-- Sin relación -->
                    <td>{{ $machine->id }}</td>
                    <td>{{ $machine->Serial_Number }}</td>
                    <td>{{ $machine->make_model }}</td>
                    <td>{{ $machine->machineType->type ?? 'sin tipo maquina asignado' }}</td>
                    <td colspan="6" class="no-work">🚫 Sin trabajos asignados</td>
                    <td></td> <!-- Acciones -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
