<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zone;

class ZoneSeeder extends Seeder
{
    public function run(): void
    {
        Zone::firstOrCreate([
            'name' => 'Kecamatan Ilir Barat I',
            'type' => 'kecamatan'
        ]);
        
        // Tambahkan zona lain di sini jika temanmu ingin merancang UI untuk multi-zona
        Zone::firstOrCreate([
            'name' => 'Kecamatan Ilir Timur I',
            'type' => 'kecamatan'
        ]);
    }
}