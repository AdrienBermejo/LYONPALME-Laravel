<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessCodeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CofinanceurController;
use App\Http\Controllers\AccueilController;

Route::get('/', [AccessCodeController::class, 'index']);
Route::post('/check-access', [AccessCodeController::class, 'checkAccess']);

Route::get('/accueil', [AccueilController::class, 'index'])->middleware('access');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// routes/web.php

Route::post('/products', [ProductController::class, 'store']);
Route::get('/products', [ProductController::class, 'index']);

Route::get('/add-product', [ProductController::class, 'create']);


require __DIR__.'/auth.php';

Route::get('/cofinanceurs', [CofinanceurController::class, 'index']);
Route::get('/cofinanceurs/create', [CofinanceurController::class, 'create']);
Route::post('/cofinanceurs', [CofinanceurController::class, 'store']);

//Route pour avoir la page d'accueil du site
Route::get('accueil',[AccueilController::class,'index']);