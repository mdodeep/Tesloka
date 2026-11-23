<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempelan Meja Peserta - {{ $session->session_code }} - {{ $session->room->name ?? 'Ruang Ujian' }}</title>
    @php
        $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
        $institution = $session->exam->institution ?? \App\Models\Institution::first();
        $logoUrl = $institution?->logo_url ?: $branding['logo_url'];
        $instName = $institution?->name ?: $branding['institution_name'];
    @endphp
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        @page {
            size: A4 portrait;
            margin: 10mm;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #111827;
            background: #fff;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            line-height: 1.3;
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
            color: white;
            border: none;
            padding: 8px 18px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8mm;
        }
        .desk-card {
            border: 2px dashed #334155;
            border-radius: 8px;
            padding: 12px 14px;
            background: #ffffff;
            box-sizing: border-box;
            height: 82mm;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            page-break-inside: avoid;
        }
        .card-header {
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1.5px solid #0f172a;
            padding-bottom: 6px;
        }
        .card-logo {
            max-height: 38px;
            max-width: 90px;
            width: auto;
            height: auto;
            object-fit: contain;
        }
        .header-title {
            flex: 1;
        }
        .header-inst {
            font-size: 8pt;
            font-weight: bold;
            text-transform: uppercase;
            color: #475569;
            letter-spacing: 0.5px;
        }
        .header-doc {
            font-size: 11pt;
            font-weight: 900;
            color: #0f172a;
            text-transform: uppercase;
        }
        .seat-badge {
            background: #0f172a;
            color: #ffffff;
            font-size: 12pt;
            font-weight: bold;
            padding: 4px 8px;
            border-radius: 4px;
            text-align: center;
            letter-spacing: 1px;
            white-space: nowrap;
        }
        .card-body {
            margin-top: 6px;
            flex: 1;
        }
        .student-name {
            font-size: 12pt;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 4px;
            line-height: 1.2;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9pt;
        }
        .info-table td {
            padding: 2px 0;
            vertical-align: top;
        }
        .info-label {
            color: #64748b;
            width: 80px;
        }
        .info-val {
            font-weight: 600;
            color: #1e293b;
        }
        .card-footer {
            border-top: 1px solid #e2e8f0;
            padding-top: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 8pt;
            color: #64748b;
        }
        .qr-box {
            width: 48px;
            height: 48px;
            border: 1px solid #cbd5e1;
            padding: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            border-radius: 4px;
            flex-shrink: 0;
            box-sizing: border-box;
        }
        .qr-box svg {
            width: 100%;
            height: 100%;
            display: block;
        }
        .doc-viewport-container {
            box-sizing: border-box;
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
            box-sizing: border-box;
                justify-content: flex-start;
                padding: 8px 4px;
            }
            .document-wrapper {
                margin: 0;
                flex-shrink: 0;
            }
        }
        @media print {
            .no-print { display: none !important; }
            body { 
                background: #ffffff !important; 
                padding: 0 !important;
                margin: 0 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .doc-viewport-container {
            box-sizing: border-box;
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
<body style="background: #f8fafc;">
    <div class="no-print">
        <div>
            <strong>Tempelan Meja Peserta Ujian (A4 Grid)</strong> &bull; Sesi: {{ $session->session_code }} &bull; Ruang: {{ $session->room->name ?? '-' }} ({{ $participants->count() }} Peserta)
        </div>
        <button onclick="window.print()" class="btn-print">Cetak Label Meja</button>
    </div>

    <div class="doc-viewport-container">
        <div class="document-wrapper">
            <div class="grid-container">
                @forelse($participants as $participant)
                    <div class="desk-card">
                        <div class="card-header">
                            <img src="{{ $logoUrl }}" alt="Logo" class="card-logo">
                            <div class="header-title">
                                <div class="header-inst">{{ $instName }}</div>
                                <div class="header-doc">TEMPELAN MEJA UJIAN</div>
                            </div>
                            <div class="seat-badge">
                                NO: {{ $participant->seat_number ? $participant->seat_number : str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="student-name">{{ $participant->student->name }}</div>
                            <table class="info-table">
                                <tr>
                                    <td class="info-label">No. Peserta:</td>
                                    <td class="info-val">{{ $participant->student->identity_number ?? $participant->student->username }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Mata Ujian:</td>
                                    <td class="info-val">{{ $session->exam->subject->name ?? $session->exam->title }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Ruang / Sesi:</td>
                                    <td class="info-val">{{ $session->room->name ?? 'Ruang 01' }} / {{ $session->session_code }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Jadwal:</td>
                                    <td class="info-val">{{ $session->start_time->translatedFormat('d M Y, H:i') }} WIB</td>
                                </tr>
                            </table>
                        </div>

                        @php
                            $studentIdent = $participant->student->identity_number ?? $participant->student->username;
                            $scheme = request()->getScheme() ?: 'https';
                            $studentHost = config('cbt.student_domain', 'ujian.tesloka.test');
                            $qrPayload = $scheme . '://' . $studentHost . '/ujian/login?u=' . urlencode($studentIdent);
                            if (!empty($session->token)) {
                                $qrPayload .= '&token=' . urlencode($session->token);
                            }
                        @endphp
                        <div class="card-footer">
                            <div>
                                <strong>Token Rilis:</strong> <span style="font-family: monospace; font-size: 10pt; font-weight: bold; color: #2e33ff;">{{ $session->token ?? 'L00123' }}</span><br>
                                <span style="font-size: 7.5pt; color: #64748b;">Tempelkan pada sudut meja peserta.</span>
                            </div>
                            <div class="qr-box" title="Scan QR Verifikasi & Login: {{ $studentIdent }}">
                                {!! \App\Services\QrCodeService::svg($qrPayload, 44) !!}
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
