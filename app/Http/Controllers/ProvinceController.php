<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Machine;
use App\Models\MachineType;
use App\Models\MachineWork;
use App\Models\Work;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $id = $request->input('id');

    if ($id) {
        $provinces = Province::where('id', $id)->get();
    } else {
        $provinces = Province::all();
    }

    return view('consultarprovince', ['provincies' => $provinces]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $province = Province::all(); // para el select
         return view('guardarprovince', compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|unique:provinces,name',
            ]);

            Province::create([
                'name' => $request->name,
            ]);

            return redirect()->route('province.create')->with('success', 'Provincia guardada correctamente.');
        }


    /**
     * Display the specified resource.
     */
    public function show(Province $province)
    {

            $machineWorks = MachineWork::all();
            $provinces = Province::all();
            $works = Work::all();

            return view('verprovince', compact( 'machineWorks', 'provinces', 'works'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
           $province = Province::findOrFail($id);

    return view('editarprovince', compact('province'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $province = Province::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:provinces,name,' . $id,
        ]);


        $province->update([
          'name' => $request->name,
        ]);


    return view('indexprovince')->with('success', 'provincia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
           public function destroy($id)
    {
        Province::findOrFail($id)->delete();
        return view('indexprovince')->with('success', 'Province eliminada');
    }

}
