<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Exception;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    // Cast kolom 'state' atau 'status' di database agar selalu berupa objek Enum
    protected $casts = [
        'state' => OrderStatus::class,
    ];

    /**
     * Fungsi tunggal untuk mengubah status pesanan.
     * Memvalidasi aturan sebelum mengeksekusi ke database.
     */
    public function transitionTo(OrderStatus $newState): void
    {
        $validTransitions = $this->state->validTransitions();

        if (!in_array($newState, $validTransitions)) {
            // Lempar error kalo transisi melanggar aturan bisnis
            throw new Exception("Integritas Transaksi Gagal: Transisi ilegal dari {$this->state->value} ke {$newState->value}.");
        }
        
        $this->update(['state' => $newState]);
    }
}