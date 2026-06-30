<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AiConsultationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController; // <--- JANGAN LUPA TAMBAHKAN INI DI ATAS
use App\Http\Controllers\TransactionController; // <--- JANGAN LUPA TAMBAHKAN INI DI ATAS
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

    // --- TAMBAHAN RUTE INVENTARIS DAN TRANSAKSI ---
    Route::get('/inventaris', [InventoryController::class, 'index'])->name('inventaris.index');
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi.index');
    // ----------------------------------------------
});

require __DIR__.'/auth.php';