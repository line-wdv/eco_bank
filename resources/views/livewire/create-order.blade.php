<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-6">

    <!-- 1. HEADER & SAPAAN -->
    <div>
        <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
            Halo, {{ auth()->user()->name ?? 'Pengguna' }} 👋
        </h1>
        <p class="mt-1 text-sm text-gray-600">
            Selamat datang kembali di Eco Bank. Berikut ringkasan aktivitas Anda hari ini.
        </p>
    </div>

    <!-- 2. KARTU STATISTIK (SUMMARY CARDS) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Card Total Poin -->
        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="p-3 bg-eco-light/30 text-eco-dark rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Saldo Poin</p>
                <p class="text-xl font-bold text-gray-900">0 Poin</p>
            </div>
        </div>

        <!-- Card Total Disetor -->
        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Total Disetor</p>
                <p class="text-xl font-bold text-gray-900">0 Kg</p>
            </div>
        </div>

        <!-- Card Dampak Lingkungan -->
        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="p-3 bg-emerald-50 text-emerald-600 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Jejak Karbon Turun</p>
                <p class="text-xl font-bold text-gray-900">0 Kg CO₂</p>
            </div>
        </div>
    </div>

    <!-- 3. KONTEN UTAMA (GRID 2 KOLOM) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- KOLOM KIRI: FORM PEMESANAN (LOGIKA KODE ASLI 100%) -->
        <div class="lg:col-span-2">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                
                <!-- Judul Form -->
                <div class="mb-6 pb-4 border-b border-gray-100 flex items-center gap-3">
                    <div class="p-2 bg-gray-50 text-gray-600 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-900">Buat Pesanan Baru</h2>
                        <p class="text-xs text-gray-500">Isi form di bawah untuk membuat pesanan sampah daur ulang.</p>
                    </div>
                </div>

                <!-- Notifikasi Error -->
                @if (session()->has('error'))
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md font-medium text-sm">
                        {{ session('error') }}
                    </div>
                @endif
                
                <!-- Notifikasi Sukses -->
                @if (session()->has('success'))
                    <div class="mb-4 p-4 bg-eco-light/20 text-eco-dark border border-eco-light rounded-md font-medium text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="createOrder" class="space-y-5">
                    
                    <!-- Kategori Sampah -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kategori Sampah</label>
                        <select wire:model="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-eco-dark focus:ring focus:ring-eco-light focus:ring-opacity-50 text-sm">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Plastik">Plastik & Kemasan</option>
                            <option value="Kertas/Kardus">Kertas & Kardus</option>
                            <option value="Organik">Organik / Dapur</option>
                            <option value="Elektronik">Elektronik (E-Waste)</option>
                        </select>
                        @error('category') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Estimasi Volume -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Estimasi Volume (Kg)</label>
                        <input type="number" wire:model="volume_estimate" min="1" placeholder="Misal: 5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-eco-dark focus:ring focus:ring-eco-light focus:ring-opacity-50 text-sm">
                        @error('volume_estimate') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Foto Bukti -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto Bukti (Opsional)</label>
                        <input type="file" wire:model="photo" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer">
                        @error('photo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tanggal & Shift Penjemputan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Penjemputan</label>
                            <!-- min hari ini dikunci via HTML -->
                            <input type="date" wire:model="pickup_date" min="{{ date('Y-m-d') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-eco-dark focus:ring focus:ring-eco-light focus:ring-opacity-50 text-sm">
                            @error('pickup_date') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Shift Operasional</label>
                            <select wire:model="pickup_shift" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-eco-dark focus:ring focus:ring-eco-light focus:ring-opacity-50 text-sm">
                                <option value="">-- Pilih Shift --</option>
                                <option value="08:00:00">Shift Pagi (08:00 - 12:00)</option>
                                <option value="13:00:00">Shift Siang (13:00 - 17:00)</option>
                            </select>
                            @error('pickup_shift') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Tombol Eksekusi -->
                    <div class="pt-2">
                        <button type="submit" wire:loading.attr="disabled" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-eco-dark hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-eco-light disabled:opacity-50 transition-colors">
                            <span wire:loading.remove wire:target="createOrder">Konfirmasi & Buat Pesanan</span>
                            <span wire:loading wire:target="createOrder">Memproses...</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <!-- KOLOM KANAN: WIDGET PENDUKUNG DESAIN -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Aktivitas Terakhir -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-sm font-bold text-gray-900 border-b border-gray-100 pb-3 mb-4">Aktivitas Terakhir</h3>
                <div class="py-8 text-center text-gray-400">
                    <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    <p class="text-xs">Belum ada pesanan aktif</p>
                </div>
            </div>

            <!-- Kartu Edukasi Mini -->
            <div class="bg-eco-light/10 p-5 rounded-xl border border-eco-light/30">
                <h3 class="text-xs font-bold text-eco-dark uppercase tracking-wider mb-2 flex items-center gap-1.5">
                    💡 Petunjuk Penjemputan
                </h3>
                <p class="text-xs text-gray-600 leading-relaxed">
                    Pastikan sampah yang akan disetorkan sudah dipilah dengan baik dan diletakkan di area yang mudah dijangkau oleh petugas kami pada tanggal dan shift pilihan Anda.
                </p>
            </div>

        </div>

    </div>
</div>