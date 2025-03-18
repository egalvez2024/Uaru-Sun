<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\AdminSpeciesController;
use App\Http\Controllers\ComentarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioPostController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CourseController;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/catalogo', [EspeciesController::class, 'index'])->name('catalogo.index');
Route::get('/especies/{id}', [EspeciesController::class, 'show'])->name('catalogo.show');
Route::get('/UsuarioPost', [UsuarioPostController::class, 'index'])->name('UsuarioPost.index');
Route::get('/UsuarioPost/create', [UsuarioPostController::class, 'create'])->name('UsuarioPost.create');
Route::post('/UsuarioPost', [UsuarioPostController::class, 'store'])->name('UsuarioPost.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware(['auth'])->group(function () {
    Route::get('/favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');
    Route::post('/favoritos', [FavoritoController::class, 'store'])->name('favoritos.store');
    Route::delete('/favoritos/{id}', [FavoritoController::class, 'destroy'])->name('favoritos.destroy');
});

Route::resource('/comentarios', ComentarioController::class);
Route::get('/comentarios/create/{id}', [ComentarioController::class, 'create'])->name('comentarios.create');

Route::middleware(['auth'])->group(function () {
    Route::get('/favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');
    Route::post('/favoritos', [FavoritoController::class, 'store'])->name('favoritos.store');
    Route::delete('/favoritos/{id}', [FavoritoController::class, 'destroy'])->name('favoritos.destroy');
});

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

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/store', [StoreController::class, 'index'])->name('store.index');
    Route::get('/courses', [CourseController::class, 'index'])->name('course.index');
});

require __DIR__.'/auth.php';
