<div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
    <!-- Notifikasi Error -->
    @if (session()->has('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md font-medium">
            {{ session('error') }}
        </div>
    @endif
    
    <!-- Notifikasi Sukses -->
    @if (session()->has('success'))
        <div class="mb-4 p-4 bg-eco-light/20 text-eco-dark border border-eco-light rounded-md font-medium">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="createOrder" class="space-y-5">
        
        <!-- Kategori Sampah -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Kategori Sampah</label>
            <select wire:model="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-eco-dark focus:ring focus:ring-eco-light focus:ring-opacity-50">
                <option value="">-- Pilih Kategori --</option>
                <option value="Plastik">Plastik & Kemasan</option>
                <option value="Kertas/Kardus">Kertas & Kardus</option>
                <option value="Organik">Organik / Dapur</option>
                <option value="Elektronik">Elektronik (E-Waste)</option>
            </select>
            @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Estimasi Volume -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Estimasi Volume (Kg)</label>
            <input type="number" wire:model="volume_estimate" min="1" placeholder="Misal: 5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-eco-dark focus:ring focus:ring-eco-light focus:ring-opacity-50">
            @error('volume_estimate') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Foto Bukti -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Foto Bukti (Opsional)</label>
            <input type="file" wire:model="photo" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer">
            @error('photo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Tanggal & Shift Penjemputan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Tanggal Penjemputan</label>
                <!-- min hari ini dikunci via HTML -->
                <input type="date" wire:model="pickup_date" min="{{ date('Y-m-d') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-eco-dark focus:ring focus:ring-eco-light focus:ring-opacity-50">
                @error('pickup_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Shift Operasional</label>
                <select wire:model="pickup_shift" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-eco-dark focus:ring focus:ring-eco-light focus:ring-opacity-50">
                    <option value="">-- Pilih Shift --</option>
                    <option value="08:00:00">Shift Pagi (08:00 - 12:00)</option>
                    <option value="13:00:00">Shift Siang (13:00 - 17:00)</option>
                </select>
                @error('pickup_shift') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Tombol Eksekusi -->
        <button type="submit" wire:loading.attr="disabled" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-eco-dark hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-eco-light disabled:opacity-50 transition-colors">
            <span wire:loading.remove wire:target="createOrder">Konfirmasi & Buat Pesanan</span>
            <span wire:loading wire:target="createOrder">Memproses...</span>
        </button>

    </form>
</div>