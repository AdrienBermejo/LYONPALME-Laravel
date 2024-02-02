<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessCodeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CofinanceurController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\AppointementController;
use App\Http\Controllers\ReservationController;

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
Route::get('/appointements', [AppointementController::class,'index'])->name('appointements.index')->middleware('auth');
Route::post('/appointements',[AppointementController::class,'store'])->name('appointements.store');

// Routes pour les produits
Route::middleware('auth')->group(function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/add-product', [ProductController::class, 'create']);
});

// Routes pour les partenaires
Route::middleware('auth')->group(function () {
    Route::post('/partners', [PartnerController::class, 'store']);
    Route::get('/partners', [PartnerController::class, 'index']);
    Route::get('/add-partners', [PartnerController::class, 'create']);
});

// Routes pour les cofinanceurs
Route::middleware('auth')->group(function () {
    Route::get('/cofinanceurs', [CofinanceurController::class, 'index']);
    Route::get('/cofinanceurs/create', [CofinanceurController::class, 'create']);
    Route::post('/cofinanceurs', [CofinanceurController::class, 'store']);
});

// Route pour la page d'accueil du site
Route::get('/accueil', [AccueilController::class, 'index']);

// Route pour la page de réservation
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');

// Authentification
require __DIR__.'/auth.php';
