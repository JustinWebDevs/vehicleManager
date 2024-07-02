<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiposVehiculosController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\ReportesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('tipoVehiculos', TiposVehiculosController::class)->middleware(['auth', 'verified']);
Route::resource('vehiculos', VehiculosController::class)->middleware(['auth', 'verified']);
Route::resource('ordenes', OrdenesController::class)->middleware(['auth', 'verified']);
Route::resource('items', ItemsController::class)->middleware(['auth', 'verified']);
Route::resource('reportes', ReportesController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
