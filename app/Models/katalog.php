<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;

    protected $table = 'katalogs';

    // Izinkan kolom-kolom ini diisi data dari form
    protected $fillable = [
        'kode_item', 
        'nama_item', 
        'kategori', 
        'satuan', 
        'harga', 
        'stok', 
        'deskripsi'
    ];
}