<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\MachineType;
use App\Models\MachineWork;
use App\Models\Province;
use App\Models\Work;

class MachineWorkController extends Controller
{
    public function index(Request $request)
    {
        $query = MachineWork::with(['machine', 'work']);

        if ($request->has('search') && is_numeric($request->search)) {
            $query->where('id', $request->search);
        }

        $relations = $query->get();

        return view('vermachinework', compact('relations'));
    }

    public function create()
    {
        $machines = Machine::all();
        $works = Work::all();
        return view('guardarmachinework', compact('machines', 'works'));
    }

    public function store(Request $request)
    {
        // Validar que la máquina no tenga asignación activa
        $active = MachineWork::where('machine_id', $request->machine_id)
            ->whereNull('end_date')
            ->exists();

        if ($active) {
            return back()->withErrors([
                'machine_id' => 'La máquina ya tiene una asignación activa.'
            ])->withInput();
        }

        $rules = [
            'machine_id' => 'required|exists:machines,id',
            'work_id' => 'required|exists:works,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date|before_or_equal:today',
            'Reason_for_end' => 'nullable|string|max:255',
            'Mileage_traveled' => 'nullable|integer|min:0',
        ];

        // Si completa un campo de finalización, obliga todos
        if (
            $request->filled('end_date') ||
            $request->filled('Reason_for_end') ||
            $request->filled('Mileage_traveled')
        ) {
            $rules['end_date'] = 'required|date|after_or_equal:start_date|before_or_equal:today';
            $rules['Reason_for_end'] = 'required|string|max:255';
            $rules['Mileage_traveled'] = 'required|integer|min:0';
        }

        $request->validate($rules);

        MachineWork::create($request->only([
            'machine_id', 'work_id', 'start_date', 'end_date',
            'Reason_for_end', 'Mileage_traveled'
        ]));

        // Si se finaliza la asignación al crearla, actualizar la obra
        if ($request->filled('end_date')) {
            Work::where('id', $request->work_id)
                ->update(['end_date' => $request->end_date]);
        }

        return redirect()->route('machineswork.create')
            ->with('success', 'Relación guardada correctamente.');
    }

    public function show()
    {
        return view('index');
    }

    public function showall()
    {
        $machines = Machine::with(['machinework.work.province', 'machineType'])->get();
        return view('ver', compact('machines'));
    }

    public function edit($id)
    {
        $machineWork = MachineWork::findOrFail($id);
        $machines = Machine::all();
        $works = Work::all();

        return view('editarmachinework', compact('machineWork', 'machines', 'works'));
    }

    public function update(Request $request, $id)
    {
        $machineWork = MachineWork::findOrFail($id);

        $rules = [
            'machine_id' => 'required|exists:machines,id',
            'work_id' => 'required|exists:works,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date|before_or_equal:today',
            'Reason_for_end' => 'nullable|string|max:255',
            'Mileage_traveled' => 'nullable|integer|min:0',
        ];

        if (
            $request->filled('end_date') ||
            $request->filled('Reason_for_end') ||
            $request->filled('Mileage_traveled')
        ) {
            $rules['end_date'] = 'required|date|after_or_equal:start_date|before_or_equal:today';
            $rules['Reason_for_end'] = 'required|string|max:255';
            $rules['Mileage_traveled'] = 'required|integer|min:0';
        }

        $request->validate($rules);

        $machineWork->update($request->only([
            'machine_id', 'work_id', 'start_date', 'end_date',
            'Reason_for_end', 'Mileage_traveled'
        ]));

        if ($request->filled('end_date')) {
            Work::where('id', $request->work_id)
                ->update(['end_date' => $request->end_date]);
        }

        return view('indexmachinework')->with('message', 'Relación actualizada correctamente.');
    }

    public function destroy($id)
    {
        $machineWork = MachineWork::findOrFail($id);
        $machineWork->delete();

        return view('indexmachinework')->with('success', 'Relación eliminada correctamente.');
    }

    /**
     * (Opcional) Mostrar historial de una máquina específica
     */
    public function history($machine_id)
    {
        $machine = Machine::with(['machineType', 'machinework.work.province'])->findOrFail($machine_id);
        return view('historialmachine', compact('machine'));
    }
}
