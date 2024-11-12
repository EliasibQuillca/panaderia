<?php

use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('medicos', MedicoController::class);
Route::delete('medico/{id}', [MedicoController::class, 'destroy'])->name('medicos.destroy');
Route::get('medicos/create', [MedicoController::class, 'create'])->name('medicos.create');
Route::post('medicos', [MedicoController::class, 'store'])->name('medicos.store');
Route::get('medicos', [MedicoController::class, 'index'])->name('medicos.index');

