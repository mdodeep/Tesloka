<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Peserta Ujian - {{ $student->name }} - {{ $exam->code }}</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 15mm 20mm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #1e293b;
            background: #f8fafc;
            margin: 0;
            padding: 0;
            font-size: 11pt;
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
            color: white;
            border: none;
            padding: 8px 18px;
            font-size: 13px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .doc-viewport-container {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: 12px 6px;
            display: flex;
            justify-content: center;
        }
        .card-wrapper {
            width: 100%;
            max-width: 720px;
            margin: 0 auto;
            background: #ffffff;
            border: 2px solid #334155;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            box-sizing: border-box;
        }
        .header {
            border-bottom: 2px solid #0f172a;
            padding-bottom: 12px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .brand-logo {
            font-size: 24pt;
            font-weight: 900;
            color: #2e33ff;
            letter-spacing: -1px;
        }
        .inst-title {
            text-align: right;
        }
        .inst-name {
            font-size: 12pt;
            font-weight: bold;
            text-transform: uppercase;
            color: #0f172a;
        }
        .inst-sub {
            font-size: 9pt;
            color: #64748b;
        }
        .card-title {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #1e293b;
            margin-bottom: 18px;
            border-bottom: 1px dashed #cbd5e1;
            padding-bottom: 8px;
        }
        .main-content {
            display: flex;
            gap: 20px;
            margin-bottom: 18px;
        }
        .photo-box {
            width: 120px;
            height: 150px;
            border: 1.5px solid #94a3b8;
            background: #f1f5f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #64748b;
            font-size: 9pt;
            border-radius: 4px;
            flex-shrink: 0;
        }
        .info-table {
            flex: 1;
            border-collapse: collapse;
            font-size: 10.5pt;
        }
        .info-table td {
            padding: 4px 6px;
            vertical-align: top;
        }
        .info-table td.label {
            width: 32%;
            color: #475569;
            font-weight: 500;
        }
        .info-table td.colon {
            width: 3%;
            text-align: center;
        }
        .info-table td.val {
            font-weight: 600;
            color: #0f172a;
        }
        .schedule-box {
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 16px;
        }
        .schedule-box h4 {
            margin: 0 0 8px 0;
            font-size: 10pt;
            font-weight: bold;
            text-transform: uppercase;
            color: #334155;
        }
        .rules-box {
            font-size: 8.5pt;
            color: #475569;
            line-height: 1.4;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
            margin-bottom: 16px;
        }
        .rules-box ol {
            margin: 4px 0;
            padding-left: 18px;
        }
        .footer-signs {
            display: flex;
            justify-content: space-between;
            margin-top: 14px;
            font-size: 9.5pt;
        }
        .sign-col {
            width: 45%;
            text-align: center;
        }
        .sign-gap {
            height: 55px;
        }
        @media screen and (max-width: 820px) {
            .doc-viewport-container {
                justify-content: flex-start;
                padding: 8px 4px;
            }
            .card-wrapper {
                margin: 0;
                flex-shrink: 0;
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
            .card-wrapper {
                padding: 14px;
            }
            .main-content {
                flex-direction: column;
                align-items: center;
                gap: 12px;
            }
            .photo-box {
                margin: 0 auto;
            }
            .meta-table td.label {
                width: 110px;
                font-size: 9pt;
            }
            .meta-table td.value {
                font-size: 9pt;
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
</head>
<body>
    <div class="no-print">
        <div>
            <a href="{{ route('student.exam.index') }}" style="color: #64748b; text-decoration: none; font-size: 13px;">&larr; Kembali ke Daftar Ujian</a>
            <div style="font-size: 11px; color: #94a3b8; margin-top: 2px;">Kartu Peserta Ujian Resmi</div>
        </div>
        <button onclick="window.print()" class="btn-print">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
            Cetak Kartu Ujian (PDF)
        </button>
    </div>

    <div class="doc-viewport-container">
        <div class="card-wrapper">
        <!-- HEADER KOP -->
        <div class="header">
            <div class="brand-logo">tesloka.</div>
            <div class="inst-title">
                <div class="inst-name">{{ $exam->institution->name ?? 'INSTITUSI TESLOKA CBT' }}</div>
                <div class="inst-sub">KARTU TANDA PESERTA EVALUASI AKADEMIK</div>
            </div>
        </div>

        <div class="card-title">KARTU PESERTA UJIAN KOMPUTER (CBT)</div>

        <div class="main-content">
            <!-- PHOTO & QR -->
            <div style="display: flex; flex-direction: column; gap: 8px; align-items: center;">
                <div class="photo-box" style="overflow: hidden; padding: 0;">
                    <img src="{{ $student->photo_url }}" alt="{{ $student->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="font-family: monospace; font-size: 8pt; text-align: center; border: 1px solid #cbd5e1; padding: 4px; border-radius: 4px; background: #f8fafc; width: 110px;">
                    <div style="font-weight: bold; color: #2e33ff;">TOKEN VERIFIKASI</div>
                    <div style="font-size: 9pt; letter-spacing: 1px;">{{ strtoupper(substr(md5($participant->id . $exam->code), 0, 8)) }}</div>
                </div>
            </div>

            <!-- INFO PESERTA -->
            <table class="info-table">
                <tr>
                    <td class="label">Nama Lengkap</td>
                    <td class="colon">:</td>
                    <td class="val" style="font-size: 11pt; color: #1e293b;">{{ $student->name }}</td>
                </tr>
                <tr>
                    <td class="label">Nomor Induk / NIM</td>
                    <td class="colon">:</td>
                    <td class="val font-mono">{{ $student->identity_number ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Username Login</td>
                    <td class="colon">:</td>
                    <td class="val font-mono">{{ $student->username }}</td>
                </tr>
                <tr>
                    <td class="label">Mata Pelajaran</td>
                    <td class="colon">:</td>
                    <td class="val">{{ $exam->subject->name ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Nama & Kode Ujian</td>
                    <td class="colon">:</td>
                    <td class="val">{{ $exam->title }} (<code>{{ $exam->code }}</code>)</td>
                </tr>
                <tr>
                    <td class="label">Nomor Kursi</td>
                    <td class="colon">:</td>
                    <td class="val" style="color: #2e33ff; font-weight: bold; font-size: 11pt;">{{ $participant->seat_number ?? '-' }}</td>
                </tr>
            </table>
        </div>

        <!-- JADWAL DAN LOKASI -->
        <div class="schedule-box">
            <h4>Jadwal & Lokasi Pelaksanaan Sesi:</h4>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; font-size: 9.5pt;">
                <div>
                    <span style="color: #64748b; display: block; font-size: 8.5pt;">Sesi & Kode:</span>
                    <strong>{{ $participant->session->name ?? 'Sesi Ujian' }} ({{ $participant->session->session_code ?? '-' }})</strong>
                </div>
                <div>
                    <span style="color: #64748b; display: block; font-size: 8.5pt;">Ruang Ujian:</span>
                    <strong>{{ $participant->session->room->name ?? 'Ruang Lab CBT' }}</strong>
                </div>
                <div>
                    <span style="color: #64748b; display: block; font-size: 8.5pt;">Waktu Mulai:</span>
                    <strong>{{ $participant->session->start_time?->format('d M Y, H:i') ?? '-' }} WIB</strong>
                </div>
            </div>
        </div>

        <!-- TATA TERTIB RINGKAS -->
        <div class="rules-box">
            <strong>TATA TERTIB RINGKAS PESERTA UJIAN:</strong>
            <ol>
                <li>Peserta wajib hadir di ruang ujian 15 menit sebelum sesi dimulai dengan membawa Kartu Peserta ini dan kartu identitas resmi.</li>
                <li>Dilarang membawa alat komunikasi, catatan, contekan, gawai elektronik tambahan, atau perangkat perekam ke dalam ruang ujian.</li>
                <li>Pengerjaan ujian wajib menggunakan browser resmi yang ditentukan (Safe Exam Browser bila diwajibkan oleh panitia).</li>
                <li>Setiap bentuk kecurangan, membuka tab browser lain, atau keluar dari jendela ujian akan dicatat otomatis ke dalam sistem pengawasan.</li>
            </ol>
        </div>

        <!-- TANDA TANGAN -->
        <div class="footer-signs">
            <div class="sign-col">
                <div>Tanda Tangan Peserta,</div>
                <div class="sign-gap"></div>
                <div style="font-weight: bold; text-decoration: underline;">{{ $student->name }}</div>
                <div style="font-size: 8.5pt; color: #64748b;">NIM: {{ $student->identity_number ?? '-' }}</div>
            </div>

            <div class="sign-col">
                <div>Petugas Verifikasi / Panitia,</div>
                <div class="sign-gap"></div>
                <div style="font-weight: bold; text-decoration: underline;">( Panitia CBT TESLOKA )</div>
                <div style="font-size: 8.5pt; color: #64748b;">Tanggal: {{ now()->translatedFormat('d F Y') }}</div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

