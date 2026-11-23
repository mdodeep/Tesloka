<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Resmi Hasil Ujian - {{ $exam->code }}</title>
    @php
        $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
        $institution = $exam->institution ?? \App\Models\Institution::first();
        $instName = $institution?->name ?: $branding['institution_name'];
        $instAddress = $institution?->address ?? '';
        $instPhone = $institution?->phone ?? '';
        $instEmail = $institution?->email ?? '';
        $logoUrl = $institution?->logo_url ?: $branding['logo_url'];
        $certStampPath = \App\Models\SystemSetting::get('branding.cert_stamp');
        $certStampUrl = $certStampPath ? '/storage/' . ltrim((string) $certStampPath, '/') : null;

        // Template Blangko Kertas Surat Resmi A4 Portret (1 Kertas Penuh)
        $docLetterheadPath = \App\Models\SystemSetting::get('branding.doc_letterhead_image');
        $docLetterheadUrl = $docLetterheadPath ? '/storage/' . ltrim((string) $docLetterheadPath, '/') : null;
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
            background: #f8fafc;
            margin: 0;
            padding: 0;
            font-size: 11pt;
            line-height: 1.3;
        }
        .header {
            border-bottom: 2.5px double #000;
            padding-bottom: 8px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .header .kop-logo {
            width: 65px;
            height: 65px;
            object-fit: contain;
        }
        .header .header-text {
            flex: 1;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 15pt;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .header h2 {
            margin: 3px 0 0 0;
            font-size: 11pt;
            text-transform: uppercase;
            font-weight: bold;
        }
        .header p {
            margin: 3px 0 0 0;
            font-size: 9pt;
            font-style: italic;
        }
        .doc-title {
            text-align: center;
            margin: 15px 0 10px 0;
            text-decoration: underline;
            text-transform: uppercase;
            font-size: 12pt;
            font-weight: bold;
        }
        .info-grid {
            width: 100%;
            margin-bottom: 12px;
            font-size: 10pt;
        }
        .info-grid td {
            padding: 2px 4px;
            vertical-align: top;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9.5pt;
            margin-bottom: 15px;
        }
        .data-table th, .data-table td {
            border: 1px solid #000;
            padding: 4px 6px;
            vertical-align: middle;
        }
        .data-table th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }
        .stat-grid {
            width: 100%;
            border-collapse: collapse;
            font-size: 9.5pt;
            margin-bottom: 15px;
        }
        .stat-grid th, .stat-grid td {
            border: 1px solid #000;
            padding: 3px 6px;
            text-align: center;
        }
        .stat-grid th {
            background-color: #e5e7eb;
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
            width: 45%;
            text-align: center;
        }
        .badge-tuntas {
            font-weight: bold;
            color: #15803d;
        }
        .badge-remedial {
            font-weight: bold;
            color: #b91c1c;
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
            box-sizing: border-box;
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
<body style="background: #f8fafc;">
    <div class="no-print" style="background: #f1f5f9; padding: 12px 20px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; font-family: sans-serif; font-size: 10pt;">
        <div>
            <strong>Laporan Resmi &amp; Rekapitulasi Hasil Ujian CBT</strong> (Kode: {{ $exam->code }})
        </div>
        <button onclick="window.print()" style="background: #2e33ff; color: #fff; border: none; padding: 8px 18px; border-radius: 6px; font-weight: bold; cursor: pointer;">
            Cetak Dokumen Resmi (A4)
        </button>
    </div>

    <div class="doc-viewport-container">
        <div class="document-wrapper">
            <!-- Kop Surat Lembaga (Hanya Jika Tidak Ada Blangko Kertas Surat Full) -->
            @if(! $docLetterheadUrl)
                <div class="header">
                    <img src="{{ $logoUrl }}" alt="Logo Institusi" class="kop-logo">
                    <div class="header-text">
                        <h1>{{ $instName }}</h1>
                        <h2>PANITIA PENILAIAN COMPUTER BASED TEST (CBT)</h2>
                        <p>{{ $instAddress }} &bull; Telp: {{ $instPhone }} &bull; Surel: {{ $instEmail }}</p>
                    </div>
                </div>
            @endif

    <div class="doc-title">
        LAPORAN RESMI & REKAPITULASI HASIL PENILAIAN UJIAN
    </div>

    <!-- Metadata Ujian -->
    <table class="info-grid">
        <tr>
            <td style="width: 18%; font-weight: bold;">Mata Pelajaran</td>
            <td style="width: 2%;">:</td>
            <td style="width: 35%;">{{ $exam->subject->name ?? '-' }}</td>
            <td style="width: 18%; font-weight: bold;">Tahun Ajaran / Smt</td>
            <td style="width: 2%;">:</td>
            <td style="width: 25%;">{{ $exam->academicYear->name ?? '-' }} ({{ ucfirst($exam->academicYear->semester ?? 'Ganjil') }})</td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Kode / Judul Ujian</td>
            <td>:</td>
            <td>{{ $exam->code }} - {{ $exam->title }}</td>
            <td style="font-weight: bold;">KKM / Passing Grade</td>
            <td>:</td>
            <td><strong>{{ $exam->passing_grade ?? 75 }}</strong></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Penyusun / Guru</td>
            <td>:</td>
            <td>{{ $exam->creator->name ?? 'Administrator' }}</td>
            <td style="font-weight: bold;">Waktu Pengesahan</td>
            <td>:</td>
            <td>{{ now()->translatedFormat('d F Y H:i') }} WIB</td>
        </tr>
    </table>

    <!-- Ringkasan Statistik Deskriptif -->
    <h4 style="margin: 10px 0 5px 0; font-size: 10.5pt; text-transform: uppercase;">A. Ringkasan Statistik Nilai</h4>
    <table class="stat-grid">
        <tr>
            <th>Jumlah Peserta</th>
            <th>Rata-rata (Mean)</th>
            <th>Median</th>
            <th>Modus</th>
            <th>Std. Deviasi</th>
            <th>Nilai Tertinggi</th>
            <th>Nilai Terendah</th>
            <th>Rentang (Range)</th>
        </tr>
        <tr>
            <td><strong>{{ $statistics['count'] ?? 0 }} Siswa</strong></td>
            <td>{{ number_format($statistics['mean'] ?? 0, 2) }}</td>
            <td>{{ number_format($statistics['median'] ?? 0, 2) }}</td>
            <td>{{ number_format($statistics['mode'] ?? 0, 2) }}</td>
            <td>{{ number_format($statistics['std_dev'] ?? 0, 2) }}</td>
            <td>{{ number_format($statistics['max'] ?? 0, 2) }}</td>
            <td>{{ number_format($statistics['min'] ?? 0, 2) }}</td>
            <td>{{ number_format($statistics['range'] ?? 0, 2) }}</td>
        </tr>
    </table>

    <!-- Tabel Rekapitulasi Nilai Siswa -->
    <h4 style="margin: 10px 0 5px 0; font-size: 10.5pt; text-transform: uppercase;">B. Daftar Rekapitulasi Hasil Penilaian Siswa</h4>
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 15%;">NISN / ID</th>
                <th>Nama Lengkap Peserta</th>
                <th style="width: 10%;">Skor Perolehan</th>
                <th style="width: 10%;">Skor Maks</th>
                <th style="width: 10%;">Nilai (%)</th>
                <th style="width: 8%;">Predikat</th>
                <th style="width: 12%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($results as $index => $res)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td style="text-align: center;">{{ $res->student->nisn ?? $res->student->username }}</td>
                    <td>{{ $res->student->name }}</td>
                    <td style="text-align: right;">{{ number_format($res->total_score, 2) }}</td>
                    <td style="text-align: right;">{{ number_format($res->max_score, 2) }}</td>
                    <td style="text-align: right; font-weight: bold;">{{ number_format($res->percentage, 2) }}%</td>
                    <td style="text-align: center; font-weight: bold;">{{ $res->final_grade_letter ?? '-' }}</td>
                    <td style="text-align: center;">
                        @if($res->is_passed)
                            <span class="badge-tuntas">TUNTAS</span>
                        @else
                            <span class="badge-remedial">REMEDIAL</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center; padding: 15px; font-style: italic;">
                        Belum ada data nilai peserta yang tercatat untuk ujian ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tanda Tangan Pengesahan -->
    <div class="signatures">
        <div class="sig-box">
            <p>Mengetahui,<br>Ketua Panitia Ujian CBT</p>
            <div style="height: 60px;"></div>
            <p style="text-decoration: underline; font-weight: bold; margin-bottom: 2px;">
                ( {{ $exam->creator->name ?? '............................................' }} )
            </p>
            <p style="margin-top: 0; font-size: 9pt;">NIP: ............................................</p>
        </div>
        <div class="sig-box" style="position: relative;">
            <p>{{ $institution->city ?? 'Jakarta' }}, {{ now()->translatedFormat('d F Y') }}<br>Kepala Lembaga / Madrasah</p>
            <div style="height: 60px; position: relative;">
                @if($certStampUrl)
                    <img src="{{ $certStampUrl }}" alt="Stempel Lembaga" style="position: absolute; left: 10px; top: -10px; width: 85px; height: 85px; object-fit: contain; opacity: 0.85; pointer-events: none;">
                @endif
            </div>
            <p style="text-decoration: underline; font-weight: bold; margin-bottom: 2px;">
                ( {{ $institution->leader_name ?? '............................................' }} )
            </p>
            <p style="margin-top: 0; font-size: 9pt;">NIP: ............................................</p>
        </div>
    </div>
        </div>
    </div>
</body>
</html>

