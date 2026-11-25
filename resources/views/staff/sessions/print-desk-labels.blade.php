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
        $tzAbbr = \App\Services\DocumentConfigService::timezoneAbbreviation();
        $cleanRoomName = ($session->isOnline() || ! $session->exam_room_id)
            ? 'Daring (Online)'
            : str_replace("\u{2014}", '-', (string) ($session->room->name ?? 'Ruang 01'));
        $cleanSessionName = str_replace("\u{2014}", '-', (string) $session->name);
        $deskDateText = $session->start_time?->translatedFormat('d M Y') ?? '-';
        $deskTimeText = $session->start_time
            ? ($session->start_time->format('H:i') . ($session->end_time ? ' - ' . $session->end_time->format('H:i') : '') . ' ' . $tzAbbr)
            : '-';
    @endphp
    <style>
        @font-face {
            font-family: 'Sora';
            src: url('/assets/fonts/sora.ttf') format('truetype');
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }
        @page {
            size: A4 portrait;
            margin: 10mm;
        }
        body {
            font-family: 'Sora', system-ui, -apple-system, sans-serif;
            color: #14213d;
            background: #f8fafc;
            margin: 0;
            padding: 0;
            font-size: 9.5pt;
            line-height: 1.35;
        }
        .no-print {
            background: #ffffff;
            padding: 12px 20px;
            border-bottom: 1px solid #cbd5e1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            position: sticky;
            top: 0;
            z-index: 40;
        }
        .btn-print {
            background: #2e33ff;
            color: #ffffff;
            border: none;
            padding: 8px 18px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            font-family: inherit;
            font-size: 12.5px;
        }
        .btn-print:hover {
            background: #1e24cc;
        }
        .btn-close {
            background: #ffffff;
            color: #475569;
            border: 1px solid #cbd5e1;
            padding: 7px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 12.5px;
        }
        .doc-viewport-container {
            box-sizing: border-box;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: 16px 8px 28px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
        }
        .document-wrapper {
            width: 210mm;
            min-height: 297mm;
            background: #ffffff;
            padding: 10mm;
            box-shadow: 0 4px 12px rgb(15 23 42 / 0.08);
            flex-shrink: 0;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 7mm;
        }
        .desk-card {
            border: 1.5px dashed #334155;
            border-radius: 8px;
            padding: 10px 13px;
            background: #ffffff;
            height: 86mm;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            page-break-inside: avoid;
        }
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            border-bottom: 1.5px solid #14213d;
            padding-bottom: 7px;
        }
        .card-logo {
            max-height: 38px;
            max-width: 185px;
            width: auto;
            height: auto;
            object-fit: contain;
            display: block;
            flex-shrink: 0;
        }
        .seat-badge {
            background: #14213d;
            color: #ffffff;
            font-size: 12pt;
            font-weight: 800;
            padding: 4px 12px;
            border-radius: 5px;
            text-align: center;
            letter-spacing: 0.6px;
            white-space: nowrap;
        }
        .card-body {
            margin-top: 7px;
            flex: 1;
        }
        .student-name {
            font-size: 11.5pt;
            font-weight: 700;
            color: #14213d;
            margin-bottom: 5px;
            line-height: 1.25;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 8.5pt;
        }
        .info-table td {
            padding: 2px 0;
            vertical-align: top;
        }
        .info-label {
            color: #64728b;
            width: 78px;
        }
        .info-colon {
            width: 10px;
            text-align: center;
            color: #64728b;
        }
        .info-val {
            font-weight: 600;
            color: #1e293b;
        }
        .card-footer {
            border-top: 1px dashed #cbd5e1;
            padding-top: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            font-size: 7.5pt;
            color: #64728b;
        }
        .qr-box {
            width: 44px;
            height: 44px;
            border: 1px solid #cbd5e1;
            padding: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            border-radius: 4px;
            flex-shrink: 0;
        }
        .qr-box svg {
            width: 100%;
            height: 100%;
            display: block;
        }
        .page-break {
            page-break-after: always;
            break-after: page;
        }
        @media screen and (max-width: 820px) {
            .no-print {
                padding: 10px 14px;
                flex-direction: column;
                align-items: stretch;
                gap: 8px;
            }
            .no-print-actions {
                display: flex;
                gap: 8px;
            }
            .btn-print, .btn-close {
                flex: 1;
                text-align: center;
            }
            .doc-viewport-container {
                align-items: flex-start;
                padding: 8px 4px;
            }
        }
        @media print {
            .no-print { display: none !important; }
            body {
                background: #ffffff !important;
                margin: 0 !important;
                padding: 0 !important;
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
                margin: 0 !important;
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
            <strong>Tempelan Meja Peserta Ujian (A4 Grid)</strong> &bull; Sesi: {{ $session->session_code }} &bull; Ruang: {{ $session->room->name ?? '-' }} ({{ $participants->count() }} Peserta)
        </div>
        <div class="no-print-actions" style="display: flex; gap: 8px;">
            <button onclick="window.print()" class="btn-print">Cetak Label Meja (A4)</button>
            <a href="{{ route('staff.sessions.show', $session) }}" class="btn-close">Kembali</a>
        </div>
    </div>

    <div class="doc-viewport-container">
        @php
            $chunks = $participants->chunk(6);
            $globalCounter = 0;
        @endphp

        @forelse($chunks as $chunk)
            <div class="document-wrapper {{ ! $loop->last ? 'page-break' : '' }}">
                <div class="grid-container">
                    @foreach($chunk as $participant)
                        @php
                            $globalCounter++;
                            $seatDisplay = $participant->seat_number ?: str_pad($globalCounter, 2, '0', STR_PAD_LEFT);
                            $studentIdent = $participant->student->identity_number ?? $participant->student->username;
                            $scheme = request()->getScheme() ?: 'https';
                            $studentHost = config('cbt.student_domain', 'ujian.tesloka.test');
                            $qrPayload = $scheme . '://' . $studentHost . '/ujian/login?u=' . urlencode($studentIdent);
                            if (! empty($session->token)) {
                                $qrPayload .= '&token=' . urlencode($session->token);
                            }
                        @endphp
                        <div class="desk-card">
                            <div class="card-header">
                                <img src="{{ $logoUrl }}" alt="{{ $instName }}" class="card-logo">
                                <div class="seat-badge">NO. {{ $seatDisplay }}</div>
                            </div>

                            <div class="card-body">
                                <div class="student-name">{{ $participant->student->name }}</div>
                                <table class="info-table">
                                    <tr>
                                        <td class="info-label">No. Peserta</td>
                                        <td class="info-colon">:</td>
                                        <td class="info-val" style="font-family: monospace;">{{ $studentIdent }}</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Mata Ujian</td>
                                        <td class="info-colon">:</td>
                                        <td class="info-val">{{ $session->exam->subject->name ?? $session->exam->title }}</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Ruang</td>
                                        <td class="info-colon">:</td>
                                        <td class="info-val">{{ $cleanRoomName }}</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Sesi</td>
                                        <td class="info-colon">:</td>
                                        <td class="info-val">{{ $cleanSessionName }} ({{ $session->session_code }})</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Tanggal</td>
                                        <td class="info-colon">:</td>
                                        <td class="info-val">{{ $deskDateText }}</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Waktu</td>
                                        <td class="info-colon">:</td>
                                        <td class="info-val">{{ $deskTimeText }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="card-footer">
                                <div>
                                    <strong>Token Rilis:</strong>
                                    <span style="font-family: monospace; font-size: 9.5pt; font-weight: 700; color: #2e33ff;">{{ $session->token ?? '-' }}</span><br>
                                    <span>Tempelkan pada sudut meja peserta.</span>
                                </div>
                                <div class="qr-box" title="Scan QR Verifikasi & Login: {{ $studentIdent }}">
                                    {!! \App\Services\QrCodeService::svg($qrPayload, 40) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="document-wrapper" style="display: flex; align-items: center; justify-content: center; text-align: center;">
                <p style="color: #64728b;">Belum ada peserta yang didaftarkan pada sesi ujian ini.</p>
            </div>
        @endforelse
    </div>
</body>
</html>
