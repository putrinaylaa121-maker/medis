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

    public function create()
    {
        return view('katalog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_item'  => 'required|string|unique:katalogs,kode_item',
            'nama_item'  => 'required|string|max:255',
            'kategori'   => 'required|string|max:255',
            'satuan'     => 'required|string|max:50',
            'harga'      => 'required|integer|min:0',
            'stok'       => 'required|integer|min:0',
            'deskripsi'  => 'nullable|string',
        ]);

        \App\Models\Katalog::create($validated);

        return redirect()->route('katalog.index')->with('success', 'Obat baru berhasil ditambahkan!');
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