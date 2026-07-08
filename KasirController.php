<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Katalog; // Pastikan model Katalog kamu sudah di-import

class KasirController extends Controller
{
    // Menampilkan halaman kasir
    public function index()
    {
        return view('katalog.kasir');
    }

    // Mengambil data dari form kasir dan menyimpannya ke database
    public function store(Request $request)
    {
        // 1. Validasi input data dari kasir
        $request->validate([
            'nama_obat' => 'required|string',
            'harga' => 'required|numeric',
            'qty' => 'required|numeric|min:1',
        ]);

        // 2. generate kode unik otomatis untuk obat baru (Contoh: OBT-17198)
        $kodeItem = 'OBT-' . rand(10000, 99999);

        // 3. Simpan data ke dalam tabel database (katalogs)
        Katalog::create([
            'kode_item' => $kodeItem,
            'nama_item' => $request->nama_obat,
            'kategori'  => 'Anak & Dewasa', // Default kategori
            'satuan'    => 'Tablet',        // Default satuan
            'harga'     => $request->harga,
            'stok'      => $request->qty,   // Menyimpan jumlah input sebagai stok awal
            'deskripsi' => 'Data ditambahkan dari halaman Kasir Pembayaran.',
        ]);

        // 4. Kembalikan respons sukses ke halaman kasir
        return response()->json(['success' => 'Data obat berhasil disimpan ke database dan katalog!']);
    }
}