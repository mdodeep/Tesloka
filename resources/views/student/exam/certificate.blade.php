<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Sertifikat Resmi - {{ $attempt->student->name ?? 'Peserta' }} - {{ $attempt->exam->title ?? 'Ujian' }}</title>
    @vite(['resources/js/app.js'])
    @php
        $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
        $scoreScaleService = app(\App\Services\ScoreScaleService::class);
        $docService = app(\App\Services\DocumentConfigService::class);

        $institution = $attempt->exam->institution ?? \App\Models\Institution::first();
        $doc = $docService->getSettings($institution);
        $instName = $institution?->name ?: $branding['institution_name'];
        $faviconUrl = $institution?->favicon_url ?: $branding['favicon_url'];
        $logoUrl = $institution?->logo_url ?: $branding['logo_url'];

        $certType = $attempt->exam?->certificate_type ?? 'standard';
        $scoreScale = (string) ($attempt->exam?->score_scale ?? 'standard_100');
        $scaleLabel = \App\Services\ScoreScaleService::scoreScaleLabel($scoreScale);
        $formattedFinalScore = $attempt->getFormattedFinalScore();
        $sectionScores = $attempt->getSectionScores();
        $cefrLevel = \App\Services\ScoreScaleService::mapPercentageToCefr((float) (($attempt->getScoreBreakdown()['percentage'] ?? 0)));

        $letterGrade = $letterGrade ?? ($attempt->finalResult->final_grade_letter ?? $attempt->getLetterGrade());
        $gradePredicate = $gradePredicate ?? $attempt->getGradePredicate();
        $isPassed = $attempt->isPassed();
        $requiresKkm = $attempt->exam?->requiresPassingGrade() ?? true;

        $examTakenAt = $attempt->started_at ?? $attempt->submitted_at ?? $attempt->created_at ?? now();
        $issuedAt = $attempt->getCertificateIssuedAt();
        $expiresAt = $attempt->getCertificateExpiresAt();
        $isExpired = $attempt->isCertificateExpired();
        $issuanceCity = trim((string) ($doc['city'] ?? ''));

        // Konfigurasi Desain & Palet Warna sesuai Tipe Sertifikat
        $certPrimaryColor = \App\Models\SystemSetting::get('branding.cert_primary_color', '#14213d');
        $certAccentColor = \App\Models\SystemSetting::get('branding.cert_accent_color', '#c59b27');
        $certTitle = \App\Models\SystemSetting::get('branding.cert_title', 'SERTIFIKAT KELULUSAN');
        $certSubtitle = \App\Models\SystemSetting::get('branding.cert_subtitle', 'CERTIFICATE OF ACHIEVEMENT');

        if ($certType === 'language_proficiency') {
            $certPrimaryColor = '#0f3d3e';
            $certAccentColor = '#0f9b8e';
            $certTitle = 'SERTIFIKAT KECAKAPAN BAHASA';
            $certSubtitle = 'CERTIFICATE OF LANGUAGE PROFICIENCY';
        } elseif ($certType === 'competency') {
            $certPrimaryColor = '#1e293b';
            $certAccentColor = '#2e33ff';
            $certTitle = 'SERTIFIKAT KOMPETENSI & PROFESI';
            $certSubtitle = 'PROFESSIONAL COMPETENCY CREDENTIAL';
        }

        // Template Narasi Pernyataan Kelulusan Sertifikat
        $defaultNarration = match ($certType) {
            'language_proficiency' => 'Telah mengikuti dan menyelesaikan evaluasi uji kecakapan bahasa pada program {{mata pelajaran}} ({{nama ujian}}) yang diselenggarakan oleh {{nama institusi}} pada tanggal '.$examTakenAt->translatedFormat('d F Y').' dengan perolehan capaian sebagai berikut:',
            'competency' => 'Telah memenuhi standar asesmen uji kompetensi keahlian pada bidang {{mata pelajaran}} melalui ujian {{nama ujian}} yang diselenggarakan oleh {{nama institusi}} pada tanggal '.$examTakenAt->translatedFormat('d F Y').' dengan hasil kualifikasi:',
            default => 'Atas keberhasilan menuntaskan seluruh rangkaian evaluasi terstandar pada mata pelajaran {{mata pelajaran}} dalam ujian "{{nama ujian}}" yang diselenggarakan oleh '.$instName.' pada tanggal '.$examTakenAt->translatedFormat('d F Y').' dengan capaian:',
        };
        $rawStatementTemplate = \App\Models\SystemSetting::get('branding.cert_statement_template');
        if ($certType !== 'standard' || trim((string) $rawStatementTemplate) === '') {
            $rawStatementTemplate = $defaultNarration;
        }

        $subjectName = $attempt->exam->subject->name ?? 'Evaluasi Ujian';
        $examTitle = $attempt->exam->title ?? 'Ujian';
        $studentName = $attempt->student->name ?? 'Peserta';
        $studentId = $attempt->student->identity_number ?? ($attempt->student->username ?? '-');
        $gradeSummary = ($letterGrade ?? '') . ' (' . ($gradePredicate ?? '') . ')';
        $issuedDateFormatted = $issuedAt->translatedFormat('d F Y');

        $statementReplacements = [
            '{{mata pelajaran}}' => '<strong>' . e($subjectName) . '</strong>',
            '{{mata_pelajaran}}' => '<strong>' . e($subjectName) . '</strong>',
            '[mata pelajaran]' => '<strong>' . e($subjectName) . '</strong>',
            '[mata_pelajaran]' => '<strong>' . e($subjectName) . '</strong>',
            '{mata_pelajaran}' => '<strong>' . e($subjectName) . '</strong>',
            '{subject}' => '<strong>' . e($subjectName) . '</strong>',

            '{{nama ujian}}' => '<strong>' . e($examTitle) . '</strong>',
            '{{nama_ujian}}' => '<strong>' . e($examTitle) . '</strong>',
            '{{judul_ujian}}' => '<strong>' . e($examTitle) . '</strong>',
            '[nama ujian]' => '<strong>' . e($examTitle) . '</strong>',
            '[nama_ujian]' => '<strong>' . e($examTitle) . '</strong>',
            '{nama_ujian}' => '<strong>' . e($examTitle) . '</strong>',
            '{exam}' => '<strong>' . e($examTitle) . '</strong>',
            '{judul_ujian}' => '<strong>' . e($examTitle) . '</strong>',

            '{{nama institusi}}' => '<strong>' . e($instName) . '</strong>',
            '{{nama_institusi}}' => '<strong>' . e($instName) . '</strong>',
            '[nama institusi]' => '<strong>' . e($instName) . '</strong>',
            '[nama_institusi]' => '<strong>' . e($instName) . '</strong>',
            '{nama_institusi}' => '<strong>' . e($instName) . '</strong>',
            '{institusi}' => '<strong>' . e($instName) . '</strong>',

            '{{nama siswa}}' => '<strong>' . e($studentName) . '</strong>',
            '{{nama_siswa}}' => '<strong>' . e($studentName) . '</strong>',
            '[nama siswa]' => '<strong>' . e($studentName) . '</strong>',
            '[nama_siswa]' => '<strong>' . e($studentName) . '</strong>',
            '{nama_siswa}' => '<strong>' . e($studentName) . '</strong>',
            '{student}' => '<strong>' . e($studentName) . '</strong>',

            '{{nim}}' => '<strong>' . e($studentId) . '</strong>',
            '{{nomor peserta}}' => '<strong>' . e($studentId) . '</strong>',
            '{{nomor_peserta}}' => '<strong>' . e($studentId) . '</strong>',
            '[nim]' => '<strong>' . e($studentId) . '</strong>',
            '[nomor peserta]' => '<strong>' . e($studentId) . '</strong>',
            '[nomor_peserta]' => '<strong>' . e($studentId) . '</strong>',
            '{nim}' => '<strong>' . e($studentId) . '</strong>',
            '{nomor_peserta}' => '<strong>' . e($studentId) . '</strong>',

            '{{nilai}}' => '<strong>' . e($formattedFinalScore) . '</strong>',
            '[nilai]' => '<strong>' . e($formattedFinalScore) . '</strong>',
            '{nilai}' => '<strong>' . e($formattedFinalScore) . '</strong>',

            '{{predikat}}' => '<strong>' . e($gradeSummary) . '</strong>',
            '[predikat]' => '<strong>' . e($gradeSummary) . '</strong>',
            '{predikat}' => '<strong>' . e($gradeSummary) . '</strong>',

            '{{tanggal}}' => '<strong>' . e($issuedDateFormatted) . '</strong>',
            '[tanggal]' => '<strong>' . e($issuedDateFormatted) . '</strong>',
            '{tanggal}' => '<strong>' . e($issuedDateFormatted) . '</strong>',
        ];

        $parsedStatement = str_ireplace(array_keys($statementReplacements), array_values($statementReplacements), e((string) $rawStatementTemplate));

        // Penandatangan (1 atau 2 Pejabat)
        $certSignerName = $doc['primary_name'] !== '' ? $doc['primary_name'] : 'Pimpinan Institusi';
        $certSignerTitle = $doc['primary_title'] !== '' ? $doc['primary_title'] : 'Direktur / Kepala Akademik';
        $certSignerNip = $doc['primary_nip'];
        $certSignerSigUrl = $doc['primary_signature_url'];

        $certSignerSecondaryName = $doc['secondary_name'];
        $certSignerSecondaryTitle = $doc['secondary_title'];
        $certSignerSecondaryNip = $doc['secondary_nip'];
        $certSignerSecondarySigUrl = $doc['secondary_signature_url'];

        $certStampUrl = $doc['stamp_url'];

        // Opsi Tampilan
        $certShowWatermark = (bool) \App\Models\SystemSetting::get('branding.cert_show_watermark', true);
        $certShowLogo = (bool) \App\Models\SystemSetting::get('branding.cert_show_logo', true);
        $certShowScore = (bool) \App\Models\SystemSetting::get('branding.cert_show_score', true);
        $certDualSignatures = (bool) ($doc['dual_signatures'] ?? true) && trim($certSignerSecondaryName) !== '';

        // Blangko Kustom A4 (Khusus Supporter License)
        $isSupporter = app(\App\Services\LicenseService::class)->isSupporter();
        $certBgSetting = $isSupporter ? \App\Models\SystemSetting::get('branding.certificate_bg') : null;
        $certBgUrl = $certBgSetting ? '/storage/' . ltrim((string) $certBgSetting, '/') : null;

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

        $certCode = $docService->formatNumber('certificate', [
            'exam_code' => $attempt->exam->code ?? 'EXAM',
            'attempt_id' => $attempt->id,
            'seq' => $attempt->id,
            'date' => $issuedAt,
        ], $institution);
        $receipt = $attempt->submission_receipt ?? (string) $attempt->id;
        $verificationQrUrl = \App\Services\QrCodeService::dataUri(route('document.verify', $receipt), 160);
        $verificationHash = substr(hash('sha256', $attempt->id . $receipt . ($attempt->submitted_at?->timestamp ?? '')), 0, 16);
        $verifyHost = parse_url(route('certificate.search'), PHP_URL_HOST) ?: request()->getHost();
    @endphp
    <link rel="icon" type="image/x-icon" href="{{ $faviconUrl }}">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        :root {
            --cert-primary: {{ $certPrimaryColor }};
            --cert-accent: {{ $certAccentColor }};
            --cert-accent-light: {{ $certAccentColor }}14;
            --cert-dark: #0f172a;
            --cert-body: #334155;
            --cert-muted: #64748b;
        }

        @page {
            size: 297mm 210mm;
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
            gap: 12px;
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

        .btn-back {
            background: #f8fafc;
            color: #334155;
            border: 1px solid #cbd5e1;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

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
            padding: 8.5mm;
            @if($certBgUrl)
                background-image: url('{{ $certBgUrl }}');
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: center;
                padding: 15mm 19mm;
            @endif
        }

        .cert-frame-outer {
            width: 100%;
            height: 100%;
            position: relative;
            @if($certBgUrl)
                border: none;
                padding: 0;
            @elseif($certType === 'competency')
                border: 4px solid var(--cert-primary);
                border-top: 8px solid var(--cert-accent);
                padding: 2mm;
            @elseif($certType === 'language_proficiency')
                border: 3px double var(--cert-primary);
                padding: 2.5mm;
            @else
                border: 3.5px solid var(--cert-primary);
                padding: 2.5mm;
            @endif
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .cert-frame-inner {
            width: 100%;
            height: 100%;
            position: relative;
            @if($certBgUrl)
                border: none;
                background: transparent;
                padding: 5mm 10mm;
            @elseif($certType === 'language_proficiency')
                border: 1.5px solid var(--cert-accent);
                background: radial-gradient(circle at top right, rgba(20, 187, 166, 0.06), transparent 45%), linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
                padding: 6mm 14mm 5mm 14mm;
            @elseif($certType === 'competency')
                border: 1px solid #cbd5e1;
                background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
                padding: 6mm 14mm 5mm 14mm;
            @else
                border: 1px solid var(--cert-accent);
                background: linear-gradient(180deg, #ffffff 0%, #fafbfc 100%);
                padding: 6mm 14mm 5mm 14mm;
            @endif
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
        }

        .cert-corner {
            position: absolute;
            width: 30px;
            height: 30px;
            pointer-events: none;
            z-index: 2;
        }
        .cert-corner-tl { top: -1px; left: -1px; }
        .cert-corner-tr { top: -1px; right: -1px; transform: scaleX(-1); }
        .cert-corner-bl { bottom: -1px; left: -1px; transform: scaleY(-1); }
        .cert-corner-br { bottom: -1px; right: -1px; transform: scale(-1, -1); }

        .cert-watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 280px;
            height: 280px;
            opacity: 0.045;
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

        .cert-content {
            position: relative;
            z-index: 3;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .cert-header {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cert-logo-wrap {
            margin-bottom: 5px;
            min-height: 44px;
            max-height: 76px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cert-logo-img {
            width: auto;
            height: auto;
            max-height: 72px;
            max-width: 400px;
            object-fit: contain;
        }

        .cert-inst-name {
            font-size: 10.5pt;
            font-weight: 700;
            color: var(--cert-primary);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin: 0;
        }

        .cert-header-line {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 260px;
            margin: 3px 0 2px 0;
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
            font-size: 22pt;
            font-weight: 800;
            color: var(--cert-primary);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin: 2px 0 1px 0;
            font-family: 'Georgia', Times, serif;
            line-height: 1.15;
        }

        .cert-subtitle {
            font-size: 9pt;
            font-weight: 700;
            color: var(--cert-accent);
            letter-spacing: 2.5px;
            text-transform: uppercase;
            margin: 0 0 4px 0;
        }

        .cert-serial-line {
            font-size: 8pt;
            color: var(--cert-muted);
            letter-spacing: 1.2px;
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

        .cert-recipient-section {
            margin: 3px 0;
        }

        .cert-award-caption {
            font-size: 10.5pt;
            font-style: italic;
            color: var(--cert-muted);
            margin: 0 0 3px 0;
            font-family: 'Georgia', Times, serif;
        }

        .cert-student-name {
            font-size: 23pt;
            font-weight: 700;
            color: var(--cert-dark);
            margin: 0;
            letter-spacing: 0.4px;
            font-family: 'Georgia', Times, serif;
            line-height: 1.15;
        }

        .cert-name-accent-line {
            width: 165px;
            height: 1.5px;
            background: var(--cert-accent);
            margin: 4px auto 4px auto;
        }

        .cert-student-id {
            font-size: 9pt;
            color: var(--cert-muted);
            font-weight: 500;
            margin-bottom: 6px;
        }

        .cert-statement {
            font-size: 10pt;
            line-height: 1.5;
            color: var(--cert-body);
            max-width: 820px;
            margin: 0 auto 8px auto;
        }

        .cert-statement strong {
            color: var(--cert-dark);
            font-weight: 700;
        }

        /* Standard & Competency Summary Card */
        .cert-credentials-card {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-top: 2.5px solid var(--cert-accent);
            border-radius: 6px;
            padding: 6px 22px;
            gap: 18px;
        }

        .cert-cred-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .cert-cred-label {
            font-size: 7pt;
            font-weight: 700;
            letter-spacing: 1.1px;
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
            font-size: 9pt;
            font-weight: 800;
            color: #059669;
            letter-spacing: 0.4px;
        }

        .cert-cred-sep {
            width: 1px;
            height: 26px;
            background: #cbd5e1;
        }

        /* Language Proficiency Section Breakdown Table */
        .lang-score-wrap {
            max-width: 700px;
            margin: 0 auto;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            overflow: hidden;
            background: #ffffff;
        }

        .lang-score-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 8.8pt;
        }

        .lang-score-table th {
            background: var(--cert-primary);
            color: #ffffff;
            padding: 4px 10px;
            font-size: 7.8pt;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            text-align: left;
        }

        .lang-score-table td {
            padding: 4px 10px;
            border-bottom: 1px solid #e2e8f0;
            color: var(--cert-dark);
        }

        .lang-score-summary-bar {
            background: #f0fdfa;
            padding: 5px 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 9pt;
            border-top: 1.5px solid var(--cert-accent);
        }

        /* Competency Seal Layout */
        .competency-panel {
            max-width: 760px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
        }

        .competency-seal {
            width: 78px;
            height: 78px;
            border-radius: 9999px;
            border: 2.5px dashed var(--cert-accent);
            background: rgba(46, 51, 255, 0.06);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: var(--cert-primary);
        }

        /* Metadata Info Strip: Tanggal Ujian, Tempat/Tanggal Terbit, Masa Berlaku */
        .cert-schedule-strip {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-top: 6px;
            font-size: 7.8pt;
            color: #475569;
        }

        /* Footer */
        .cert-footer-section {
            margin-top: 4px;
        }

        .cert-footer-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding: 0 4px;
        }

        .cert-footer-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            max-width: 310px;
        }

        .cert-security-box {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            padding: 5px 10px 5px 6px;
            border-radius: 6px;
        }

        .cert-qr-wrap {
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            padding: 2px;
        }

        .cert-qr-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .cert-security-meta {
            font-size: 7pt;
            line-height: 1.3;
            color: var(--cert-muted);
        }

        .cert-security-title {
            font-size: 7.5pt;
            font-weight: 700;
            color: var(--cert-primary);
            letter-spacing: 0.7px;
            text-transform: uppercase;
            margin-bottom: 1px;
        }

        .cert-meta-url {
            font-size: 6.8pt;
            color: var(--cert-primary);
            font-weight: 700;
            margin-top: 1px;
        }

        .cert-micro-footer {
            font-size: 6.2pt;
            color: #64748b;
            font-family: ui-monospace, SFMono-Regular, Menlo, monospace;
            margin-top: 4px;
            text-align: left;
        }

        .cert-stamp-area {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 82px;
        }

        .cert-stamp-img {
            max-height: 66px;
            max-width: 96px;
            object-fit: contain;
            transform: rotate(-6deg);
            opacity: 0.88;
        }

        .cert-signers-group {
            display: flex;
            align-items: flex-end;
            gap: 36px;
        }

        .cert-signer-col {
            width: 215px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cert-signer-date-loc {
            font-size: 7.8pt;
            color: var(--cert-body);
            margin-bottom: 1px;
            font-weight: 600;
        }

        .cert-signer-role {
            font-size: 8pt;
            font-weight: 600;
            color: var(--cert-muted);
            margin-bottom: 2px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .cert-signer-sig-box {
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 2px 0;
            width: 100%;
        }

        .cert-signature-file {
            max-height: 44px;
            max-width: 145px;
            object-fit: contain;
        }

        .cert-signer-name {
            width: 100%;
            font-size: 9.2pt;
            font-weight: 700;
            color: var(--cert-dark);
            border-top: 1.5px solid var(--cert-accent);
            padding-top: 3px;
            line-height: 1.25;
        }

        .cert-signer-id {
            font-size: 7.4pt;
            color: var(--cert-muted);
            margin-top: 1px;
            font-family: monospace, system-ui, sans-serif;
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
                justify-content: flex-start;
            }
            .cert-container {
                flex-shrink: 0;
            }
        }

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

    <div class="no-print">
        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="{{ $backUrl }}" class="btn-back">&larr; {{ $backLabel }}</a>
            <div>
                <strong style="color: #0f172a; font-size: 14px;">{{ ucwords(strtolower($certTitle)) }}</strong>
                <span style="display: block; font-size: 11px; color: #64748b;">
                    {{ $attempt->student->name }} &bull; {{ $attempt->exam->title }}
                    @if($certBgUrl)
                        &bull; <span style="color: #059669; font-weight: 700;">Menggunakan Desain Blangko A4 Institusi</span>
                    @else
                        &bull; <span style="color: #2563eb; font-weight: 600;">Template {{ $certType === 'language_proficiency' ? 'Kecakapan Bahasa' : ($certType === 'competency' ? 'Kompetensi & Profesi' : 'Akademik Standar') }}</span>
                    @endif
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

    <div class="cert-viewport-wrapper doc-viewport-container">
    <div class="cert-container">
        <div class="cert-frame-outer">
            <div class="cert-frame-inner">

                @if(! $certBgUrl)
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

                        @if(! $certBgUrl)
                            <p class="cert-inst-name">{{ $instName }}</p>
                        @endif

                        <div class="cert-header-line">
                            <span class="line"></span>
                            <span class="emblem">&diams;</span>
                            <span class="line"></span>
                        </div>

                        <h1 class="cert-title">{{ $certTitle }}</h1>
                        <p class="cert-subtitle">{{ $certSubtitle }}</p>
                        <div class="cert-serial-line">
                            <span>NOMOR:</span>
                            <span class="cert-code-tag">{{ $certCode }}</span>
                        </div>
                    </div>

                    <!-- 2. RECIPIENT & CREDENTIAL SECTION (Menyesuaikan Template Type) -->
                    <div class="cert-recipient-section">
                        <p class="cert-award-caption">Diberikan secara terhormat kepada:</p>

                        <div class="cert-student-name">{{ $attempt->student->name }}</div>
                        <div class="cert-name-accent-line"></div>

                        <div class="cert-student-id">
                            Nomor Induk / ID Peserta: <strong>{{ $attempt->student->identity_number ?? $attempt->student->username }}</strong>
                        </div>

                        <div class="cert-statement">
                            {!! $parsedStatement !!}
                        </div>

                        @if($certShowScore)
                            @if($certType === 'language_proficiency')
                                <!-- Template Bahasa: Rincian Seksi (Listening, Structure, Reading) + Total Scaled Score + CEFR -->
                                <div class="lang-score-wrap">
                                    @if(! empty($sectionScores))
                                        <table class="lang-score-table">
                                            <thead>
                                                <tr>
                                                    <th>Komponen Kemahiran Bahasa (Section)</th>
                                                    <th style="text-align: center;">Butir Benar</th>
                                                    <th style="text-align: right;">Skor Seksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sectionScores as $sec)
                                                    <tr>
                                                        <td style="text-align: left; font-weight: 600;">{{ $sec['label'] }}</td>
                                                        <td style="text-align: center; font-family: monospace;">{{ $sec['correct_count'] }} / {{ $sec['total_questions'] }}</td>
                                                        <td style="text-align: right; font-weight: 800; color: var(--cert-primary); font-family: monospace;">{{ $sec['formatted_score'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                    <div class="lang-score-summary-bar">
                                        <div>
                                            <span style="color: #475569; font-weight: 600;">Skala:</span>
                                            <strong style="color: var(--cert-primary);">{{ $scaleLabel }}</strong>
                                            <span style="margin: 0 6px; color: #94a3b8;">&bull;</span>
                                            <span style="color: #475569; font-weight: 600;">CEFR:</span>
                                            <strong>{{ $cefrLevel }}</strong>
                                        </div>
                                        <div>
                                            <span style="color: #475569; font-weight: 600; margin-right: 6px;">SKOR TOTAL:</span>
                                            <strong style="font-size: 13pt; color: var(--cert-primary); font-family: monospace;">{{ $formattedFinalScore }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @elseif($certType === 'competency')
                                <!-- Template Kompetensi & Profesi: Credential + Competency Seal -->
                                <div class="competency-panel">
                                    <div class="competency-seal">
                                        <span style="font-size: 6.5pt; font-weight: 800; letter-spacing: 0.8px;">STATUS</span>
                                        <span style="font-size: 8.5pt; font-weight: 900; color: #059669;">KOMPETEN</span>
                                    </div>
                                    <div class="cert-credentials-card" style="flex: 1;">
                                        <div class="cert-cred-col">
                                            <div class="cert-cred-label">Skema / Bidang Uji</div>
                                            <div class="cert-cred-value" style="font-size: 9.8pt;">{{ $subjectName }}</div>
                                        </div>
                                        <div class="cert-cred-sep"></div>
                                        <div class="cert-cred-col">
                                            <div class="cert-cred-label">Skor Capaian</div>
                                            <div class="cert-cred-value" style="color: var(--cert-accent);">{{ $formattedFinalScore }}</div>
                                        </div>
                                        <div class="cert-cred-sep"></div>
                                        <div class="cert-cred-col">
                                            <div class="cert-cred-label">Kualifikasi</div>
                                            <div class="cert-cred-status">{{ $letterGrade }} ({{ $gradePredicate }})</div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Template Akademik Standar -->
                                <div class="cert-credentials-card">
                                    <div class="cert-cred-col">
                                        <div class="cert-cred-label">Nilai Akhir</div>
                                        <div class="cert-cred-value">{{ $formattedFinalScore }}</div>
                                    </div>
                                    <div class="cert-cred-sep"></div>
                                    <div class="cert-cred-col">
                                        <div class="cert-cred-label">Predikat Kelulusan</div>
                                        <div class="cert-cred-value" style="font-size: 11.5pt;">PREDIKAT: {{ $letterGrade }} ({{ $gradePredicate }})</div>
                                    </div>
                                    <div class="cert-cred-sep"></div>
                                    <div class="cert-cred-col">
                                        <div class="cert-cred-label">Status Kualifikasi</div>
                                        <div class="cert-cred-status">
                                            {{ $requiresKkm ? ($isPassed ? 'LULUS (MEMENUHI KKM)' : 'BELUM TUNTAS') : 'TERSERTIFIKASI / SELESAI' }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                        <!-- Metadata Pelaksanaan Ujian, Penerbitan, dan Masa Berlaku -->
                        <div class="cert-schedule-strip">
                            <span>Tanggal Pelaksanaan Ujian: <strong>{{ $examTakenAt->translatedFormat('d F Y') }}</strong></span>
                            <span>&bull;</span>
                            <span>
                                Masa Berlaku:
                                @if($expiresAt)
                                    <strong style="color: {{ $isExpired ? '#dc2626' : '#0f172a' }};">
                                        Berlaku hingga {{ $expiresAt->translatedFormat('d F Y') }}
                                    </strong>
                                @else
                                    <strong>Berlaku Seumur Hidup</strong>
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- 4. FOOTER SECTION -->
                    <div class="cert-footer-section">
                        <div class="cert-footer-row">

                            <!-- Left: Digital Verification QR -->
                            <div class="cert-footer-left">
                                <div class="cert-security-box">
                                    <div class="cert-qr-wrap">
                                        <img src="{{ $verificationQrUrl }}" alt="QR Verifikasi Sah" class="cert-qr-img">
                                    </div>
                                    <div class="cert-security-meta">
                                        <div class="cert-security-title">VERIFIKASI DIGITAL SAH</div>
                                        <div>Resi: <strong style="color: #0f172a; font-family: monospace;">{{ $attempt->submission_receipt ?? '-' }}</strong></div>
                                        <div>Terbit: <strong style="color: #0f172a;">{{ $issuanceCity !== '' ? $issuanceCity . ', ' : '' }}{{ $issuedAt->translatedFormat('d F Y') }}</strong></div>
                                        <div>Hash: <span style="font-family: monospace;">{{ $verificationHash }}</span></div>
                                        <div class="cert-meta-url">{{ $verifyHost }}</div>
                                    </div>
                                </div>

                                <div class="cert-micro-footer">
                                    DOKUMEN INI ADALAH SERTIFIKAT ELEKTRONIK SAH YANG DITERBITKAN OLEH {{ strtoupper($instName) }}
                                </div>
                            </div>

                            <!-- Center: Stamp -->
                            <div class="cert-stamp-area">
                                @if($certStampUrl)
                                    <img src="{{ $certStampUrl }}" alt="Cap Stempel Resmi" class="cert-stamp-img">
                                @endif
                            </div>

                            <!-- Right: 1 or 2 Signers -->
                            <div class="cert-signers-group">
                                @if($certDualSignatures)
                                    <div class="cert-signer-col">
                                        <div class="cert-signer-date-loc">Mengetahui,</div>
                                        <div class="cert-signer-role">{{ $certSignerSecondaryTitle ?: 'Ketua Tim Penguji' }}</div>
                                        <div class="cert-signer-sig-box">
                                            @if($certSignerSecondarySigUrl)
                                                <img src="{{ $certSignerSecondarySigUrl }}" alt="Tanda Tangan Pejabat Kedua" class="cert-signature-file">
                                            @endif
                                        </div>
                                        <div class="cert-signer-name">{{ $certSignerSecondaryName }}</div>
                                        @if(trim($certSignerSecondaryNip) !== '')
                                            <div class="cert-signer-id">NIP. {{ $certSignerSecondaryNip }}</div>
                                        @endif
                                    </div>
                                @endif

                                <div class="cert-signer-col">
                                    <div class="cert-signer-date-loc">{{ $issuanceCity !== '' ? $issuanceCity . ', ' : '' }}{{ $issuedAt->translatedFormat('d F Y') }}</div>
                                    <div class="cert-signer-role">{{ $certSignerTitle }}</div>
                                    <div class="cert-signer-sig-box">
                                        @if($certSignerSigUrl)
                                            <img src="{{ $certSignerSigUrl }}" alt="Tanda Tangan Pejabat Utama" class="cert-signature-file">
                                        @endif
                                    </div>
                                    <div class="cert-signer-name">{{ $certSignerName }}</div>
                                    @if(trim($certSignerNip) !== '')
                                        <div class="cert-signer-id">NIP. {{ $certSignerNip }}</div>
                                    @endif
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
