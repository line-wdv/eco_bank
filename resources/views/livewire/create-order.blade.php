<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- 1. HEADER & SAPAAN -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight flex items-center gap-3">
                Halo, {{ auth()->user()->name ?? 'Pengguna' }} 👋
            </h1>
            <p class="mt-2 text-sm text-gray-500 max-w-xl">
                Selamat datang kembali di Eco Bank. Pantau kontribusimu terhadap lingkungan dan kelola pesanan daur ulangmu hari ini.
            </p>
        </div>
    </div>

    <!-- 2. KARTU STATISTIK (MODERN GRID DENGAN HOVER EFFECT) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card Total Poin -->
        <div class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-in-out relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-eco-yellow/20 rounded-full blur-2xl group-hover:bg-eco-yellow/40 transition-colors"></div>
            <div class="flex items-center gap-5 relative z-10">
                <div class="p-4 bg-eco-yellow/20 text-eco-orange rounded-xl">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Saldo Poin</p>
                    <p class="text-3xl font-black text-gray-800 tracking-tight">0 <span class="text-base font-medium text-gray-500">Poin</span></p>
                </div>
            </div>
        </div>

        <!-- Card Total Disetor -->
        <div class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-in-out relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-eco-light/20 rounded-full blur-2xl group-hover:bg-eco-light/40 transition-colors"></div>
            <div class="flex items-center gap-5 relative z-10">
                <div class="p-4 bg-eco-light/20 text-eco-dark rounded-xl">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Disetor</p>
                    <p class="text-3xl font-black text-gray-800 tracking-tight">0 <span class="text-base font-medium text-gray-500">Kg</span></p>
                </div>
            </div>
        </div>

        <!-- Card Dampak Lingkungan (Inverted Theme) -->
        <div class="group bg-eco-dark p-6 rounded-2xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-in-out relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
            <div class="flex items-center gap-5 relative z-10">
                <div class="p-4 bg-white/20 text-white rounded-xl backdrop-blur-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-eco-light uppercase tracking-widest mb-1">Karbon Turun</p>
                    <p class="text-3xl font-black text-white tracking-tight">0 <span class="text-base font-medium text-eco-light">Kg CO₂</span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. KONTEN UTAMA (GRID 2 KOLOM) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- KOLOM KIRI: FORM PEMESANAN -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                
                <!-- Form Header Modern -->
                <div class="bg-gray-50/50 p-6 border-b border-gray-100 flex items-center gap-4">
                    <div class="p-3 bg-white shadow-sm text-eco-dark rounded-xl border border-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" aria-hidden="true" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-extrabold text-gray-900">Buat Pesanan Baru</h2>
                        <p class="text-sm text-gray-500 mt-1">Jadwalkan penjemputan sampah daur ulangmu dengan mudah.</p>
                    </div>
                </div>

                <div class="p-6">
                    @if (session()->has('error'))
                        <div class="mb-6 p-4 bg-red-50 text-red-700 border-l-4 border-red-500 rounded-r-md font-medium text-sm flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @if (session()->has('success'))
                        <div class="mb-6 p-4 bg-eco-light/10 text-eco-dark border-l-4 border-eco-dark rounded-r-md font-medium text-sm flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="createOrder" class="space-y-6">
                        
                        <!-- Kategori Sampah -->
                        <div>
                            <label for="category" class="block text-sm font-bold text-gray-700 mb-2">Kategori Sampah</label>
                            <select id="category" wire:model="category" class="block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-eco-dark focus:ring-2 focus:ring-eco-light/50 transition-colors text-sm py-3 px-4 @error('category') border-red-500 focus:border-red-500 focus:ring-red-200 @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Plastik">Plastik & Kemasan</option>
                                <option value="Kertas/Kardus">Kertas & Kardus</option>
                                <option value="Organik">Organik / Dapur</option>
                                <option value="Elektronik">Elektronik (E-Waste)</option>
                            </select>
                            @error('category') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <!-- Estimasi Volume & Foto -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="volume_estimate" class="block text-sm font-bold text-gray-700 mb-2">Estimasi Volume (Kg)</label>
                                <input type="number" id="volume_estimate" wire:model="volume_estimate" min="1" placeholder="Misal: 5" class="block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-eco-dark focus:ring-2 focus:ring-eco-light/50 transition-colors text-sm py-3 px-4 @error('volume_estimate') border-red-500 focus:border-red-500 focus:ring-red-200 @enderror">
                                @error('volume_estimate') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="photo" class="block text-sm font-bold text-gray-700 mb-2">Foto Bukti <span class="text-gray-400 font-normal">(Opsional)</span></label>
                                <input type="file" id="photo" wire:model="photo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-bold file:bg-eco-light/20 file:text-eco-dark hover:file:bg-eco-light/30 cursor-pointer border border-gray-200 rounded-xl bg-gray-50 py-1 transition-colors">
                                @error('photo') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Tanggal & Shift Penjemputan -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="pickup_date" class="block text-sm font-bold text-gray-700 mb-2">Tanggal Penjemputan</label>
                                <input type="date" id="pickup_date" wire:model="pickup_date" min="{{ date('Y-m-d') }}" class="block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-eco-dark focus:ring-2 focus:ring-eco-light/50 transition-colors text-sm py-3 px-4 @error('pickup_date') border-red-500 focus:border-red-500 focus:ring-red-200 @enderror">
                                @error('pickup_date') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="pickup_shift" class="block text-sm font-bold text-gray-700 mb-2">Shift Operasional</label>
                                <select id="pickup_shift" wire:model="pickup_shift" class="block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-eco-dark focus:ring-2 focus:ring-eco-light/50 transition-colors text-sm py-3 px-4 @error('pickup_shift') border-red-500 focus:border-red-500 focus:ring-red-200 @enderror">
                                    <option value="">-- Pilih Shift --</option>
                                    <option value="08:00:00">Pagi (08:00 - 12:00)</option>
                                    <option value="13:00:00">Siang (13:00 - 17:00)</option>
                                </select>
                                @error('pickup_shift') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Tombol Eksekusi -->
                        <div class="pt-4">
                            <button type="submit" wire:loading.attr="disabled" class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-extrabold text-white bg-eco-dark hover:bg-[#386b28] focus:outline-none focus:ring-4 focus:ring-eco-light/50 disabled:opacity-70 transition-all">
                                <span wire:loading.remove wire:target="createOrder">Konfirmasi & Buat Pesanan</span>
                                <span wire:loading wire:target="createOrder" class="flex items-center gap-2">
                                    <svg class="animate-spin h-5 w-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    Memproses...
                                </span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN: WIDGET PENDUKUNG -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Aktivitas Terakhir -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-sm font-extrabold text-gray-900 border-b border-gray-100 pb-4 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Aktivitas Terakhir
                </h3>
                <div class="py-12 flex flex-col items-center justify-center text-center">
                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-3 border border-gray-100">
                        <svg class="w-8 h-8 text-gray-300" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <p class="text-sm font-medium text-gray-500">Belum ada pesanan aktif</p>
                </div>
            </div>

            <!-- Kartu Edukasi Mini (Warna Brand) -->
            <div class="bg-gradient-to-br from-eco-yellow/20 to-eco-orange/10 p-6 rounded-2xl border border-eco-yellow/30 relative overflow-hidden">
                <div class="absolute -right-4 -top-4 w-20 h-20 bg-eco-orange/10 rounded-full blur-xl"></div>
                <h3 class="text-sm font-extrabold text-eco-dark uppercase tracking-wider mb-3 flex items-center gap-2 relative z-10">
                    <span class="text-xl" aria-hidden="true">💡</span> Petunjuk Penjemputan
                </h3>
                <p class="text-sm text-gray-700 leading-relaxed relative z-10 font-medium">
                    Pastikan sampah yang akan disetorkan sudah dipilah dengan baik dan diletakkan di area yang mudah dijangkau oleh petugas kami pada tanggal dan shift pilihan Anda.
                </p>
            </div>

        </div>

    </div>
</div>