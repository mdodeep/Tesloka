<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Sertifikat Kelulusan - {{ $attempt->student->name ?? 'Peserta' }} - {{ $attempt->exam->title ?? 'Ujian' }}</title>
    @vite(['resources/js/app.js'])
    @php
        $letterGrade = $letterGrade ?? ($attempt->finalResult->final_grade_letter ?? $attempt->getLetterGrade());
        $gradePredicate = $gradePredicate ?? $attempt->getGradePredicate();
        $institution = $attempt->exam->institution ?? \App\Models\Institution::first();
        $instName = $institution->name ?? 'TESLOKA';
        $faviconUrl = $institution->favicon_url ?? asset('assets/images/favicon-tesloka-bg-putih.webp');
        $logoUrl = $institution->logo_url ?? asset('assets/images/logo-tesloka-cbt.webp');
        
        // Konfigurasi Desain & Warna Sertifikat
        $certPrimaryColor = \App\Models\SystemSetting::get('branding.cert_primary_color', '#14213d');
        $certAccentColor = \App\Models\SystemSetting::get('branding.cert_accent_color', '#c59b27');
        $certTitle = \App\Models\SystemSetting::get('branding.cert_title', 'SERTIFIKAT KELULUSAN');
        $certSubtitle = \App\Models\SystemSetting::get('branding.cert_subtitle', 'CERTIFICATE OF ACHIEVEMENT');
        
        // Template Narasi Pernyataan Kelulusan Sertifikat
        $rawStatementTemplate = \App\Models\SystemSetting::get(
            'branding.cert_statement_template',
            'Atas keberhasilan menuntaskan seluruh rangkaian evaluasi terstandar pada mata pelajaran {{mata pelajaran}} dalam ujian "{{nama ujian}}" yang diselenggarakan oleh sistem TESLOKA CBT terakreditasi institusi dengan capaian:'
        );

        $subjectName = $attempt->exam->subject->name ?? 'Evaluasi CBT';
        $examTitle = $attempt->exam->title ?? 'Ujian CBT';
        $studentName = $attempt->student->name ?? 'Peserta';
        $studentId = $attempt->student->identity_number ?? ($attempt->student->username ?? '-');
        $totalScoreFormatted = number_format($attempt->total_score ?? 0, 1);
        $gradeSummary = ($letterGrade ?? '') . ' (' . ($gradePredicate ?? '') . ')';
        $todayFormatted = now()->translatedFormat('d F Y');

        $statementReplacements = [
            // Mata Pelajaran (Format Utama {{mata pelajaran}})
            '{{mata pelajaran}}' => '<strong>' . e($subjectName) . '</strong>',
            '{{mata_pelajaran}}' => '<strong>' . e($subjectName) . '</strong>',
            '[mata pelajaran]' => '<strong>' . e($subjectName) . '</strong>',
            '[mata_pelajaran]' => '<strong>' . e($subjectName) . '</strong>',
            '{mata_pelajaran}' => '<strong>' . e($subjectName) . '</strong>',
            '{subject}' => '<strong>' . e($subjectName) . '</strong>',

            // Nama Ujian (Format Utama {{nama ujian}})
            '{{nama ujian}}' => '<strong>' . e($examTitle) . '</strong>',
            '{{nama_ujian}}' => '<strong>' . e($examTitle) . '</strong>',
            '{{judul_ujian}}' => '<strong>' . e($examTitle) . '</strong>',
            '[nama ujian]' => '<strong>' . e($examTitle) . '</strong>',
            '[nama_ujian]' => '<strong>' . e($examTitle) . '</strong>',
            '{nama_ujian}' => '<strong>' . e($examTitle) . '</strong>',
            '{exam}' => '<strong>' . e($examTitle) . '</strong>',
            '{judul_ujian}' => '<strong>' . e($examTitle) . '</strong>',

            // Nama Institusi (Format Utama {{nama institusi}})
            '{{nama institusi}}' => '<strong>' . e($instName) . '</strong>',
            '{{nama_institusi}}' => '<strong>' . e($instName) . '</strong>',
            '[nama institusi]' => '<strong>' . e($instName) . '</strong>',
            '[nama_institusi]' => '<strong>' . e($instName) . '</strong>',
            '{nama_institusi}' => '<strong>' . e($instName) . '</strong>',
            '{institusi}' => '<strong>' . e($instName) . '</strong>',

            // Nama Siswa (Format Utama {{nama siswa}})
            '{{nama siswa}}' => '<strong>' . e($studentName) . '</strong>',
            '{{nama_siswa}}' => '<strong>' . e($studentName) . '</strong>',
            '[nama siswa]' => '<strong>' . e($studentName) . '</strong>',
            '[nama_siswa]' => '<strong>' . e($studentName) . '</strong>',
            '{nama_siswa}' => '<strong>' . e($studentName) . '</strong>',
            '{student}' => '<strong>' . e($studentName) . '</strong>',

            // NIM / Nomor Peserta (Format Utama {{nim}} / {{nomor peserta}})
            '{{nim}}' => '<strong>' . e($studentId) . '</strong>',
            '{{nomor peserta}}' => '<strong>' . e($studentId) . '</strong>',
            '{{nomor_peserta}}' => '<strong>' . e($studentId) . '</strong>',
            '[nim]' => '<strong>' . e($studentId) . '</strong>',
            '[nomor peserta]' => '<strong>' . e($studentId) . '</strong>',
            '[nomor_peserta]' => '<strong>' . e($studentId) . '</strong>',
            '{nim}' => '<strong>' . e($studentId) . '</strong>',
            '{nomor_peserta}' => '<strong>' . e($studentId) . '</strong>',

            // Nilai Akhir (Format Utama {{nilai}})
            '{{nilai}}' => '<strong>' . $totalScoreFormatted . '</strong>',
            '[nilai]' => '<strong>' . $totalScoreFormatted . '</strong>',
            '{nilai}' => '<strong>' . $totalScoreFormatted . '</strong>',

            // Predikat (Format Utama {{predikat}})
            '{{predikat}}' => '<strong>' . e($gradeSummary) . '</strong>',
            '[predikat]' => '<strong>' . e($gradeSummary) . '</strong>',
            '{predikat}' => '<strong>' . e($gradeSummary) . '</strong>',

            // Tanggal (Format Utama {{tanggal}})
            '{{tanggal}}' => '<strong>' . e($todayFormatted) . '</strong>',
            '[tanggal]' => '<strong>' . e($todayFormatted) . '</strong>',
            '{tanggal}' => '<strong>' . e($todayFormatted) . '</strong>',
        ];

        $parsedStatement = str_ireplace(array_keys($statementReplacements), array_values($statementReplacements), $rawStatementTemplate);
        
        // Pejabat Utama (Kanan)
        $certSignerName = \App\Models\SystemSetting::get('branding.cert_signer_name', 'Dr. H. Muhammad Zainuddin, M.Pd.');
        $certSignerTitle = \App\Models\SystemSetting::get('branding.cert_signer_title', 'Direktur / Kepala Akademik');
        $certSignerNip = \App\Models\SystemSetting::get('branding.cert_signer_nip', '19690815 199403 1 001');
        $certSignerSigPath = \App\Models\SystemSetting::get('branding.cert_signer_signature');
        $certSignerSigUrl = $certSignerSigPath ? asset('storage/' . $certSignerSigPath) : null;

        // Pejabat Kedua / Penguji (Kiri)
        $certSignerSecondaryName = \App\Models\SystemSetting::get('branding.cert_signer_secondary_name', 'Drs. H. M. Syatibi, M.Ag.');
        $certSignerSecondaryTitle = \App\Models\SystemSetting::get('branding.cert_signer_secondary_title', 'Ketua Tim Penguji CBT');
        $certSignerSecondaryNip = \App\Models\SystemSetting::get('branding.cert_signer_secondary_nip', '19780512 200312 1 002');
        $certSignerSecondarySigPath = \App\Models\SystemSetting::get('branding.cert_signer_secondary_signature');
        $certSignerSecondarySigUrl = $certSignerSecondarySigPath ? asset('storage/' . $certSignerSecondarySigPath) : null;

        // Cap Stempel Institusi
        $certStampPath = \App\Models\SystemSetting::get('branding.cert_stamp');
        $certStampUrl = $certStampPath ? asset('storage/' . $certStampPath) : null;

        // Opsi Tampilan
        $certShowWatermark = (bool) \App\Models\SystemSetting::get('branding.cert_show_watermark', true);
        $certShowLogo = (bool) \App\Models\SystemSetting::get('branding.cert_show_logo', true);
        $certShowScore = (bool) \App\Models\SystemSetting::get('branding.cert_show_score', true);
        $certDualSignatures = (bool) \App\Models\SystemSetting::get('branding.cert_dual_signatures', true);

        // Blangko Kustom A4
        $certBgSetting = \App\Models\SystemSetting::get('branding.certificate_bg');
        $certBgUrl = $certBgSetting ? asset('storage/' . $certBgSetting) : null;
        
        // URL Tombol Kembali
        if (! isset($backUrl)) {
            if (request()->routeIs('student.*')) {
                $backUrl = route('student.dashboard');
                $backLabel = 'Kembali ke Beranda Ujian';
            } elseif (request()->routeIs('staff.*') || auth()->guard('staff')->check()) {
                $backUrl = route('staff.graduation.index');
                $backLabel = 'Kembali ke Hasil & Kelulusan';
            } elseif (auth()->guard('student')->check()) {
                $backUrl = route('student.dashboard');
                $backLabel = 'Kembali ke Beranda Ujian';
            } else {
                $backUrl = route('certificate.search');
                $backLabel = 'Kembali ke Verifikasi Sertifikat';
            }
        }
        $backLabel = $backLabel ?? 'Kembali';

        $certCode = 'CERT/CBT/' . ($attempt->exam->code ?? 'EXAM') . '/' . str_pad($attempt->id, 6, '0', STR_PAD_LEFT);
        $receipt = $attempt->submission_receipt ?? (string) $attempt->id;
        $verificationQrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=" . urlencode(route('document.verify', $receipt));
        $verificationHash = substr(hash('sha256', $attempt->id . $receipt . ($attempt->submitted_at?->timestamp ?? '')), 0, 16);
    @endphp
    <link rel="icon" type="image/x-icon" href="{{ $faviconUrl }}">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        :root {
            --cert-primary: {{ $certPrimaryColor }};
            --cert-accent: {{ $certAccentColor }};
            --cert-accent-light: {{ $certAccentColor }}18;
            --cert-dark: #0f172a;
            --cert-body: #334155;
            --cert-muted: #64748b;
        }

        @page {
            size: 297mm 210mm; /* Standar A4 Landscape */
            margin: 0;
        }

        * {
            box-sizing: border-box;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: var(--cert-dark);
            background: #0b1120;
            margin: 0;
            padding: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Top Action Bar (Layar Browser) */
        .no-print {
            width: 297mm;
            max-width: 100%;
            margin: 0 auto 20px auto;
            background: #ffffff;
            padding: 12px 24px;
            border-radius: 10px;
            border: 1px solid #334155;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .btn-print {
            background: #2e33ff;
            color: #ffffff;
            border: none;
            padding: 9px 20px;
            font-weight: 700;
            border-radius: 6px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
            box-shadow: 0 2px 6px rgba(46, 51, 255, 0.35);
        }

        .btn-print:hover {
            background: #2024db;
            transform: translateY(-1px);
        }

        .btn-back {
            background: #f8fafc;
            color: #334155;
            border: 1px solid #cbd5e1;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-back:hover {
            background: #e2e8f0;
            color: #0f172a;
        }

        /* Lembar Dokumen Sertifikat A4 Landscape Presisi */
        .cert-container {
            width: 297mm;
            height: 210mm;
            margin: 0 auto;
            background: #ffffff;
            position: relative;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 9mm;
            @if($certBgUrl)
                background-image: url('{{ $certBgUrl }}');
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: center;
                padding: 16mm 20mm;
            @endif
        }

        /* Bingkai Luar Arsitektural */
        .cert-frame-outer {
            width: 100%;
            height: 100%;
            position: relative;
            box-sizing: border-box;
            @if($certBgUrl)
                border: none;
                padding: 0;
            @else
                border: 3.5px solid var(--cert-primary);
                padding: 2.5mm;
            @endif
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Bingkai Dalam Neoklasik Modern */
        .cert-frame-inner {
            width: 100%;
            height: 100%;
            position: relative;
            box-sizing: border-box;
            @if($certBgUrl)
                border: none;
                background: transparent;
                padding: 6mm 10mm;
            @else
                border: 1px solid var(--cert-accent);
                background: linear-gradient(180deg, #ffffff 0%, #fafbfc 100%);
                padding: 7mm 16mm 6mm 16mm;
            @endif
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
        }

        /* Sudut Geometris Modern (Minimalist Corner Brackets) */
        .cert-corner {
            position: absolute;
            width: 32px;
            height: 32px;
            pointer-events: none;
            z-index: 2;
        }

        .cert-corner-tl { top: -1px; left: -1px; }
        .cert-corner-tr { top: -1px; right: -1px; transform: scaleX(-1); }
        .cert-corner-bl { bottom: -1px; left: -1px; transform: scaleY(-1); }
        .cert-corner-br { bottom: -1px; right: -1px; transform: scale(-1, -1); }

        /* Watermark Logo Samar di Latar Tengah */
        .cert-watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 290px;
            height: 290px;
            opacity: 0.04;
            pointer-events: none;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cert-watermark img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: grayscale(100%);
        }

        /* Lapisan Konten */
        .cert-content {
            position: relative;
            z-index: 3;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* 1. HEADER */
        .cert-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .cert-logo-wrap {
            margin-bottom: 4px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cert-logo-img {
            max-height: 46px;
            max-width: 150px;
            object-fit: contain;
        }

        .cert-inst-name {
            font-size: 11pt;
            font-weight: 700;
            color: var(--cert-primary);
            letter-spacing: 3.5px;
            text-transform: uppercase;
            margin: 0;
            font-family: system-ui, -apple-system, sans-serif;
        }

        .cert-header-line {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 260px;
            margin: 4px 0 3px 0;
        }

        .cert-header-line .line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--cert-accent), transparent);
        }

        .cert-header-line .emblem {
            color: var(--cert-accent);
            font-size: 8.5pt;
            line-height: 1;
        }

        .cert-title {
            font-size: 25pt;
            font-weight: 800;
            color: var(--cert-primary);
            letter-spacing: 4px;
            text-transform: uppercase;
            margin: 2px 0 1px 0;
            font-family: 'Georgia', Times, serif;
            line-height: 1.15;
        }

        .cert-subtitle {
            font-size: 9.5pt;
            font-weight: 700;
            color: var(--cert-accent);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin: 0 0 5px 0;
            font-family: system-ui, -apple-system, sans-serif;
        }

        .cert-serial-line {
            font-size: 8.5pt;
            color: var(--cert-muted);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-family: monospace, system-ui, sans-serif;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .cert-code-tag {
            background: var(--cert-accent-light);
            color: var(--cert-primary);
            border: 1px solid var(--cert-accent);
            padding: 1px 8px;
            border-radius: 4px;
            font-weight: 700;
        }

        /* 2. RECIPIENT & CITATION */
        .cert-recipient-section {
            margin: 6px 0;
        }

        .cert-award-caption {
            font-size: 11pt;
            font-style: italic;
            color: var(--cert-muted);
            margin: 0 0 5px 0;
            font-family: 'Georgia', Times, serif;
        }

        .cert-student-name {
            font-size: 26pt;
            font-weight: 700;
            color: var(--cert-dark);
            margin: 0;
            letter-spacing: 0.5px;
            font-family: 'Georgia', Times, serif;
            line-height: 1.2;
        }

        .cert-name-accent-line {
            width: 170px;
            height: 1.5px;
            background: var(--cert-accent);
            margin: 5px auto 6px auto;
        }

        .cert-student-id {
            font-size: 9.5pt;
            color: var(--cert-muted);
            font-weight: 500;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }

        .cert-statement {
            font-size: 11pt;
            line-height: 1.6;
            color: var(--cert-body);
            max-width: 820px;
            margin: 0 auto;
        }

        .cert-statement strong {
            color: var(--cert-dark);
            font-weight: 700;
        }

        /* 3. ACADEMIC CREDENTIALS GRID (Modern & Prestisius) */
        .cert-credentials-card {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-top: 2.5px solid var(--cert-accent);
            border-radius: 6px;
            padding: 7px 26px;
            margin-top: 12px;
            gap: 22px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }

        .cert-cred-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .cert-cred-label {
            font-size: 7.5pt;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--cert-muted);
            margin-bottom: 2px;
        }

        .cert-cred-value {
            font-size: 11pt;
            font-weight: 800;
            color: var(--cert-dark);
        }

        .cert-cred-status {
            font-size: 9.5pt;
            font-weight: 800;
            color: #059669;
            letter-spacing: 0.5px;
        }

        .cert-cred-sep {
            width: 1px;
            height: 28px;
            background: #cbd5e1;
        }

        /* 4. FOOTER (Security QR, Institutional Stamp, Real Signatures) */
        .cert-footer-section {
            margin-top: 8px;
        }

        .cert-footer-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding: 0 4px;
        }

        /* Left: Digital Security QR & Disclaimer Microtext */
        .cert-footer-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            max-width: 290px;
        }

        .cert-security-box {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            padding: 6px 12px 6px 7px;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            width: fit-content;
        }

        .cert-qr-wrap {
            flex-shrink: 0;
            width: 66px;
            height: 66px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            padding: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cert-qr-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .cert-security-meta {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left;
            font-size: 7.2pt;
            line-height: 1.35;
            color: var(--cert-muted);
        }

        .cert-security-title {
            font-size: 8pt;
            font-weight: 700;
            color: var(--cert-primary);
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-bottom: 2px;
            font-family: system-ui, -apple-system, sans-serif;
        }

        .cert-meta-item {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: flex;
            gap: 4px;
        }

        .meta-label {
            color: #64748b;
            font-weight: 500;
        }

        .meta-val {
            color: var(--cert-dark);
            font-weight: 600;
        }

        .cert-meta-url {
            font-size: 7pt;
            color: var(--cert-primary);
            font-weight: 700;
            margin-top: 2px;
            letter-spacing: 0.3px;
        }

        /* Microtext Footer Resmi di bawah Card QR Code */
        .cert-micro-footer {
            font-size: 6.5pt;
            color: #94a3b8;
            font-family: ui-monospace, SFMono-Regular, Menlo, monospace, system-ui;
            letter-spacing: 0.3px;
            line-height: 1.35;
            margin-top: 6px;
            text-align: left;
            max-width: 280px;
        }

        /* Institutional Stamp Area (Tengah, Opsional) */
        .cert-stamp-area {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 90px;
        }

        .cert-stamp-img {
            max-height: 72px;
            max-width: 110px;
            object-fit: contain;
            transform: rotate(-6deg);
            opacity: 0.88;
        }

        /* Authorized Signatures Area (Pejabat 1 & Pejabat 2) */
        .cert-signers-group {
            display: flex;
            align-items: flex-start;
            gap: 56px;
        }

        .cert-signer-col {
            width: 220px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cert-signer-role {
            font-size: 8.5pt;
            font-weight: 600;
            color: var(--cert-muted);
            height: 20px;
            line-height: 20px;
            margin-bottom: 2px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .cert-signer-sig-box {
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin: 3px 0;
            width: 100%;
        }

        .cert-signature-file {
            max-height: 50px;
            max-width: 160px;
            object-fit: contain;
        }

        .cert-signer-name {
            width: 100%;
            font-size: 9.8pt;
            font-weight: 700;
            color: var(--cert-dark);
            border-top: 1.5px solid var(--cert-accent);
            padding-top: 4px;
            margin-top: 0;
            white-space: nowrap;
            line-height: 1.3;
        }

        .cert-signer-id {
            font-size: 7.8pt;
            color: var(--cert-muted);
            margin-top: 2px;
            font-family: monospace, system-ui, sans-serif;
            white-space: nowrap;
        }

        .cert-viewport-wrapper,
        .doc-viewport-container {
            box-sizing: border-box;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            display: flex;
            justify-content: center;
            padding: 8px 0;
        }

        @media screen and (max-width: 820px) {
            body {
                padding: 12px 6px;
            }
            .no-print {
                padding: 10px 14px;
                flex-direction: column;
                align-items: stretch;
                gap: 8px;
            }
            .btn-print {
                width: 100%;
                justify-content: center;
            }
            .cert-viewport-wrapper,
            .doc-viewport-container {
            box-sizing: border-box;
                justify-content: flex-start;
            }
            .cert-container {
                flex-shrink: 0;
            }
        }

        /* Optimasi Cetak (Print Stylesheet) */
        @media print {
            body {
                background: none !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .no-print {
                display: none !important;
            }

            .cert-viewport-wrapper,
            .doc-viewport-container {
            box-sizing: border-box;
                padding: 0 !important;
                display: block !important;
                overflow: visible !important;
            }

            .cert-container {
                box-shadow: none !important;
                margin: 0 !important;
                width: 297mm !important;
                height: 210mm !important;
                page-break-after: avoid !important;
                page-break-inside: avoid !important;
            }
        }
    </style>
</head>
<body>

    <!-- ACTION BAR (Browser View Only) -->
    <div class="no-print">
        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="{{ $backUrl }}" class="btn-back">&larr; {{ $backLabel }}</a>
            <div>
                <strong style="color: #0f172a; font-size: 14px;">Sertifikat Kelulusan Resmi CBT</strong>
                <span style="display: block; font-size: 11px; color: #64748b;">
                    {{ $attempt->student->name }} &bull; {{ $attempt->exam->title }}
                    @if($certBgUrl) &bull; <span style="color: #059669; font-weight: 700;">Menggunakan Desain Blangko A4 Institusi</span> @else &bull; <span style="color: #2563eb; font-weight: 600;">Desain Vektor Resmi Terpadu</span> @endif
                </span>
            </div>
        </div>
        <div style="display: flex; align-items: center; gap: 10px;">
            <button onclick="window.print()" class="btn-print">
                <i data-lucide="printer" style="width: 16px; height: 16px;"></i>
                <span>Cetak / Simpan PDF (A4 Landscape)</span>
            </button>
        </div>
    </div>

    <!-- CERTIFICATE CANVAS A4 LANDSCAPE -->
    <div class="cert-viewport-wrapper doc-viewport-container">
    <div class="cert-container">

        <div class="cert-frame-outer">

            <div class="cert-frame-inner">

                @if(! $certBgUrl)
                    <!-- Sudut Geometris Minimalis Elegan (SVG Vector) -->
                    <svg class="cert-corner cert-corner-tl" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0 H24 V2 H2 V24 H0 V0Z" fill="var(--cert-accent)"/>
                        <rect x="5" y="5" width="4" height="4" fill="var(--cert-accent)"/>
                    </svg>

                    <svg class="cert-corner cert-corner-tr" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0 H24 V2 H2 V24 H0 V0Z" fill="var(--cert-accent)"/>
                        <rect x="5" y="5" width="4" height="4" fill="var(--cert-accent)"/>
                    </svg>

                    <svg class="cert-corner cert-corner-bl" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0 H24 V2 H2 V24 H0 V0Z" fill="var(--cert-accent)"/>
                        <rect x="5" y="5" width="4" height="4" fill="var(--cert-accent)"/>
                    </svg>

                    <svg class="cert-corner cert-corner-br" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0 H24 V2 H2 V24 H0 V0Z" fill="var(--cert-accent)"/>
                        <rect x="5" y="5" width="4" height="4" fill="var(--cert-accent)"/>
                    </svg>
                @endif

                <!-- Watermark Logo Samar di Latar Tengah -->
                @if($certShowWatermark && $logoUrl)
                    <div class="cert-watermark">
                        <img src="{{ $logoUrl }}" alt="Watermark Institusi">
                    </div>
                @endif

                <div class="cert-content">

                    <!-- 1. HEADER SECTION -->
                    <div class="cert-header">
                        @if($certShowLogo && $logoUrl)
                            <div class="cert-logo-wrap">
                                <img src="{{ $logoUrl }}" alt="Logo Resmi Institusi" class="cert-logo-img">
                            </div>
                        @endif

                        <p class="cert-inst-name">{{ $instName }}</p>

                        <div class="cert-header-line">
                            <span class="line"></span>
                            <span class="emblem">❖</span>
                            <span class="line"></span>
                        </div>

                        <h1 class="cert-title">{{ $certTitle }}</h1>
                        <p class="cert-subtitle">{{ $certSubtitle }}</p>
                        <div class="cert-serial-line">
                            <span>NOMOR:</span>
                            <span class="cert-code-tag">{{ $certCode }}</span>
                        </div>
                    </div>

                    <!-- 2. RECIPIENT & CITATION SECTION -->
                    <div class="cert-recipient-section">
                        <p class="cert-award-caption">Diberikan secara terhormat kepada:</p>
                        
                        <div class="cert-student-name">{{ $attempt->student->name }}</div>
                        <div class="cert-name-accent-line"></div>
                        
                        <div class="cert-student-id">
                            Nomor Induk Siswa / NIM: <strong>{{ $attempt->student->identity_number ?? $attempt->student->username }}</strong>
                        </div>

                        <div class="cert-statement">
                            {!! $parsedStatement !!}
                        </div>

                        <!-- 3. ACADEMIC CREDENTIALS GRID -->
                        @if($certShowScore)
                            <div>
                                <div class="cert-credentials-card">
                                    <div class="cert-cred-col">
                                        <div class="cert-cred-label">Nilai Akhir</div>
                                        <div class="cert-cred-value">{{ number_format($attempt->total_score ?? 0, 1) }}</div>
                                    </div>
                                    <div class="cert-cred-sep"></div>
                                    <div class="cert-cred-col">
                                        <div class="cert-cred-label">Predikat Kelulusan</div>
                                        <div class="cert-cred-value">PREDIKAT: {{ $letterGrade }} ({{ $gradePredicate }})</div>
                                    </div>
                                    <div class="cert-cred-sep"></div>
                                    <div class="cert-cred-col">
                                        <div class="cert-cred-label">Status Kualifikasi</div>
                                        <div class="cert-cred-status">LULUS (MEMENUHI KKM)</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- 4. FOOTER SECTION -->
                    <div class="cert-footer-section">
                        <div class="cert-footer-row">
                            
                            <!-- Left: Digital Security Verification Box & Microtext Disclaimer Underneath -->
                            <div class="cert-footer-left">
                                <div class="cert-security-box">
                                    <div class="cert-qr-wrap">
                                        <img src="{{ $verificationQrUrl }}" alt="QR Verifikasi Sah" class="cert-qr-img">
                                    </div>
                                    <div class="cert-security-meta">
                                        <div class="cert-security-title">VERIFIKASI DIGITAL SAH</div>
                                        <div class="cert-meta-item"><span class="meta-label">Resi:</span> <span class="meta-val font-mono">{{ $attempt->submission_receipt ?? '-' }}</span></div>
                                        <div class="cert-meta-item"><span class="meta-label">Tanggal:</span> <span class="meta-val">{{ now()->translatedFormat('d F Y') }}</span></div>
                                        <div class="cert-meta-item"><span class="meta-label">Hash:</span> <span class="meta-val font-mono">{{ $verificationHash }}</span></div>
                                        <div class="cert-meta-url">sertifikat.tesloka.test</div>
                                    </div>
                                </div>

                                <!-- Microtext Footer Resmi (Di bawah Card QR Code sebelah kiri) -->
                                <div class="cert-micro-footer">
                                    DOKUMEN INI ADALAH SERTIFIKAT ELEKTRONIK SAH YANG DITERBITKAN OLEH {{ strtoupper($instName) }}
                                </div>
                            </div>

                            <!-- Center: Stempel Institusi Resmi (Jika Ada) -->
                            <div class="cert-stamp-area">
                                @if($certStampUrl)
                                    <img src="{{ $certStampUrl }}" alt="Cap Stempel Resmi" class="cert-stamp-img">
                                @endif
                            </div>

                            <!-- Right: Authorized Signatures -->
                            <div class="cert-signers-group">
                                @if($certDualSignatures)
                                    <div class="cert-signer-col">
                                        <div class="cert-signer-role">{{ $certSignerSecondaryTitle }}</div>
                                        <div class="cert-signer-sig-box">
                                            @if($certSignerSecondarySigUrl)
                                                <img src="{{ $certSignerSecondarySigUrl }}" alt="Tanda Tangan Pejabat Kedua" class="cert-signature-file">
                                            @endif
                                        </div>
                                        <div class="cert-signer-name">{{ $certSignerSecondaryName }}</div>
                                        <div class="cert-signer-id">NIP. {{ $certSignerSecondaryNip }}</div>
                                    </div>
                                @endif

                                <div class="cert-signer-col">
                                    <div class="cert-signer-role">{{ $certSignerTitle }}</div>
                                    <div class="cert-signer-sig-box">
                                        @if($certSignerSigUrl)
                                            <img src="{{ $certSignerSigUrl }}" alt="Tanda Tangan Pejabat Utama" class="cert-signature-file">
                                        @endif
                                    </div>
                                    <div class="cert-signer-name">{{ $certSignerName }}</div>
                                    <div class="cert-signer-id">NIP. {{ $certSignerNip }}</div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    </div>

</body>
</html>
