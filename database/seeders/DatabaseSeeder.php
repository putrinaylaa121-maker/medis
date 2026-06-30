<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun untuk Manager
        User::firstOrCreate([
            'email' => 'manager@medis.test',
        ], [
            'name' => 'Manager Medis',
            'password' => Hash::make('manager123'), // Password login: manager123
            'role' => 'manager',
        ]);

        // 2. Akun untuk Staff (Admin)
        User::firstOrCreate([
            'email' => 'staff@medis.test',
        ], [
            'name' => 'Staff Medis',
            'password' => Hash::make('staff123'), // Password login: staff123
            'role' => 'staff',
        ]);
    }
}