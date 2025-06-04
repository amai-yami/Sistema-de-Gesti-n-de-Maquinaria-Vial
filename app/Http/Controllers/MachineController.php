<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\MachineType;
use App\Models\MachineWork;
use App\Models\Province;
use App\Models\Work;
use Illuminate\Http\Request;

class MachineController extends Controller
{
      /**
     * Display a listing of the resource.
     */
        public function index(Request $request)
        {
            $id = $request->input('id');

            if ($id) {
                $machines = Machine::with('machinetype')->where('id', $id)->get();
            } else {
                $machines = Machine::with('machinetype')->get();
            }

            return view('inicio', compact('machines'));
        }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $machineTypes = MachineType::all(); // para el select
    return view('guardar', compact('machineTypes'));
}

public function store(Request $request)
{
    $request->validate([
        'Serial_Number' => 'required|unique:machines',
        'make_model' => 'required',
        'machine_type_id' => 'required|exists:machines_types,id',
    ]);

    Machine::create([
        'Serial_Number' => $request->Serial_Number,
        'make_model' => $request->make_model,
       'machine_type_id' => $request->machine_type_id,
    ]);

    return redirect()->route('machine.create')->with('success', 'Máquina guardada correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('index');
    }



        public function showall()
        {
            $machines = Machine::all();
            $machineTypes = MachineType::all();
            $machineWorks = MachineWork::all();


            return view('vermachine', compact('machines', 'machineTypes', 'machineWorks'));
        }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $machine = Machine::findOrFail($id);
    $machineTypes = MachineType::all();
    return view('editar', compact('machine', 'machineTypes'));
}


    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, string $id)
{
    $machine = Machine::findOrFail($id);

    $request->validate([
        'Serial_Number' => 'required|unique:machines,Serial_Number,' . $id,
        'make_model' => 'required',
        'machine_type_id' => 'required|exists:machines_types,id',
    ]);

        $machine->update([
            'Serial_Number' => $request->Serial_Number,
            'make_model' => $request->make_model,
            'machine_type_id' => $request->machine_type_id,
        ]);


    return view('index')->with('success', 'Máquina actualizada correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
         public function destroy($id)
    {
        Machine::findOrFail($id)->delete();
        return view('eliminar')->with('success', 'Máquina eliminada');
    }


}
