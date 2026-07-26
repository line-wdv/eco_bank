<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Enums\OrderStatus; // Pastikan Enum yang kita buat di awal di-import
use Illuminate\Support\Facades\DB;

class MitraOrderPool extends Component
{
    public function acceptOrder($orderId)
    {
        // Gunakan Database Transaction agar aman jika terjadi kegagalan sistem di tengah proses
        DB::transaction(function () use ($orderId) {
            
            // PESSIMISTIC LOCK: Kunci baris pesanan ini agar tidak bisa dibaca/diubah Mitra lain
            // sampai proses transaksi ini selesai.
            $order = Order::where('id', $orderId)
                          ->where('state', 'pending')
                          ->lockForUpdate() 
                          ->first();

            if (!$order) {
                // Jika pesanan sudah tidak ada atau sudah diambil Mitra lain
                session()->flash('error', 'Pesanan ini baru saja diambil oleh Mitra lain atau dibatalkan.');
                return;
            }

            // Eksekusi perubahan status menggunakan metode yang kita rancang di awal
            // Ubah state ke 'accepted' dan catat ID Mitra yang mengambilnya
            $order->mitra_id = auth()->id();
            $order->transitionTo(OrderStatus::ACCEPTED);
            $order->save();

            session()->flash('success', 'Pesanan berhasil diambil! Silakan cek menu Pesanan Aktif Anda.');
        });
    }

    public function render()
    {
        // Ambil zona mitra yang sedang login
        $mitraZoneId = auth()->user()->mitraProfile->zone_id ?? null;

        // Tarik pesanan: Hanya yang PENDING dan berada di ZONA yang sama
        $availableOrders = Order::where('state', 'pending')
                                ->where('zone_id', $mitraZoneId)
                                ->orderBy('created_at', 'asc') // First in, First out
                                ->get();

        return view('livewire.mitra-order-pool', [
            'orders' => $availableOrders
        ]);
    }
}