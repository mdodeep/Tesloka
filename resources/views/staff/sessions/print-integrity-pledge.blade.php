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

        $docLetterheadPath = \App\Models\SystemSetting::get('branding.doc_letterhead_image');
        $docLetterheadUrl = $docLetterheadPath ? '/storage/' . ltrim((string) $docLetterheadPath, '/') : null;

        $stampPath = \App\Models\SystemSetting::get('branding.cert_stamp');
        $stampUrl = $stampPath ? '/storage/' . ltrim((string) $stampPath, '/') : null;
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
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
        }
        .btn-print:hover {
            background: #1e24cc;
        }
        .btn-close {
            background: #ffffff;
            color: #475569;
            border: 1px solid #cbd5e1;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 13px;
        }
        .doc-viewport-container {
            box-sizing: border-box;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: 10px 0 30px;
            display: flex;
            justify-content: center;
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
        }
        .page-content {
            padding: 20mm 20mm 20mm 25mm;
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
            width: 70px;
            height: 70px;
            object-fit: contain;
        }
        .letterhead-text {
            flex: 1;
            text-align: center;
        }
        .letterhead-title {
            font-size: 15pt;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 0.5px;
        }
        .letterhead-sub {
            font-size: 10pt;
            margin: 2px 0 0;
            color: #334155;
        }
        .doc-title {
            text-align: center;
            margin: 15px 0 20px;
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
            color: #475569;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            margin: 12px 0 16px;
            font-size: 11pt;
        }
        .meta-table td {
            padding: 3px 0;
            vertical-align: top;
        }
        .meta-table td.label {
            width: 170px;
        }
        .meta-table td.separator {
            width: 20px;
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
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            page-break-inside: avoid;
        }
        .sig-box {
            width: 220px;
            text-align: center;
            font-size: 11pt;
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
                width: 100%;
                min-height: 297mm;
                page-break-after: always;
            }
            .doc-viewport-container {
            box-sizing: border-box;
                padding: 0;
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
            <strong>Pakta Integritas Pengawas Ruang CBT</strong> : Sesi: {{ $session->session_code }} ({{ $session->room->name ?? 'Ruang Ujian' }})
        </div>
        <div style="display: flex; gap: 8px;">
            <button onclick="window.print()" class="btn-print">
                <i data-lucide="printer" style="width: 16px; height: 16px;"></i>
                <span>Cetak Pakta Integritas</span>
            </button>
            <a href="{{ route('staff.sessions.show', $session) }}" class="btn-close">Kembali</a>
        </div>
    </div>

    <div class="doc-viewport-container">
        @forelse($session->proctors as $index => $proctor)
            <div class="page">
                <div class="page-content">
                    <div>
                        <!-- Kop Surat Institusi -->
                        <div class="letterhead">
                            <img src="{{ $logoUrl }}" alt="Logo" class="letterhead-logo">
                            <div class="letterhead-text">
                                <h1 class="letterhead-title">{{ $instName }}</h1>
                                <p class="letterhead-sub">{{ $instAddress }}</p>
                                <p class="letterhead-sub">Telp: {{ $instPhone }} • Pos-el: {{ $instEmail }}</p>
                            </div>
                        </div>

                        <!-- Judul Dokumen -->
                        <div class="doc-title">
                            <h2>PAKTA INTEGRITAS PENGAWAS RUANG UJIAN</h2>
                            <p>Nomor Dokumen: PI/CBT/{{ date('Y') }}/{{ str_pad($session->id, 4, '0', STR_PAD_LEFT) }}-{{ $index + 1 }}</p>
                        </div>

                        <p style="text-align: justify; margin-bottom: 8px;">
                            Yang bertanda tangan di bawah ini, saya selaku Pengawas Ruang Ujian Berbasis Komputer (Computer Based Test - CBT) pada:
                        </p>

                        <table class="meta-table">
                            <tr>
                                <td class="label">Nama Lengkap</td>
                                <td class="separator">:</td>
                                <td><strong>{{ $proctor->user->name ?? '-' }}</strong></td>
                            </tr>
                            <tr>
                                <td class="label">Nomor Induk / NIK</td>
                                <td class="separator">:</td>
                                <td>{{ $proctor->user->identity_number ?? $proctor->user->username ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="label">Peran Penugasan</td>
                                <td class="separator">:</td>
                                <td>{{ ucfirst($proctor->role ?? 'Pengawas Ruang') }}</td>
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
                                <td>{{ $session->start_time ? $session->start_time->isoFormat('dddd, D MMMM Y • HH:mm') : '-' }} s.d. {{ $session->end_time ? $session->end_time->format('HH:mm') : '-' }} WIB</td>
                            </tr>
                        </table>

                        <p style="text-align: justify; margin: 12px 0 6px;">
                            Dengan ini menyatakan dengan penuh kesadaran dan tanggung jawab, bahwa selama menjalankan tugas pengawasan ujian CBT ini, saya berjanji:
                        </p>

                        <ol class="pledge-list">
                            <li><strong>Menjaga Kerahasiaan Penuh:</strong> Menjaga kerahasiaan naskah soal, kunci jawaban, dan token rilis ujian dari pihak mana pun yang tidak berkepentingan.</li>
                            <li><strong>Kedisiplinan Waktu:</strong> Hadir di lokasi dan ruang ujian sekurang-kurangnya 30 (tiga puluh) menit sebelum sesi ujian dimulai untuk memeriksa kesiapan perangkat klien dan jaringan.</li>
                            <li><strong>Verifikasi Identitas:</strong> Memeriksa kartu peserta ujian, mencocokkan identitas fisik peserta dengan data sistem, serta memastikan tempat duduk peserta sesuai label meja yang ditentukan.</li>
                            <li><strong>Integritas dan Kejujuran:</strong> Tidak membantu, membisikkan, memberi petunjuk jawaban, atau memberi toleransi terhadap segala bentuk kecurangan peserta selama ujian berlangsung.</li>
                            <li><strong>Bebas Distraksi Gawai:</strong> Tidak mengoperasikan telepon genggam/ponsel pintar atau gawai pribadi untuk keperluan selain koordinasi operasional pengawasan darurat.</li>
                            <li><strong>Pencatatan Objektif:</strong> Mengisi Berita Acara Pelaksanaan, Daftar Hadir, dan Rekapitulasi Insiden Pengawasan secara faktual, jujur, dan akurat tanpa rekayasa.</li>
                            <li><strong>Kepatuhan Regulasi:</strong> Mematuhi seluruh petunjuk teknis pelaksanaan CBT yang ditetapkan oleh institusi. Apabila saya melanggar pernyataan ini, saya bersedia menerima sanksi disiplin dan hukum sesuai peraturan perundang-undangan yang berlaku.</li>
                        </ol>
                    </div>

                    <!-- Tanda Tangan -->
                    <div class="sig-section">
                        <div class="sig-box">
                            <p style="margin: 0 0 5px;">Mengetahui,<br>Kepala Institusi / Ketua Panitia</p>
                            <div class="sig-space">
                                @if($stampUrl)
                                    <img src="{{ $stampUrl }}" alt="Cap" style="height: 60px; opacity: 0.85;">
                                @endif
                            </div>
                            <p style="margin: 0; font-weight: bold; text-decoration: underline;">( .................................................. )</p>
                            <p style="margin: 2px 0 0; font-size: 9pt; color: #475569;">NIP/NUPTK: ....................................</p>
                        </div>

                        <div class="sig-box">
                            <p style="margin: 0 0 5px;">{{ $institution?->city ?? 'Ditetapkan' }}, {{ date('d F Y') }}<br>Yang Menyatakan (Pengawas),</p>
                            <div class="sig-space">
                                <span class="meterai-box">Meterai / TTD</span>
                            </div>
                            <p style="margin: 0; font-weight: bold; text-decoration: underline;">{{ $proctor->user->name ?? '( .................................................. )' }}</p>
                            <p style="margin: 2px 0 0; font-size: 9pt; color: #475569;">NIP: {{ $proctor->user->identity_number ?? '-' }}</p>
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

