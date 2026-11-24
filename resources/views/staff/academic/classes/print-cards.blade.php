<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Peserta Ujian Rombel - Kelas {{ $class->name }} ({{ $class->code }})</title>
    @php
        $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
        $inst = $institution ?? \App\Models\Institution::first();
        $logoUrl = $inst?->logo_url ?: $branding['logo_url'];
        $instName = $inst?->name ?: $branding['institution_name'];
        $isPdfMode = (bool) ($isPdf ?? false);
        $scheme = request()->getScheme() ?: 'https';
        $studentHost = config('cbt.student_domain', 'ujian.tesloka.test');
        $showUsername = (bool) ($showUsername ?? true);
        $showPassword = (bool) ($showPassword ?? false);
        $passwordFallback = (string) ($passwordFallback ?? 'Sesuai akun / Hubungi panitia');
        $pdfParams = [
            'show_username' => $showUsername ? '1' : '0',
            'show_password' => $showPassword ? '1' : '0',
        ];
    @endphp
    <style>
        @if(! $isPdfMode)
        @font-face {
            font-family: 'Sora';
            src: url('/assets/fonts/sora.ttf') format('truetype');
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }
        @endif
        *, *::before, *::after {
            box-sizing: border-box;
        }
        @page {
            size: A4 portrait;
            margin: 10mm;
        }
        body {
            @if($isPdfMode)
                font-family: Helvetica, Arial, sans-serif;
                background: #ffffff;
            @else
                font-family: 'Sora', system-ui, -apple-system, sans-serif;
                background: #f8fafc;
            @endif
            color: #14213d;
            margin: 0;
            padding: 0;
            font-size: 8pt;
            line-height: 1.25;
        }
        .no-print {
            background: #ffffff;
            padding: 12px 20px;
            border-bottom: 1px solid #cbd5e1;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            position: sticky;
            top: 0;
            z-index: 40;
        }
        .toolbar-controls {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
        }
        .toggle-form {
            display: inline-flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            padding: 6px 10px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 12px;
            color: #334155;
        }
        .toggle-label {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            font-weight: 600;
            user-select: none;
        }
        .btn-print {
            background: #2e33ff;
            color: #ffffff;
            border: none;
            padding: 8px 18px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            font-family: inherit;
        }
        .btn-print:hover {
            background: #1e24cc;
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
            padding: {{ $isPdfMode ? '0' : '16px 8px 28px' }};
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
        }
        .document-wrapper {
            width: {{ $isPdfMode ? '100%' : '210mm' }};
            min-height: {{ $isPdfMode ? 'auto' : '297mm' }};
            background: #ffffff;
            padding: {{ $isPdfMode ? '0' : '10mm' }};
            box-shadow: {{ $isPdfMode ? 'none' : '0 4px 12px rgb(15 23 42 / 0.08)' }};
            flex-shrink: 0;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 85.6mm);
            justify-content: center;
            column-gap: 10mm;
            row-gap: 9mm;
        }
        .pdf-grid-table {
            width: 181.2mm;
            margin: 0 auto;
            border-collapse: separate;
            border-spacing: 5mm 6mm;
        }
        .pdf-grid-td {
            width: 85.6mm;
            vertical-align: top;
        }
        /* Standar ukuran Kartu KTP / ISO IEC 7810 ID-1 (85.6mm x 54mm) dengan jarak internal lega */
        .card {
            width: 85.6mm;
            min-height: 54mm;
            border: 1px dashed #334155;
            border-radius: 3mm;
            padding: 2.8mm 3.4mm;
            background: #ffffff;
            page-break-inside: avoid;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }
        .header {
            border-bottom: 1px solid #14213d;
            padding-bottom: 1.6mm;
            margin-bottom: 2mm;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2.2mm;
            flex-shrink: 0;
        }
        .header-brand {
            display: flex;
            align-items: center;
            gap: 2mm;
            min-width: 0;
        }
        .card-logo {
            max-height: 4.8mm;
            max-width: 14mm;
            width: auto;
            height: auto;
            object-fit: contain;
            flex-shrink: 0;
        }
        .title {
            font-size: 7.3pt;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.2px;
            color: #14213d;
            line-height: 1.15;
            white-space: nowrap;
        }
        .subtitle {
            font-size: 5.7pt;
            color: #64728b;
            text-transform: uppercase;
            line-height: 1.2;
        }
        .year-badge {
            background: #14213d;
            color: #ffffff;
            padding: 1.5px 5.5px;
            border-radius: 3px;
            font-size: 6.4pt;
            font-weight: 700;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .content-body {
            display: flex;
            gap: 2.8mm;
            align-items: flex-start;
            flex: 1;
            min-height: 0;
        }
        .photo-box {
            width: 14.5mm;
            height: 19.3mm;
            border: 1px solid #cbd5e1;
            border-radius: 2.5px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            color: #94a3b8;
            font-size: 5.6pt;
            overflow: hidden;
            flex-shrink: 0;
            text-align: center;
        }
        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 6.1pt;
            line-height: 1.28;
            table-layout: fixed;
        }
        .meta-table td {
            padding: 1.1px 0;
            vertical-align: top;
        }
        .meta-table td.label {
            color: #64728b;
            width: 14.8mm;
            white-space: nowrap;
        }
        .meta-table td.colon {
            width: 2.4mm;
            text-align: center;
            color: #64728b;
        }
        .meta-table td.val {
            font-weight: 600;
            color: #14213d;
            overflow-wrap: break-word;
            word-break: break-word;
        }
        .footer-note {
            font-size: 5.7pt;
            color: #64728b;
            border-top: 0.75px dashed #cbd5e1;
            padding-top: 1.6mm;
            margin-top: 1.8mm;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2.2mm;
            flex-shrink: 0;
        }
        .rules-note {
            font-size: 5.8pt;
            color: #334155;
            line-height: 1.32;
            overflow-wrap: break-word;
            word-break: break-word;
        }
        .qr-box {
            width: 8.5mm;
            height: 8.5mm;
            border: 0.75px solid #cbd5e1;
            border-radius: 2.5px;
            padding: 1px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .qr-box svg, .qr-box img {
            width: 100%;
            height: 100%;
            display: block;
        }
        .page-break {
            page-break-after: always;
            break-after: page;
        }
        @media screen and (max-width: 820px) {
            .no-print {
                padding: 10px 14px;
                flex-direction: column;
                align-items: stretch;
                gap: 8px;
            }
            .no-print-actions {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
            }
            .btn-print, .btn-close {
                flex: 1;
                justify-content: center;
                text-align: center;
            }
            .doc-viewport-container {
                align-items: flex-start;
                padding: 8px 4px;
            }
        }
        @media print {
            body {
                background: #ffffff !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            .no-print {
                display: none !important;
            }
            .doc-viewport-container {
                padding: 0 !important;
                display: block !important;
                overflow: visible !important;
            }
            .document-wrapper {
                box-shadow: none !important;
                padding: 0 !important;
                width: 100% !important;
                min-height: auto !important;
                margin: 0 !important;
            }
            .grid-container {
                grid-template-columns: repeat(2, 85.6mm) !important;
                justify-content: center !important;
                column-gap: 10mm !important;
                row-gap: 9mm !important;
            }
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
    @if(! $isPdfMode)
        @vite(['resources/js/app.js'])
    @endif
</head>
<body>

    @if(! $isPdfMode)
        <div class="no-print">
            <div>
                <strong>Kartu Peserta Rombel (Ujian Berkelanjutan / Multi-Sesi)</strong> &bull; Kelas: {{ $class->name }} ({{ $class->department->name ?? 'Reguler' }}) &bull; Total: {{ $students->count() }} Peserta Didik
            </div>
            <div class="toolbar-controls">
                <form method="GET" action="{{ route('staff.academic.classes.print-cards', $class) }}" class="toggle-form">
                    <label class="toggle-label">
                        <input type="hidden" name="show_username" value="0">
                        <input type="checkbox" name="show_username" value="1" {{ $showUsername ? 'checked' : '' }} onchange="this.form.submit()">
                        <span>Tampilkan Username</span>
                    </label>
                    <label class="toggle-label">
                        <input type="hidden" name="show_password" value="0">
                        <input type="checkbox" name="show_password" value="1" {{ $showPassword ? 'checked' : '' }} onchange="this.form.submit()">
                        <span>Tampilkan Password</span>
                    </label>
                </form>
                <div class="no-print-actions" style="display: flex; gap: 8px;">
                    <button onclick="window.print()" class="btn-print">
                        <i data-lucide="printer" style="width: 15px; height: 15px;"></i>
                        <span>Cetak Kartu (A4)</span>
                    </button>
                    <a href="{{ route('staff.academic.classes.pdf.cards', ['class' => $class] + $pdfParams) }}" class="btn-print" style="background: #14213d;">
                        <i data-lucide="download" style="width: 15px; height: 15px;"></i>
                        <span>Unduh PDF Asli</span>
                    </a>
                    <a href="{{ route('staff.academic.index') }}#classes" class="btn-close">Kembali</a>
                </div>
            </div>
        </div>
    @endif

    <div class="doc-viewport-container">
        @php
            $studentChunks = $students->chunk(8);
        @endphp

        @forelse($studentChunks as $chunk)
            <div class="document-wrapper {{ ! $loop->last ? 'page-break' : '' }}">
                @if($isPdfMode)
                    <table class="pdf-grid-table">
                        @foreach($chunk->chunk(2) as $row)
                            <tr>
                                @foreach($row as $student)
                                    @php
                                        $cardIdent = $student->identity_number ?? $student->username;
                                        $cardPasswordText = $showPassword ? ($student->getExamCardPassword() ?? $passwordFallback) : null;
                                        $cardQrUrl = $scheme . '://' . $studentHost . '/ujian/login?u=' . urlencode($cardIdent);
                                        $photoAbsPath = $student->photo_path ? storage_path('app/public/' . ltrim((string) $student->photo_path, '/')) : null;
                                    @endphp
                                    <td class="pdf-grid-td">
                                        <div class="card">
                                            <div class="header">
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <div class="title">KARTU PESERTA UJIAN</div>
                                                            <div class="subtitle">{{ $instName }}</div>
                                                        </td>
                                                        <td style="text-align: right; vertical-align: middle;">
                                                            <span class="year-badge">{{ $class->academicYear->name ?? date('Y') }}</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <table style="width: 100%; border-collapse: collapse;">
                                                <tr>
                                                    <td style="width: 17mm; vertical-align: top;">
                                                        <div class="photo-box">
                                                            @if($photoAbsPath && file_exists($photoAbsPath))
                                                                <img src="{{ $photoAbsPath }}" alt="{{ $student->name }}">
                                                            @else
                                                                FOTO<br>3 x 4
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td style="vertical-align: top;">
                                                        <table class="meta-table">
                                                            <tr><td class="label">Nama</td><td class="colon">:</td><td class="val">{{ $student->name }}</td></tr>
                                                            <tr><td class="label">NIM / NISN</td><td class="colon">:</td><td class="val" style="font-family: monospace;">{{ $cardIdent }}</td></tr>
                                                            <tr><td class="label">Kelas</td><td class="colon">:</td><td class="val">{{ $class->name }}</td></tr>
                                                            <tr><td class="label">Jurusan</td><td class="colon">:</td><td class="val">{{ $class->department->name ?? 'Reguler' }}</td></tr>
                                                            <tr><td class="label">Berlaku</td><td class="colon">:</td><td class="val">Periode {{ $class->academicYear->name ?? date('Y') }}</td></tr>
                                                            <tr><td class="label">Status</td><td class="colon">:</td><td class="val" style="color: #059669;">{{ ucfirst($student->status) }}</td></tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="width: 100%; border-collapse: collapse; border-top: 0.75px dashed #cbd5e1; margin-top: 1.6mm; padding-top: 1.5mm;">
                                                <tr>
                                                    <td style="vertical-align: middle;" class="rules-note">
                                                        @if($showUsername)
                                                            <div>Username: <strong style="font-family: monospace; color: #2e33ff;">{{ $student->username }}</strong></div>
                                                        @endif
                                                        @if($showPassword)
                                                            <div>Password: <strong style="font-family: monospace; color: #14213d;">{{ $cardPasswordText }}</strong></div>
                                                        @endif
                                                        @if(! $showUsername && ! $showPassword)
                                                            <div>Portal: <strong>{{ $studentHost }}</strong></div>
                                                        @endif
                                                        <div style="color: #64728b;">Portal peserta: {{ $studentHost }}</div>
                                                    </td>
                                                    <td style="width: 10mm; text-align: right; vertical-align: middle;">
                                                        <div class="qr-box">
                                                            <img src="{{ \App\Services\QrCodeService::dataUri($cardQrUrl, 32) }}" alt="QR">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                @endforeach
                                @if($row->count() === 1)
                                    <td class="pdf-grid-td"></td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="grid-container">
                        @foreach($chunk as $student)
                            @php
                                $cardIdent = $student->identity_number ?? $student->username;
                                $cardPasswordText = $showPassword ? ($student->getExamCardPassword() ?? $passwordFallback) : null;
                                $cardQrUrl = $scheme . '://' . $studentHost . '/ujian/login?u=' . urlencode($cardIdent);
                            @endphp
                            <div class="card">
                                <div class="header">
                                    <div class="header-brand">
                                        <img src="{{ $logoUrl }}" alt="Logo" class="card-logo">
                                        <div style="min-width: 0;">
                                            <div class="title">KARTU PESERTA UJIAN</div>
                                            <div class="subtitle">{{ $instName }}</div>
                                        </div>
                                    </div>
                                    <div class="year-badge">
                                        {{ $class->academicYear->name ?? date('Y') }}
                                    </div>
                                </div>

                                <div class="content-body">
                                    <div class="photo-box">
                                        @if($student->photo_path)
                                            <img src="{{ '/storage/' . ltrim((string) $student->photo_path, '/') }}" alt="{{ $student->name }}">
                                        @else
                                            <span style="line-height: 1.2;">FOTO<br>3 x 4</span>
                                        @endif
                                    </div>
                                    <table class="meta-table">
                                        <tr>
                                            <td class="label">Nama</td>
                                            <td class="colon">:</td>
                                            <td class="val">{{ $student->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="label">NIM / NISN</td>
                                            <td class="colon">:</td>
                                            <td class="val" style="font-family: monospace;">{{ $cardIdent }}</td>
                                        </tr>
                                        <tr>
                                            <td class="label">Kelas</td>
                                            <td class="colon">:</td>
                                            <td class="val">{{ $class->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="label">Jurusan</td>
                                            <td class="colon">:</td>
                                            <td class="val">{{ $class->department->name ?? 'Reguler' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="label">Berlaku</td>
                                            <td class="colon">:</td>
                                            <td class="val">Periode {{ $class->academicYear->name ?? date('Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="label">Status</td>
                                            <td class="colon">:</td>
                                            <td class="val" style="color: #059669;">{{ ucfirst($student->status) }}</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="footer-note">
                                    <div class="rules-note">
                                        @if($showUsername)
                                            <div>Username: <strong style="font-family: monospace; color: #2e33ff;">{{ $student->username }}</strong></div>
                                        @endif
                                        @if($showPassword)
                                            <div>Password: <strong style="font-family: monospace; color: #14213d;">{{ $cardPasswordText }}</strong></div>
                                        @endif
                                        @if(! $showUsername && ! $showPassword)
                                            <div>Portal: <strong>{{ $studentHost }}</strong></div>
                                        @endif
                                        <div style="color: #64728b;">Portal peserta: <strong>{{ $studentHost }}</strong></div>
                                    </div>
                                    <div class="qr-box" title="Scan QR Verifikasi &amp; Login: {{ $cardIdent }}">
                                        {!! \App\Services\QrCodeService::svg($cardQrUrl, 32) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @empty
            <div class="document-wrapper" style="display: flex; align-items: center; justify-content: center; text-align: center;">
                <div>
                    <h3 style="color: #64748b;">Belum ada peserta didik terdaftar pada kelas {{ $class->name }}.</h3>
                    <p style="color: #94a3b8; font-size: 11px;">Silakan daftarkan atau impor peserta didik ke kelas ini terlebih dahulu.</p>
                </div>
            </div>
        @endforelse
    </div>

</body>
</html>
