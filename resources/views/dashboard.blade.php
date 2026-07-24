<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Zona Pelanggan -->
            @role('user')
                <div class="mb-6">
                    <h3 class="text-lg font-bold mb-2">Buat Pesanan Baru</h3>
                    <!-- Memanggil komponen CreateOrder yang kita buat sebelumnya -->
                    <livewire:create-order />
                </div>
            @endrole

            <!-- Zona Mitra Logistik -->
            @role('mitra')
                <div class="mb-6">
                    <h3 class="text-lg font-bold mb-2">Order Pool (Zona Anda)</h3>
                    <!-- Kita belum membuat komponen ini -->
                    <livewire:mitra-order-pool />
                </div>
            @endrole

        </div>
    </div>
</x-app-layout>