<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Pembayaran POS - Medis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            a, button, form, select, input, th:last-child, td:last-child, .no-print {
                display: none !important;
            }
            body {
                background-color: white !important;
                padding: 0 !important;
            }
            .max-width-7xl {
                max-width: 100% !important;
                padding: 0 !important;
            }
        }
    </style>
</head>
<body class="bg-emerald-50/60 min-h-screen font-sans antialiased text-gray-900">

    <div class="p-6 md:p-10 max-w-7xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 border-b border-emerald-500/30 pb-4 gap-4 no-print">
            <div>
                <h2 class="text-2xl font-black text-gray-900 tracking-tight">
                    Halaman Kasir Pembayaran (POS)
                </h2>
                <p class="text-xs text-gray-500 mt-1">Sistem Manajemen Transaksi Obat dan Resep Klinik</p>
            </div>
            <a href="/dashboard" class="flex items-center gap-2 bg-gray-900 text-white px-5 py-2.5 rounded-xl font-bold text-xs hover:bg-gray-800 transition duration-150 shadow-sm shadow-gray-900/10">
                ⬅️ Kembali ke Dashboard
            </a>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                
                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm transition hover:shadow-md duration-200 no-print">
                    <h3 class="text-sm font-extrabold text-gray-900 mb-5 flex items-center gap-2">
                        <span class="p-2 bg-emerald-50 text-emerald-600 rounded-xl text-xs">💊</span> Pilih Obat Medis
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                        <div class="md:col-span-2">
                            <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">Cari / Pilih Obat</label>
                            <select id="pilih-obat" class="w-full p-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition">
                                <option value="">-- Pilih Obat dari Katalog --</option>
                                <option value="5000">OBT-001 - Paracetamol 500mg (Rp 5.000)</option>
                                <option value="12000">OBT-002 - Amoxicillin 500mg (Rp 12.000)</option>
                                <option value="8500">OBT-003 - Promag Tablet (Rp 8.500)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">Jumlah</label>
                            <input type="number" id="jumlah-qty" placeholder="Qty" min="1" value="1" class="w-full p-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition font-bold text-center">
                        </div>
                        <div>
                            <button id="btn-tambah" class="w-full bg-emerald-600 text-white px-5 py-3 rounded-xl font-bold hover:bg-emerald-700 active:scale-95 transition duration-150 shadow-sm shadow-emerald-600/10 text-sm">
                                + Tambah
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-white">
                        <h4 class="font-bold text-gray-900 text-sm flex items-center gap-2">🛒 Daftar Belanjaan Pasien</h4>
                        <span class="text-[10px] bg-gray-100 font-bold px-2.5 py-1 rounded-full text-gray-500 uppercase tracking-wider no-print">Struk Kasir</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100 text-[11px] font-bold text-gray-400 uppercase tracking-wider">
                                    <th class="p-4 pl-6">Nama Obat</th>
                                    <th class="p-4 text-center">Harga</th>
                                    <th class="p-4 text-center">Qty</th>
                                    <th class="p-4 text-center">Subtotal</th>
                                    <th class="p-4 text-center pr-6 no-print">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="placeholder-kosong">
                                <tr>
                                    <td colspan="5" class="p-12 text-center">
                                        <div class="text-3xl mb-2">🛒</div>
                                        <p class="text-sm font-bold text-gray-800">Keranjang Belanja Masih Kosong</p>
                                        <p class="text-xs text-gray-400 mt-1">Silakan pilih obat di atas untuk memulai transaksi baru.</p>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody id="keranjang-belanja" class="divide-y divide-gray-50 text-sm hidden">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white p-5 rounded-3xl border border-gray-100 shadow-sm no-print">
                    <div class="flex items-center justify-between border-b border-gray-50 pb-3 mb-3">
                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider">👤 Sesi Kasir Aktif</h4>
                        <span class="text-[10px] bg-emerald-50 text-emerald-600 font-extrabold px-2 py-0.5 rounded-md animate-pulse">🟢 Live</span>
                    </div>
                    <div class="space-y-1.5 text-xs text-gray-600">
                        <div class="flex justify-between"><span>Nama Petugas:</span> <strong class="text-gray-800">staff</strong></div>
                        <div class="flex justify-between"><span>Waktu Sesi:</span> <strong class="text-gray-800">06/07/2026</strong></div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/40 h-fit space-y-5">
                    <h3 class="text-sm font-extrabold text-gray-900 border-b border-gray-50 pb-3">🧾 Ringkasan Pembayaran</h3>
                    
                    <div class="flex flex-col gap-1 bg-emerald-50/50 p-4 border border-emerald-100/50 rounded-2xl text-center">
                        <span class="text-[10px] font-bold text-emerald-600/70 uppercase tracking-widest">TOTAL TAGIHAN</span>
                        <span id="total-harga" class="text-3xl font-black text-emerald-600 tracking-tight">Rp 0</span>
                    </div>
                    
                    <div class="space-y-2 no-print">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Uang Diterima (Rp)</label>
                        <input type="number" id="uang-diterima" placeholder="Masukkan nominal..." class="w-full p-3.5 bg-gray-50 border border-gray-200 rounded-xl text-xl font-black text-gray-900 focus:outline-none focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 transition">
                    </div>
                    
                    <div class="flex justify-between items-center bg-gray-50 p-4 rounded-xl text-xs font-semibold text-gray-500 border border-gray-100">
                        <span>Kembalian Pasien</span>
                        <span id="uang-kembalian" class="text-lg font-black text-emerald-700">Rp 0</span>
                    </div>
                    
                    <button type="button" id="btn-cetak" class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-md shadow-emerald-600/10 active:scale-[0.98] transition duration-150 flex items-center justify-center gap-2 text-xs no-print">
                        ✅ Proses & Cetak Struk POS
                    </button>
                </div>
            </div>
            
        </div>
    </div>

    <script>
        const pilihObat = document.getElementById('pilih-obat');
        const jumlahQty = document.getElementById('jumlah-qty');
        const btnTambah = document.getElementById('btn-tambah');
        const keranjangBelanja = document.getElementById('keranjang-belanja');
        const placeholderKosong = document.getElementById('placeholder-kosong');
        const totalHargaLabel = document.getElementById('total-harga');
        const uangDiterimaInput = document.getElementById('uang-diterima');
        const uangKembalianLabel = document.getElementById('uang-kembalian');
        const btnCetak = document.getElementById('btn-cetak');

        let totalBelanja = 0;

        function hitungKembalian() {
            const uangBayar = parseInt(uangDiterimaInput.value) || 0;
            if (uangBayar >= totalBelanja) {
                const kembalian = uangBayar - totalBelanja;
                uangKembalianLabel.innerText = `Rp ${kembalian.toLocaleString('id-ID')}`;
            } else {
                uangKembalianLabel.innerText = `Rp 0`;
            }
        }

        function cekPlaceholder() {
            if (totalBelanja > 0) {
                placeholderKosong.classList.add('hidden');
                keranjangBelanja.classList.remove('hidden');
            } else {
                placeholderKosong.classList.remove('hidden');
                keranjangBelanja.classList.add('hidden');
            }
        }

        uangDiterimaInput.addEventListener('input', hitungKembalian);

        btnTambah.addEventListener('click', function() {
            const hargaObat = parseInt(pilihObat.value);
            const qty = parseInt(jumlahQty.value);

            if (!hargaObat || isNaN(qty) || qty < 1) {
                alert('Silakan pilih obat dan masukkan jumlah (qty) yang benar!');
                return;
            }

            const opsiTeks = pilihObat.options[pilihObat.selectedIndex].text;
            const namaObat = opsiTeks.split(' - ')[1].split(' (')[0];
            const subtotal = hargaObat * qty;

            fetch("{{ route('kasir.simpan') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}" 
                },
                body: JSON.stringify({
                    nama_obat: namaObat,
                    harga: hargaObat,
                    qty: qty
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    const barisBaru = document.createElement('tr');
                    barisBaru.className = "hover:bg-gray-50/60 text-gray-800 transition";
                    barisBaru.innerHTML = `
                        <td class="p-4 pl-6 font-semibold">${namaObat}</td>
                        <td class="p-4 text-center text-gray-500">Rp ${hargaObat.toLocaleString('id-ID')}</td>
                        <td class="p-4 text-center font-bold">${qty}</td>
                        <td class="p-4 text-center font-black text-gray-900">Rp ${subtotal.toLocaleString('id-ID')}</td>
                        <td class="p-4 text-center pr-6 no-print">
                            <button class="text-red-500 hover:text-red-700 font-bold hover:underline text-xs btn-hapus">
                                Hapus
                            </button>
                        </td>
                    `;

                    keranjangBelanja.appendChild(barisBaru);

                    totalBelanja += subtotal;
                    totalHargaLabel.innerText = `Rp ${totalBelanja.toLocaleString('id-ID')}`;
                    
                    cekPlaceholder();
                    hitungKembalian();

                    pilihObat.selectedIndex = 0;
                    jumlahQty.value = 1;

                    barisBaru.querySelector('.btn-hapus').addEventListener('click', function() {
                        totalBelanja -= subtotal;
                        totalHargaLabel.innerText = `Rp ${totalBelanja.toLocaleString('id-ID')}`;
                        barisBaru.remove();
                        cekPlaceholder();
                        hitungKembalian();
                    });
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Gagal menyimpan data ke database!");
            });
        });

        btnCetak.addEventListener('click', function() {
            const uangBayar = parseInt(uangDiterimaInput.value) || 0;
            
            if (totalBelanja === 0) {
                alert('Keranjang belanja masih kosong, masukkan item obat terlebih dahulu!');
                return;
            }

            if (uangBayar <= 0 || uangBayar < totalBelanja) {
                alert('Uang diterima tidak valid atau kurang dari total belanjaan!');
                return;
            }

            window.print();

            if (confirm('Transaksi berhasil dicetak! Bersihkan keranjang kasir?')) {
                window.location.reload();
            }
        });
    </script>
</body>
</html>