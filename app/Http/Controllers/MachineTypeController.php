<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\MachineType;
use App\Models\MachineWork;
use App\Models\Province;
use App\Models\Work;

class MachineTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
        public function index(Request $request)
        {
            $id = $request->input('id');

            if ($id) {
                $machinestype = MachineType::with('machine')->where('id', $id)->get();
            } else {
                $machinestype = MachineType::with('machine')->get();
            }

            return view('consultartype', compact('machinestype'));
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $machineTypes = MachineType::all(); // para el select
         return view('guardartype', compact('machineTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
    'type' => 'required|string|max:255|unique:machines_types,type',
]);


   MachineType::create([
    'type' => $request->type,
]);


    return redirect()->route('machinetype.create')->with('success', ' tipo maquina Máquina guardada correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $machineTypes = MachineType::with('machine')->get();

        return view('vertype', compact('machineTypes'));
    }


    /**
     * Show the form for editing the specified resource.
     */
      public function edit($id)
{
    $machinetype = MachineType::findOrFail($id);
  
   return view('editartype', compact('machinetype'));

}

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, string $id)
{
    $machinetype = MachineType::findOrFail($id);

    $request->validate([
         'type' => 'required|string|max:255|unique:machines_types,type,' . $id,


    ]);

        $machinetype->update([
            'type' => $request->type,

        ]);


    return view('indextype')->with('success', 'Máquina actualizada correctamente.');

}

    /**
     * Remove the specified resource from storage.
     */
          public function destroy($id)
    {
        MachineType::findOrFail($id)->delete();
        return view('indextype')->with('success', 'tipo de Máquina eliminada');
    }

}
