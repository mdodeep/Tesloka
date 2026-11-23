<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Peserta Ujian - {{ $student->name }} - {{ $exam->code }}</title>
    @php
        $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
        $cardInst = $exam->institution ?? \App\Models\Institution::first();
        $cardInstName = $cardInst?->name ?: $branding['institution_name'];
        $cardLogoUrl = $cardInst?->logo_url ?: $branding['logo_url'];
        $doc = app(\App\Services\DocumentConfigService::class)->getSettings($cardInst);
        $scheme = request()->getScheme() ?: 'https';
        $studentHost = config('cbt.student_domain', 'ujian.tesloka.test');
        $studentIdent = $student->identity_number ?? $student->username;
        $qrPayload = $scheme . '://' . $studentHost . '/ujian/login?u=' . urlencode($studentIdent);
        if (! empty($participant->session?->token)) {
            $qrPayload .= '&token=' . urlencode($participant->session->token);
        }
    @endphp
    <style>
        @font-face {
            font-family: 'Sora';
            src: url('/assets/fonts/sora.ttf') format('truetype');
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }
        @page {
            size: A4 portrait;
            margin: 15mm 20mm;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }
        body {
            font-family: 'Sora', system-ui, -apple-system, sans-serif;
            color: #14213d;
            background: #f8fafc;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }
        .no-print {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 800px;
            margin: 0 auto 20px auto;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .btn-print {
            background: #2e33ff;
            color: #ffffff;
            border: none;
            padding: 8px 18px;
            font-size: 12.5px;
            font-weight: 700;
            border-radius: 6px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: inherit;
        }
        .doc-viewport-container {
            width: 100%;
            box-sizing: border-box;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: 12px 6px 28px;
            display: flex;
            justify-content: center;
        }
        .card-wrapper {
            width: 100%;
            max-width: 720px;
            margin: 0 auto;
            background: #ffffff;
            border: 2px solid #14213d;
            border-radius: 8px;
            padding: 22px 24px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.08);
            box-sizing: border-box;
        }
        .header {
            border-bottom: 2px solid #14213d;
            padding-bottom: 12px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }
        .inst-title {
            text-align: right;
        }
        .inst-name {
            font-size: 11.5pt;
            font-weight: 800;
            text-transform: uppercase;
            color: #14213d;
        }
        .inst-sub {
            font-size: 8.5pt;
            color: #64728b;
        }
        .card-title {
            text-align: center;
            font-size: 13pt;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #14213d;
            margin-bottom: 16px;
            border-bottom: 1px dashed #cbd5e1;
            padding-bottom: 8px;
        }
        .main-content {
            display: flex;
            gap: 20px;
            margin-bottom: 16px;
        }
        .photo-box {
            width: 110px;
            height: 142px;
            border: 1.5px solid #cbd5e1;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #64728b;
            font-size: 9pt;
            border-radius: 6px;
            flex-shrink: 0;
            overflow: hidden;
        }
        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .info-table {
            flex: 1;
            border-collapse: collapse;
            font-size: 9.5pt;
        }
        .info-table td {
            padding: 4px 4px;
            vertical-align: top;
        }
        .info-table td.label {
            width: 34%;
            color: #64728b;
            font-weight: 500;
        }
        .info-table td.colon {
            width: 14px;
            text-align: center;
            color: #64728b;
        }
        .info-table td.val {
            font-weight: 600;
            color: #14213d;
        }
        .schedule-box {
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 14px;
        }
        .schedule-box h4 {
            margin: 0 0 8px 0;
            font-size: 9pt;
            font-weight: 700;
            text-transform: uppercase;
            color: #14213d;
        }
        .rules-box {
            font-size: 8pt;
            color: #475569;
            line-height: 1.45;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
            margin-bottom: 14px;
        }
        .rules-box ol {
            margin: 4px 0;
            padding-left: 18px;
        }
        .footer-signs {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 12px;
            font-size: 9pt;
            gap: 16px;
        }
        .sign-col {
            width: 42%;
            text-align: center;
            position: relative;
        }
        .sign-gap {
            height: 54px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .qr-verify-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }
        .qr-verify-box {
            width: 66px;
            height: 66px;
            border: 1px solid #cbd5e1;
            padding: 2px;
            background: #ffffff;
            border-radius: 4px;
        }
        .qr-verify-box svg {
            width: 100%;
            height: 100%;
            display: block;
        }
        @media screen and (max-width: 820px) {
            .doc-viewport-container {
                justify-content: flex-start;
                padding: 8px 4px;
            }
            .card-wrapper {
                margin: 0;
                flex-shrink: 0;
                padding: 14px;
            }
            body {
                padding: 10px 8px;
            }
            .no-print {
                padding: 10px 14px;
                flex-direction: column;
                align-items: stretch;
                gap: 8px;
                margin-bottom: 12px;
            }
            .btn-print {
                width: 100%;
                justify-content: center;
            }
            .main-content {
                flex-direction: column;
                align-items: center;
                gap: 12px;
            }
        }
        @media print {
            body {
                background: #ffffff !important;
                padding: 0 !important;
                margin: 0 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .no-print {
                display: none !important;
            }
            .doc-viewport-container {
                padding: 0 !important;
                display: block !important;
                overflow: visible !important;
            }
            .card-wrapper {
                box-shadow: none !important;
                border: 1.5px solid #000 !important;
                padding: 15px !important;
                max-width: 100% !important;
                margin: 0 !important;
            }
        }
    </style>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="no-print">
        <div>
            <a href="{{ route('student.exam.index') }}" style="color: #64728b; text-decoration: none; font-size: 13px;">&larr; Kembali ke Daftar Ujian</a>
            <div style="font-size: 11px; color: #94a3b8; margin-top: 2px;">Kartu Peserta Ujian Resmi</div>
        </div>
        <button onclick="window.print()" class="btn-print">
            <i data-lucide="printer" style="width: 16px; height: 16px;"></i>
            Cetak Kartu Ujian (PDF)
        </button>
    </div>

    <div class="doc-viewport-container">
        <div class="card-wrapper">
            <!-- HEADER KOP -->
            <div class="header">
                <img src="{{ $cardLogoUrl }}" alt="{{ $cardInstName }}" style="height: 30px; max-width: 120px; object-fit: contain;">
                <div class="inst-title">
                    <div class="inst-name">{{ $cardInstName }}</div>
                    <div class="inst-sub">KARTU TANDA PESERTA EVALUASI AKADEMIK</div>
                </div>
            </div>

            <div class="card-title">KARTU PESERTA UJIAN KOMPUTER (CBT)</div>

            <div class="main-content">
                <div style="display: flex; flex-direction: column; gap: 8px; align-items: center;">
                    <div class="photo-box">
                        <img src="{{ $student->photo_url }}" alt="{{ $student->name }}">
                    </div>
                    <div style="font-family: monospace; font-size: 7.5pt; text-align: center; border: 1px solid #cbd5e1; padding: 4px; border-radius: 4px; background: #f8fafc; width: 110px;">
                        <div style="font-weight: 700; color: #2e33ff;">TOKEN VERIFIKASI</div>
                        <div style="font-size: 8.5pt; letter-spacing: 1px;">{{ strtoupper(substr(md5($participant->id . $exam->code), 0, 8)) }}</div>
                    </div>
                </div>

                <table class="info-table">
                    <tr>
                        <td class="label">Nama Lengkap</td>
                        <td class="colon">:</td>
                        <td class="val" style="font-size: 10.5pt;">{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nomor Induk / NIM</td>
                        <td class="colon">:</td>
                        <td class="val" style="font-family: monospace;">{{ $student->identity_number ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Username Login</td>
                        <td class="colon">:</td>
                        <td class="val" style="font-family: monospace;">{{ $student->username }}</td>
                    </tr>
                    <tr>
                        <td class="label">Mata Pelajaran</td>
                        <td class="colon">:</td>
                        <td class="val">{{ $exam->subject->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nama &amp; Kode Ujian</td>
                        <td class="colon">:</td>
                        <td class="val">{{ $exam->title }} (<code>{{ $exam->code }}</code>)</td>
                    </tr>
                    <tr>
                        <td class="label">Nomor Kursi</td>
                        <td class="colon">:</td>
                        <td class="val" style="color: #2e33ff; font-weight: 800; font-size: 10.5pt;">{{ $participant->seat_number ?? '-' }}</td>
                    </tr>
                </table>
            </div>

            <div class="schedule-box">
                <h4>Jadwal &amp; Lokasi Pelaksanaan Sesi:</h4>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; font-size: 9pt;">
                    <div>
                        <span style="color: #64728b; display: block; font-size: 8pt;">Sesi &amp; Kode:</span>
                        <strong>{{ $participant->session->name ?? 'Sesi Ujian' }} ({{ $participant->session->session_code ?? '-' }})</strong>
                    </div>
                    <div>
                        <span style="color: #64728b; display: block; font-size: 8pt;">Ruang Ujian:</span>
                        <strong>{{ $participant->session->room->name ?? 'Ruang Lab CBT' }}</strong>
                    </div>
                    <div>
                        <span style="color: #64728b; display: block; font-size: 8pt;">Waktu Mulai:</span>
                        <strong>{{ $participant->session->start_time?->format('d M Y, H:i') ?? '-' }} WIB</strong>
                    </div>
                </div>
            </div>

            <div class="rules-box">
                <strong>TATA TERTIB RINGKAS PESERTA UJIAN:</strong>
                <ol>
                    <li>Peserta wajib hadir di ruang ujian 15 menit sebelum sesi dimulai dengan membawa Kartu Peserta ini dan kartu identitas resmi.</li>
                    <li>Dilarang membawa alat komunikasi, catatan, contekan, gawai elektronik tambahan, atau perangkat perekam ke dalam ruang ujian.</li>
                    <li>Pengerjaan ujian wajib menggunakan browser resmi yang ditentukan (Safe Exam Browser bila diwajibkan oleh panitia).</li>
                    <li>Setiap bentuk kecurangan, membuka tab browser lain, atau keluar dari jendela ujian akan dicatat otomatis ke dalam sistem pengawasan.</li>
                </ol>
            </div>

            <div class="footer-signs">
                <div class="sign-col">
                    <div>Tanda Tangan Peserta,</div>
                    <div class="sign-gap"></div>
                    <div style="font-weight: 700; text-decoration: underline;">{{ $student->name }}</div>
                    <div style="font-size: 8pt; color: #64728b;">NIM: {{ $student->identity_number ?? '-' }}</div>
                </div>

                <div class="qr-verify-wrap">
                    <div class="qr-verify-box" title="Scan QR Verifikasi &amp; Login">
                        {!! \App\Services\QrCodeService::svg($qrPayload, 60) !!}
                    </div>
                    <span style="font-size: 7pt; color: #64728b;">QR Login Ujian</span>
                </div>

                <div class="sign-col">
                    <div>{{ ($doc['city'] !== '' ? $doc['city'] . ', ' : '') . now()->translatedFormat('d F Y') }}</div>
                    <div>{{ $doc['secondary_title'] ?: 'Ketua Panitia Ujian CBT' }},</div>
                    <div class="sign-gap">
                        @if($doc['stamp_url'])
                            <img src="{{ $doc['stamp_url'] }}" alt="Cap Stempel" style="position: absolute; left: 8px; top: -6px; width: 64px; height: 64px; object-fit: contain; opacity: 0.85; pointer-events: none;">
                        @endif
                        @if($doc['secondary_signature_url'])
                            <img src="{{ $doc['secondary_signature_url'] }}" alt="TTD Panitia" style="max-height: 50px; max-width: 140px; object-fit: contain; position: relative; z-index: 1;">
                        @endif
                    </div>
                    <div style="font-weight: 700; text-decoration: underline;">{{ $doc['secondary_name'] ?: '( ............................................ )' }}</div>
                    <div style="font-size: 8pt; color: #64728b;">NIP. {{ $doc['secondary_nip'] ?: '....................................' }}</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
