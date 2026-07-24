<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        // Pemilik pesanan (Pelanggan)
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        
        // Mitra yang mengambil pesanan (mengacu ke id di tabel users)
        $table->foreignId('mitra_id')->nullable()->constrained('users')->nullOnDelete();
        
        // Titik lokasi penjemputan untuk filter query Mitra
        $table->foreignId('zone_id')->constrained('zones');
        
        // Data operasional logistik
        $table->string('category');
        $table->integer('volume_estimate'); // Gunakan integer (misal: kg) untuk mencegah error kalkulasi
        $table->string('photo_path');
        $table->dateTime('pickup_time_slot');
        
        // State Machine column - dikunci oleh Enum di level Model
        $table->string('state')->default('pending');
        
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
