<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Route d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes pour l'authentification
require __DIR__.'/auth.php';

// Routes protégées par middleware admin pour les catégories
Route::middleware(['auth', 'admin.role'])->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


Route::get('photos', [PhotoController::class, 'index'])->name('photos.index');
Route::get('/', [PhotoController::class, 'create'])->name('photos.create');
Route::post('photos', [PhotoController::class, 'store'])->name('photos.store');
Route::get('photos/{photo}', [PhotoController::class, 'show'])->name('photos.show');
Route::get('photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
Route::put('photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
Route::delete('photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

// Route pour ajouter un commentaire à une photo (accessible aux visiteurs)
Route::post('/photos/{photo}/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});
