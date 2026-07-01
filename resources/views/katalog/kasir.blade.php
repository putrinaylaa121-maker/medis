<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Pembayaran POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @media print {
        /* Sembunyikan tombol navigasi, dashboard, dan form input pilihan obat saat cetak */
        a, button, form, select, input, th:last-child, td:last-child, .md\:col-span-2 {
            display: none !important;
        }
        
        /* Buat background halaman menjadi putih polos saat dicetak */
        body {
            background-color: white !important;
            padding: 0 !important;
        }
        
        /* Lebarkan ringkasan struk agar fokus utama ke nota pembelian */
        .max-width-7xl {
            max-width: 100% !important;
            padding: 0 !important;
        }
    }
    </style>
</head>
<body class="bg-emerald-50 min-h-screen">

    <div class="p-6 md:p-10 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 border-b-2 border-emerald-500 pb-3 gap-4">
            <h2 class="text-3xl font-extrabold text-gray-900">
                Halaman Kasir Pembayaran (POS)
            </h2>
            <a href="/dashboard" class="flex items-center gap-2 bg-gray-800 text-white px-4 py-2 rounded-xl font-semibold text-sm hover:bg-gray-700 transition duration-150 shadow-md">
                ⬅️ Kembali ke Dashboard
            </a>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-8">
                
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-5 flex items-center gap-2">
                        <span class="text-emerald-600">💊</span> Pilih Obat Medis
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cari / Pilih Obat</label>
                            <select id="pilih-obat" class="w-full p-3 border border-gray-300 rounded-xl text-gray-700 focus:ring-2 focus:ring-emerald-300 focus:border-emerald-500">
                                <option value="">-- Pilih Obat dari Katalog --</option>
                                <option value="5000">OBT-001 - Paracetamol 500mg (Rp 5.000)</option>
                                <option value="12000">OBT-002 - Amoxicillin 500mg (Rp 12.000)</option>
                                <option value="8500">OBT-003 - Promag Tablet (Rp 8.500)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                            <input type="number" id="jumlah-qty" placeholder="Qty" min="1" value="1" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-300 focus:border-emerald-500">
                        </div>
                        <div>
                            <button id="btn-tambah" class="w-full bg-emerald-600 text-white px-5 py-3 rounded-xl font-bold hover:bg-emerald-700 transition duration-150 shadow-md">
                                + Tambah
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="p-4 font-semibold text-gray-700 uppercase text-xs tracking-wider">Nama Obat</th>
                                <th class="p-4 font-semibold text-gray-700 uppercase text-xs tracking-wider text-center">Harga</th>
                                <th class="p-4 font-semibold text-gray-700 uppercase text-xs tracking-wider text-center">Qty</th>
                                <th class="p-4 font-semibold text-gray-700 uppercase text-xs tracking-wider text-center">Subtotal</th>
                                <th class="p-4 font-semibold text-gray-700 uppercase text-xs tracking-wider text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="keranjang-belanja" class="divide-y divide-gray-100">
                            </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-2xl border border-gray-100 h-fit space-y-6">
                <h3 class="text-2xl font-extrabold text-gray-900 border-b-2 border-gray-100 pb-4">Ringkasan Pembayaran</h3>
                
                <div class="flex justify-between items-center text-4xl font-black text-emerald-600 bg-emerald-50 p-4 rounded-xl">
                    <span>TOTAL</span>
                    <span id="total-harga">Rp 0</span>
                </div>
                
                <hr class="border-gray-100">
                
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-700">Uang Diterima (Rp)</label>
                    <input type="number" id="uang-diterima" placeholder="Contoh: 50000" class="w-full p-4 border-2 border-gray-300 rounded-2xl text-2xl font-black text-gray-900 focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500">
                </div>
                
                <div class="flex justify-between items-center bg-gray-50 p-4 rounded-xl text-gray-700 font-medium">
                    <span>Kembalian</span>
                    <span id="uang-kembalian" class="text-2xl font-bold text-emerald-700">Rp 0</span>
                </div>
                
                <button type="button" id="btn-cetak" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-4 rounded-xl shadow-md transition duration-150 flex items-center justify-center gap-2">
                    ✅ Proses & Cetak Struk
                </button>
            </div>
            
        </div>
    </div>

    <script>
        const pilihObat = document.getElementById('pilih-obat');
        const jumlahQty = document.getElementById('jumlah-qty');
        const btnTambah = document.getElementById('btn-tambah');
        const keranjangBelanja = document.getElementById('keranjang-belanja');
        const totalHargaLabel = document.getElementById('total-harga');
        const uangDiterimaInput = document.getElementById('uang-diterima');
        const uangKembalianLabel = document.getElementById('uang-kembalian');
        const btnCetak = document.getElementById('btn-cetak');

        let totalBelanja = 0;

        // Fungsi Menghitung Kembalian Uang Belanja
        function hitungKembalian() {
            const uangBayar = parseInt(uangDiterimaInput.value) || 0;
            if (uangBayar >= totalBelanja) {
                const kembalian = uangBayar - totalBelanja;
                uangKembalianLabel.innerText = `Rp ${kembalian.toLocaleString('id-ID')}`;
            } else {
                uangKembalianLabel.innerText = `Rp 0`;
            }
        }

        uangDiterimaInput.addEventListener('input', hitungKembalian);

        // Tambah Item ke Tabel & Simpan ke Database via AJAX
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
                    barisBaru.className = "hover:bg-gray-50 text-gray-800";
                    barisBaru.innerHTML = `
                        <td class="p-4 font-medium">${namaObat}</td>
                        <td class="p-4 text-center">Rp ${hargaObat.toLocaleString('id-ID')}</td>
                        <td class="p-4 text-center">${qty}</td>
                        <td class="p-4 text-center font-bold text-gray-900">Rp ${subtotal.toLocaleString('id-ID')}</td>
                        <td class="p-4 text-center">
                            <button class="text-red-500 hover:text-red-700 font-medium hover:underline text-sm btn-hapus">
                                Hapus
                            </button>
                        </td>
                    `;

                    keranjangBelanja.appendChild(barisBaru);

                    totalBelanja += subtotal;
                    totalHargaLabel.innerText = `Rp ${totalBelanja.toLocaleString('id-ID')}`;
                    hitungKembalian();

                    pilihObat.selectedIndex = 0;
                    jumlahQty.value = 1;

                    barisBaru.querySelector('.btn-hapus').addEventListener('click', function() {
                        totalBelanja -= subtotal;
                        totalHargaLabel.innerText = `Rp ${totalBelanja.toLocaleString('id-ID')}`;
                        barisBaru.remove();
                        hitungKembalian();
                    });
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Gagal menyimpan data ke database!");
            });
        });

        // Fitur Utama Proses & Cetak Struk POS
        btnCetak.addEventListener('click', function() {
            const uangBayar = parseInt(uangDiterimaInput.value) || 0;
            
            // Validasi jika keranjang kosong
            if (totalBelanja === 0) {
                alert('Keranjang belanja masih kosong, masukkan item obat terlebih dahulu!');
                return;
            }

            // Validasi nominal pembayaran uang kasir
            if (uangBayar <= 0 || uangBayar < totalBelanja) {
                alert('Uang diterima tidak valid atau kurang dari total belanjaan!');
                return;
            }

            // Jalankan jendela cetak printer nota bawaan browser
            window.print();

            // Refresh halaman setelah cetak selesai untuk meriset keranjang baru
            if (confirm('Transaksi berhasil dicetak! Bersihkan keranjang kasir?')) {
                window.location.reload();
            }
        });
    </script>
</body>
</html>