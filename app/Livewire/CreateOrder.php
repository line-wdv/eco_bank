<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Order;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class CreateOrder extends Component
{
    use WithFileUploads;

    public $category = '';
    public $volume_estimate = '';
    public $photo;
    
    // Properti baru yang dipecah
    public $pickup_date = '';
    public $pickup_shift = '';

    public function createOrder()
    {
        $this->validate([
            'category' => 'required|string',
            'volume_estimate' => 'required|numeric|min:1',
            'photo' => 'required|image|max:2048',
            'pickup_date' => 'required|date|after_or_equal:today',
            'pickup_shift' => 'required|in:08:00:00,13:00:00',
        ]);

        // Gabungkan tanggal dan shift menjadi format Timestamp database
        $timeSlot = Carbon::parse($this->pickup_date . ' ' . $this->pickup_shift);

        $lock = Cache::lock('create_order_user_' . auth()->id(), 5);

        if ($lock->get()) {
            try {
                $hasActiveOrder = Order::where('user_id', auth()->id())
                    ->whereIn('state', ['pending', 'accepted', 'in_transit'])
                    ->exists();

                if ($hasActiveOrder) {
                    session()->flash('error', 'Anda masih memiliki pesanan aktif yang belum selesai.');
                    return;
                }

                $photoPath = $this->photo->store('orders', 'public');

                Order::create([
                    'user_id' => auth()->id(),
                    'zone_id' => 1, // Masih statis untuk testing
                    'category' => $this->category,
                    'volume_estimate' => $this->volume_estimate,
                    'photo_path' => $photoPath,
                    'pickup_time_slot' => $timeSlot,
                    'state' => 'pending',
                ]);

                session()->flash('success', 'Pesanan berhasil dibuat. Menunggu Mitra di zona Anda.');
                $this->reset(['category', 'volume_estimate', 'photo', 'pickup_date', 'pickup_shift']);
                
            } finally {
                $lock->release();
            }
        } else {
            session()->flash('error', 'Sistem sedang memproses pesanan Anda.');
        }
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}