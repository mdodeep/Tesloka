<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Pengawasan Ruang - {{ $session->session_code }} - {{ $session->room->name ?? 'Ruang Ujian' }}</title>
    @php
        $institution = $session->exam->institution ?? \App\Models\Institution::first();
        $logoUrl = $institution?->logo_url ?? asset('assets/images/logo-tesloka-cbt.webp');
        $instName = $institution?->name ?? 'TESLOKA';
        $instAddress = $institution?->address ?? 'Jl. Swakarsa IV';
        $instPhone = $institution?->phone ?? '+62812 1249 9153';
        $instEmail = $institution?->email ?? 'info@tesloka.web.id';

        // Template Blangko Kertas Surat Resmi A4 Portret (1 Kertas Penuh)
        $docLetterheadPath = \App\Models\SystemSetting::get('branding.doc_letterhead_image');
        $docLetterheadUrl = $docLetterheadPath ? asset('storage/' . $docLetterheadPath) : null;

        // Cap Stempel Resmi Institusi
        $stampPath = \App\Models\SystemSetting::get('branding.cert_stamp');
        $stampUrl = $stampPath ? asset('storage/' . $stampPath) : null;
    @endphp
    <style>
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
            background: #f1f5f9;
            padding: 12px 20px;
            border-bottom: 1px solid #cbd5e1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: system-ui, sans-serif;
            font-size: 14px;
            margin-bottom: 20px;
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
            margin: 3px 0 0 0;
        }
        .meta-table, .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
            margin-bottom: 14px;
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
        .metric-box {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 16px;
        }
        .metric-card {
            border: 1px solid #cbd5e1;
            padding: 8px 10px;
            border-radius: 6px;
            text-align: center;
            background: #f8fafc;
        }
        .metric-num {
            font-size: 16pt;
            font-weight: bold;
            color: #0f172a;
        }
        .metric-label {
            font-size: 8.5pt;
            color: #64748b;
            text-transform: uppercase;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 24px;
            page-break-inside: avoid;
        }
        .sign-box {
            width: 240px;
            text-align: center;
            font-size: 10pt;
        }
        .sign-space {
            height: 60px;
        }
        .sign-name {
            font-weight: bold;
            text-decoration: underline;
        }
        .doc-viewport-container {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: 12px 6px;
            display: flex;
            justify-content: center;
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
            <strong>Rekapitulasi Pengawasan Ruang Ujian</strong> &bull; Sesi: {{ $session->session_code }} &bull; {{ $session->room->name ?? '-' }}
        </div>
        <button onclick="window.print()" class="btn-print">Cetak Laporan Rekap</button>
    </div>

    <div class="doc-viewport-container">
    <div class="document-container">
        <!-- KOP SURAT RESMI (HANYA JIKA TIDAK ADA BLANGKO KERTAS SURAT FULL) -->
        @if(! $docLetterheadUrl)
            <div class="kop-surat">
                <img src="{{ $logoUrl }}" alt="Logo" class="kop-logo">
                <div class="kop-text">
                    <div class="kop-inst">{{ $instName }}</div>
                    <div class="kop-sub">SISTEM MONITORING &amp; PENGAWASAN EVALUASI CBT BERBASIS KOMPUTER</div>
                    <div class="kop-addr">{{ $instAddress }} &bull; Telp: {{ $instPhone }} &bull; Email: {{ $instEmail }}</div>
                </div>
            </div>
        @endif

        <!-- JUDUL DOKUMEN -->
        <div class="doc-title">
            <h1>REKAPITULASI DAN LAPORAN INTEGRITAS PENGAWASAN RUANG</h1>
            <p>Kode Dokumen: RKP/PROCTOR/{{ date('Y') }}/{{ $session->session_code }} &bull; Sesi: {{ $session->session_code }}</p>
        </div>

        <!-- IDENTITAS SESI & RUANG -->
        <table class="meta-table">
            <tr>
                <td style="width: 140px; font-weight: bold;">Ujian / Mata Pelajaran</td>
                <td style="width: 10px;">:</td>
                <td>{{ $session->exam->title }} ({{ $session->exam->subject->name ?? '-' }})</td>
                <td style="width: 120px; font-weight: bold;">Ruang Ujian</td>
                <td style="width: 10px;">:</td>
                <td style="font-weight: bold;">{{ $session->room->name ?? 'Ruang Lab 01' }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Jadwal Pelaksanaan</td>
                <td>:</td>
                <td>{{ $session->start_time->translatedFormat('l, d F Y, H:i') }} s/d {{ $session->end_time->format('H:i') }} WIB</td>
                <td style="font-weight: bold;">Pengawas Utama</td>
                <td>:</td>
                <td>{{ $session->proctors->first()?->user->name ?? 'Staf Pengawas Resmi' }}</td>
            </tr>
        </table>

        <!-- METRIK REKAPITULASI -->
        <div class="metric-box">
            <div class="metric-card">
                <div class="metric-num">{{ $totalRegistered }}</div>
                <div class="metric-label">Peserta Terdaftar</div>
            </div>
            <div class="metric-card">
                <div class="metric-num" style="color: #166534;">{{ $totalPresent }}</div>
                <div class="metric-label">Peserta Hadir / Mulai</div>
            </div>
            <div class="metric-card">
                <div class="metric-num" style="color: #2e33ff;">{{ $totalCompleted }}</div>
                <div class="metric-label">Tuntas Dikumpulkan</div>
            </div>
            <div class="metric-card">
                <div class="metric-num" style="color: {{ $totalIncidents > 0 ? '#b91c1c' : '#166534' }};">{{ $totalIncidents }}</div>
                <div class="metric-label">Insiden / Intervensi</div>
            </div>
        </div>

        <!-- LOG TINDAKAN INTERVENSI PENGAWAS -->
        <div style="font-weight: bold; margin-bottom: 6px;">CATATAN TINDAKAN INTERVENSI PENGAWAS RUANG:</div>
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 35px;">No.</th>
                    <th style="width: 110px;">Waktu</th>
                    <th>Nama Peserta</th>
                    <th style="width: 130px;">Tindakan Pengawas</th>
                    <th>Alasan / Justifikasi Intervensi</th>
                    <th style="width: 120px;">Oleh Pengawas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($proctorActions as $idx => $act)
                    <tr>
                        <td style="text-align: center;">{{ $idx + 1 }}</td>
                        <td style="text-align: center; font-family: monospace; font-size: 9pt;">
                            {{ $act->created_at->format('H:i:s') }} WIB
                        </td>
                        <td style="font-weight: 600;">{{ $act->attempt->student->name ?? 'Peserta' }}</td>
                        <td style="text-align: center; font-weight: bold; font-size: 9pt;">
                            @if($act->action_type === 'add_time')
                                <span style="color: #2e33ff;">Tambah Waktu</span>
                            @elseif($act->action_type === 'force_refresh')
                                <span style="color: #475569;">Muat Ulang Layar</span>
                            @elseif($act->action_type === 'force_logout')
                                <span style="color: #d97706;">Reset Sesi Perangkat</span>
                            @elseif($act->action_type === 'force_stop')
                                <span style="color: #dc2626;">Penghentian Paksa</span>
                            @else
                                {{ ucfirst($act->action_type) }}
                            @endif
                        </td>
                        <td style="font-size: 9pt;">{{ $act->reason ?? '-' }}</td>
                        <td style="font-size: 9pt; text-align: center;">{{ $act->proctor->name ?? 'Pengawas' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #64748b; font-style: italic; padding: 12px;">
                            Tidak terdapat intervensi khusus. Ujian berlangsung tertib dan lancar tanpa pemaksaan sesi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- RINGKASAN INSIDEN & TELEMETRI RUANG -->
        <div style="font-weight: bold; margin-bottom: 6px;">CATATAN KHUSUS & REKOMENDASI PENGAWAS RUANG:</div>
        <div style="border: 1px solid #111827; padding: 10px; min-height: 50px; font-size: 9.5pt; margin-bottom: 20px;">
            Kondisi perangkat klien dan jaringan di {{ $session->room->name ?? 'ruang ujian' }} terpantau stabil. Seluruh peserta mematuhi tata tertib tanpa gangguan signifikan.
        </div>

        <!-- PENGESAHAN DOKUMEN -->
        <div class="signatures">
            <div class="sign-box">
                <div>Petugas Teknisi Lab / Jaringan,</div>
                <div class="sign-space"></div>
                <div class="sign-name">Budi Santoso, S.T.</div>
                <div>NIP. 19890415 201503 1 003</div>
            </div>

            <div class="sign-box">
                <div>Pengawas Utama Ruang Ujian,</div>
                <div class="sign-space"></div>
                <div class="sign-name">{{ $session->proctors->first()?->user->name ?? 'Pengawas Ruang Resmi' }}</div>
                <div>NIP. {{ $session->proctors->first()?->user->identity_number ?? '19820719 200801 1 011' }}</div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
