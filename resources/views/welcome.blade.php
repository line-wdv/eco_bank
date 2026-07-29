<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Bank — Ubah Sampah Jadi Nilai</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-void: #0F1B0A;
            --bg-panel: #16260E;
            --line: #24371A;
            --accent: #9AD872;
            --accent-dim: #468432;
            --text: #F4F7F1;
            --muted: #8FA085;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: var(--bg-void);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow-x: hidden;
        }
        .grid-bg {
            position: fixed;
            inset: 0;
            background-image:
                repeating-linear-gradient(0deg, rgba(154,216,114,0.06) 0, rgba(154,216,114,0.06) 1px, transparent 1px, transparent 22px),
                repeating-linear-gradient(90deg, rgba(154,216,114,0.06) 0, rgba(154,216,114,0.06) 1px, transparent 1px, transparent 22px);
            mask-image: radial-gradient(ellipse 80% 60% at 50% 20%, black 30%, transparent 80%);
            z-index: 0;
        }
        nav {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px 48px;
            border-bottom: 1px solid var(--line);
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            font-size: 18px;
            letter-spacing: -0.02em;
        }
        .brand-mark {
            width: 28px; height: 28px;
            background: var(--accent);
            color: #10190B;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800;
            border-radius: 6px;
            font-size: 14px;
        }
        .brand-logo {
            width: 32px;
            height: 32px;
            object-fit: contain;
        }
        .nav-links {
            display: flex;
            gap: 32px;
            font-size: 14px;
            color: var(--muted);
        }
        .nav-links a { color: inherit; text-decoration: none; }
        .nav-links a:hover { color: var(--text); }
        .nav-actions { display: flex; align-items: center; gap: 20px; }
        .link-plain {
            color: var(--muted);
            text-decoration: none;
            font-size: 14px;
        }
        .link-plain:hover { color: var(--text); }
        .btn-primary {
            background: var(--text);
            color: #10190B;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            transition: opacity 0.15s ease;
        }
        .btn-primary:hover { opacity: 0.85; }

        .hero {
            position: relative;
            z-index: 5;
            max-width: 780px;
            margin: 0 auto;
            text-align: center;
            padding: 120px 24px 0;
        }
        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            color: var(--accent);
            background: rgba(62,235,165,0.08);
            border: 1px solid var(--accent-dim);
            padding: 6px 12px;
            border-radius: 100px;
            margin-bottom: 28px;
        }
        .eyebrow::before {
            content: '';
            width: 6px; height: 6px;
            background: var(--accent);
            border-radius: 50%;
            display: inline-block;
        }
        h1 {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 800;
            font-size: 56px;
            line-height: 1.1;
            letter-spacing: -0.02em;
        }
        h1 .accent { color: var(--accent); }
        .subtext {
            color: var(--muted);
            font-size: 17px;
            line-height: 1.6;
            max-width: 560px;
            margin: 24px auto 0;
        }
        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            margin-top: 36px;
        }
        .btn-cta {
            background: var(--text);
            color: #10190B;
            font-weight: 600;
            font-size: 14px;
            padding: 12px 22px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-ghost {
            color: var(--text);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            border-bottom: 1px solid var(--line);
            padding-bottom: 2px;
        }

        .stats {
            position: relative;
            z-index: 5;
            max-width: 1040px;
            margin: 88px auto 0;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: var(--line);
            border: 1px solid var(--line);
            border-radius: 12px;
            overflow: hidden;
        }
        .stat {
            background: var(--bg-panel);
            padding: 28px 24px;
        }
        .stat .num {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            font-size: 26px;
        }
        .stat .num .unit { color: #FFEF91; }
        .stat .desc {
            color: var(--muted);
            font-size: 13px;
            margin-top: 6px;
            line-height: 1.4;
        }
        .stat .tag {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            color: #5B7A4C;
            margin-top: 16px;
            letter-spacing: 0.04em;
        }

        footer {
            position: relative;
            z-index: 5;
            text-align: center;
            padding: 80px 24px 40px;
            color: #5B7A4C;
            font-size: 13px;
        }

        /* Section umum */
        section.block {
            position: relative;
            z-index: 5;
            max-width: 1040px;
            margin: 140px auto 0;
            padding: 0 24px;
        }
        .block-head { text-align: center; max-width: 560px; margin: 0 auto 56px; }
        .block-eyebrow {
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            color: var(--accent);
            letter-spacing: 0.08em;
        }
        .block-head h2 {
            font-size: 32px;
            font-weight: 800;
            margin-top: 10px;
            letter-spacing: -0.01em;
        }
        .block-head p {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.6;
            margin-top: 12px;
        }

        /* Program */
        .program-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .program-card {
            background: var(--bg-panel);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 28px 24px;
        }
        .program-card .icon {
            width: 40px; height: 40px;
            background: rgba(154,216,114,0.12);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px;
            margin-bottom: 18px;
        }
        .program-card h3 { font-size: 16px; font-weight: 700; }
        .program-card p { color: var(--muted); font-size: 14px; line-height: 1.6; margin-top: 8px; }

        /* Cara Kerja */
        .steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .step { position: relative; padding-top: 8px; }
        .step-num {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 800;
            font-size: 22px;
            color: #FFEF91;
        }
        .step h3 { font-size: 15px; font-weight: 700; margin-top: 10px; }
        .step p { color: var(--muted); font-size: 13px; line-height: 1.6; margin-top: 6px; }

        /* Dampak */
        .impact-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .impact-card {
            background: var(--bg-panel);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 28px 24px;
            text-align: center;
        }
        .impact-card .num {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 800;
            font-size: 30px;
            color: var(--accent);
        }
        .impact-card .lbl { color: var(--muted); font-size: 13px; margin-top: 8px; }

        /* Mitra CTA */
        .mitra-box {
            background: var(--bg-panel);
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 32px;
        }
        .mitra-box h2 { font-size: 26px; font-weight: 800; max-width: 380px; }
        .mitra-box p { color: var(--muted); font-size: 14px; margin-top: 10px; max-width: 380px; }
        .mitra-benefits { list-style: none; margin-top: 18px; }
        .mitra-benefits li {
            color: var(--text);
            font-size: 13px;
            margin-top: 8px;
            padding-left: 18px;
            position: relative;
        }
        .mitra-benefits li::before {
            content: '✓';
            color: var(--accent);
            position: absolute;
            left: 0;
        }

        @media (max-width: 720px) {
            .program-grid, .steps, .impact-grid { grid-template-columns: 1fr; }
            .mitra-box { flex-direction: column; text-align: center; }
            .mitra-benefits li { text-align: left; }
        }

        @media (max-width: 720px) {
            .nav-links { display: none; }
            h1 { font-size: 36px; }
            .stats { grid-template-columns: repeat(2, 1fr); }
            nav { padding: 20px 24px; }
        }
    </style>
</head>
<body>
    <div class="grid-bg"></div>

    <nav>
        <div class="brand">
            <img src="{{ asset('images/logo.png') }}" alt="Eco Bank" class="brand-logo">
            Eco Bank
        </div>
        <div class="nav-links">
            <a href="#program">Program</a>
            <a href="#cara-kerja">Cara Kerja</a>
            <a href="#dampak">Dampak</a>
            <a href="#mitra">Mitra</a>
        </div>
        <div class="nav-actions">
            <a href="{{ route('login') }}" class="link-plain">Masuk</a>
            <a href="{{ route('register') }}" class="btn-primary">Daftar</a>
        </div>
    </nav>

    <section class="hero">
        <span class="eyebrow">DIBUKA UNTUK MITRA BARU</span>
        <h1>Ubah sampah jadi<br>nilai yang <span class="accent">nyata.</span></h1>
        <p class="subtext">
            Setor, timbang, dan cairkan hasil sampahmu lewat jaringan mitra pengepul di zona terdekat. Transparan dari penimbangan sampai saldo masuk.
        </p>
        <div class="hero-actions">
            <a href="{{ route('register') }}" class="btn-cta">Daftar Sekarang →</a>
            <a href="#cara-kerja" class="btn-ghost">Lihat Cara Kerja</a>
        </div>
    </section>

    <div class="stats">
        <div class="stat">
            <div class="num">30 <span class="unit">hari</span></div>
            <div class="desc">Trial gratis untuk mitra pengepul baru.</div>
            <div class="tag">MITRA</div>
        </div>
        <div class="stat">
            <div class="num">98<span class="unit">%</span></div>
            <div class="desc">Akurasi penimbangan tercatat otomatis.</div>
            <div class="tag">ZONA AKTIF</div>
        </div>
        <div class="stat">
            <div class="num">500<span class="unit">+</span></div>
            <div class="desc">Zona pengumpulan tersebar di kota Anda.</div>
            <div class="tag">JARINGAN</div>
        </div>
        <div class="stat">
            <div class="num">6<span class="unit">x</span></div>
            <div class="desc">Lebih cepat setor dibanding cara manual.</div>
            <div class="tag">PROSES</div>
        </div>
    </div>

    {{-- PROGRAM --}}
    <section class="block" id="program">
        <div class="block-head">
            <span class="block-eyebrow">PROGRAM</span>
            <h2>Pilih cara menabung sampah Anda.</h2>
            <p>Tiga program utama yang bisa diikuti pelanggan, disesuaikan dengan kebiasaan dan volume sampah rumah tangga.</p>
        </div>
        <div class="program-grid">
            <div class="program-card">
                <div class="icon">💰</div>
                <h3>Tabungan Sampah</h3>
                <p>Setor sampah terpilah di zona terdekat, nilainya otomatis masuk sebagai saldo yang bisa dicairkan kapan saja.</p>
            </div>
            <div class="program-card">
                <div class="icon">🚚</div>
                <h3>Jemput di Rumah</h3>
                <p>Mitra logistik menjemput sampah langsung dari rumah Anda sesuai jadwal zona operasional masing-masing.</p>
            </div>
            <div class="program-card">
                <div class="icon">🎯</div>
                <h3>Poin & Reward</h3>
                <p>Kumpulkan poin dari setiap setoran dan tukarkan dengan saldo tambahan atau produk daur ulang mitra.</p>
            </div>
        </div>
    </section>

    {{-- CARA KERJA --}}
    <section class="block" id="cara-kerja">
        <div class="block-head">
            <span class="block-eyebrow">CARA KERJA</span>
            <h2>Empat langkah, transparan dari awal.</h2>
            <p>Dari daftar akun sampai saldo cair, semua tercatat otomatis di sistem.</p>
        </div>
        <div class="steps">
            <div class="step">
                <div class="step-num">01</div>
                <h3>Daftar Akun</h3>
                <p>Buat akun sebagai pelanggan atau mitra logistik dalam hitungan menit.</p>
            </div>
            <div class="step">
                <div class="step-num">02</div>
                <h3>Pilih Zona</h3>
                <p>Sistem menghubungkan Anda dengan mitra pengepul di zona terdekat.</p>
            </div>
            <div class="step">
                <div class="step-num">03</div>
                <h3>Setor & Timbang</h3>
                <p>Sampah ditimbang oleh mitra, hasilnya tercatat otomatis di aplikasi.</p>
            </div>
            <div class="step">
                <div class="step-num">04</div>
                <h3>Saldo Cair</h3>
                <p>Nilai sampah langsung masuk sebagai saldo, siap dicairkan kapan saja.</p>
            </div>
        </div>
    </section>

    {{-- DAMPAK --}}
    <section class="block" id="dampak">
        <div class="block-head">
            <span class="block-eyebrow">DAMPAK</span>
            <h2>Dampak nyata dari setiap setoran.</h2>
            <p>Setiap kilogram sampah yang tercatat berkontribusi pada lingkungan yang lebih bersih.</p>
        </div>
        <div class="impact-grid">
            <div class="impact-card">
                <div class="num">12 Ton</div>
                <div class="lbl">Sampah terkelola per bulan lewat jaringan mitra.</div>
            </div>
            <div class="impact-card">
                <div class="num">3.400+</div>
                <div class="lbl">Pelanggan aktif menabung sampah tiap minggu.</div>
            </div>
            <div class="impact-card">
                <div class="num">85%</div>
                <div class="lbl">Sampah anorganik berhasil didaur ulang, bukan berakhir di TPA.</div>
            </div>
        </div>
    </section>

    {{-- MITRA --}}
    <section class="block" id="mitra">
        <div class="mitra-box">
            <div>
                <h2>Jadi mitra logistik Eco Bank.</h2>
                <p>Kelola zona operasional Anda sendiri, dapatkan pelanggan tetap, dan pantau semua penimbangan secara transparan.</p>
                <ul class="mitra-benefits">
                    <li>Trial gratis 30 hari untuk mitra baru</li>
                    <li>Zona eksklusif — hanya menerima pesanan dari area Anda</li>
                    <li>Pencatatan penimbangan otomatis, tanpa manual</li>
                </ul>
            </div>
            <a href="{{ route('register') }}" class="btn-cta">Daftar Jadi Mitra →</a>
        </div>
    </section>

    <footer>
        © {{ date('Y') }} Eco Bank. Sampah bernilai, bumi terjaga.
    </footer>
</body>
</html>