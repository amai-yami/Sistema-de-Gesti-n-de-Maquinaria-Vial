<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexSeeController;
use App\Http\Controllers\MachineWorkController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MachineTypeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\WorkController;


Route::get('/', function () {
   return view('indexview');
});
//indexview
//vermachine

Route::prefix('machineswork')->group(function () {


    // Rutas adicionales específicas
    Route::get('/machineswork/index', [MachineWorkController::class, 'index'])->name('machineswork.index');
    Route::get('/machineswork/show', [MachineWorkController::class, 'show'])->name('machineswork.show');
    Route::get('/machineswork/showall', [MachineWorkController::class, 'showall'])->name('machineswork.showall');



    // Crear nueva relación máquina-trabajo
    Route::get('/machineswork/create', [MachineWorkController::class, 'create'])->name('machineswork.create');
    Route::post('/machineswork', [MachineWorkController::class, 'store'])->name('machineswork.store');
    Route::get('/machineswork/edit/{id}', [MachineWorkController::class, 'edit'])->name('machineswork.edit');
    Route::put('/machineswork/update/{id}', [MachineWorkController::class, 'update'])->name('machineswork.update');
    Route::delete('/machineswork/destroy/{id}', [MachineWorkController::class, 'destroy'])->name('machineswork.destroy');
    // Otra función externa (quizás exportar o enviar algo)

});


Route::prefix('machine')->group(function () {
Route::get('/machine/index', [MachineController::class, 'index'])->name('machine.index');
Route::get('/machine/showall', [MachineController::class, 'showall'])->name('machine.showall');
Route::get('/machine/show', [MachineController::class, 'show'])->name('machine.show');
Route::get('/machine/create', [MachineController::class, 'create'])->name('machine.create');
Route::post('/machine', [MachineController::class, 'store'])->name('machine.store');
Route::get('/machine/edit/{id}', [MachineController::class, 'edit'])->name('machine.edit');
Route::put('/machine/update/{id}', [MachineController::class, 'update'])->name('machine.update');
Route::delete('/machine/destroy/{id}', [MachineController::class, 'destroy'])->name('machine.destroy');
});


// Grupo para tipos de máquinas
Route::prefix('machinetype')->group(function () {
    Route::get('/', [MachineTypeController::class, 'index'])->name('machinetype.index');
    Route::get('/create', [MachineTypeController::class, 'create'])->name('machinetype.create');
    Route::post('/store', [MachineTypeController::class, 'store'])->name('machinetype.store');
    Route::get('/show', [MachineTypeController::class, 'show'])->name('machinetype.show');
    Route::get('/edit/{id}', [MachineTypeController::class, 'edit'])->name('machinetype.edit');
    Route::put('/update/{id}', [MachineTypeController::class, 'update'])->name('machinetype.update');
    Route::delete('/destroy/{id}', [MachineTypeController::class, 'destroy'])->name('machinetype.destroy');
});

// Grupo para tipos de máquinas
Route::prefix('province')->group(function () {
    Route::get('/', [ProvinceController::class, 'index'])->name('province.index');
    Route::get('/create', [ProvinceController::class, 'create'])->name('province.create');
    Route::post('/store', [ProvinceController::class, 'store'])->name('province.store');
    Route::get('/show', [ProvinceController::class, 'show'])->name('province.show');
    Route::get('/edit/{id}', [ProvinceController::class, 'edit'])->name('province.edit');
    Route::put('/update/{id}', [ProvinceController::class, 'update'])->name('province.update');
    Route::delete('/destroy/{id}', [ProvinceController::class, 'destroy'])->name('province.destroy');
});


// Grupo para tipos de máquinas
Route::prefix('work')->group(function () {
    Route::get('/', [WorkController::class, 'index'])->name('work.index');
    Route::get('/create', [WorkController::class, 'create'])->name('work.create');
    Route::post('/store', [WorkController::class, 'store'])->name('work.store');
    Route::get('/show', [WorkController::class, 'show'])->name('work.show');
    Route::get('/edit/{id}', [WorkController::class, 'edit'])->name('work.edit');
    Route::put('/update/{id}', [WorkController::class, 'update'])->name('work.update');
    Route::delete('/destroy/{id}', [WorkController::class, 'destroy'])->name('work.destroy');
});



Route::prefix('indexsee')->group(function () {
    Route::get('/province', [IndexSeeController::class, 'showprovince'])->name('indexsee.province');
    Route::get('/work', [IndexSeeController::class, 'showwork'])->name('indexsee.work');
    Route::get('/machine', [IndexSeeController::class, 'showmachine'])->name('indexsee.machine');
    Route::get('/machinetype', [IndexSeeController::class, 'showmachinetype'])->name('indexsee.machinetype');
    Route::get('/machinework', [IndexSeeController::class, 'showmachinework'])->name('indexsee.machinework');
});
