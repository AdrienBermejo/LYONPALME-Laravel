<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessCodeController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AppointementController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;

// Route d'accueil avec vérification de l'accès
Route::get('/', [AccessCodeController::class, 'index']);
Route::post('/check-access', [AccessCodeController::class, 'checkAccess']);

// Route du tableau de bord
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes de gestion du profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes pour les rendez-vous
Route::middleware('auth')->group(function() {
    Route::get('/appointements', [AppointementController::class,'index'])->name('appointements.index');
    Route::post('/appointements',[AppointementController::class,'store'])->name('appointements.store');
    Route::delete('/appointements/{appointement}',[AppointementController::class,'destroy'])->name('appointements.destroy');
});


// Routes pour l'administration
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/products', [AdminController::class, 'storeProduct']);
    Route::post('/admin/partners', [AdminController::class, 'storePartner']);
    Route::post('/admin/cofinanceurs', [AdminController::class, 'storeCofinanceur']);
    Route::post('/admin/delete/product', [AdminController::class, 'deleteProduct']);
    Route::post('/admin/delete/partner', [AdminController::class, 'deletePartner']);
    Route::post('/admin/delete/cofinanceur', [AdminController::class, 'deleteCofinanceur']);

});

// Route pour la page d'accueil du site
Route::get('/accueil', [AccueilController::class, 'index']);

// Route pour la page de réservation
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');

// Authentification
require __DIR__.'/auth.php';
