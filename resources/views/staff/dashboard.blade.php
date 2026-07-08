<x-app-layout>
    <style>
        header {
            background-color: #1e1b4b !important; /* Warna indigo gelap (bg-indigo-950) */
            border-bottom: 2px solid #4338ca !important; /* Border indigo cerah */
        }
        header h2 {
            color: #ffffff !important; /* Mengubah teks judul header menjadi putih agar terbaca */
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard Staff / Kasir Medis') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-emerald-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h3 class="text-xl font-extrabold text-gray-800">Pilih Unit Operasional</h3>
                <p class="text-sm text-gray-500 mt-1">Silakan pilih layanan modul sistem klinik yang ingin diakses hari ini.</p>
            </div>

            {{-- Pencarian Cepat + Shortcut Tambah Obat --}}
            <div class="mb-8 flex flex-col sm:flex-row gap-3">
                <div class="relative flex-1">
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input
                            type="text"
                            id="quickSearchInput"
                            placeholder="Cari nama obat atau nama pasien..."
                            class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white"
                            autocomplete="off"
                        >
                    </div>
                    <div id="quickSearchResults" class="absolute z-20 w-full bg-white rounded-xl shadow-lg border border-gray-100 mt-2 hidden max-h-80 overflow-y-auto"></div>
                </div>

                <a href="{{ route('katalog.create') }}" class="flex items-center justify-center gap-2 bg-indigo-600 text-white font-semibold px-5 py-3 rounded-xl shadow-sm hover:bg-indigo-700 transition whitespace-nowrap">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Obat
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200 flex flex-col justify-between h-56">
                    <div>
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800">Kelola Inventaris / Stok Obat</h4>
                        <p class="text-sm text-gray-500 mt-2">Input data obat baru, update stok sisa, dan cek daftar obat kedaluwarsa.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ url('/katalog') }}" class="w-full block text-center bg-blue-600 text-white px-5 py-3 rounded-xl text-sm font-semibold hover:bg-blue-700 transition">Buka Modul Obat</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200 flex flex-col justify-between h-56">
                    <div>
                        <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-600 mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800">Transaksi Pembayaran (POS)</h4>
                        <p class="text-sm text-gray-500 mt-2">Layanan kasir terintegrasi untuk pasien menebus resep obat dan rekam medis.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ url('/kasir') }}" class="w-full block text-center bg-green-600 text-white px-5 py-3 rounded-xl text-sm font-semibold hover:bg-green-700 transition">Buka Halaman Kasir</a>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 p-6 rounded-2xl shadow-lg flex flex-col md:flex-row items-center justify-between gap-4">
                <div>
                    <h4 class="text-white font-bold text-lg">Butuh Bantuan Asisten Medis AI?</h4>
                    <p class="text-indigo-100 text-sm mt-1">Gunakan fitur asisten virtual cerdas untuk pengecekan gejala awal secara praktis.</p>
                </div>
                <a href="{{ url('/tanya-medis') }}" class="bg-white text-indigo-600 px-6 py-3 rounded-xl font-bold text-sm hover:bg-indigo-50 transition shadow whitespace-nowrap">Akses Tanya Medis</a>
            </div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('quickSearchInput');
        const resultsBox = document.getElementById('quickSearchResults');
        let debounceTimer;

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                clearTimeout(debounceTimer);
                const q = this.value.trim();

                if (q.length < 2) {
                    resultsBox.classList.add('hidden');
                    resultsBox.innerHTML = '';
                    return;
                }

                debounceTimer = setTimeout(() => {
                    fetch(`{{ route('search.quick') }}?q=${encodeURIComponent(q)}`)
                        .then(res => res.json())
                        .then(data => renderResults(data))
                        .catch(err => console.error(err));
                }, 300); // debounce 300ms
            });
        }

        function renderResults(data) {
            let html = '';

            if (data.obat && data.obat.length > 0) {
                html += `<div class="px-4 pt-3 pb-1 text-xs font-bold text-gray-400 uppercase">Obat</div>`;
                data.obat.forEach(item => {
                    html += `
                        <a href="/katalog?highlight=${item.id}" class="flex justify-between items-center px-4 py-2 hover:bg-blue-50 transition">
                            <span class="text-gray-800 font-medium">${item.nama_item}</span>
                            <span class="text-xs text-gray-400">Stok: ${item.stok}</span>
                        </a>`;
                });
            }

            if (data.pasien && data.pasien.length > 0) {
                html += `<div class="px-4 pt-3 pb-1 text-xs font-bold text-gray-400 uppercase">Pasien</div>`;
                data.pasien.forEach(item => {
                    html += `
                        <a href="/pasien/${item.id}" class="flex justify-between items-center px-4 py-2 hover:bg-green-50 transition">
                            <span class="text-gray-800 font-medium">${item.nama}</span>
                            <span class="text-xs text-gray-400">No. RM: ${item.no_rm}</span>
                        </a>`;
                });
            }

            if (html === '') {
                html = `<div class="px-4 py-4 text-sm text-gray-400 text-center">Tidak ada hasil ditemukan.</div>`;
            }

            resultsBox.innerHTML = html;
            resultsBox.classList.remove('hidden');
        }

        document.addEventListener('click', function (e) {
            if (searchInput && !searchInput.contains(e.target) && !resultsBox.contains(e.target)) {
                resultsBox.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>