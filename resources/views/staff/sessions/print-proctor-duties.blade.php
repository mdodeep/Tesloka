<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Tugas Pengawas - {{ $session->session_code }} - {{ $session->room->name ?? 'Ruang Ujian' }}</title>
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

        $docNumber = $docService->formatNumber('proctor_duties', [
            'exam_code' => $session->exam->code ?? 'EXAM',
            'session_code' => $session->session_code,
            'session_id' => $session->id,
            'seq' => $session->id,
            'date' => $session->start_time ?? now(),
        ], $institution);
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
            line-height: 1.45;
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
            padding: 12px 6px;
            display: flex;
            justify-content: center;
        }
        .document-container {
            width: 210mm;
            min-height: 297mm;
            margin: 15px auto 30px auto;
            box-sizing: border-box;
            background: #ffffff;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            position: relative;
            @if($docLetterheadUrl)
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
            margin: 3px 0 0 0;
            font-family: monospace, serif;
        }
        .meta-table, .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
            margin-bottom: 12px;
        }
        .meta-table td {
            padding: 3px 4px;
            vertical-align: top;
        }
        .data-table th, .data-table td {
            border: 1px solid #111827;
            padding: 6px 8px;
            vertical-align: middle;
        }
        .data-table th {
            background-color: #f1f5f9;
            font-weight: bold;
            text-align: center;
        }
        .rules-list {
            padding-left: 20px;
            margin: 6px 0 16px 0;
            font-size: 9.5pt;
        }
        .rules-list li {
            margin-bottom: 4px;
        }
        .signatures {
            display: flex;
            justify-content: flex-end;
            margin-top: 24px;
            page-break-inside: avoid;
        }
        .sign-box {
            width: 260px;
            text-align: center;
            font-size: 10pt;
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
            max-height: 55px;
            max-width: 165px;
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
                width: 210mm;
                flex-shrink: 0;
                margin: 0;
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
    <div class="no-print">
        <div>
            <strong>Surat Tugas Penugasan Pengawas Ruang</strong> &bull; Sesi: {{ $session->session_code }} &bull; {{ $session->room->name ?? '-' }}
        </div>
        <div class="no-print-actions" style="display: flex; gap: 8px;">
            <button onclick="window.print()" class="btn-print">Cetak Surat Tugas</button>
            <a href="{{ route('staff.sessions.show', $session) }}" class="btn-close">Kembali</a>
        </div>
    </div>

    <div class="doc-viewport-container">
    <div class="document-container">
        @if(! $docLetterheadUrl)
            <div class="kop-surat">
                <img src="{{ $logoUrl }}" alt="Logo" class="kop-logo">
                <div class="kop-text">
                    <div class="kop-inst">{{ $instName }}</div>
                    <div class="kop-sub">{{ $doc['kop_subtitle'] }}</div>
                    <div class="kop-addr">{{ $instAddress }}@if($instPhone) &bull; Telp: {{ $instPhone }}@endif @if($instEmail) &bull; Email: {{ $instEmail }}@endif</div>
                </div>
            </div>
        @endif

        <div class="doc-title">
            <h1>SURAT TUGAS PENGAWAS RUANG UJIAN</h1>
            <p>Nomor: {{ $docNumber }}</p>
        </div>

        <p style="text-align: justify; margin-bottom: 12px;">
            Menindaklanjuti agenda pelaksanaan evaluasi terstandar berbasis komputer pada {{ $branding['system_label'] }}, dengan ini {{ $doc['secondary_title'] ?: 'Ketua Panitia Ujian' }} menugaskan staf / pengajar berikut sebagai <strong>Pengawas Ruang Ujian</strong> dengan rincian jadwal dan ketentuan sebagai berikut:
        </p>

        <table class="meta-table">
            <tr>
                <td style="width: 140px; font-weight: bold;">Nama Ujian</td>
                <td style="width: 10px;">:</td>
                <td>{{ $session->exam->title }}</td>
                <td style="width: 120px; font-weight: bold;">Kode Sesi</td>
                <td style="width: 10px;">:</td>
                <td style="font-family: monospace; font-weight: bold;">{{ $session->session_code }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Mata Pelajaran</td>
                <td>:</td>
                <td>{{ $session->exam->subject->name ?? '-' }}</td>
                <td style="font-weight: bold;">Ruang Ujian</td>
                <td>:</td>
                <td style="font-weight: bold;">{{ $session->room->name ?? 'Ruang Lab 01' }} (Kapasitas: {{ $session->room->capacity ?? 30 }})</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Hari / Tanggal</td>
                <td>:</td>
                <td>{{ $session->start_time?->translatedFormat('l, d F Y') ?? '-' }}</td>
                <td style="font-weight: bold;">Waktu Pelaksanaan</td>
                <td>:</td>
                <td>{{ $session->start_time?->format('H:i') ?? '-' }} s/d {{ $session->end_time?->format('H:i') ?? '-' }} WIB</td>
            </tr>
        </table>

        <div style="font-weight: bold; margin-bottom: 6px;">DAFTAR PERSONEL PENGAWAS YANG DITUGASKAN:</div>
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 35px;">No.</th>
                    <th>Nama Lengkap Pengawas</th>
                    <th style="width: 150px;">NIP / ID Staf</th>
                    <th style="width: 140px;">Peran Penugasan</th>
                    <th style="width: 110px;">Paraf Tugas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($session->proctors as $idx => $p)
                    @php
                        $pUser = $docService->proctorUser($p);
                    @endphp
                    <tr>
                        <td style="text-align: center;">{{ $idx + 1 }}</td>
                        <td style="font-weight: 600;">{{ $pUser?->name ?? 'Staf Pengawas' }}</td>
                        <td style="text-align: center; font-family: monospace;">{{ $pUser?->identity_number ?: ($pUser?->email ?? '-') }}</td>
                        <td style="text-align: center; font-weight: 600; color: #2e33ff;">
                            {{ $p->role_title ?: 'Pengawas Ruang' }}
                        </td>
                        <td style="height: 35px;"></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 14px; color: #64748b; font-style: italic;">
                            Belum ada pengawas yang ditugaskan pada sesi ini. Silakan tugaskan pengawas melalui halaman detail sesi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="font-weight: bold; margin-bottom: 4px;">KEWAJIBAN DAN TATA TERTIB PENGAWAS RUANG:</div>
        <ol class="rules-list">
            <li>Hadir di ruang ujian selambat-lambatnya 30 menit sebelum sesi ujian dimulai.</li>
            <li>Memeriksa kebersihan ruang, konektivitas komputer klien, dan menempelkan nomor meja peserta.</li>
            <li>Memeriksa Kartu Peserta Ujian dan mencocokkan identitas fisik peserta dengan data sistem ujian.</li>
            <li>Membacakan tata tertib ujian dan merilis Token Ujian tepat pada waktu yang dijadwalkan.</li>
            <li>Memantau layar pengawasan proctoring secara aktif, merespons kendala teknis (reset sesi jika klien freeze), dan mencatat insiden.</li>
            <li>Mengisi dan menandatangani Berita Acara serta Daftar Hadir resmi setelah seluruh peserta mengumpulkan jawaban.</li>
        </ol>

        <div class="signatures">
            <div class="sign-box">
                @if($doc['city'] !== '')
                    <div>Ditetapkan di: {{ $doc['city'] }}</div>
                @endif
                <div>Pada tanggal: {{ ($session->start_time ?? now())->translatedFormat('d F Y') }}</div>
                <div style="font-weight: 600; margin-top: 4px;">{{ $doc['secondary_title'] ?: 'Ketua Panitia Ujian' }},</div>
                <div class="sign-space">
                    @if($stampUrl)
                        <img src="{{ $stampUrl }}" alt="Stempel Resmi" class="stamp-mark">
                    @endif
                    @if($doc['secondary_signature_url'])
                        <img src="{{ $doc['secondary_signature_url'] }}" alt="Tanda Tangan" class="sig-img">
                    @endif
                </div>
                <div class="sign-name">{{ $doc['secondary_name'] ?: '( ............................................ )' }}</div>
                <div>NIP. {{ $doc['secondary_nip'] ?: '....................................' }}</div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
