<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AiConsultationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\KasirController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- TAMBAHAN RUTE FITUR TANYA MEDIS (AI) ---
    Route::get('/tanya-medis', [AiConsultationController::class, 'index'])->name('tanya-medis.index');
    Route::post('/tanya-medis/ask', [AiConsultationController::class, 'ask'])->name('tanya-medis.ask');
    // -------------------------------------------
    Route::get('/katalog', [KatalogController::class, 'index']);
    Route::delete('/katalog/{id}', [\App\Http\Controllers\KatalogController::class, 'destroy'])->name('katalog.destroy');

    Route::get('/kasir', [KasirController::class, 'index']);
    Route::post('/kasir/simpan', [KasirController::class, 'store'])->name('kasir.simpan');
});

require __DIR__.'/auth.php';