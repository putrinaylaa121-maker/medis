<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KatalogSeeder extends Seeder
{
    public function run(): void
    
    {
        $this->call([
            KatalogSeeder::class,
        ]);

        DB::table('katalogs')->insert([
            [
                'kode_item' => 'OBAT-001',
                'nama_item' => 'Paracetamol 500mg',
                'kategori' => 'Obat Bebas',
                'satuan' => 'Strip',
                'harga' => 5000,
                'stok' => 100,
                'deskripsi' => 'Obat untuk menurunkan demam dan meredakan nyeri ringan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item' => 'OBAT-002',
                'nama_item' => 'Amoxicillin 500mg',
                'kategori' => 'Obat Keras',
                'satuan' => 'Strip',
                'harga' => 12000,
                'stok' => 50,
                'deskripsi' => 'Antibiotik untuk mengobati berbagai jenis infeksi bakteri.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item' => 'ALKES-001',
                'nama_item' => 'Masker Medis 3-Ply',
                'kategori' => 'Alat Kesehatan',
                'satuan' => 'Box',
                'harga' => 35000,
                'stok' => 30,
                'deskripsi' => 'Masker pelindung kesehatan isi 50 pcs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}