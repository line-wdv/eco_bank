<x-guest-layout>
    <style>
        :root {
            --eco-dark: #468432;
            --eco-light: #9AD872;
            --eco-yellow: #FFEF91;
            --eco-orange: #FFA02E;
        }
        .eco-reg-wrap {
            min-height: 100vh;
            display: flex;
            font-family: 'Figtree', 'Inter', sans-serif;
            background: #10130F;
        }
        .eco-reg-left {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 24px;
        }
        .eco-reg-box { width: 100%; max-width: 380px; }
        .eco-reg-box h2 { color: #fff; font-size: 26px; font-weight: 700; margin: 0; }
        .eco-reg-box .subtitle { color: #9CA3AF; font-size: 14px; margin-top: 6px; }
        .eco-reg-box .subtitle a { color: var(--eco-light); text-decoration: underline; }

        .eco-field { margin-top: 18px; }
        .eco-field label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #D1D5DB;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        .eco-field input,
        .eco-field select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #2E3630;
            background: #1A1F1B;
            color: #fff;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
            outline: none;
        }
        .eco-field input::placeholder { color: #6B7280; }
        .eco-field input:focus,
        .eco-field select:focus {
            border-color: var(--eco-light);
            box-shadow: 0 0 0 3px rgba(154,216,114,0.15);
        }
        .eco-note {
            margin-top: 6px;
            font-size: 12px;
            color: var(--eco-orange);
        }

        .eco-terms {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-top: 18px;
        }
        .eco-terms input { width: 16px; height: 16px; margin-top: 2px; accent-color: var(--eco-dark); }
        .eco-terms .txt { font-size: 13px; color: #9CA3AF; line-height: 1.5; }
        .eco-terms .txt a { color: var(--eco-light); text-decoration: underline; }

        .eco-submit {
            width: 100%;
            margin-top: 24px;
            background: var(--eco-dark);
            color: #fff;
            border: none;
            padding: 13px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .eco-submit:hover { background: #3a6f2a; }

        .eco-reg-row-end {
            display: flex;
            justify-content: flex-end;
            margin-top: 4px;
        }
        .eco-reg-row-end a {
            font-size: 13px;
            color: #9CA3AF;
            text-decoration: underline;
        }

        .eco-divider { display: flex; align-items: center; gap: 12px; margin-top: 24px; }
        .eco-divider .line { flex: 1; height: 1px; background: #2E3630; }
        .eco-divider span { font-size: 11px; color: #6B7280; letter-spacing: 0.05em; }

        .eco-social { display: flex; flex-direction: column; gap: 10px; margin-top: 16px; }
        .eco-social button {
            padding: 10px;
            border: 1px solid #2E3630;
            border-radius: 8px;
            background: #1A1F1B;
            color: #6B7280;
            font-size: 13px;
            cursor: not-allowed;
        }

        .eco-status { margin-top: 10px; font-size: 13px; color: #16A34A; font-weight: 500; }

        /* Panel kanan — ilustrasi lanskap eco, CSS-only (tanpa foto eksternal) */
        .eco-reg-right {
            width: 50%;
            position: relative;
            overflow: hidden;
            background: linear-gradient(160deg, #DCEFD9 0%, var(--eco-light) 55%, var(--eco-dark) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px;
        }
        .eco-reg-right svg.hills { position: absolute; bottom: 0; left: 0; width: 100%; height: auto; z-index: 0; }
        .eco-reg-right .glow {
            position: absolute;
            top: -80px; right: -80px;
            width: 260px; height: 260px;
            background: var(--eco-yellow);
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.55;
        }

        .eco-right-content {
            position: relative;
            z-index: 2;
            max-width: 340px;
            text-align: center;
        }
        .eco-right-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255,255,255,0.35);
            border: 1px solid rgba(255,255,255,0.6);
            color: #2E4A22;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.04em;
            padding: 6px 14px;
            border-radius: 100px;
        }
        .eco-right-content h3 {
            color: #1F3418;
            font-size: 26px;
            font-weight: 800;
            line-height: 1.3;
            margin: 18px 0 8px;
        }
        .eco-right-content p {
            color: #2E4A22;
            font-size: 14px;
            line-height: 1.6;
        }

        .eco-icon-recycle {
            width: 64px; height: 64px;
            margin: 22px auto 0;
            background: #fff;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(31,52,24,0.18);
        }

        .eco-float-card {
            position: relative;
            z-index: 2;
            margin-top: 28px;
            background: #fff;
            border-radius: 14px;
            padding: 16px 20px;
            box-shadow: 0 12px 30px rgba(31,52,24,0.18);
            display: flex;
            align-items: center;
            gap: 14px;
            text-align: left;
        }
        .eco-float-card .num {
            font-size: 20px;
            font-weight: 800;
            color: var(--eco-dark);
            white-space: nowrap;
        }
        .eco-float-card .lbl {
            font-size: 12px;
            color: #6B7280;
            line-height: 1.4;
        }
        .eco-float-card + .eco-float-card { margin-top: 12px; }

        @media (max-width: 900px) {
            .eco-reg-right { display: none; }
            .eco-reg-left { width: 100%; }
        }
    </style>

    <div class="eco-reg-wrap">

        {{-- KOLOM KIRI — Form Register --}}
        <div class="eco-reg-left">
            <div class="eco-reg-box">
                <h2>Buat Akun</h2>
                <p class="subtitle">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>

                <x-validation-errors class="mt-4" />

                @session('status')
                    <div class="eco-status">{{ $value }}</div>
                @endsession

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="eco-field">
                        <label for="name">Nama</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                               required autofocus autocomplete="name" placeholder="Nama lengkap Anda">
                    </div>

                    <div class="eco-field">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               required autocomplete="username" placeholder="user@company.com">
                    </div>

                    <div class="eco-field">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password"
                               required autocomplete="new-password" placeholder="Masukkan password">
                    </div>

                    <div class="eco-field">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                               required autocomplete="new-password" placeholder="Ulangi password">
                    </div>

                    {{-- Logika role & zona — TIDAK DIUBAH, hanya class visual --}}
                    <div x-data="{ role: 'user' }" class="eco-field">
                        <label for="role">Daftar Sebagai</label>
                        <select name="role" id="role" x-model="role">
                            <option value="user">Pelanggan</option>
                            <option value="mitra">Mitra Logistik</option>
                        </select>

                        <div x-show="role === 'mitra'" class="eco-field" style="display: none;">
                            <label for="zone_id">Pilih Zona Operasional Anda</label>
                            <select name="zone_id" id="zone_id">
                                <option value="">-- Pilih Kecamatan/Kelurahan --</option>
                                <option value="1">Kecamatan Ilir Barat I</option>
                                <option value="2">Kecamatan Sukarami</option>
                            </select>
                            <p class="eco-note">Penting: Anda hanya akan menerima pesanan dari zona ini.</p>
                        </div>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <label class="eco-terms" for="terms">
                            <input type="checkbox" name="terms" id="terms" required>
                            <span class="txt">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </span>
                        </label>
                    @endif

                    <button type="submit" class="eco-submit">Daftar Sekarang →</button>

                    <div class="eco-reg-row-end">
                        <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                    </div>
                </form>

                <div class="eco-divider">
                    <div class="line"></div>
                    <span>ATAU DAFTAR DENGAN</span>
                    <div class="line"></div>
                </div>

                {{-- Dekoratif saja — belum ada logic OAuth di kode asli --}}
                <div class="eco-social">
                    <button type="button" disabled>Sign up with Github</button>
                    <button type="button" disabled>Sign up with Apple</button>
                    <button type="button" disabled>Sign up with Google</button>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN — Ilustrasi eco (CSS/SVG, bukan foto eksternal) --}}
        <div class="eco-reg-right">
            <div class="glow"></div>

            <div class="eco-right-content">
                <span class="eco-right-badge">🌱 GERAKAN BANK SAMPAH</span>

                <div class="eco-icon-recycle">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5" stroke="#468432" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11 19.5H12.5" stroke="#468432" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M10.5 4.5l1.5 -2.5 1.5 2.5" stroke="#468432" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="12" r="9" stroke="#9AD872" stroke-width="1.4" stroke-dasharray="2 3"/>
                    </svg>
                </div>

                <h3>Panggil aku untuk sampahmu.</h3>
                <p>Buang sampahmu lewat mitra terdeka dan lihat dampak lingkungan yang kamu buat setiap bulan.</p>
            </div>

            <div style="position:relative; z-index:2; margin-top: 8px;">
                <div class="eco-float-card">
                    <span class="num">500+</span>
                    <span class="lbl">Zona pengumpulan aktif di kota Anda</span>
                </div>
                <div class="eco-float-card">
                    <span class="num">30 hari</span>
                    <span class="lbl">Trial gratis untuk mitra baru</span>
                </div>
            </div>

            <svg class="hills" viewBox="0 0 800 500" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,320 C150,260 300,340 450,290 C600,240 700,300 800,260 L800,500 L0,500 Z" fill="#468432" opacity="0.35"/>
                <path d="M0,380 C180,330 320,400 480,350 C620,310 700,370 800,330 L800,500 L0,500 Z" fill="#468432" opacity="0.6"/>
            </svg>
        </div>
    </div>
</x-guest-layout>