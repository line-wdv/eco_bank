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
    Schema::create('mitra_profiles', function (Blueprint $table) {
        $table->id();
        // Relasi wajib ke tabel users
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        // Mengunci operasional mitra ke satu zona spesifik
        $table->foreignId('zone_id')->constrained('zones')->restrictOnDelete();
        
        // Lifecycle akun (Freemium logic)
        $table->timestamp('trial_ends_at')->nullable();
        $table->timestamp('subscription_ends_at')->nullable();
        $table->enum('status', ['active', 'suspended'])->default('active');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra_profiles');
    }
};
