<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <span class="inline-flex items-center gap-1.5 rounded-full bg-eco-light/30 px-3 py-1 text-xs font-semibold text-eco-dark">
                <span class="h-1.5 w-1.5 rounded-full bg-eco-dark"></span>
                {{ auth()->user()->roles->pluck('name')->implode(', ') ?: 'No Role' }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Welcome Banner -->
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-eco-dark to-eco-light p-8 shadow-lg">
                <div class="relative z-10">
                    <h1 class="text-2xl font-bold text-white">
                        Halo, {{ auth()->user()->name }} 👋
                    </h1>
                    <p class="mt-1 text-sm text-white/80">
                        Selamat datang kembali di Eco Bank. Berikut ringkasan aktivitas Anda hari ini.
                    </p>
                </div>
                <!-- Decorative circles -->
                <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10"></div>
                <div class="absolute -bottom-16 right-24 h-32 w-32 rounded-full bg-white/10"></div>
            </div>

            <!-- Zona Pelanggan -->
            @role('user')
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
                    <div class="mb-5 flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-eco-orange/15">
                            <svg class="h-5 w-5 text-eco-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">Buat Pesanan Baru</h3>
                            <p class="text-sm text-gray-500">Isi form di bawah untuk membuat pesanan sampah daur ulang.</p>
                        </div>
                    </div>
                    <livewire:create-order />
                </div>
            @endrole

            <!-- Zona Mitra Logistik -->
            @role('mitra')
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
                    <div class="mb-5 flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-eco-dark/10">
                            <svg class="h-5 w-5 text-eco-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0l-2.5-5H6.5L4 13" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">Order Pool (Zona Anda)</h3>
                            <p class="text-sm text-gray-500">Pesanan yang tersedia untuk diambil di zona Anda.</p>
                        </div>
                    </div>
                    <livewire:mitra-order-pool />
                </div>
            @endrole

            <!-- Fallback jika tidak punya role -->
            @unless(auth()->user()->roles->count())
                <div class="rounded-2xl border-2 border-dashed border-eco-orange/40 bg-eco-yellow/10 p-8 text-center">
                    <p class="text-sm font-medium text-eco-dark">
                        Akun Anda belum memiliki role. Hubungi administrator untuk mengaktifkan akses.
                    </p>
                </div>
            @endunless

        </div>
    </div>
</x-app-layout>