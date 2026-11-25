<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Hasil Ujian (SKHU) - {{ $attempt->student->name }} - {{ $attempt->exam->code }}</title>
    @vite(['resources/js/app.js'])
    @php
        $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
        $institution = $institution ?? ($attempt->exam->institution ?? \App\Models\Institution::first());
        $instName = $institution?->name ?: $branding['institution_name'];
        $instAddress = $institution?->address ?? '';
        $instPhone = $institution?->phone ?? '';
        $instEmail = $institution?->email ?? '';
        $logoUrl = $institution?->logo_url ?: $branding['logo_url'];
        $faviconUrl = $institution?->favicon_url ?: $branding['favicon_url'];

        // Template Blangko Kertas Surat Resmi A4 Portret (1 Kertas Penuh)
        $docLetterheadPath = \App\Models\SystemSetting::get('branding.doc_letterhead_image');
        $docLetterheadUrl = $docLetterheadPath ? '/storage/' . ltrim((string) $docLetterheadPath, '/') : null;

        // Pejabat Utama (Kanan)
        $signerName = \App\Models\SystemSetting::get('branding.cert_signer_name', 'Dr. H. Muhammad Zainuddin, M.Pd.');
        $signerTitle = \App\Models\SystemSetting::get('branding.cert_signer_title', 'Direktur / Kepala Akademik');
        $signerNip = \App\Models\SystemSetting::get('branding.cert_signer_nip', '19690815 199403 1 001');
        $signerSigPath = \App\Models\SystemSetting::get('branding.cert_signer_signature');
        $signerSigUrl = $signerSigPath ? '/storage/' . ltrim((string) $signerSigPath, '/') : null;

        // Pejabat Kedua (Kiri)
        $signer2Name = \App\Models\SystemSetting::get('branding.cert_signer_secondary_name', 'Drs. H. M. Syatibi, M.Ag.');
        $signer2Title = \App\Models\SystemSetting::get('branding.cert_signer_secondary_title', 'Ketua Tim Penguji CBT');
        $signer2Nip = \App\Models\SystemSetting::get('branding.cert_signer_secondary_nip', '19780512 200312 1 002');
        $signer2SigPath = \App\Models\SystemSetting::get('branding.cert_signer_secondary_signature');
        $signer2SigUrl = $signer2SigPath ? '/storage/' . ltrim((string) $signer2SigPath, '/') : null;

        // Cap Stempel Resmi Institusi
        $stampPath = \App\Models\SystemSetting::get('branding.cert_stamp');
        $stampUrl = $stampPath ? '/storage/' . ltrim((string) $stampPath, '/') : null;

        // Mode Tanda Tangan Ganda
        $dualSignatures = (bool) \App\Models\SystemSetting::get('branding.cert_dual_signatures', true);

        // Nilai & Rincian Skor
        $breakdown = $breakdown ?? ($attempt->getScoreBreakdown() ?? [
            'mc_score' => (float) ($attempt->total_score ?? 0),
            'essay_score' => 0.0,
            'total_score' => (float) ($attempt->total_score ?? 0),
        ]);
        $letterGrade = $letterGrade ?? ($attempt->getLetterGrade() ?? 'A');
        $gradePredicate = $gradePredicate ?? ($attempt->getGradePredicate() ?? 'Sangat Memuaskan');
        $isPassed = $isPassed ?? ($attempt->isPassed() ?? true);

        $isStaff = request()->routeIs('staff.*') || (!request()->routeIs('student.*') && auth('staff')->check());
        $backUrl = $backUrl ?? ($isStaff ? route('staff.graduation.index') : route('student.dashboard'));
        $backLabel = $backLabel ?? ($isStaff ? 'Kembali ke Hasil & Kelulusan' : 'Kembali ke Beranda');

        $docService = app(\App\Services\DocumentConfigService::class);
        $doc = $docService->getSettings($institution);
        $transcriptNumber = $docService->formatNumber('transcript', [
            'exam_code' => $attempt->exam->code ?? 'EXAM',
            'attempt_id' => $attempt->id,
            'seq' => $attempt->id,
            'date' => $attempt->submitted_at ?? now(),
        ], $institution);

        $receipt = $attempt->submission_receipt ?? 'RCP-' . str_pad($attempt->id, 6, '0', STR_PAD_LEFT);
        $verificationQrUrl = \App\Services\QrCodeService::dataUri(route('document.verify', $receipt), 110);
        $verificationHash = substr(hash('sha256', $attempt->id . $receipt . ($breakdown['total_score'] ?? 0)), 0, 24);
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
            width: auto;
            height: auto;
            max-width: 190px;
            max-height: 76px;
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
        /* Tabel Rincian Nilai */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0 14px 0;
            font-size: 10pt;
        }
        .data-table th, .data-table td {
            border: 1px solid #475569;
            padding: 5px 8px;
        }
        .data-table th {
            background-color: #f1f5f9;
            font-weight: bold;
            text-align: center;
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
</head>
<body>

    <!-- Bilah Aksi Non-Cetak -->
    <div class="no-print">
        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="{{ $backUrl }}" class="btn-back">&larr; {{ $backLabel }}</a>
            <span style="color: #64748b;">|</span>
            <strong>Surat Keterangan Hasil Ujian (SKHU) / Transkrip Nilai</strong>
        </div>
        <button onclick="window.print()" class="btn-print">
            <i data-lucide="printer" style="width: 16px; height: 16px;"></i>
            <span>Cetak Transkrip / SKHU (A4 Portret)</span>
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
                        <div class="kop-sub">{{ $doc['kop_subtitle'] }}</div>
                        <p class="kop-addr">{{ $instAddress }}@if($instPhone) &bull; Telp: {{ $instPhone }}@endif @if($instEmail) &bull; Email: {{ $instEmail }}@endif</p>
                    </div>
                </div>
            @endif

            <!-- JUDUL DOKUMEN -->
            <div class="doc-title">
                <h1>SURAT KETERANGAN HASIL UJIAN (SKHU)</h1>
                <p>Nomor: {{ $transcriptNumber }}</p>
            </div>

            <p style="text-align: justify; text-indent: 28px; margin-bottom: 10px;">
                Pusat Evaluasi Pembelajaran menerangkan dengan sesungguhnya bahwa peserta didik di bawah ini telah mengikuti evaluasi pembelajaran terstandar Berbasis Komputer (Computer-Based Test) dengan data identitas resmi sebagai berikut:
            </p>

            <!-- IDENTITAS PESERTA -->
            <table class="identity-table">
                <tr>
                    <td class="label">Nama Lengkap Peserta</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $attempt->student->name }}</td>
                </tr>
                <tr>
                    <td class="label">Nomor Induk Siswa / NIM / NISN</td>
                    <td class="separator">:</td>
                    <td class="value"><code>{{ $attempt->student->identity_number ?? $attempt->student->username }}</code></td>
                </tr>
                <tr>
                    <td class="label">Mata Pelajaran / Bidang Studi</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $attempt->exam->subject->name ?? 'Evaluasi Umum' }}</td>
                </tr>
                <tr>
                    <td class="label">Judul Evaluasi / Nama Ujian</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $attempt->exam->title }} (Kode: {{ $attempt->exam->code }})</td>
                </tr>
                <tr>
                    <td class="label">Waktu Pengumpulan Sah</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $attempt->submitted_at?->translatedFormat('d F Y, H:i:s') ?? now()->translatedFormat('d F Y') }} WIB</td>
                </tr>
                <tr>
                    <td class="label">Nomor Resi / Bukti Penyerahan Sah</td>
                    <td class="separator">:</td>
                    <td class="value" style="color: #2e33ff; font-family: monospace;">{{ $receipt }}</td>
                </tr>
            </table>

            <!-- TABEL RINCIAN NILAI & EVALUASI KELULUSAN -->
            <div style="font-weight: bold; margin: 12px 0 6px 0; font-size: 10.5pt;">RINCIAN CAPAIAN NILAI &amp; EVALUASI KELULUSAN:</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 8%;">No.</th>
                        <th style="width: 44%;">Komponen Penilaian</th>
                        <th style="width: 24%;">Skor Perolehan</th>
                        <th style="width: 24%;">Bobot Maksimal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">1.</td>
                        <td>Butir Soal Objektif (Pilihan Ganda / Menjodohkan)</td>
                        <td style="text-align: center; font-weight: bold;">{{ number_format($breakdown['mc_score'], 1) }}</td>
                        <td style="text-align: center;">100.0</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">2.</td>
                        <td>Butir Soal Subjektif / Esai (Penilaian Rubrik)</td>
                        <td style="text-align: center; font-weight: bold;">{{ number_format($breakdown['essay_score'], 1) }}</td>
                        <td style="text-align: center;">-</td>
                    </tr>
                    <tr style="background-color: #f1f5f9; font-weight: bold;">
                        <td colspan="2" style="text-align: right; padding-right: 14px;">TOTAL NILAI AKHIR:</td>
                        <td style="text-align: center; font-size: 11.5pt; color: #2e33ff;">
                            {{ number_format($breakdown['total_score'], 1) }}
                        </td>
                        <td style="text-align: center;">100.0</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right; padding-right: 14px;">Kriteria Ketuntasan Minimal (KKM):</td>
                        <td colspan="2" style="text-align: center; font-weight: bold;">{{ number_format($attempt->exam->passing_grade ?? 75.0, 1) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right; padding-right: 14px;">Predikat Huruf &amp; Sebutan:</td>
                        <td colspan="2" style="text-align: center; font-weight: bold;">
                            {{ $letterGrade }} ({{ $gradePredicate }})
                        </td>
                    </tr>
                    @php
                        $isCert = $attempt->exam && (!($attempt->exam->has_passing_grade ?? true) || $attempt->exam->isCertification());
                    @endphp
                    <tr style="background-color: {{ ($isCert || $isPassed) ? '#f0fdf4' : '#fef2f2' }};">
                        <td colspan="2" style="text-align: right; padding-right: 14px; font-weight: bold;">
                            {{ $isCert ? 'STATUS EVALUASI / CAPAIAN:' : 'STATUS KELULUSAN / KETUNTASAN:' }}
                        </td>
                        <td colspan="2" style="text-align: center; font-weight: bold; font-size: 10.5pt; color: {{ ($isCert || $isPassed) ? '#166534' : '#991b1b' }};">
                            {{ $isCert ? 'TERSERTIFIKASI / SELESAI' : ($isPassed ? 'LULUS (MEMENUHI KKM)' : 'BELUM TUNTAS (REMEDIAL)') }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- PARAGRAF PENUTUP -->
            <p style="text-align: justify; margin: 10px 0 14px 0;">
                Demikian Surat Keterangan Hasil Ujian ini diterbitkan secara sah berdasarkan catatan data primer di server basis data {{ $branding['system_label'] }} untuk dapat dipergunakan sebagaimana mestinya.
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
                    @if($doc['city'] !== '')
                        <div>Ditetapkan di: {{ $doc['city'] }}</div>
                    @endif
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
                    Token Resi: <span style="color: #2e33ff;">{{ $receipt }}</span> &bull; Attempt ID: #{{ $attempt->id }}<br>
                    SHA-256 Hash: {{ $verificationHash }}...
                </div>
            </div>
            <div style="text-align: right; line-height: 1.35;">
                Dokumen Resmi Terverifikasi Sah<br>
                {{ $branding['system_label'] }}
            </div>
        </div>
    </div>
    </div>

</body>
</html>
