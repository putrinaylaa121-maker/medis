<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KatalogSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel terlebih dahulu agar tidak bentrok saat di-seed ulang
        DB::table('katalogs')->truncate();

        DB::table('katalogs')->insert([
            [
                'kode_item'  => 'OBT-001',
                'nama_item'  => 'Paracetamol 500mg',
                'kategori'   => 'Anak & Dewasa',
                'satuan'     => 'Tablet',
                'harga'      => 5000,
                'stok'       => 100,
                'deskripsi'  => 'Obat penurun demam dan pereda nyeri ringan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item'  => 'OBT-002',
                'nama_item'  => 'Amoxicillin 500mg',
                'kategori'   => 'Antibiotik',
                'satuan'     => 'Kaplet',
                'harga'      => 12000,
                'stok'       => 50,
                'deskripsi'  => 'Obat antibiotik untuk mengobati infeksi bakteri.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item'  => 'OBT-003',
                'nama_item'  => 'Promag Tablet',
                'kategori'   => 'Obat Mag',
                'satuan'     => 'Tablet',
                'harga'      => 8500,
                'stok'       => 75,
                'deskripsi'  => 'Mengurangi gejala sakit mag dan kembung.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}