<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Staff / Kasir Medis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h3 class="text-xl font-extrabold text-gray-800">Pilih Unit Operasional</h3>
                <p class="text-sm text-gray-500 mt-1">Silakan pilih layanan modul sistem klinik yang ingin diakses hari ini.</p>
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
</x-app-layout>