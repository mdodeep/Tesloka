<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Acara & Daftar Hadir - {{ $session->session_code }}</title>
    @php
        $institution = $session->exam->institution ?? \App\Models\Institution::first();
        $instName = $institution?->name ?? 'TESLOKA';
        $instAddress = $institution?->address ?? 'Jl. Swakarsa IV';
        $instPhone = $institution?->phone ?? '+62812 1249 9153';
        $instEmail = $institution?->email ?? 'info@tesloka.web.id';
        $logoUrl = $institution?->logo_url ?? asset('assets/images/logo-tesloka-cbt.webp');

        // Template Blangko Kertas Surat Resmi A4 Portret (1 Kertas Penuh)
        $docLetterheadPath = \App\Models\SystemSetting::get('branding.doc_letterhead_image');
        $docLetterheadUrl = $docLetterheadPath ? asset('storage/' . $docLetterheadPath) : null;
    @endphp
    <style>
        @page {
            size: A4 portrait;
            margin: 0;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #000;
            background: #f8fafc;
            margin: 0;
            padding: 0;
            font-size: 11pt;
            line-height: 1.35;
        }
        .kop-surat {
            border-bottom: 2.5px double #000;
            padding-bottom: 8px;
            margin-bottom: 15px;
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
            margin: 4px 0 0 0;
            font-size: 10pt;
            text-transform: uppercase;
            font-weight: normal;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            font-size: 10pt;
            margin-bottom: 14px;
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
            margin-top: 25px;
            font-size: 10.5pt;
        }
        .sig-box {
            width: 42%;
            text-align: center;
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
            background: #fff;
            box-sizing: border-box;
            margin: 15px auto 30px auto;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            position: relative;
            @if($docLetterheadUrl)
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
            .no-print button {
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
    <div class="no-print" style="background: #f1f5f9; padding: 12px 20px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; font-family: sans-serif; font-size: 10pt;">
        <div>
            <strong>Berita Acara Pelaksanaan &amp; Daftar Hadir Ujian</strong> (Sesi: {{ $session->session_code }})
        </div>
        <button onclick="window.print()" style="background: #2563eb; color: #fff; border: none; padding: 8px 16px; border-radius: 6px; font-weight: bold; cursor: pointer;">
            Cetak Dokumen Resmi
        </button>
    </div>

    <div class="doc-viewport-container">
        <div class="document-wrapper">
            <!-- KOP SURAT TEKS STANDAR (HANYA JIKA TIDAK ADA BLANGKO KERTAS SURAT FULL) -->
            @if(! $docLetterheadUrl)
                <div class="kop-surat">
                    <img src="{{ $logoUrl }}" alt="Logo Institusi" class="kop-logo">
                    <div class="kop-text">
                        <h2 class="kop-inst">{{ $instName }}</h2>
                        <div class="kop-sub">PANITIA PELAKSANA EVALUASI &amp; UJIAN BERBASIS KOMPUTER</div>
                        <p class="kop-addr">{{ $instAddress }} &bull; Telp: {{ $instPhone }} &bull; Email: {{ $instEmail }}</p>
                    </div>
                </div>
            @endif

            <!-- JUDUL DOKUMEN -->
            <div class="doc-title">
                <h2>BERITA ACARA &amp; DAFTAR HADIR PELAKSANAAN UJIAN</h2>
                <h3>COMPUTER BASED TEST (CBT) &bull; TAHUN AKADEMIK {{ now()->format('Y') }}</h3>
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
                <td>{{ $session->room->name }} ({{ $session->room->location ?? 'Gedung Utama' }})</td>
            </tr>
        </table>
        <table class="info-table">
            <tr>
                <td style="width: 35%;">Hari / Tanggal</td>
                <td style="width: 5%;">:</td>
                <td>{{ $session->start_time->translatedFormat('l, d F Y') }}</td>
            </tr>
            <tr>
                <td>Waktu Sesi</td>
                <td>:</td>
                <td>{{ $session->start_time->format('H:i') }} - {{ $session->end_time->format('H:i') }} WIB</td>
            </tr>
            <tr>
                <td>Token Rilis</td>
                <td>:</td>
                <td><strong>{{ $session->token }}</strong></td>
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
            @forelse($session->participants as $ptc)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td style="text-align: center; font-weight: bold;">{{ $ptc->seat_number ?? '-' }}</td>
                    <td style="font-family: monospace;">{{ $ptc->student->identity_number ?? $ptc->student->username }}</td>
                    <td>{{ $ptc->student->name }}</td>
                    <td style="text-align: center;">{{ $ptc->package->name ?? '-' }}</td>
                    <td style="text-align: center; font-size: 9pt;">
                        {{ $ptc->status === 'checked_in' ? 'HADIR' : ($ptc->status === 'absent' ? 'ABSEN' : 'TERDAFTAR') }}
                    </td>
                    <td style="height: 32px; vertical-align: bottom; padding-left: 8px; font-size: 8pt; color: #64748b;">
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
            <div>Pengawas Ruang / Proktor,</div>
            <div style="height: 60px;"></div>
            <div style="border-bottom: 1px solid #000; font-weight: bold;">
                {{ $session->proctors->first()->proctor->name ?? '( .............................................. )' }}
            </div>
            <div style="font-size: 10pt;">NIP: .......................................</div>
        </div>

        <div class="sig-box">
            <div>Penanggung Jawab / Ketua Panitia,</div>
            <div style="height: 60px;"></div>
            <div style="border-bottom: 1px solid #000; font-weight: bold;">
                ( .............................................. )
            </div>
            <div style="font-size: 10pt;">NIP: .......................................</div>
        </div>
    </div>
        </div>
    </div>
</body>
</html>

