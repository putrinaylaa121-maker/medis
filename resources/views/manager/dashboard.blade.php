<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Pimpinan / Manager Klinik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Pendapatan</span>
                        <p class="text-2xl font-extrabold text-gray-800 mt-2">Rp 12.500.000</p>
                        <span class="text-xs text-green-600 font-medium mt-1">↑ 8% dari bulan lalu</span>
                    </div>
                    <div class="bg-green-50 p-4 rounded-xl">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Pasien / Obat Keluar</span>
                        <p class="text-2xl font-extrabold text-gray-800 mt-2">45 Transaksi</p>
                        <span class="text-xs text-blue-600 font-medium mt-1">Hari ini</span>
                    </div>
                    <div class="bg-blue-50 p-4 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M6 16h.01"></path></svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider text-red-600">Stok Menipis</span>
                        <p class="text-2xl font-extrabold text-red-600 mt-2">3 Item Obat</p>
                        <span class="text-xs text-gray-400 font-medium mt-1">Butuh Restock</span>
                    </div>
                    <div class="bg-red-50 p-4 rounded-xl">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                </div>
            </div>

            <h3 class="text-lg font-bold text-gray-800 mb-4">Pilih Unit Operasional</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="p-2 bg-indigo-50 text-indigo-600 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-14L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <h4 class="font-bold text-gray-800">Kelola Inventaris / Stok Obat</h4>
                    </div>
                    <p class="text-sm text-gray-500 mb-4">Input data obat baru, update stok sisa, dan cek daftar obat kedaluwarsa.</p>
                    <a href="/electronic" class="inline-block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition">
                        Buka Modul Obat
                    </a>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="p-2 bg-green-50 text-green-600 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="font-bold text-gray-800">Transaksi Pembayaran (POS)</h4>
                    </div>
                    <p class="text-sm text-gray-500 mb-4">Layanan kasir terintegrasi untuk pasien menebus resep obat dan rekam medis.</p>
                    <a href="#" class="inline-block w-full text-center bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 px-4 rounded-lg transition">
                        Buka Halaman Kasir
                    </a>
                </div>
            </div>

            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 p-6 rounded-xl shadow-sm text-white flex flex-col md:flex-row justify-between items-center mb-8">
                <div class="mb-4 md:mb-0">
                    <h4 class="font-bold text-lg">Butuh Bantuan Asisten Medis AI?</h4>
                    <p class="text-purple-100 text-sm">Gunakan fitur asisten virtual cerdas untuk pengecekan gejala awal secara praktis.</p>
                </div>
                <a href="/tanya-medis" class="bg-white text-purple-700 font-semibold py-2 px-6 rounded-lg hover:bg-purple-50 transition whitespace-nowrap">
                    Akses Tanya Medis
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Aktivitas Transaksi Terakhir</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Transaksi</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dilayani Oleh</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#TRX-0056</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Staf A (Andi P.)</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Menit yang lalu</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">Rp 120.000</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#TRX-0055</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Staf B (Siti R.)</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 Jam yang lalu</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">Rp 85.000</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#TRX-0054</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Staf A (Andi P.)</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3 Jam yang lalu</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">Rp 210.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>