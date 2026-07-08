<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pengecekan hak akses (Role)
        if ($user->role === 'manager') {
            return view('manager.dashboard'); 
        } elseif ($user->role === 'staff') {
            return view('staff.dashboard'); 
        }

        return view('dashboard');
    }
}