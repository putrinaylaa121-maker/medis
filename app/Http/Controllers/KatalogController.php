<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatalogController extends Controller
{
    public function index()
{
    // 1. Ubah nama variabelnya menjadi $data_obat (pakai underscore)
    $dataObat = \App\Models\Katalog::all(); 
    
    // 2. Masukkan nama variabel baru ke dalam fungsi compact
    return view('katalog.katalog', compact('dataObat')); 
}

    public function destroy($id)
{
    // Mencari data berdasarkan id, jika ketemu langsung dihapus
    $obat = \App\Models\Katalog::findOrFail($id);
    $obat->delete();

    // Kembali ke halaman katalog dengan pesan sukses
    return redirect()->back()->with('success', 'Data obat berhasil dihapus!');
}
}