<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Machine;
use App\Models\MachineType;
use App\Models\MachineWork;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $id = $request->input('id');

            if ($id) {
                $work = Work::with('machinework')->where('id', $id)->get();
            } else {
                $work = Work::with('machinework')->get();
            }

            return view('consultarwork', compact('work'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $provinces = Province::all();
          $work = Work::all(); // para el select
          return view('guardarwork', compact('work','provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
   

    $request->validate([
        'Description'  => 'required|string|max:255|unique:works,Description',
        'start_date'   => 'required|date',
        'end_date'     => 'nullable|date|after_or_equal:start_date',
        'province_id'  => 'required|exists:provinces,id',
    ]);
     
    Work::create([
        'Description'  => $request->Description,
        'start_date'   => $request->start_date,
        'end_date'     => $request->end_date ?? null,
        'province_id'  => $request->province_id,
    ]);

    return redirect()->route('work.create')->with('success', 'Proyecto guardado correctamente.');
}


    /**
     * Display the specified resource.
     */
public function show(Work $work)
{
    $machineWorks = MachineWork::all();
    $provinces = Province::all();
    $works = Work::with('province')->get(); // ← ESTE ES EL CAMBIO

    return view('verwork', compact('machineWorks', 'provinces', 'works'));
}


    /**
     * Show the form for editing the specified resource.
     */
            public function edit($id)
        {
            $work = Work::findOrFail($id);
            $provinces = Province::all(); // Traer las provincias para el select

            return view('editarwork', compact('work', 'provinces'));
        }


    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, string $id)
    {
        $work = Work::findOrFail($id);


                            $request->validate([
                    'Description' => [
                        'required',
                        'string',
                        'max:255',
                        Rule::unique('works', 'Description')->ignore($id),
                    ],
                    'start_date'  => 'required|date',
                    'end_date'    => 'nullable|date|after_or_equal:start_date',
                    'province_id' => 'required|exists:provinces,id',
                ]);

        
            $work->update([
                'Description'  => $request->Description,
                'start_date'   => $request->start_date,
                'end_date'     => $request->end_date ?? null,
                'province_id'  => $request->province_id,
            ]);


        return view('indexwork')->with('success', 'Máquina actualizada correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy($id)
    {
        Work::findOrFail($id)->delete();
        return view('indexwork')->with('success', 'obra finalizada');
    }
}
