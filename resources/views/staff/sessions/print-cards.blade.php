<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Peserta Ujian - {{ $session->session_code }}</title>
    @php
        $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
        $institution = $session->exam->institution ?? \App\Models\Institution::first();
        $logoUrl = $institution?->logo_url ?: $branding['logo_url'];
        $instName = $institution?->name ?: $branding['institution_name'];
        $isPdfMode = (bool) ($isPdf ?? false);
        $scheme = request()->getScheme() ?: 'https';
        $studentHost = config('cbt.student_domain', 'ujian.tesloka.test');
        $cleanSessionName = str_replace("\u{2014}", '-', (string) $session->name);
        $cleanRoomName = str_replace("\u{2014}", '-', (string) ($session->room->name ?? '-'));
        $cardsSource = $participants ?? $session->participants;
    @endphp
    <style>
        @if(! $isPdfMode)
        @font-face {
            font-family: 'Sora';
            src: url('/assets/fonts/sora.ttf') format('truetype');
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }
        @endif
        *, *::before, *::after {
            box-sizing: border-box;
        }
        @page {
            size: A4 portrait;
            margin: 10mm;
        }
        body {
            @if($isPdfMode)
                font-family: Helvetica, Arial, sans-serif;
                background: #ffffff;
            @else
                font-family: 'Sora', system-ui, -apple-system, sans-serif;
                background: #f8fafc;
            @endif
            color: #14213d;
            margin: 0;
            padding: 0;
            font-size: 9pt;
            line-height: 1.32;
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
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            font-family: inherit;
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
            padding: {{ $isPdfMode ? '0' : '16px 8px 28px' }};
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
        }
        .document-wrapper {
            width: {{ $isPdfMode ? '100%' : '210mm' }};
            min-height: {{ $isPdfMode ? 'auto' : '297mm' }};
            background: #ffffff;
            padding: {{ $isPdfMode ? '0' : '10mm' }};
            box-shadow: {{ $isPdfMode ? 'none' : '0 4px 12px rgb(15 23 42 / 0.08)' }};
            flex-shrink: 0;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 7mm;
        }
        .pdf-grid-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 5mm;
        }
        .pdf-grid-td {
            width: 50%;
            vertical-align: top;
        }
        .card {
            border: 1.5px dashed #334155;
            border-radius: 8px;
            padding: 10px 12px;
            background: #ffffff;
            page-break-inside: avoid;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: {{ $isPdfMode ? '78mm' : '86mm' }};
        }
        .header {
            border-bottom: 1.5px solid #14213d;
            padding-bottom: 6px;
            margin-bottom: 7px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }
        .header-brand {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 0;
        }
        .card-logo {
            max-height: 26px;
            max-width: 58px;
            width: auto;
            height: auto;
            object-fit: contain;
        }
        .title {
            font-size: 9.5pt;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: #14213d;
            line-height: 1.2;
        }
        .subtitle {
            font-size: 7.5pt;
            color: #64728b;
            text-transform: uppercase;
            line-height: 1.2;
        }
        .seat-badge {
            background: #14213d;
            color: #ffffff;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: 700;
            font-size: 8.5pt;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .content-body {
            display: flex;
            gap: 9px;
            align-items: flex-start;
            flex: 1;
        }
        .photo-box {
            width: 21mm;
            height: 27mm;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            color: #94a3b8;
            font-size: 7.5pt;
            overflow: hidden;
            flex-shrink: 0;
            text-align: center;
        }
        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 8pt;
        }
        .meta-table td {
            padding: 1.8px 0;
            vertical-align: top;
        }
        .meta-table .label {
            width: 72px;
            color: #64728b;
        }
        .meta-table .colon {
            width: 10px;
            text-align: center;
            color: #64728b;
        }
        .meta-table .val {
            font-weight: 600;
            color: #14213d;
        }
        .footer {
            border-top: 1px dashed #cbd5e1;
            padding-top: 6px;
            margin-top: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            font-size: 7.5pt;
            color: #64728b;
        }
        .qr-box {
            width: 40px;
            height: 40px;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            padding: 2px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .qr-box svg, .qr-box img {
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
                flex-wrap: wrap;
                gap: 8px;
            }
            .btn-print, .btn-close {
                flex: 1;
                justify-content: center;
                text-align: center;
            }
            .doc-viewport-container {
                align-items: flex-start;
                padding: 8px 4px;
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
    @if(! $isPdfMode)
        <div class="no-print">
            <div>
                <strong>Pratinjau Cetak Kartu Ujian (A4 Grid)</strong> &bull; Sesi: {{ $session->session_code }} &bull; Total: {{ $cardsSource->count() }} Peserta
            </div>
            <div class="no-print-actions" style="display: flex; gap: 8px;">
                <button onclick="window.print()" class="btn-print">Cetak Kartu Ujian (A4)</button>
                <a href="{{ route('staff.sessions.pdf.cards', $session) }}" class="btn-print" style="background: #14213d;">Unduh PDF Asli</a>
                <a href="{{ route('staff.sessions.show', $session) }}" class="btn-close">Kembali</a>
            </div>
        </div>
    @endif

    <div class="doc-viewport-container">
        @php
            $cardChunks = $cardsSource->chunk(6);
            $cardIdx = 0;
        @endphp

        @forelse($cardChunks as $chunk)
            <div class="document-wrapper {{ ! $loop->last ? 'page-break' : '' }}">
                @if($isPdfMode)
                    <table class="pdf-grid-table">
                        @foreach($chunk->chunk(2) as $row)
                            <tr>
                                @foreach($row as $ptc)
                                    @php
                                        $cardIdx++;
                                        $seatLabel = $ptc->seat_number ?: ('NO. ' . str_pad($cardIdx, 2, '0', STR_PAD_LEFT));
                                        $cardIdent = $ptc->student->identity_number ?? $ptc->student->username;
                                        $cardQrUrl = $scheme . '://' . $studentHost . '/ujian/login?u=' . urlencode($cardIdent);
                                        if (! empty($session->token)) {
                                            $cardQrUrl .= '&token=' . urlencode($session->token);
                                        }
                                        $photoAbsPath = $ptc->student->photo_path ? storage_path('app/public/' . ltrim((string) $ptc->student->photo_path, '/')) : null;
                                    @endphp
                                    <td class="pdf-grid-td">
                                        <div class="card">
                                            <div class="header">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <div class="title" style="font-size: 8.6pt; white-space: nowrap;">KARTU PESERTA UJIAN (CBT)</div>
                                                            <div class="subtitle">{{ $instName }}</div>
                                                        </td>
                                                        <td style="text-align: right; vertical-align: middle;">
                                                            <span class="seat-badge">{{ $seatLabel }}</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <table style="width: 100%; border-collapse: collapse;">
                                                <tr>
                                                    <td style="width: 23mm; vertical-align: top;">
                                                        <div class="photo-box">
                                                            @if($photoAbsPath && file_exists($photoAbsPath))
                                                                <img src="{{ $photoAbsPath }}" alt="{{ $ptc->student->name }}">
                                                            @else
                                                                FOTO<br>3 x 4
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td style="vertical-align: top;">
                                                        <table class="meta-table">
                                                            <tr><td class="label">Nama</td><td class="colon">:</td><td class="val">{{ Str::limit($ptc->student->name, 26) }}</td></tr>
                                                            <tr><td class="label">NIM / NISN</td><td class="colon">:</td><td class="val" style="font-family: monospace;">{{ $cardIdent }}</td></tr>
                                                            <tr><td class="label">Mata Ujian</td><td class="colon">:</td><td class="val">{{ Str::limit($session->exam->subject->name ?? $session->exam->title, 26) }}</td></tr>
                                                            <tr><td class="label">Sesi &amp; Ruang</td><td class="colon">:</td><td class="val">{{ Str::limit($cleanSessionName . ' (' . $cleanRoomName . ')', 26) }}</td></tr>
                                                            <tr><td class="label">Jadwal</td><td class="colon">:</td><td class="val">{{ $session->start_time?->format('d M Y H:i') ?? '-' }} WIB</td></tr>
                                                            <tr><td class="label">Paket Soal</td><td class="colon">:</td><td class="val">{{ Str::limit($ptc->package->name ?? 'Paket Default', 24) }}</td></tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="width: 100%; border-collapse: collapse; border-top: 1px dashed #cbd5e1; margin-top: 6px; padding-top: 5px;">
                                                <tr>
                                                    <td style="vertical-align: middle; font-size: 7pt; color: #475569;">
                                                        Login: <strong style="font-family: monospace; color: #2e33ff;">{{ $ptc->student->username }}</strong><br>
                                                        Wajib Membawa Kartu Saat Ujian
                                                    </td>
                                                    <td style="width: 44px; text-align: right; vertical-align: middle;">
                                                        <div class="qr-box">
                                                            <img src="{{ \App\Services\QrCodeService::dataUri($cardQrUrl, 36) }}" alt="QR">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                @endforeach
                                @if($row->count() === 1)
                                    <td class="pdf-grid-td"></td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="grid-container">
                        @foreach($chunk as $ptc)
                            @php
                                $cardIdx++;
                                $seatLabel = $ptc->seat_number ?: ('NO. ' . str_pad($cardIdx, 2, '0', STR_PAD_LEFT));
                                $cardIdent = $ptc->student->identity_number ?? $ptc->student->username;
                                $cardQrUrl = $scheme . '://' . $studentHost . '/ujian/login?u=' . urlencode($cardIdent);
                                if (! empty($session->token)) {
                                    $cardQrUrl .= '&token=' . urlencode($session->token);
                                }
                            @endphp
                            <div class="card">
                                <div>
                                    <div class="header">
                                        <div class="header-brand">
                                            <img src="{{ $logoUrl }}" alt="Logo" class="card-logo">
                                            <div>
                                                <div class="title" style="font-size: 8.6pt; white-space: nowrap;">KARTU PESERTA UJIAN (CBT)</div>
                                                <div class="subtitle">{{ $instName }}</div>
                                            </div>
                                        </div>
                                        <div class="seat-badge">{{ $seatLabel }}</div>
                                    </div>

                                    <div class="content-body">
                                        <div class="photo-box">
                                            @if($ptc->student->photo_path)
                                                <img src="{{ '/storage/' . ltrim((string) $ptc->student->photo_path, '/') }}" alt="{{ $ptc->student->name }}">
                                            @else
                                                <span style="line-height: 1.25;">FOTO<br>3 x 4</span>
                                            @endif
                                        </div>
                                        <table class="meta-table">
                                            <tr>
                                                <td class="label">Nama</td>
                                                <td class="colon">:</td>
                                                <td class="val">{{ Str::limit($ptc->student->name, 26) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="label">NIM / NISN</td>
                                                <td class="colon">:</td>
                                                <td class="val" style="font-family: monospace;">{{ $cardIdent }}</td>
                                            </tr>
                                            <tr>
                                                <td class="label">Mata Ujian</td>
                                                <td class="colon">:</td>
                                                <td class="val">{{ Str::limit($session->exam->subject->name ?? $session->exam->title, 26) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="label">Sesi &amp; Ruang</td>
                                                <td class="colon">:</td>
                                                <td class="val">{{ Str::limit($cleanSessionName . ' (' . $cleanRoomName . ')', 26) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="label">Jadwal</td>
                                                <td class="colon">:</td>
                                                <td class="val">{{ $session->start_time?->format('d M Y H:i') ?? '-' }} WIB</td>
                                            </tr>
                                            <tr>
                                                <td class="label">Paket Soal</td>
                                                <td class="colon">:</td>
                                                <td class="val">{{ Str::limit($ptc->package->name ?? 'Paket Default', 24) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="footer">
                                    <div style="font-size: 7pt; color: #475569; line-height: 1.35;">
                                        <div>Login: <strong style="font-family: monospace; color: #2e33ff;">{{ $ptc->student->username }}</strong></div>
                                        <div>Wajib Membawa Kartu Saat Ujian</div>
                                    </div>
                                    <div class="qr-box" title="Scan QR Verifikasi Peserta">
                                        {!! \App\Services\QrCodeService::svg($cardQrUrl, 36) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @empty
            <div class="document-wrapper" style="display: flex; align-items: center; justify-content: center; text-align: center;">
                <p style="color: #64748b;">Belum ada peserta yang didaftarkan pada sesi ujian ini.</p>
            </div>
        @endforelse
    </div>
</body>
</html>
