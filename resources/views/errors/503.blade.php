<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Dalam Pemeliharaan — TESLOKA CBT</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon-tesloka-bg-putih.webp') }}">
    <style>
        @font-face {
            font-family: 'Sora';
            src: url('{{ asset('assets/fonts/sora.ttf') }}') format('truetype');
            font-display: swap;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Sora', sans-serif;
            background-color: #f8fafc;
            color: #14213d;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }
        .maintenance-card {
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 1.5rem;
            padding: 2.5rem;
            max-width: 34rem;
            width: 100%;
            text-align: center;
            box-shadow: 0 10px 25px -5px rgba(20, 33, 61, 0.05), 0 8px 10px -6px rgba(20, 33, 61, 0.02);
        }
        .logo-img {
            height: 2.75rem;
            max-width: 180px;
            object-fit: contain;
            margin: 0 auto 1.75rem;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #fef3c7;
            color: #92400e;
            border: 1px solid #fde68a;
            padding: 0.35rem 0.85rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
        }
        .badge-dot {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 9999px;
            background-color: #f59e0b;
        }
        h1 {
            font-size: 1.35rem;
            font-weight: 800;
            color: #14213d;
            line-height: 1.3;
            margin-bottom: 0.75rem;
        }
        p {
            font-size: 0.875rem;
            color: #64728b;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        .info-box {
            background-color: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 1rem;
            padding: 1rem 1.25rem;
            text-align: left;
            margin-bottom: 1.75rem;
        }
        .info-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: #334155;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.35rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }
        .info-desc {
            font-size: 0.8rem;
            color: #64748b;
            margin-bottom: 0;
            line-height: 1.5;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background-color: #2e33ff;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.825rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(46, 51, 255, 0.2);
        }
        .btn:hover {
            background-color: #1e22cc;
        }
        .footer-note {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 1.5rem;
            margin-bottom: 0;
        }
    </style>
    @vite(['resources/js/app.js'])
</head>
<body>
    @php
        $downData = [];
        $downFile = storage_path('framework/down');
        if (file_exists($downFile)) {
            $downData = json_decode(file_get_contents($downFile), true) ?? [];
        }
        $customMessage = $downData['message'] ?? $exception->getMessage() ?? null;
    @endphp

    <div class="maintenance-card">
        <img src="{{ asset('assets/images/logo-tesloka-cbt.webp') }}" alt="TESLOKA CBT" class="logo-img">

        <div>
            <span class="badge">
                <span class="badge-dot"></span>
                Mode Pemeliharaan Sistem
            </span>
        </div>

        <h1>Layanan Sedang Ditingkatkan</h1>

        <p>
            {{ !empty($customMessage) && $customMessage !== 'Service Unavailable' 
                ? $customMessage 
                : 'Aplikasi TESLOKA CBT sedang dalam pemeliharaan berkala untuk peningkatan performa dan keandalan sistem ujian.' }}
        </p>

        <div class="info-box">
            <div class="info-title">
                <i data-lucide="shield-check" class="size-4 text-primary"></i>
                <span>Integritas Data Ujian Terlindungi</span>
            </div>
            <div class="info-desc">
                Seluruh data akun, bank soal, dan riwayat pengerjaan ujian aman tersimpan di basis data server PostgreSQL. Peserta tidak perlu khawatir kehilangan data.
            </div>
        </div>

        <button type="button" onclick="window.location.reload()" class="btn">
            <i data-lucide="refresh-cw" class="size-4"></i>
            <span>Segarkan Halaman (Periksa Kembali)</span>
        </button>

        <p class="footer-note">
            Tesloka &bull; TESLOKA CBT Sistem Ujian Terstandarisasi
        </p>
    </div>
</body>
</html>

