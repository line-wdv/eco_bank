<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case ACCEPTED = 'accepted';
    case IN_TRANSIT = 'in_transit';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
    case FAILED = 'failed';

    /**
     * Mendefinisikan aturan transisi yang legal.
     * 
     * Jika sebuah status tidak ada di dalam array pengembalian, maka transisi ditolak.
     */
    public function validTransitions(): array
    {
        return match($this) {
            self::PENDING => [self::ACCEPTED, self::CANCELLED],
            self::ACCEPTED => [self::IN_TRANSIT, self::FAILED],
            self::IN_TRANSIT => [self::COMPLETED, self::FAILED],
            // Terminal states (titik akhir, tidak bisa diubah lagi)
            self::COMPLETED, self::CANCELLED, self::FAILED => [],
        };
    }
}