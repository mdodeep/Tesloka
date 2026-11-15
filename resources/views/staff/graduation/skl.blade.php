<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Lulus (SKL) — {{ $attempt->student->name }} — {{ $attempt->exam->code }}</title>
    @php
        $institution = $institution ?? ($attempt->exam->institution ?? \App\Models\Institution::first());
        $instName = $institution?->name ?? 'TESLOKA';
        $instAddress = $institution?->address ?? 'Jl. Swakarsa IV';
        $instPhone = $institution?->phone ?? '+62812 1249 9153';
        $instEmail = $institution?->email ?? 'info@tesloka.web.id';
        $logoUrl = $institution?->logo_url ?? asset('assets/images/logo-tesloka-cbt.webp');
        $faviconUrl = $institution?->favicon_url ?? asset('assets/images/favicon-tesloka-bg-putih.webp');

        // Template Blangko Kertas Surat Resmi A4 Portret (1 Kertas Penuh)
        $docLetterheadPath = \App\Models\SystemSetting::get('branding.doc_letterhead_image');
        $docLetterheadUrl = $docLetterheadPath ? asset('storage/' . $docLetterheadPath) : null;

        // Pejabat Utama (Kanan)
        $signerName = \App\Models\SystemSetting::get('branding.cert_signer_name', 'Dr. H. Muhammad Zainuddin, M.Pd.');
        $signerTitle = \App\Models\SystemSetting::get('branding.cert_signer_title', 'Direktur / Kepala Akademik');
        $signerNip = \App\Models\SystemSetting::get('branding.cert_signer_nip', '19690815 199403 1 001');
        $signerSigPath = \App\Models\SystemSetting::get('branding.cert_signer_signature');
        $signerSigUrl = $signerSigPath ? asset('storage/' . $signerSigPath) : null;

        // Pejabat Kedua (Kiri)
        $signer2Name = \App\Models\SystemSetting::get('branding.cert_signer_secondary_name', 'Drs. H. M. Syatibi, M.Ag.');
        $signer2Title = \App\Models\SystemSetting::get('branding.cert_signer_secondary_title', 'Ketua Tim Penguji CBT');
        $signer2Nip = \App\Models\SystemSetting::get('branding.cert_signer_secondary_nip', '19780512 200312 1 002');
        $signer2SigPath = \App\Models\SystemSetting::get('branding.cert_signer_secondary_signature');
        $signer2SigUrl = $signer2SigPath ? asset('storage/' . $signer2SigPath) : null;

        // Cap Stempel Resmi Institusi
        $stampPath = \App\Models\SystemSetting::get('branding.cert_stamp');
        $stampUrl = $stampPath ? asset('storage/' . $stampPath) : null;

        // Mode Tanda Tangan Ganda
        $dualSignatures = (bool) \App\Models\SystemSetting::get('branding.cert_dual_signatures', true);

        // Perhitungan Nilai & Kelulusan
        $totalScore = (float) ($finalResult->total_score ?? $attempt->total_score ?? 0);
        $maxScore = (float) (($finalResult->max_score ?? 0) > 0 ? $finalResult->max_score : 100.0);
        if ($maxScore < $totalScore) {
            $maxScore = 100.0;
        }
        $percentage = $maxScore > 0 ? round(($totalScore / $maxScore) * 100, 1) : 0;
        $passingGrade = (float) ($finalResult->passing_grade ?? $attempt->exam->passing_grade ?? 75.0);
        $letterGrade = $letterGrade ?? ($finalResult->final_grade_letter ?? $attempt->getLetterGrade() ?? 'A');
        $gradePredicate = $gradePredicate ?? ($attempt->getGradePredicate() ?? 'Sangat Memuaskan');
        $isPassed = $isPassed ?? ($finalResult->is_passed ?? $attempt->isPassed() ?? true);

        $receipt = $attempt->submission_receipt ?? 'RCP-' . str_pad($attempt->id, 6, '0', STR_PAD_LEFT);
        $verificationQrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=110x110&data=" . urlencode(route('document.verify', $receipt));
        $verificationHash = substr(hash('sha256', $attempt->id . $receipt . ($attempt->submitted_at?->timestamp ?? '')), 0, 24);
    @endphp
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        @page {
            size: A4 portrait;
            margin: 0;
        }
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #111827;
            background: #f1f5f9;
            margin: 0;
            padding: 0;
            font-size: 10.5pt;
            line-height: 1.45;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        .no-print {
            background: #ffffff;
            padding: 12px 24px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: system-ui, -apple-system, sans-serif;
            font-size: 13.5px;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .btn-print {
            background: #2e33ff;
            color: #ffffff;
            border: none;
            padding: 8px 20px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background 0.15s ease;
        }
        .btn-print:hover {
            background: #1e24cc;
        }
        .btn-back {
            background: #ffffff;
            color: #334155;
            border: 1px solid #cbd5e1;
            padding: 7px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.15s ease;
        }
        .btn-back:hover {
            background: #f1f5f9;
            color: #0f172a;
        }
        /* Lembar Dokumen A4 Portret (210mm x 297mm) */
        .document-wrapper {
            width: 210mm;
            min-height: 297mm;
            margin: 25px auto 40px auto;
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            @if($docLetterheadUrl)
                background-image: url('{{ $docLetterheadUrl }}');
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: top center;
                padding: 40mm 20mm 20mm 20mm;
            @else
                padding: 16mm 20mm 18mm 20mm;
            @endif
        }
        .doc-body {
            flex: 1;
        }
        /* Kop Surat Bawaan (Hanya jika blangko gambar tidak diunggah) */
        .kop-surat {
            display: flex;
            align-items: center;
            border-bottom: 3px double #1e293b;
            padding-bottom: 10px;
            margin-bottom: 16px;
            gap: 16px;
        }
        .kop-logo {
            width: 72px;
            height: 72px;
            object-fit: contain;
            flex-shrink: 0;
        }
        .kop-text {
            flex: 1;
            text-align: center;
        }
        .kop-inst {
            font-size: 15pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
            color: #0f172a;
            line-height: 1.25;
        }
        .kop-sub {
            font-size: 10pt;
            font-weight: bold;
            margin: 2px 0;
            color: #1e293b;
            letter-spacing: 0.3px;
        }
        .kop-addr {
            font-size: 8.5pt;
            color: #475569;
            margin: 0;
            line-height: 1.35;
        }
        /* Judul Dokumen */
        .doc-title {
            text-align: center;
            margin: 12px 0 14px 0;
        }
        .doc-title h1 {
            font-size: 13pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #0f172a;
        }
        .doc-title p {
            margin: 2px 0 0 0;
            font-size: 9pt;
            font-family: monospace, serif;
            color: #334155;
        }
        /* Tabel Meta Identitas */
        .identity-table {
            width: 100%;
            margin: 10px 0 12px 0;
            border-collapse: collapse;
            font-size: 10pt;
        }
        .identity-table td {
            padding: 2.5px 3px;
            vertical-align: top;
        }
        .identity-table td.label {
            width: 215px;
            color: #1e293b;
        }
        .identity-table td.separator {
            width: 14px;
            text-align: center;
            font-weight: bold;
        }
        .identity-table td.value {
            font-weight: 600;
            color: #0f172a;
        }
        /* Box Pernyataan Status */
        .statement-box {
            text-align: center;
            margin: 12px 0;
            padding: 8px 14px;
            border: 2px solid {{ $isPassed ? '#059669' : '#dc2626' }};
            background: {{ $isPassed ? '#f0fdf4' : '#fef2f2' }};
            font-size: 12pt;
            font-weight: bold;
            color: {{ $isPassed ? '#065f46' : '#991b1b' }};
            letter-spacing: 0.8px;
        }
        /* Tabel Nilai */
        .score-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0 14px 0;
            font-size: 10pt;
        }
        .score-table th, .score-table td {
            border: 1px solid #475569;
            padding: 5px 8px;
            text-align: center;
        }
        .score-table th {
            background-color: #f1f5f9;
            font-weight: bold;
            color: #0f172a;
            font-size: 9.5pt;
        }
        /* Bagian Tanda Tangan */
        .signatures-grid {
            margin-top: 18px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            page-break-inside: avoid;
        }
        .sign-col {
            width: 240px;
            text-align: center;
            font-size: 10pt;
            line-height: 1.35;
        }
        .stamp-overlay-wrap {
            position: relative;
            height: 68px;
            margin: 3px 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .official-stamp-img {
            position: absolute;
            left: 10px;
            top: -12px;
            width: 90px;
            height: 90px;
            object-fit: contain;
            opacity: 0.86;
            pointer-events: none;
            z-index: 2;
        }
        .official-signature-img {
            max-height: 62px;
            max-width: 170px;
            object-fit: contain;
            position: relative;
            z-index: 1;
            display: block;
            margin: 0 auto;
        }
        .sign-name {
            font-weight: bold;
            text-decoration: underline;
            color: #0f172a;
        }
        .sign-nip {
            font-size: 9pt;
            color: #334155;
            margin-top: 1px;
        }
        /* Kotak Verifikasi Integritas Dokumen */
        .doc-verification-footer {
            margin-top: 14px;
            padding: 8px 12px;
            border: 1px dashed #94a3b8;
            background-color: #f8fafc;
            font-family: monospace, serif;
            font-size: 8pt;
            color: #334155;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            page-break-inside: avoid;
        }
        .qr-code-thumb {
            width: 52px;
            height: 52px;
            object-fit: contain;
            border: 1px solid #cbd5e1;
            padding: 2px;
            background: #fff;
            flex-shrink: 0;
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
        @media screen and (max-width: 820px) {
            .no-print {
                padding: 10px 14px;
                flex-direction: column;
                align-items: stretch;
                gap: 8px;
            }
            .no-print > div {
                justify-content: space-between;
                font-size: 12px;
            }
            .btn-print {
                width: 100%;
                justify-content: center;
            }
            .doc-viewport-container {
            box-sizing: border-box;
                justify-content: flex-start;
                padding: 8px 4px;
            }
            .document-wrapper {
                margin: 0 auto;
                flex-shrink: 0;
            }
        }
        @media print {
            .no-print {
                display: none !important;
            }
            .doc-viewport-container {
            box-sizing: border-box;
                padding: 0 !important;
                display: block !important;
                overflow: visible !important;
            }
            body {
                background: #ffffff !important;
                padding: 0 !important;
                margin: 0 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .document-wrapper {
                width: 210mm !important;
                height: 297mm !important;
                min-height: 297mm !important;
                max-height: 297mm !important;
                margin: 0 !important;
                border: none !important;
                box-shadow: none !important;
                page-break-after: avoid !important;
                page-break-inside: avoid !important;
                @if($docLetterheadUrl)
                    background-image: url('{{ $docLetterheadUrl }}') !important;
                    background-size: 210mm 297mm !important;
                    background-repeat: no-repeat !important;
                    background-position: top center !important;
                    padding: 40mm 20mm 20mm 20mm !important;
                @else
                    padding: 15mm 20mm 15mm 20mm !important;
                @endif
            }
        }
    </style>
    @vite(['resources/js/app.js'])
</head>
<body>

    <!-- Bilah Aksi Non-Cetak -->
    <div class="no-print">
        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="{{ route('staff.graduation.index') }}" class="btn-back">&larr; Kembali ke Daftar Kelulusan</a>
            <span style="color: #64748b;">|</span>
            <strong>Surat Keterangan Lulus (SKL) Resmi</strong>
        </div>
        <button onclick="window.print()" class="btn-print">
            <i data-lucide="printer" style="width: 16px; height: 16px;"></i>
            <span>Cetak SKL (A4 Portret)</span>
        </button>
    </div>

    <div class="doc-viewport-container">
        <div class="document-wrapper">
        <div class="doc-body">
            <!-- KOP SURAT TEKS STANDAR (HANYA MUNCUL JIKA TIDAK ADA BLANGKO KERTAS FULL YANG DIUNGGAH) -->
            @if(! $docLetterheadUrl)
                <div class="kop-surat">
                    <img src="{{ $logoUrl }}" alt="Logo Institusi" class="kop-logo">
                    <div class="kop-text">
                        <h2 class="kop-inst">{{ $instName }}</h2>
                        <div class="kop-sub">PANITIA PENYELENGGARA EVALUASI AKADEMIK &amp; CBT</div>
                        <p class="kop-addr">{{ $instAddress }} &bull; Telp: {{ $instPhone }} &bull; Email: {{ $instEmail }}</p>
                    </div>
                </div>
            @endif

            <!-- JUDUL DOKUMEN -->
            <div class="doc-title">
                <h1>SURAT KETERANGAN KELULUSAN UJIAN</h1>
                <p>Nomor: SKL/CBT/{{ date('Y') }}/{{ str_pad($finalResult->id, 5, '0', STR_PAD_LEFT) }}</p>
            </div>

            <p style="text-align: justify; text-indent: 28px; margin-bottom: 10px;">
                Pimpinan Panitia Penyelenggara Ujian Berbasis Komputer (Computer-Based Test) {{ $instName }} menerangkan dengan sesungguhnya bahwa peserta didik di bawah ini:
            </p>

            <!-- IDENTITAS PESERTA -->
            <table class="identity-table">
                <tr>
                    <td class="label">Nama Lengkap Peserta</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $attempt->student->name }}</td>
                </tr>
                <tr>
                    <td class="label">Nomor Induk / NIM / NISN</td>
                    <td class="separator">:</td>
                    <td class="value"><code>{{ $attempt->student->identity_number ?? $attempt->student->username }}</code></td>
                </tr>
                <tr>
                    <td class="label">Mata Pelajaran / Mata Kuliah</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $attempt->exam->subject->name ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Judul Evaluasi / Nama Ujian</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $attempt->exam->title }} (Kode: {{ $attempt->exam->code }})</td>
                </tr>
                <tr>
                    <td class="label">Tanggal Pelaksanaan Ujian</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $attempt->started_at ? $attempt->started_at->translatedFormat('d F Y') : now()->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Nomor Resi / Bukti Penyerahan Sah</td>
                    <td class="separator">:</td>
                    <td class="value" style="color: #2e33ff; font-family: monospace;">{{ $receipt }}</td>
                </tr>
            </table>

            <p style="text-align: justify; margin: 10px 0 8px 0;">
                Berdasarkan hasil evaluasi akademik terstandar dan kriteria ketuntasan minimal (KKM) yang telah ditetapkan secara resmi, peserta tersebut di atas dinyatakan:
            </p>

            <!-- STATUS PERNYATAAN KELULUSAN -->
            <div class="statement-box">
                @if($isPassed)
                    LULUS / MEMENUHI KRITERIA KETUNTASAN
                @else
                    BELUM TUNTAS / WAJIB REMEDIAL
                @endif
            </div>

            <!-- TABEL CAPAIAN SKOR & EVALUASI -->
            <table class="score-table">
                <thead>
                    <tr>
                        <th style="width: 22%;">Nilai Perolehan (Skor)</th>
                        <th style="width: 20%;">Skor Maksimal</th>
                        <th style="width: 18%;">Capaian (%)</th>
                        <th style="width: 20%;">Standar KKM</th>
                        <th style="width: 20%;">Predikat Mutu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: bold; font-size: 11.5pt; color: #2e33ff;">
                            {{ number_format($totalScore, 1) }}
                        </td>
                        <td>{{ number_format($maxScore, 1) }}</td>
                        <td style="font-weight: bold;">{{ number_format($percentage, 1) }}%</td>
                        <td style="font-weight: bold;">{{ number_format($passingGrade, 1) }}</td>
                        <td style="font-weight: bold;">
                            {{ $letterGrade }} ({{ $gradePredicate }})
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- PARAGRAF PENUTUP -->
            <p style="text-align: justify; margin: 10px 0 14px 0;">
                Demikian Surat Keterangan Lulus ini diterbitkan secara sah berdasarkan catatan data primer di server basis data TESLOKA CBT untuk dapat dipergunakan sebagaimana mestinya.
            </p>

            <!-- BAGIAN TANDA TANGAN PEJABAT & CAP STEMPEL -->
            <div class="signatures-grid">
                <!-- Kolom Kiri: Pejabat Kedua (atau QR jika single) -->
                @if($dualSignatures)
                    <div class="sign-col">
                        <div>Mengetahui,</div>
                        <div>{{ $signer2Title }}</div>
                        <div class="stamp-overlay-wrap">
                            @if($signer2SigUrl)
                                <img src="{{ $signer2SigUrl }}" alt="Tanda Tangan Pejabat Kedua" class="official-signature-img">
                            @else
                                <div style="height: 60px;"></div>
                            @endif
                        </div>
                        <div class="sign-name">{{ $signer2Name }}</div>
                        <div class="sign-nip">NIP. {{ $signer2Nip }}</div>
                    </div>
                @else
                    <div class="sign-col" style="text-align: left;">
                        <div style="font-size: 9pt; color: #475569; margin-bottom: 4px;">Verifikasi Dokumen:</div>
                        <img src="{{ $verificationQrUrl }}" alt="QR Verifikasi" class="qr-code-thumb">
                    </div>
                @endif

                <!-- Kolom Kanan: Pejabat Utama Penandatangan & Stempel -->
                <div class="sign-col">
                    <div>Ditetapkan di: Jakarta</div>
                    <div>Pada tanggal: {{ now()->translatedFormat('d F Y') }}</div>
                    <div>{{ $signerTitle }}</div>
                    <div class="stamp-overlay-wrap">
                        @if($stampUrl)
                            <img src="{{ $stampUrl }}" alt="Cap Stempel Resmi" class="official-stamp-img">
                        @endif
                        @if($signerSigUrl)
                            <img src="{{ $signerSigUrl }}" alt="Tanda Tangan Pejabat Utama" class="official-signature-img">
                        @else
                            <div style="height: 60px;"></div>
                        @endif
                    </div>
                    <div class="sign-name">{{ $signerName }}</div>
                    <div class="sign-nip">NIP. {{ $signerNip }}</div>
                </div>
            </div>
        </div>

        <!-- FOOTER VERIFIKASI KEASLIAN DOKUMEN -->
        <div class="doc-verification-footer">
            <div style="display: flex; align-items: center; gap: 10px;">
                <img src="{{ $verificationQrUrl }}" alt="QR Verifikasi" class="qr-code-thumb">
                <div>
                    <strong>VERIFIKASI INTEGRITAS DOKUMEN:</strong><br>
                    Token Resi: <span style="color: #2e33ff;">{{ $receipt }}</span> &bull; Final Result ID: #{{ $finalResult->id }}<br>
                    SHA-256 Hash: {{ $verificationHash }}...
                </div>
            </div>
            <div style="text-align: right; line-height: 1.35;">
                Dokumen Resmi Terverifikasi Sah<br>
                Sistem CBT TESLOKA
            </div>
        </div>
    </div>
    </div>

</body>
</html>
