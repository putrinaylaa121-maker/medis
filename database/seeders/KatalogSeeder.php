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
            [
                'kode_item'  => 'OBT-004',
                'nama_item'  => 'Ibuprofen 400mg',
                'kategori'   => 'Anak & Dewasa',
                'satuan'     => 'Tablet',
                'harga'      => 6500,
                'stok'       => 80,
                'deskripsi'  => 'Obat anti-inflamasi untuk meredakan nyeri dan demam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item'  => 'OBT-005',
                'nama_item'  => 'Cetirizine 10mg',
                'kategori'   => 'Antialergi',
                'satuan'     => 'Tablet',
                'harga'      => 4500,
                'stok'       => 60,
                'deskripsi'  => 'Obat antihistamin untuk meredakan gejala alergi seperti gatal dan bersin.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item'  => 'OBT-006',
                'nama_item'  => 'OBH Combi Batuk Berdahak',
                'kategori'   => 'Obat Batuk',
                'satuan'     => 'Botol',
                'harga'      => 15000,
                'stok'       => 40,
                'deskripsi'  => 'Sirup untuk meredakan batuk berdahak.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item'  => 'OBT-007',
                'nama_item'  => 'Oralit Serbuk',
                'kategori'   => 'Elektrolit',
                'satuan'     => 'Sachet',
                'harga'      => 2000,
                'stok'       => 150,
                'deskripsi'  => 'Mengganti cairan dan elektrolit tubuh saat diare.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item'  => 'OBT-008',
                'nama_item'  => 'Vitamin C 500mg',
                'kategori'   => 'Vitamin & Suplemen',
                'satuan'     => 'Tablet',
                'harga'      => 3500,
                'stok'       => 120,
                'deskripsi'  => 'Suplemen untuk menjaga daya tahan tubuh.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item'  => 'OBT-009',
                'nama_item'  => 'Betadine Larutan Antiseptik',
                'kategori'   => 'Antiseptik',
                'satuan'     => 'Botol',
                'harga'      => 18000,
                'stok'       => 30,
                'deskripsi'  => 'Cairan antiseptik untuk membersihkan luka.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item'  => 'OBT-010',
                'nama_item'  => 'Antasida Doen',
                'kategori'   => 'Obat Mag',
                'satuan'     => 'Tablet',
                'harga'      => 3000,
                'stok'       => 8,
                'deskripsi'  => 'Menetralkan asam lambung berlebih.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item'  => 'OBT-011',
                'nama_item'  => 'Dextromethorphan 15mg',
                'kategori'   => 'Obat Batuk',
                'satuan'     => 'Tablet',
                'harga'      => 5500,
                'stok'       => 45,
                'deskripsi'  => 'Meredakan batuk kering.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_item'  => 'OBT-012',
                'nama_item'  => 'Loperamide 2mg',
                'kategori'   => 'Obat Diare',
                'satuan'     => 'Kapsul',
                'harga'      => 7000,
                'stok'       => 5,
                'deskripsi'  => 'Meredakan gejala diare akut.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}