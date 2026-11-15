<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Acara Pelaksanaan Ujian - {{ $session->session_code }}</title>
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

        // Cap Stempel Resmi Institusi
        $stampPath = \App\Models\SystemSetting::get('branding.cert_stamp');
        $stampUrl = $stampPath ? asset('storage/' . $stampPath) : null;
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
            line-height: 1.4;
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
            line-height: 1.2;
        }
        .kop-sub {
            font-size: 10.5pt;
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
            height: 60px;
        }
        .sign-name {
            font-weight: bold;
            text-decoration: underline;
        }
        .stamp-mark {
            position: absolute;
            bottom: 15px;
            left: 20%;
            width: 75px;
            height: 75px;
            object-fit: contain;
            opacity: 0.85;
            pointer-events: none;
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
            box-sizing: border-box;
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
            <strong>Berita Acara Ujian Resmi</strong> &mdash; Sesi: {{ $session->session_code }}
        </div>
        <button onclick="window.print()" class="btn-print">Cetak Berita Acara (A4)</button>
    </div>

    <div class="doc-viewport-container">
    <div class="document-container">
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
            <h1>BERITA ACARA PELAKSANAAN UJIAN</h1>
            <p>Nomor: BA/CBT/{{ $session->session_code }}/{{ now()->format('Ymd') }}</p>
        </div>

        <p style="text-align: justify; text-indent: 30px; margin-bottom: 10px;">
            Pada hari ini <strong>{{ now()->translatedFormat('l') }}</strong>, tanggal <strong>{{ now()->translatedFormat('d F Y') }}</strong>, telah diselenggarakan Ujian Berbasis Komputer (Computer Based Test) secara tertib dengan rincian pelaksanaan sebagai berikut:
        </p>

        <!-- IDENTITAS UJIAN & SESI -->
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
                <td class="label">Nama Sesi & Kode</td>
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

        <!-- REKAPITULASI KEHADIRAN -->
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
                    <td>Presensi & attempt terkonfirmasi</td>
                </tr>
                <tr>
                    <td>Jumlah Peserta Tidak Hadir</td>
                    <td style="text-align: center; font-weight: bold; color: #991b1b;">{{ $totalAbsent }}</td>
                    <td>Belum / tidak mengikuti ujian</td>
                </tr>
            </tbody>
        </table>

        <!-- CATATAN & INSIDEN PELAKSANAAN -->
        <div style="font-weight: bold; margin: 14px 0 6px 0;">II. CATATAN GANGGUAN / INSIDEN SELAMA UJIAN:</div>
        @if($session->incidents && $session->incidents->isNotEmpty())
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 15%;">Waktu</th>
                        <th style="width: 25%;">Peserta</th>
                        <th style="width: 20%;">Jenis Insiden</th>
                        <th style="width: 40%;">Tindakan & Penyelesaian</th>
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

        <!-- AKOMODASI KHUSUS & SCRIBE -->
        <div style="font-weight: bold; margin: 14px 0 6px 0;">III. AKOMODASI KHUSUS & PENDAMPING RESMI (SCRIBE):</div>
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
                            <td style="font-size: 10pt;">{{ $ap->accommodations['notes'] ?? '-' }}</td>
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

        <!-- KOLOM TANDA TANGAN -->
        <div class="signatures">
            <div class="sign-box">
                <div>Pengawas Ruang / Petugas Pengawas,</div>
                <div class="sign-space"></div>
                <div class="sign-name">
                    @if($session->proctors && $session->proctors->isNotEmpty())
                        {{ $session->proctors->first()->proctor->name }}
                    @else
                        ( .................................................... )
                    @endif
                </div>
                <div style="font-size: 10pt;">
                    NIP/ID: {{ $session->proctors && $session->proctors->isNotEmpty() ? ($session->proctors->first()->proctor->identity_number ?? '-') : '................................' }}
                </div>
            </div>

            <div class="sign-box">
                <div>Mengetahui,<br>Koordinator Pelaksana Ujian,</div>
                <div class="sign-space"></div>
                @if($stampUrl)
                    <img src="{{ $stampUrl }}" alt="Stempel Resmi" class="stamp-mark">
                @endif
                <div class="sign-name">( .................................................... )</div>
                <div style="font-size: 10pt;">NIP/ID: ................................</div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

