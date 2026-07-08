<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Katalog;

class SearchController extends Controller
{
    public function quickSearch(Request $request)
    {
        $query = $request->input('q');

        if (!$query || strlen($query) < 2) {
            return response()->json(['obat' => [], 'pasien' => []]);
        }

        $obat = Katalog::where('nama_item', 'like', "%{$query}%")
                    ->orWhere('kode_item', 'like', "%{$query}%")
                    ->limit(5)
                    ->get(['id', 'nama_item', 'stok']);

        return response()->json([
            'obat' => $obat,
            'pasien' => [], // belum ada tabel pasien
        ]);
    }
}