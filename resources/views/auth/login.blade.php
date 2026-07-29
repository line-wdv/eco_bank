<x-guest-layout>
    <style>
        :root {
            --eco-dark: #468432;
            --eco-light: #9AD872;
            --eco-yellow: #FFEF91;
            --eco-orange: #FFA02E;
        }
        .eco-login-wrap {
            min-height: 100vh;
            display: flex;
            font-family: 'Figtree', 'Inter', sans-serif;
        }
        .eco-login-left {
            width: 50%;
            background: var(--eco-dark);
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px;
            overflow: hidden;
        }
        .eco-login-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(0deg, rgba(154,216,114,0.15) 0, rgba(154,216,114,0.15) 1px, transparent 1px, transparent 22px),
                repeating-linear-gradient(90deg, rgba(154,216,114,0.15) 0, rgba(154,216,114,0.15) 1px, transparent 1px, transparent 22px);
        }
        .eco-login-left .content { position: relative; z-index: 1; }
        .eco-brand { display: flex; align-items: center; gap: 10px; }
        .eco-brand .mark {
            width: 36px; height: 36px;
            background: var(--eco-yellow);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            overflow: hidden;
        }
        .eco-brand .mark img {
            width: 26px; height: 26px;
            object-fit: contain;
        }
        .eco-brand .name { color: #fff; font-weight: 700; font-size: 18px; }
        .eco-login-left h1 {
            color: #fff;
            font-size: 30px;
            font-weight: 700;
            line-height: 1.25;
            max-width: 360px;
            margin: 0;
        }
        .eco-login-left p {
            color: var(--eco-light);
            font-size: 14px;
            line-height: 1.6;
            max-width: 320px;
            margin-top: 14px;
        }
        .eco-login-right {
            width: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px;
        }
        .eco-form-box { width: 100%; max-width: 380px; }
        .eco-form-box h2 {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }
        .eco-form-box .subtitle {
            font-size: 14px;
            color: #6B7280;
            margin-top: 6px;
        }
        .eco-field { margin-top: 20px; }
        .eco-field label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }
        .eco-field input[type="email"],
        .eco-field input[type="password"] {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
            outline: none;
        }
        .eco-field input:focus {
            border-color: var(--eco-dark);
            box-shadow: 0 0 0 3px rgba(70,132,50,0.15);
        }
        .eco-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 18px;
        }
        .eco-remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #374151;
        }
        .eco-remember input { width: 16px; height: 16px; accent-color: var(--eco-dark); }
        .eco-forgot {
            font-size: 14px;
            color: var(--eco-dark);
            text-decoration: underline;
        }
        .eco-submit {
            width: 100%;
            margin-top: 24px;
            background: var(--eco-dark);
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
        }
        .eco-submit:hover { opacity: 0.9; }
        .eco-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 28px;
        }
        .eco-divider .line { flex: 1; height: 1px; background: #E5E7EB; }
        .eco-divider span { font-size: 12px; color: #9CA3AF; letter-spacing: 0.05em; }
        .eco-social {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 16px;
        }
        .eco-social button {
            padding: 10px;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            background: #fff;
            color: #9CA3AF;
            font-size: 14px;
            cursor: not-allowed;
        }
        .eco-register {
            text-align: center;
            font-size: 14px;
            color: #6B7280;
            margin-top: 24px;
        }
        .eco-register a { color: var(--eco-dark); font-weight: 600; text-decoration: underline; }
        .eco-status { margin-top: 16px; font-size: 14px; color: #16A34A; font-weight: 500; }

        @media (max-width: 900px) {
            .eco-login-left { display: none; }
            .eco-login-right { width: 100%; }
        }
    </style>

    <div class="eco-login-wrap">

        {{-- KOLOM KIRI — Branding --}}
        <div class="eco-login-left">
            <div class="content eco-brand">
                <span class="mark"><img src="{{ asset('images/logo.png') }}" alt="Eco Bank"></span>
                <span class="name">Eco Bank</span>
            </div>
            <div class="content">
                <h1>Kelola sampah dan mitra kamu dengan mudah.</h1>
                <p>Masuk untuk mengakses dashboard dan kelola mitra pengepul di zona Anda.</p>
            </div>
            <div></div>
        </div>

        {{-- KOLOM KANAN — Form Login --}}
        <div class="eco-login-right">
            <div class="eco-form-box">
                <h2>Selamat Datang Kembali</h2>
                <p class="subtitle">Masukkan email dan password Anda untuk mengakses akun.</p>

                {{-- Sama seperti kode asli: error validasi Fortify --}}
                <x-validation-errors class="mt-4" />

                {{-- Sama seperti kode asli: pesan status session --}}
                @session('status')
                    <div class="eco-status">{{ $value }}</div>
                @endsession

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="eco-field">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               required autofocus autocomplete="username" placeholder="user@company.com">
                    </div>

                    <div class="eco-field">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password"
                               required autocomplete="current-password" placeholder="Masukkan password">
                    </div>

                    <div class="eco-row">
                        <label for="remember_me" class="eco-remember">
                            <input id="remember_me" type="checkbox" name="remember">
                            Remember Me
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="eco-forgot">Forgot Your Password?</a>
                        @endif
                    </div>

                    <button type="submit" class="eco-submit">Log In</button>
                </form>

                <div class="eco-divider">
                    <div class="line"></div>
                    <span>OR LOGIN WITH</span>
                    <div class="line"></div>
                </div>

                {{-- Dekoratif saja — belum ada logic OAuth (mis. Laravel Socialite) di kode asli --}}
                <div class="eco-social">
                    <button type="button" disabled>Google</button>
                    <button type="button" disabled>Apple</button>
                </div>

                <p class="eco-register">
                    Don't Have An Account? <a href="{{ route('register') }}">Register Now</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>