<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Medis</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50 min-h-screen">

    <div class="p-6 md:p-10 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 border-b-2 border-emerald-500 pb-4 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 flex items-center gap-2">
                    📋 Daftar Katalog Obat Medis
                </h2>
                <p class="text-sm text-gray-600 mt-1">Manajemen data stok dan katalog obat apotek yang tersinkronisasi.</p>
            </div>
            <div class="flex gap-3">
                <a href="/kasir" class="flex items-center gap-2 bg-emerald-600 text-white px-4 py-2 rounded-xl font-semibold text-sm hover:bg-emerald-700 transition duration-150 shadow-md">
                    🛒 Buka Kasir (POS)
                </a>
                <a href="/dashboard" class="flex items-center gap-2 bg-gray-800 text-white px-4 py-2 rounded-xl font-semibold text-sm hover:bg-gray-700 transition duration-150 shadow-md">
                    ⬅️ Dashboard
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 flex items-center gap-4">
                <div class="p-4 bg-emerald-100 text-emerald-600 rounded-xl text-2xl">💊</div>
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase">Total Item Obat</p>
                    <p class="text-2xl font-black text-gray-800">{{ count($dataObat ?? []) }} Item</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 flex items-center gap-4">
                <div class="p-4 bg-amber-100 text-amber-600 rounded-xl text-2xl">📦</div>
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase">Kategori Tersedia</p>
                    <p class="text-2xl font-black text-gray-800">Anak & Dewasa</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 flex items-center gap-4">
                <div class="p-4 bg-blue-100 text-blue-600 rounded-xl text-2xl">✨</div>
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase">Status Sistem</p>
                    <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 mt-1">
                        ● Terintegrasi POS
                    </span>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Katalog Master</h3>
                <span class="text-xs bg-gray-100 text-gray-500 font-medium px-2.5 py-1 rounded-lg">Real-time Data</span>
            </div>

            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-4 font-semibold text-gray-700 uppercase text-xs tracking-wider text-center w-20">No</th>
                        <th class="p-4 font-semibold text-gray-700 uppercase text-xs tracking-wider">Kode Item</th>
                        <th class="p-4 font-semibold text-gray-700 uppercase text-xs tracking-wider">Nama Obat Medis</th>
                        <th class="p-4 font-semibold text-gray-700 uppercase text-xs tracking-wider">Kategori</th>
                        <th class="p-4 font-semibold text-gray-700 uppercase text-xs tracking-wider text-center w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
    @forelse($dataObat as $key => $obat)
        <tr class="hover:bg-emerald-50/40 transition duration-100 text-gray-800">
            <td class="p-4 text-center font-medium text-gray-400">{{ $key + 1 }}</td>
            <td class="p-4">
                <span class="font-mono font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-100">
                    {{ is_object($obat) ? $obat->kode_item : ($obat['kode_item'] ?? '-') }}
                </span>
            </td>
            <td class="p-4 font-semibold text-gray-900">
                {{ is_object($obat) ? $obat->nama_item : ($obat['nama_item'] ?? '-') }}
            </td>
            <td class="p-4">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                    {{ is_object($obat) ? $obat->kategori : ($obat['kategori'] ?? 'Anak & Dewasa') }}
                </span>
            </td>
            <td class="p-4 text-center">
    <form action="{{ route('katalog.destroy', is_object($obat) ? $obat->id : $obat['id']) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus obat ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-xs font-bold text-red-600 hover:text-white bg-red-50 hover:bg-red-600 py-1.5 px-3 rounded-lg transition duration-150 shadow-sm border border-red-100">
            Hapus
        </button>
    </form>
</td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="p-8 text-center text-gray-400 font-medium">
                📭 Belum ada data obat di dalam katalog master.
            </td>
        </tr>
    @endforelse
</tbody>
            </table>
        </div>
    </div>

</body>
</html>