<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LayupController;
use App\Http\Controllers\LayerController;
use App\Http\Controllers\SupplierTransferController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('suppliers', SupplierController::class);
Route::resource('layups', LayupController::class);
Route::resource('layers', LayerController::class);

Route::get(
    '/suppliers/{supplier}/export',
    [SupplierTransferController::class, 'export']
)->name('suppliers.export');

Route::post(
    '/suppliers/import',
    [SupplierTransferController::class, 'import']
)->name('suppliers.import');

require __DIR__.'/auth.php';
