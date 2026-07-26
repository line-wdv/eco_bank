<div class="bg-white p-6 rounded shadow">
    <h3 class="text-lg font-bold text-gray-800 mb-4">Antrean Penjemputan di Zona Anda</h3>

    @if (session()->has('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
    @endif
    @if (session()->has('success'))
        <div class="mb-4 p-3 bg-eco-light/20 text-eco-dark rounded border border-eco-light">{{ session('success') }}</div>
    @endif

    @if($orders->isEmpty())
        <p class="text-gray-500 italic">Belum ada pesanan logistik baru di wilayah Anda.</p>
    @else
        <div class="space-y-4">
            @foreach($orders as $order)
                <div class="border border-gray-200 rounded p-4 flex justify-between items-center">
                    <div>
                        <p class="font-bold text-gray-700">{{ $order->category }} - {{ $order->volume_estimate }} Kg</p>
                        <p class="text-sm text-gray-500">
                            Jadwal: {{ \Carbon\Carbon::parse($order->pickup_time_slot)->format('d M Y - H:i') }}
                        </p>
                    </div>
                    
                    <button wire:click="acceptOrder({{ $order->id }})"
                            wire:loading.attr="disabled"
                            class="px-4 py-2 bg-eco-dark text-white text-sm font-bold rounded hover:bg-opacity-90 disabled:opacity-50">
                        <span wire:loading.remove wire:target="acceptOrder({{ $order->id }})">Ambil Pesanan</span>
                        <span wire:loading wire:target="acceptOrder({{ $order->id }})">Mengunci...</span>
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</div>