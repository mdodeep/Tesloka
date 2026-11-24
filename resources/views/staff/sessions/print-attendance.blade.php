<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Acara &amp; Daftar Hadir - {{ $session->session_code }}</title>
    @php
        $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
        $institution = $session->exam->institution ?? \App\Models\Institution::first();
        $instName = $institution?->name ?: $branding['institution_name'];
        $instAddress = $institution?->address ?? '';
        $instPhone = $institution?->phone ?? '';
        $instEmail = $institution?->email ?? '';
        $logoUrl = $institution?->logo_url ?: $branding['logo_url'];
        $isPdfMode = (bool) ($isPdf ?? false);

        $docService = app(\App\Services\DocumentConfigService::class);
        $doc = $docService->getSettings($institution);
        $docLetterheadUrl = $doc['letterhead_url'];
        $stampUrl = $doc['stamp_url'];

        $docNumber = $docService->formatNumber('attendance', [
            'exam_code' => $session->exam->code ?? 'EXAM',
            'session_code' => $session->session_code,
            'session_id' => $session->id,
            'seq' => $session->id,
            'date' => $session->start_time ?? now(),
        ], $institution);

        $resolvedProctors = $docService->resolveSessionProctors($session);
        $leadProctorUser = $docService->proctorUser($resolvedProctors['lead']);
        $leadProctorRole = $resolvedProctors['lead']?->role_title ?: 'Pengawas Ruang / Proktor';
        $attendanceParticipants = $participants ?? $session->participants;
    @endphp
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        @page {
            size: A4 portrait;
            margin: 0;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #000;
            background: {{ $isPdfMode ? '#ffffff' : '#f8fafc' }};
            margin: 0;
            padding: 0;
            font-size: 10.5pt;
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
            font-family: system-ui, sans-serif;
            font-size: 13px;
            position: sticky;
            top: 0;
            z-index: 40;
        }
        .btn-print {
            background: #2e33ff;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            font-size: 12.5px;
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
        .kop-surat {
            border-bottom: 2.5px double #000;
            padding-bottom: 8px;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .kop-logo {
            width: 65px;
            height: 65px;
            object-fit: contain;
        }
        .kop-text {
            flex: 1;
            text-align: center;
        }
        .kop-inst {
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
        }
        .kop-sub {
            font-size: 10pt;
            font-weight: bold;
            margin: 2px 0;
            text-transform: uppercase;
        }
        .kop-addr {
            font-size: 8.5pt;
            margin: 0;
            font-style: italic;
        }
        .doc-title {
            text-align: center;
            margin-bottom: 14px;
        }
        .doc-title h2 {
            margin: 0;
            font-size: 13pt;
            text-transform: uppercase;
            font-weight: bold;
            text-decoration: underline;
        }
        .doc-title h3 {
            margin: 4px 0 2px 0;
            font-size: 10pt;
            text-transform: uppercase;
            font-weight: normal;
        }
        .doc-number {
            margin: 2px 0 0 0;
            font-size: 9.5pt;
            font-family: monospace, serif;
            color: #1e293b;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            font-size: 10pt;
            margin-bottom: 14px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 2px 4px;
            vertical-align: top;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9.5pt;
            margin-bottom: 20px;
        }
        .data-table th, .data-table td {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: middle;
        }
        .data-table th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            page-break-inside: avoid;
            margin-top: 24px;
            font-size: 10pt;
        }
        .sig-box {
            width: 44%;
            text-align: center;
            position: relative;
        }
        .sig-space {
            height: 60px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .stamp-mark {
            position: absolute;
            left: 10px;
            top: -8px;
            width: 72px;
            height: 72px;
            object-fit: contain;
            opacity: 0.85;
            pointer-events: none;
        }
        .sig-img {
            max-height: 54px;
            max-width: 160px;
            object-fit: contain;
            position: relative;
            z-index: 1;
        }
        .doc-viewport-container {
            box-sizing: border-box;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: {{ $isPdfMode ? '0' : '12px 6px' }};
            display: flex;
            justify-content: center;
        }
        .document-wrapper {
            width: {{ $isPdfMode ? '100%' : '210mm' }};
            min-height: {{ $isPdfMode ? 'auto' : '297mm' }};
            background: #fff;
            box-sizing: border-box;
            margin: {{ $isPdfMode ? '0' : '15px auto 30px auto' }};
            box-shadow: {{ $isPdfMode ? 'none' : '0 4px 6px -1px rgb(0 0 0 / 0.1)' }};
            position: relative;
            @if($docLetterheadUrl && ! $isPdfMode)
                background-image: url('{{ $docLetterheadUrl }}');
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: top center;
                padding: 38mm 18mm 18mm 18mm;
            @else
                padding: 15mm 18mm 18mm 18mm;
            @endif
        }
        @media screen and (max-width: 820px) {
            .no-print {
                padding: 10px 14px !important;
                flex-direction: column !important;
                align-items: stretch !important;
                gap: 8px !important;
            }
            .no-print-actions {
                display: flex !important;
                gap: 8px !important;
            }
            .no-print-actions button, .no-print-actions a {
                flex: 1 !important;
                text-align: center !important;
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
                width: 210mm !important;
                min-height: 297mm !important;
                margin: 0 !important;
                border: none !important;
                box-shadow: none !important;
                page-break-after: avoid !important;
                @if($docLetterheadUrl)
                    background-image: url('{{ $docLetterheadUrl }}') !important;
                    background-size: 210mm 297mm !important;
                    background-repeat: no-repeat !important;
                    background-position: top center !important;
                    padding: 38mm 18mm 18mm 18mm !important;
                @else
                    padding: 15mm 18mm 18mm 18mm !important;
                @endif
            }
        }
    </style>
</head>
<body>
    @if(! $isPdfMode)
        <div class="no-print">
            <div>
                <strong>Berita Acara Pelaksanaan &amp; Daftar Hadir Ujian</strong> &bull; Sesi: {{ $session->session_code }}
            </div>
            <div class="no-print-actions" style="display: flex; gap: 8px;">
                <button onclick="window.print()" class="btn-print">Cetak Daftar Hadir (A4)</button>
                <a href="{{ route('staff.sessions.pdf.attendance', $session) }}" class="btn-print" style="background: #14213d; text-decoration: none;">Unduh PDF</a>
                <a href="{{ route('staff.sessions.show', $session) }}" class="btn-close">Kembali</a>
            </div>
        </div>
    @endif

    <div class="doc-viewport-container">
        <div class="document-wrapper">
            @if(! $docLetterheadUrl)
                <div class="kop-surat">
                    <img src="{{ $logoUrl }}" alt="Logo Institusi" class="kop-logo">
                    <div class="kop-text">
                        <h2 class="kop-inst">{{ $instName }}</h2>
                        <div class="kop-sub">{{ $doc['kop_subtitle'] }}</div>
                        <p class="kop-addr">{{ $instAddress }}@if($instPhone) &bull; Telp: {{ $instPhone }}@endif @if($instEmail) &bull; Email: {{ $instEmail }}@endif</p>
                    </div>
                </div>
            @endif

            <div class="doc-title">
                <h2>BERITA ACARA &amp; DAFTAR HADIR PELAKSANAAN UJIAN</h2>
                <h3>TAHUN AKADEMIK {{ $session->exam->academicYear->name ?? now()->format('Y') }}</h3>
                <p class="doc-number">Nomor: {{ $docNumber }}</p>
            </div>

            <div class="info-grid">
                <table class="info-table">
                    <tr>
                        <td style="width: 35%;">Mata Pelajaran</td>
                        <td style="width: 5%;">:</td>
                        <td><strong>{{ $session->exam->subject->name ?? '-' }}</strong></td>
                    </tr>
                    <tr>
                        <td>Judul Ujian</td>
                        <td>:</td>
                        <td>{{ $session->exam->title }}</td>
                    </tr>
                    <tr>
                        <td>Ruang Ujian</td>
                        <td>:</td>
                        <td>{{ $session->room->name ?? 'Daring / Online' }} ({{ $session->room->location ?? 'Lokasi Utama' }})</td>
                    </tr>
                </table>
                <table class="info-table">
                    <tr>
                        <td style="width: 35%;">Hari / Tanggal</td>
                        <td style="width: 5%;">:</td>
                        <td>{{ $session->start_time?->translatedFormat('l, d F Y') ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Waktu Sesi</td>
                        <td>:</td>
                        <td>{{ $session->start_time?->format('H:i') ?? '08:00' }} - {{ $session->end_time?->format('H:i') ?? '10:00' }} WIB</td>
                    </tr>
                    <tr>
                        <td>Token Rilis</td>
                        <td>:</td>
                        <td><strong>{{ $session->token ?? '-' }}</strong></td>
                    </tr>
                </table>
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 12%;">No. Kursi</th>
                        <th style="width: 18%;">NISN / NIM</th>
                        <th>Nama Peserta</th>
                        <th style="width: 12%;">Paket</th>
                        <th style="width: 12%;">Status</th>
                        <th style="width: 18%;">Tanda Tangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendanceParticipants as $ptc)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center; font-weight: bold;">{{ $ptc->seat_number ?? '-' }}</td>
                            <td style="font-family: monospace;">{{ $ptc->student->identity_number ?? $ptc->student->username }}</td>
                            <td>{{ $ptc->student->name }}</td>
                            <td style="text-align: center;">{{ $ptc->package->name ?? '-' }}</td>
                            <td style="text-align: center; font-size: 9pt;">
                                {{ in_array($ptc->status, ['checked_in', 'present', 'in_progress', 'completed'], true) ? 'HADIR' : ($ptc->status === 'absent' ? 'ABSEN' : 'TERDAFTAR') }}
                            </td>
                            <td style="height: 30px; vertical-align: bottom; padding-left: 8px; font-size: 8pt; color: #64748b;">
                                {{ $loop->iteration }}. ....................
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 20px;">Belum ada peserta yang dialokasikan pada sesi ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="signatures">
                <div class="sig-box">
                    <div>{{ $leadProctorRole }},</div>
                    <div class="sig-space"></div>
                    <div style="border-bottom: 1px solid #000; font-weight: bold;">
                        {{ $leadProctorUser?->name ?? '( .............................................. )' }}
                    </div>
                    <div style="font-size: 9.5pt;">NIP/ID: {{ $leadProctorUser?->identity_number ?: '.......................................' }}</div>
                </div>

                <div class="sig-box">
                    <div>{{ $doc['city'] !== '' ? $doc['city'] . ', ' . ($session->start_time?->translatedFormat('d F Y') ?? now()->translatedFormat('d F Y')) : '' }}</div>
                    <div>{{ $doc['secondary_title'] ?: 'Penanggung Jawab / Ketua Panitia' }},</div>
                    <div class="sig-space">
                        @if($stampUrl)
                            <img src="{{ $stampUrl }}" alt="Stempel Resmi" class="stamp-mark">
                        @endif
                        @if($doc['secondary_signature_url'])
                            <img src="{{ $doc['secondary_signature_url'] }}" alt="Tanda Tangan" class="sig-img">
                        @endif
                    </div>
                    <div style="border-bottom: 1px solid #000; font-weight: bold;">
                        {{ $doc['secondary_name'] ?: '( .............................................. )' }}
                    </div>
                    <div style="font-size: 9.5pt;">NIP/ID: {{ $doc['secondary_nip'] ?: '.......................................' }}</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
