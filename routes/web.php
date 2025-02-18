<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\AdminSpeciesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/catalogo', [EspeciesController::class, 'index'])->name('catalogo.index');
Route::get('/especies/{id}', [EspeciesController::class, 'show'])->name('catalogo.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Proteger rutas de admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->middleware(['auth', 'verified'])->name('admin.')->group(function () {
        Route::resource('especies', AdminSpeciesController::class)
            ->parameters(['especies' => 'species']) // Mapea "especies" al modelo Species
            ->names([
                'index' => 'especies.index',
                'create' => 'especies.create',
                'store' => 'especies.store',
                'edit' => 'especies.edit',
                'update' => 'especies.update',
                'destroy' => 'especies.destroy'
            ]);
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
