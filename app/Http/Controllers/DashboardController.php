<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // 👉 Tambahkan ini

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pastikan user memiliki data role
        if (!$user) {
            return redirect()->route('login');
        }

        // Pengecekan hak akses (Role)
        if ($user->role === 'manager') {
            return view('manager.dashboard'); 
        } 
        
        if ($user->role === 'staff') {
            return view('staff.dashboard'); 
        }

        // 👉 Penanganan darurat jika role tidak terdaftar sebagai manager/staff
        Log::warning("User {$user->email} mencoba login dengan role tidak dikenal: " . $user->role);
        
        // Buatkan halaman fallback sederhana agar tidak error exception trace
        // Pastikan file resources/views/dashboard.blade.php ada, atau arahkan ke profile
        if (view()->exists('dashboard')) {
            return view('dashboard');
        }
        
        // Jika dashboard bawaan tidak ada, arahkan ke halaman edit profile sementara
        return redirect()->route('profile.edit')->with('error', 'Role akun Anda belum diset untuk dashboard operasional.');
    }
}