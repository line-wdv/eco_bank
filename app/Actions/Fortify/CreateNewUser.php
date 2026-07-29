<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\MitraProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input): User
    {
        // 1. Validasi Super Ketat
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required', 'in:user,mitra'],
            // Tambahkan exists:zones,id — bukan cuma cek field terisi,
            // tapi pastikan zona-nya benar-benar ada di database
            'zone_id' => ['required_if:role,mitra', 'nullable', 'exists:zones,id'],
        ])->validate();

        // 2. Eksekusi Transaksi Database Terpusat
        return DB::transaction(function () use ($input) {

            // A. Buat akun dasar
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            // B. Tetapkan Role menggunakan Spatie Permission
            $user->assignRole($input['role']);

            // C. Inisialisasi Profil & Free Trial jika dia Mitra
            if ($input['role'] === 'mitra') {
                MitraProfile::create([
                    'user_id' => $user->id,
                    'zone_id' => $input['zone_id'],
                    'trial_ends_at' => now()->addDays(30),
                    'status' => 'active',
                ]);
            }

            return $user;
        });
    }
}