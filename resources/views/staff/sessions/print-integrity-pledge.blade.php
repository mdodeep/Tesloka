<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pakta Integritas Pengawas - {{ $session->session_code }} - {{ $session->room->name ?? 'Ruang Ujian' }}</title>
    @php
        $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
        $institution = $session->exam->institution ?? \App\Models\Institution::first();
        $logoUrl = $institution?->logo_url ?: $branding['logo_url'];
        $instName = $institution?->name ?: $branding['institution_name'];
        $instAddress = $institution?->address ?? '';
        $instPhone = $institution?->phone ?? '';
        $instEmail = $institution?->email ?? '';

        $docService = app(\App\Services\DocumentConfigService::class);
        $doc = $docService->getSettings($institution);
        $docLetterheadUrl = $doc['letterhead_url'];
        $stampUrl = $doc['stamp_url'];
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
            background: #f8fafc;
            margin: 0;
            padding: 0;
            font-size: 11pt;
            line-height: 1.5;
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
            display: inline-flex;
            align-items: center;
            gap: 6px;
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
            padding: 14px 8px 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        .page {
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: white;
            box-sizing: border-box;
            position: relative;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            page-break-after: always;
            flex-shrink: 0;
            @if($docLetterheadUrl)
                background-image: url('{{ $docLetterheadUrl }}');
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: top center;
            @endif
        }
        .page-content {
            @if($docLetterheadUrl)
                padding: 38mm 20mm 20mm 22mm;
            @else
                padding: 16mm 20mm 18mm 22mm;
            @endif
            box-sizing: border-box;
            min-height: 297mm;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .letterhead {
            border-bottom: 3px double #000;
            padding-bottom: 10px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .letterhead-logo {
            width: auto;
            height: auto;
            max-width: 185px;
            max-height: 72px;
            object-fit: contain;
            flex-shrink: 0;
        }
        .letterhead-text {
            flex: 1;
            text-align: center;
        }
        .letterhead-title {
            font-size: 14.5pt;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 0.5px;
        }
        .letterhead-sub-org {
            font-size: 10pt;
            font-weight: bold;
            margin: 2px 0;
            text-transform: uppercase;
        }
        .letterhead-sub {
            font-size: 8.5pt;
            margin: 1px 0 0;
            color: #334155;
            font-style: italic;
        }
        .doc-title {
            text-align: center;
            margin: 12px 0 18px;
        }
        .doc-title h2 {
            font-size: 13pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 0 0 4px 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .doc-title p {
            font-size: 10pt;
            margin: 0;
            font-family: monospace, serif;
            color: #334155;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            margin: 12px 0 16px;
            font-size: 10.5pt;
        }
        .meta-table td {
            padding: 3px 0;
            vertical-align: top;
        }
        .meta-table td.label {
            width: 175px;
        }
        .meta-table td.separator {
            width: 18px;
            text-align: center;
        }
        .pledge-list {
            margin: 10px 0;
            padding-left: 20px;
            font-size: 10.5pt;
            text-align: justify;
        }
        .pledge-list li {
            margin-bottom: 8px;
            line-height: 1.45;
        }
        .sig-section {
            margin-top: 24px;
            display: flex;
            justify-content: space-between;
            page-break-inside: avoid;
        }
        .sig-box {
            width: 240px;
            text-align: center;
            font-size: 10.5pt;
            position: relative;
        }
        .sig-space {
            height: 65px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .meterai-box {
            border: 1px dashed #94a3b8;
            padding: 4px 10px;
            font-size: 8pt;
            color: #64748b;
            border-radius: 3px;
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
                justify-content: center;
                text-align: center;
            }
            .doc-viewport-container {
                align-items: flex-start;
                padding: 8px 4px;
            }
        }
        @media print {
            body {
                background: white;
            }
            .no-print {
                display: none !important;
            }
            .page {
                box-shadow: none;
                margin: 0;
                width: 210mm !important;
                min-height: 297mm !important;
                page-break-after: always;
                @if($docLetterheadUrl)
                    background-image: url('{{ $docLetterheadUrl }}') !important;
                    background-size: 210mm 297mm !important;
                @endif
            }
            .doc-viewport-container {
                padding: 0 !important;
                display: block !important;
                overflow: visible !important;
            }
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
    @vite(['resources/js/app.js'])
</head>
<body>

    <div class="no-print">
        <div>
            <strong>Pakta Integritas Pengawas Ruang Ujian</strong> &bull; Sesi: {{ $session->session_code }} ({{ $session->room->name ?? 'Ruang Ujian' }})
        </div>
        <div class="no-print-actions" style="display: flex; gap: 8px;">
            <button onclick="window.print()" class="btn-print">
                <i data-lucide="printer" style="width: 15px; height: 15px;"></i>
                <span>Cetak Pakta Integritas</span>
            </button>
            <a href="{{ route('staff.sessions.show', $session) }}" class="btn-close">Kembali</a>
        </div>
    </div>

    <div class="doc-viewport-container">
        @forelse($session->proctors as $index => $proctor)
            @php
                $proctorUser = $docService->proctorUser($proctor);
                $proctorRoleLabel = $proctor->role_title ?: 'Pengawas Ruang';
                $docNumber = $docService->formatNumber('integrity_pledge', [
                    'exam_code' => $session->exam->code ?? 'EXAM',
                    'session_code' => $session->session_code,
                    'session_id' => $session->id,
                    'seq' => $session->id,
                    'index' => $index + 1,
                    'date' => $session->start_time ?? now(),
                ], $institution);
            @endphp
            <div class="page">
                <div class="page-content">
                    <div>
                        @if(! $docLetterheadUrl)
                            <div class="letterhead">
                                <img src="{{ $logoUrl }}" alt="Logo" class="letterhead-logo">
                                <div class="letterhead-text">
                                    <h1 class="letterhead-title">{{ $instName }}</h1>
                                    <div class="letterhead-sub-org">{{ $doc['kop_subtitle'] }}</div>
                                    <p class="letterhead-sub">{{ $instAddress }}@if($instPhone) &bull; Telp: {{ $instPhone }}@endif @if($instEmail) &bull; Email: {{ $instEmail }}@endif</p>
                                </div>
                            </div>
                        @endif

                        <div class="doc-title">
                            <h2>PAKTA INTEGRITAS PENGAWAS RUANG UJIAN</h2>
                            <p>Nomor Dokumen: {{ $docNumber }}</p>
                        </div>

                        <p style="text-align: justify; margin-bottom: 8px;">
                            Yang bertanda tangan di bawah ini, saya selaku <strong>{{ $proctorRoleLabel }}</strong> Pelaksanaan Ujian pada:
                        </p>

                        <table class="meta-table">
                            <tr>
                                <td class="label">Nama Lengkap</td>
                                <td class="separator">:</td>
                                <td><strong>{{ $proctorUser?->name ?? '-' }}</strong></td>
                            </tr>
                            <tr>
                                <td class="label">Nomor Induk / NIK</td>
                                <td class="separator">:</td>
                                <td>{{ $proctorUser?->identity_number ?? $proctorUser?->username ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="label">Peran Penugasan</td>
                                <td class="separator">:</td>
                                <td><strong>{{ $proctorRoleLabel }}</strong></td>
                            </tr>
                            <tr>
                                <td class="label">Mata Pelajaran / Ujian</td>
                                <td class="separator">:</td>
                                <td>{{ $session->exam->title }} ({{ $session->exam->subject->name ?? '-' }})</td>
                            </tr>
                            <tr>
                                <td class="label">Ruang / Laboratorium</td>
                                <td class="separator">:</td>
                                <td>{{ $session->room->name ?? '-' }} (Kode Sesi: {{ $session->session_code }})</td>
                            </tr>
                            <tr>
                                <td class="label">Waktu Pelaksanaan</td>
                                <td class="separator">:</td>
                                <td>{{ $session->start_time ? $session->start_time->translatedFormat('l, d F Y, H:i') : '-' }} s.d. {{ $session->end_time ? $session->end_time->format('H:i') : '-' }} WIB</td>
                            </tr>
                        </table>

                        <p style="text-align: justify; margin: 12px 0 6px;">
                            Dengan ini menyatakan dengan penuh kesadaran dan tanggung jawab, bahwa selama menjalankan tugas pengawasan ujian ini, saya berjanji:
                        </p>

                        <ol class="pledge-list">
                            <li><strong>Menjaga Kerahasiaan Penuh:</strong> Menjaga kerahasiaan naskah soal, kunci jawaban, dan token rilis ujian dari pihak mana pun yang tidak berkepentingan.</li>
                            <li><strong>Kedisiplinan Waktu:</strong> Hadir di lokasi dan ruang ujian sekurang-kurangnya 30 (tiga puluh) menit sebelum sesi ujian dimulai untuk memeriksa kesiapan perangkat klien dan jaringan.</li>
                            <li><strong>Verifikasi Identitas:</strong> Memeriksa kartu peserta ujian, mencocokkan identitas fisik peserta dengan data sistem, serta memastikan tempat duduk peserta sesuai label meja yang ditentukan.</li>
                            <li><strong>Integritas dan Kejujuran:</strong> Tidak membantu, membisikkan, memberi petunjuk jawaban, atau memberi toleransi terhadap segala bentuk kecurangan peserta selama ujian berlangsung.</li>
                            <li><strong>Bebas Distraksi Gawai:</strong> Tidak mengoperasikan telepon genggam/ponsel pintar atau gawai pribadi untuk keperluan selain koordinasi operasional pengawasan darurat.</li>
                            <li><strong>Pencatatan Objektif:</strong> Mengisi Berita Acara Pelaksanaan, Daftar Hadir, dan Rekapitulasi Insiden Pengawasan secara faktual, jujur, dan akurat tanpa rekayasa.</li>
                            <li><strong>Kepatuhan Regulasi:</strong> Mematuhi seluruh petunjuk teknis pelaksanaan ujian yang ditetapkan oleh institusi. Apabila saya melanggar pernyataan ini, saya bersedia menerima sanksi disiplin dan hukum sesuai peraturan perundang-undangan yang berlaku.</li>
                        </ol>
                    </div>

                    <div class="sig-section">
                        <div class="sig-box">
                            <p style="margin: 0 0 5px;">Mengetahui,<br>{{ $doc['primary_title'] ?: 'Kepala Institusi / Ketua Panitia' }}</p>
                            <div class="sig-space">
                                @if($stampUrl)
                                    <img src="{{ $stampUrl }}" alt="Cap" style="position: absolute; left: 8px; top: -8px; height: 68px; opacity: 0.85; pointer-events: none;">
                                @endif
                                @if($doc['primary_signature_url'])
                                    <img src="{{ $doc['primary_signature_url'] }}" alt="TTD Pejabat" style="max-height: 55px; max-width: 155px; object-fit: contain; position: relative; z-index: 1;">
                                @endif
                            </div>
                            <p style="margin: 0; font-weight: bold; text-decoration: underline;">{{ $doc['primary_name'] ?: '( .................................................. )' }}</p>
                            <p style="margin: 2px 0 0; font-size: 9pt; color: #475569;">NIP/NUPTK: {{ $doc['primary_nip'] ?: '....................................' }}</p>
                        </div>

                        <div class="sig-box">
                            <p style="margin: 0 0 5px;">{{ $doc['city'] !== '' ? $doc['city'] : 'Ditetapkan' }}, {{ ($session->start_time ?? now())->translatedFormat('d F Y') }}<br>Yang Menyatakan ({{ $proctorRoleLabel }}),</p>
                            <div class="sig-space">
                                <span class="meterai-box">Meterai / TTD</span>
                            </div>
                            <p style="margin: 0; font-weight: bold; text-decoration: underline;">{{ $proctorUser?->name ?? '( .................................................. )' }}</p>
                            <p style="margin: 2px 0 0; font-size: 9pt; color: #475569;">NIP/ID: {{ $proctorUser?->identity_number ?: '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="page">
                <div class="page-content" style="justify-content: center; align-items: center; text-align: center;">
                    <h3 style="color: #64748b;">Belum ada pengawas yang ditugaskan pada sesi ini.</h3>
                    <p style="color: #94a3b8; font-size: 10pt;">Silakan tambahkan pengawas ruang terlebih dahulu di halaman Kelola Sesi.</p>
                </div>
            </div>
        @endforelse
    </div>

</body>
</html>
