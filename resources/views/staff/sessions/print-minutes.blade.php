<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Acara Pelaksanaan Ujian - {{ $session->session_code }}</title>
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

        $docNumber = $docService->formatNumber('minutes', [
            'exam_code' => $session->exam->code ?? 'EXAM',
            'session_code' => $session->session_code,
            'session_id' => $session->id,
            'seq' => $session->id,
            'date' => $session->start_time ?? now(),
        ], $institution);

        $resolvedProctors = $docService->resolveSessionProctors($session);
        $leadProctorUser = $docService->proctorUser($resolvedProctors['lead']);
        $leadProctorRole = $resolvedProctors['lead']?->role_title ?: 'Pengawas Ruang / Petugas Pengawas';
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
            color: #111827;
            background: {{ $isPdfMode ? '#ffffff' : '#f8fafc' }};
            margin: 0;
            padding: 0;
            font-size: 11pt;
            line-height: 1.4;
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
            color: white;
            border: none;
            padding: 8px 18px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
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
        .doc-viewport-container {
            box-sizing: border-box;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: {{ $isPdfMode ? '0' : '12px 6px' }};
            display: flex;
            justify-content: center;
        }
        .document-container {
            width: {{ $isPdfMode ? '100%' : '210mm' }};
            min-height: {{ $isPdfMode ? 'auto' : '297mm' }};
            margin: {{ $isPdfMode ? '0' : '15px auto 30px auto' }};
            box-sizing: border-box;
            background: #ffffff;
            box-shadow: {{ $isPdfMode ? 'none' : '0 4px 6px -1px rgb(0 0 0 / 0.1)' }};
            position: relative;
            @if($docLetterheadUrl && ! $isPdfMode)
                background-image: url('{{ $docLetterheadUrl }}');
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: top center;
                padding: 38mm 20mm 20mm 20mm;
            @else
                padding: 15mm 20mm 15mm 20mm;
            @endif
        }
        .kop-surat {
            border-bottom: 3px double #000;
            padding-bottom: 8px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .kop-logo {
            width: auto;
            height: auto;
            max-width: 180px;
            max-height: 70px;
            object-fit: contain;
            flex-shrink: 0;
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
            line-height: 1.2;
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
            margin-bottom: 16px;
        }
        .doc-title h1 {
            font-size: 13pt;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
            margin: 0;
        }
        .doc-title p {
            font-size: 10pt;
            margin: 4px 0 0 0;
            font-family: monospace, serif;
        }
        .meta-table, .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
            font-size: 10.5pt;
        }
        .meta-table td {
            padding: 3px 6px;
            vertical-align: top;
        }
        .meta-table td.label {
            width: 28%;
        }
        .meta-table td.colon {
            width: 2%;
            text-align: center;
        }
        .data-table th, .data-table td {
            border: 1px solid #333;
            padding: 5px 8px;
            text-align: left;
        }
        .data-table th {
            background-color: #f8fafc;
            text-align: center;
            font-weight: bold;
            font-size: 10pt;
        }
        .signatures {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            page-break-inside: avoid;
            position: relative;
        }
        .sign-box {
            width: 45%;
            text-align: center;
            font-size: 10.5pt;
            position: relative;
        }
        .sign-space {
            height: 62px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sign-name {
            font-weight: bold;
            text-decoration: underline;
        }
        .stamp-mark {
            position: absolute;
            left: 12px;
            top: -8px;
            width: 75px;
            height: 75px;
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
            .document-container {
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
            .document-container {
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
                    padding: 38mm 20mm 20mm 20mm !important;
                @else
                    padding: 15mm 20mm 15mm 20mm !important;
                @endif
            }
        }
    </style>
</head>
<body>
    @if(! $isPdfMode)
        <div class="no-print">
            <div>
                <strong>Berita Acara Ujian Resmi</strong> &bull; Sesi: {{ $session->session_code }}
            </div>
            <div class="no-print-actions" style="display: flex; gap: 8px;">
                <button onclick="window.print()" class="btn-print">Cetak Berita Acara (A4)</button>
                <a href="{{ route('staff.sessions.pdf.minutes', $session) }}" class="btn-print" style="background: #14213d;">Unduh PDF</a>
                <a href="{{ route('staff.sessions.show', $session) }}" class="btn-close">Kembali</a>
            </div>
        </div>
    @endif

    <div class="doc-viewport-container">
    <div class="document-container">
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
            <h1>BERITA ACARA PELAKSANAAN UJIAN</h1>
            <p>Nomor: {{ $docNumber }}</p>
        </div>

        <p style="text-align: justify; text-indent: 30px; margin-bottom: 10px;">
            Pada hari ini <strong>{{ ($session->start_time ?? now())->translatedFormat('l') }}</strong>, tanggal <strong>{{ ($session->start_time ?? now())->translatedFormat('d F Y') }}</strong>, telah diselenggarakan Ujian Berbasis Komputer (Computer Based Test) secara tertib dengan rincian pelaksanaan sebagai berikut:
        </p>

        <table class="meta-table">
            <tr>
                <td class="label">Nama Ujian</td>
                <td class="colon">:</td>
                <td><strong>{{ $session->exam->title }}</strong></td>
            </tr>
            <tr>
                <td class="label">Kode Ujian</td>
                <td class="colon">:</td>
                <td><code>{{ $session->exam->code }}</code></td>
            </tr>
            <tr>
                <td class="label">Mata Pelajaran / Bidang</td>
                <td class="colon">:</td>
                <td>{{ $session->exam->subject->name ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Nama Sesi &amp; Kode</td>
                <td class="colon">:</td>
                <td>{{ $session->name }} (<code>{{ $session->session_code }}</code>)</td>
            </tr>
            <tr>
                <td class="label">Ruang / Laboratorium</td>
                <td class="colon">:</td>
                <td>{{ $session->room->name ?? 'Ruang Ujian Utama' }} (Kapasitas: {{ $session->room->capacity ?? '-' }} Peserta)</td>
            </tr>
            <tr>
                <td class="label">Waktu Pelaksanaan</td>
                <td class="colon">:</td>
                <td>
                    Pukul {{ $session->start_time?->format('H:i') ?? '08:00' }} s.d. {{ $session->end_time?->format('H:i') ?? '10:00' }} WIB
                    (Durasi Ujian: {{ $session->exam->duration_minutes }} Menit)
                </td>
            </tr>
        </table>

        <div style="font-weight: bold; margin: 10px 0 6px 0;">I. REKAPITULASI KEHADIRAN PESERTA:</div>
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 35%;">Status Peserta</th>
                    <th style="width: 25%;">Jumlah (Orang)</th>
                    <th style="width: 40%;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jumlah Peserta Terdaftar</td>
                    <td style="text-align: center; font-weight: bold;">{{ $totalRegistered }}</td>
                    <td>Sesuai penugasan resmi sesi</td>
                </tr>
                <tr>
                    <td>Jumlah Peserta Hadir (Mengerjakan)</td>
                    <td style="text-align: center; font-weight: bold; color: #166534;">{{ $totalPresent }}</td>
                    <td>Presensi &amp; attempt terkonfirmasi</td>
                </tr>
                <tr>
                    <td>Jumlah Peserta Tidak Hadir</td>
                    <td style="text-align: center; font-weight: bold; color: #991b1b;">{{ $totalAbsent }}</td>
                    <td>Belum / tidak mengikuti ujian</td>
                </tr>
            </tbody>
        </table>

        <div style="font-weight: bold; margin: 14px 0 6px 0;">II. CATATAN GANGGUAN / INSIDEN SELAMA UJIAN:</div>
        @if($session->incidents && $session->incidents->isNotEmpty())
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 15%;">Waktu</th>
                        <th style="width: 25%;">Peserta</th>
                        <th style="width: 20%;">Jenis Insiden</th>
                        <th style="width: 40%;">Tindakan &amp; Penyelesaian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($session->incidents as $inc)
                        <tr>
                            <td style="text-align: center; font-size: 9.5pt;">{{ $inc->created_at?->format('H:i:s') }}</td>
                            <td>{{ $inc->student->name ?? 'Sistem' }} ({{ $inc->student->identity_number ?? '-' }})</td>
                            <td><span style="font-weight: 600;">{{ $inc->event_type }}</span> ({{ ucfirst($inc->severity) }})</td>
                            <td style="font-size: 10pt;">{{ $inc->action_taken ?? $inc->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div style="border: 1px solid #cbd5e1; padding: 10px 14px; font-size: 10.5pt; font-style: italic; background-color: #f8fafc; border-radius: 4px; margin-bottom: 10px;">
                Pelaksanaan ujian pada sesi ini berlangsung dengan tertib, lancar, dan berintegritas tinggi. Tidak tercatat adanya gangguan teknis sistem server, listrik, jaringan lokal, maupun pelanggaran tata tertib peserta yang mengganggu integritas evaluasi.
            </div>
        @endif

        @php
            $accommodatedParticipants = $session->participants->filter(fn ($p) => ($p->time_extension_percent ?? 0) > 0 || ($p->needs_scribe ?? false));
        @endphp

        <div style="font-weight: bold; margin: 14px 0 6px 0;">III. AKOMODASI KHUSUS &amp; PENDAMPING RESMI (SCRIBE):</div>
        @if($accommodatedParticipants->isNotEmpty())
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 30%;">Nama Peserta (NISN)</th>
                        <th style="width: 20%;">Tambahan Waktu</th>
                        <th style="width: 25%;">Pendamping Resmi (Scribe)</th>
                        <th style="width: 25%;">Catatan Kebutuhan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accommodatedParticipants as $ap)
                        <tr>
                            <td><strong>{{ $ap->student->name }}</strong> ({{ $ap->student->identity_number ?? '-' }})</td>
                            <td style="text-align: center;">{{ $ap->time_extension_percent > 0 ? "+{$ap->time_extension_percent}%" : 'Standar' }}</td>
                            <td>{{ $ap->needs_scribe ? ($ap->scribe_name ?? 'Ada Scribe') : 'Mandiri' }}</td>
                            <td style="font-size: 10pt;">{{ $ap->accommodation_notes ?? ($ap->accommodations['notes'] ?? '-') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div style="border: 1px solid #cbd5e1; padding: 8px 12px; font-size: 10pt; font-style: italic; background-color: #f8fafc; border-radius: 4px; margin-bottom: 10px;">
                Tidak ada peserta dengan penugasan pendamping khusus (scribe) atau perpanjangan waktu pada sesi ini.
            </div>
        @endif

        <p style="text-align: justify; text-indent: 30px; margin-top: 14px;">
            Demikian Berita Acara Pelaksanaan Ujian ini dibuat dengan sebenar-benarnya sesuai dengan kondisi fisik dan digital di lokasi ujian, untuk dapat dipergunakan sebagaimana mestinya.
        </p>

        <div class="signatures">
            <div class="sign-box">
                <div>{{ $leadProctorRole }},</div>
                <div class="sign-space"></div>
                <div class="sign-name">
                    {{ $leadProctorUser?->name ?? '( .................................................... )' }}
                </div>
                <div style="font-size: 10pt;">
                    NIP/ID: {{ $leadProctorUser?->identity_number ?: '................................' }}
                </div>
            </div>

            <div class="sign-box">
                <div>{{ $doc['city'] !== '' ? $doc['city'] . ', ' . ($session->start_time?->translatedFormat('d F Y') ?? now()->translatedFormat('d F Y')) : 'Mengetahui,' }}</div>
                <div>{{ $doc['secondary_title'] ?: 'Koordinator Pelaksana Ujian' }},</div>
                <div class="sign-space">
                    @if($stampUrl)
                        <img src="{{ $stampUrl }}" alt="Stempel Resmi" class="stamp-mark">
                    @endif
                    @if($doc['secondary_signature_url'])
                        <img src="{{ $doc['secondary_signature_url'] }}" alt="Tanda Tangan" class="sig-img">
                    @endif
                </div>
                <div class="sign-name">{{ $doc['secondary_name'] ?: '( .................................................... )' }}</div>
                <div style="font-size: 10pt;">NIP/ID: {{ $doc['secondary_nip'] ?: '................................' }}</div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
