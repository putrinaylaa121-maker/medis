<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AiConsultationController;
use App\Http\Controllers\DashboardController;
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
});

require __DIR__.'/auth.php';