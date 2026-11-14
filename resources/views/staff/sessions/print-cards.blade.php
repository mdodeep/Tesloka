<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Peserta Ujian - {{ $session->session_code }}</title>
    @php
        $institution = $session->exam->institution ?? \App\Models\Institution::first();
        $logoUrl = $institution?->logo_url ?? asset('assets/images/logo-tesloka-cbt.webp');
        $instName = $institution?->name ?? config('app.name', 'TESLOKA CBT');
    @endphp
    <style>
        @page {
            size: A4 portrait;
            margin: 10mm;
        }
        body {
            font-family: Arial, sans-serif;
            color: #1e293b;
            background: #f8fafc;
            margin: 0;
            padding: 0;
            font-size: 11px;
        }
        .no-print {
            background: #f1f5f9;
            padding: 12px 20px;
            border-bottom: 1px solid #cbd5e1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: system-ui, sans-serif;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .btn-print {
            background: #2e33ff;
            color: #ffffff;
            border: none;
            padding: 8px 18px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.15s ease;
        }
        .btn-print:hover {
            background: #1e24cc;
        }
        .doc-viewport-container {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: 12px 6px;
            display: flex;
            justify-content: center;
        }
        .document-wrapper {
            width: 210mm;
            min-height: 297mm;
            background: #ffffff;
            box-sizing: border-box;
            padding: 10mm;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8mm;
        }
        .card {
            border: 1.5px dashed #475569;
            border-radius: 6px;
            padding: 12px;
            box-sizing: border-box;
            background: #fff;
            page-break-inside: avoid;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .header {
            border-bottom: 2px solid #0f172a;
            padding-bottom: 6px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }
        .header-brand {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .card-logo {
            max-height: 28px;
            max-width: 64px;
            width: auto;
            height: auto;
            object-fit: contain;
        }
        .title {
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #0f172a;
        }
        .subtitle {
            font-size: 9px;
            color: #475569;
            text-transform: uppercase;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10.5px;
            margin-bottom: 8px;
        }
        .meta-table td {
            padding: 2.5px 0;
            vertical-align: top;
        }
        .meta-table .label {
            width: 32%;
            color: #475569;
        }
        .meta-table .val {
            font-weight: bold;
            color: #0f172a;
        }
        .footer {
            border-top: 1px solid #e2e8f0;
            padding-top: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 9.5px;
            color: #64748b;
        }
        .seat-badge {
            background: #0f172a;
            color: #fff;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 11px;
            white-space: nowrap;
        }
        @media screen and (max-width: 820px) {
            .no-print {
                padding: 10px 14px !important;
                flex-direction: column !important;
                align-items: stretch !important;
                gap: 8px !important;
            }
            .btn-print {
                width: 100% !important;
                text-align: center;
            }
            .doc-viewport-container {
                justify-content: flex-start;
                padding: 8px 4px;
            }
            .document-wrapper {
                margin: 0;
                flex-shrink: 0;
            }
        }
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: #ffffff !important;
                padding: 0 !important;
                margin: 0 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .doc-viewport-container {
                padding: 0 !important;
                display: block !important;
                overflow: visible !important;
            }
            .document-wrapper {
                width: 100% !important;
                min-height: auto !important;
                padding: 0 !important;
                box-shadow: none !important;
                border: none !important;
            }
            .grid-container {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 6mm !important;
            }
        }
    </style>
</head>
<body>
    <div class="no-print">
        <div>
            <strong>Pratinjau Cetak Kartu Ujian (A4 Grid)</strong> &bull; Sesi: {{ $session->session_code }} &bull; Total: {{ $session->participants->count() }} Peserta
        </div>
        <button onclick="window.print()" class="btn-print">
            Cetak Kartu Ujian (PDF/Printer)
        </button>
    </div>

    <div class="doc-viewport-container">
        <div class="document-wrapper">
            <div class="grid-container">
                @forelse($session->participants as $ptc)
                    <div class="card">
                        <div class="header">
                            <div class="header-brand">
                                <img src="{{ $logoUrl }}" alt="Logo" class="card-logo">
                                <div>
                                    <div class="title">KARTU PESERTA UJIAN (CBT)</div>
                                    <div class="subtitle">{{ $instName }}</div>
                                </div>
                            </div>
                            <div class="seat-badge">
                                {{ $ptc->seat_number ?? 'K-00' }}
                            </div>
                        </div>

                        <table class="meta-table">
                            <tr>
                                <td class="label">Nama Peserta:</td>
                                <td class="val">{{ $ptc->student->name }}</td>
                            </tr>
                            <tr>
                                <td class="label">NISN / Identitas:</td>
                                <td class="val">{{ $ptc->student->identity_number ?? $ptc->student->username }}</td>
                            </tr>
                            <tr>
                                <td class="label">Mata Pelajaran:</td>
                                <td class="val">{{ $session->exam->subject->name ?? $session->exam->title }}</td>
                            </tr>
                            <tr>
                                <td class="label">Sesi & Ruang:</td>
                                <td class="val">{{ $session->name }} ({{ $session->room->name ?? '-' }})</td>
                            </tr>
                            <tr>
                                <td class="label">Jadwal:</td>
                                <td class="val">{{ $session->start_time->format('d M Y H:i') }} WIB</td>
                            </tr>
                            <tr>
                                <td class="label">Paket Soal:</td>
                                <td class="val">{{ $ptc->package->name ?? 'Paket Default' }}</td>
                            </tr>
                        </table>

                        @php
                            $cardIdent = $ptc->student->identity_number ?? $ptc->student->username;
                            $scheme = request()->getScheme() ?: 'https';
                            $studentHost = config('cbt.student_domain', 'ujian.tesloka.test');
                            $cardQrUrl = $scheme . '://' . $studentHost . '/ujian/login?u=' . urlencode($cardIdent);
                            if (!empty($session->token)) {
                                $cardQrUrl .= '&token=' . urlencode($session->token);
                            }
                        @endphp
                        <div class="footer">
                            <div>
                                <div>Login: <strong>{{ $ptc->student->username }}</strong></div>
                                <div style="font-size: 8px; color: #94a3b8;">Wajib Membawa Kartu Saat Ujian</div>
                            </div>
                            <div style="width: 36px; height: 36px; border: 1px solid #cbd5e1; border-radius: 3px; padding: 1px; background: #ffffff; display: flex; align-items: center; justify-content: center;" title="Scan QR Verifikasi Peserta">
                                {!! \App\Services\QrCodeService::svg($cardQrUrl, 34) !!}
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: span 2; text-align: center; padding: 40px; color: #64748b;">
                        Belum ada peserta yang didaftarkan pada sesi ujian ini.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
