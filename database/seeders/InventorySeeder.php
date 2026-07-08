<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1 - 10: Obat Umum & Pereda Nyeri
        Obat::create(['nama_obat' => 'Paracetamol 500mg', 'kategori' => 'Obat Umum', 'stok' => 150, 'harga' => 5000]);
        Obat::create(['nama_obat' => 'Ibuprofen 400mg', 'kategori' => 'Obat Umum', 'stok' => 120, 'harga' => 8000]);
        Obat::create(['nama_obat' => 'Asam Mefenamat 500mg', 'kategori' => 'Obat Umum', 'stok' => 200, 'harga' => 6500]);
        Obat::create(['nama_obat' => 'Natrium Diklofenak 50mg', 'kategori' => 'Obat Umum', 'stok' => 90, 'harga' => 12000]);
        Obat::create(['nama_obat' => 'Acetylsalicylic Acid (Aspirin)', 'kategori' => 'Obat Umum', 'stok' => 100, 'harga' => 7000]);
        Obat::create(['nama_obat' => 'CTM (Chlorphenamine)', 'kategori' => 'Antihistamin', 'stok' => 300, 'harga' => 2500]);
        Obat::create(['nama_obat' => 'Loratadine 10mg', 'kategori' => 'Antihistamin', 'stok' => 150, 'harga' => 9000]);
        Obat::create(['nama_obat' => 'Cetirizine 10mg', 'kategori' => 'Antihistamin', 'stok' => 180, 'harga' => 8500]);
        Obat::create(['nama_obat' => '维生素 C 500mg (Vitamin C)', 'kategori' => 'Vitamin', 'stok' => 250, 'harga' => 15000]);
        Obat::create(['nama_obat' => 'B Complex Tablets', 'kategori' => 'Vitamin', 'stok' => 200, 'harga' => 10000]);

        // 11 - 20: Antibiotik & Antivirus
        Obat::create(['nama_obat' => 'Amoxicillin 500mg', 'kategori' => 'Antibiotik', 'stok' => 80, 'harga' => 8500]);
        Obat::create(['nama_obat' => 'Azithromycin 500mg', 'kategori' => 'Antibiotik', 'stok' => 60, 'harga' => 25000]);
        Obat::create(['nama_obat' => 'Ciprofloxacin 500mg', 'kategori' => 'Antibiotik', 'stok' => 75, 'harga' => 15000]);
        Obat::create(['nama_obat' => 'Tetracycline 500mg', 'kategori' => 'Antibiotik', 'stok' => 90, 'harga' => 9500]);
        Obat::create(['nama_obat' => 'Clindamycin 300mg', 'kategori' => 'Antibiotik', 'stok' => 50, 'harga' => 22000]);
        Obat::create(['nama_obat' => 'Acyclovir 400mg', 'kategori' => 'Antivirus', 'stok' => 70, 'harga' => 18000]);
        Obat::create(['nama_obat' => 'Metronidazole 500mg', 'kategori' => 'Antibiotik', 'stok' => 110, 'harga' => 7000]);
        Obat::create(['nama_obat' => 'Co-Amoxiclav 625mg', 'kategori' => 'Antibiotik', 'stok' => 45, 'harga' => 35000]);
        Obat::create(['nama_obat' => 'Chloramphenicol 250mg', 'kategori' => 'Antibiotik', 'stok' => 85, 'harga' => 8000]);
        Obat::create(['nama_obat' => 'Levofloxacin 500mg', 'kategori' => 'Antibiotik', 'stok' => 40, 'harga' => 30000]);

        // 21 - 30: Obat Saluran Pencernaan / Lambung
        Obat::create(['nama_obat' => 'Antasida Doen', 'kategori' => 'Obat Lambung', 'stok' => 100, 'harga' => 6000]);
        Obat::create(['nama_obat' => 'Omeprazole 20mg', 'kategori' => 'Obat Lambung', 'stok' => 130, 'harga' => 11000]);
        Obat::create(['nama_obat' => 'Lansoprazole 30mg', 'kategori' => 'Obat Lambung', 'stok' => 140, 'harga' => 12500]);
        Obat::create(['nama_obat' => 'Ranitidine 150mg', 'kategori' => 'Obat Lambung', 'stok' => 95, 'harga' => 7500]);
        Obat::create(['nama_obat' => 'Sucralfat Syrup 100ml', 'kategori' => 'Obat Lambung', 'stok' => 60, 'harga' => 45000]);
        Obat::create(['nama_obat' => 'Domperidone 10mg', 'kategori' => 'Saluran Cerna', 'stok' => 110, 'harga' => 6800]);
        Obat::create(['nama_obat' => 'Norit (Karbon Aktif)', 'kategori' => 'Saluran Cerna', 'stok' => 80, 'harga' => 15000]);
        Obat::create(['nama_obat' => 'Kaolin Pectin Susp', 'kategori' => 'Saluran Cerna', 'stok' => 50, 'harga' => 13500]);
        Obat::create(['nama_obat' => 'Ondansetron 8mg', 'kategori' => 'Saluran Cerna', 'stok' => 65, 'harga' => 35000]);
        Obat::create(['nama_obat' => 'Bisacodyl 5mg', 'kategori' => 'Saluran Cerna', 'stok' => 120, 'harga' => 5500]);

        // 31 - 40: Obat Batuk, Pilek, & Pernapasan
        Obat::create(['nama_obat' => 'Dextromethorphan Syrup', 'kategori' => 'Obat Batuk', 'stok' => 70, 'harga' => 12000]);
        Obat::create(['nama_obat' => 'Ambroxol 30mg', 'kategori' => 'Obat Batuk', 'stok' => 150, 'harga' => 4500]);
        Obat::create(['nama_obat' => 'Glyceryl Guaiacolate (GG)', 'kategori' => 'Obat Batuk', 'stok' => 200, 'harga' => 3000]);
        Obat::create(['nama_obat' => 'Salbutamol 2mg', 'kategori' => 'Saluran Napas', 'stok' => 130, 'harga' => 4000]);
        Obat::create(['nama_obat' => 'Aminophylline 150mg', 'kategori' => 'Saluran Napas', 'stok' => 90, 'harga' => 6000]);
        Obat::create(['nama_obat' => 'Pseudoephedrine 30mg', 'kategori' => 'Pilek/Hidung', 'stok' => 100, 'harga' => 5000]);
        Obat::create(['nama_obat' => 'Cetirizine Drops', 'kategori' => 'Antihistamin', 'stok' => 40, 'harga' => 25000]);
        Obat::create(['nama_obat' => 'Erdosteine 300mg', 'kategori' => 'Obat Batuk', 'stok' => 60, 'harga' => 28000]);
        Obat::create(['nama_obat' => 'Acetylcysteine 200mg', 'kategori' => 'Obat Batuk', 'stok' => 85, 'harga' => 16000]);
        Obat::create(['nama_obat' => 'Bisolvon Solution', 'kategori' => 'Obat Batuk', 'stok' => 35, 'harga' => 42000]);

        // 41 - 50: Antihipertensi, Antidiabetik, & Salep/Lainnya
        Obat::create(['nama_obat' => 'Captopril 25mg', 'kategori' => 'Darah Tinggi', 'stok' => 180, 'harga' => 3500]);
        Obat::create(['nama_obat' => 'Amlodipine 5mg', 'kategori' => 'Darah Tinggi', 'stok' => 220, 'harga' => 5000]);
        Obat::create(['nama_obat' => 'Metformin 500mg', 'kategori' => 'Antidiabetik', 'stok' => 160, 'harga' => 6000]);
        Obat::create(['nama_obat' => 'Glibenclamide 5mg', 'kategori' => 'Antidiabetik', 'stok' => 140, 'harga' => 4800]);
        Obat::create(['nama_obat' => 'Simvastatin 10mg', 'kategori' => 'Kolesterol', 'stok' => 150, 'harga' => 8000]);
        Obat::create(['nama_obat' => 'Dexamethasone 0.5mg', 'kategori' => 'Antiinflamasi', 'stok' => 250, 'harga' => 2000]);
        Obat::create(['nama_obat' => 'Methylprednisolone 4mg', 'kategori' => 'Antiinflamasi', 'stok' => 110, 'harga' => 12500]);
        Obat::create(['nama_obat' => 'Ketoconazole Cream 2%', 'kategori' => 'Salep Kulit', 'stok' => 60, 'harga' => 15000]);
        Obat::create(['nama_obat' => 'Acyclovir Cream 5%', 'kategori' => 'Salep Kulit', 'stok' => 70, 'harga' => 16500]);
        Obat::create(['nama_obat' => 'Gentamycin Ointment 0.1%', 'kategori' => 'Salep Kulit', 'stok' => 80, 'harga' => 11000]);
    }
}