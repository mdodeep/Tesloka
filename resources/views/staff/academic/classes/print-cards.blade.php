<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Peserta Ujian - Kelas {{ $class->name }} ({{ $class->code }})</title>
    @php
        $inst = $institution ?? \App\Models\Institution::first();
        $logoUrl = $inst?->logo_url ?? asset('assets/images/logo-tesloka-cbt.webp');
        $instName = $inst?->name ?? config('app.name', 'TESLOKA CBT');
    @endphp
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        @page {
            size: A4 portrait;
            margin: 10mm;
        }
        body {
            font-family: Arial, sans-serif;
            color: #1e293b;
            background: #f8fafc;
            margin: 0;
            padding: 0;
            font-size: 11px;
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
            margin-bottom: 15px;
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
            padding: 12px 6px;
            display: flex;
            justify-content: center;
        }
        .document-wrapper {
            width: 210mm;
            min-height: 297mm;
            background: #ffffff;
            box-sizing: border-box;
            padding: 10mm;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8mm;
        }
        .card {
            border: 1.5px dashed #475569;
            border-radius: 6px;
            padding: 12px;
            box-sizing: border-box;
            background: #fff;
            page-break-inside: avoid;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 125mm;
        }
        .header {
            border-bottom: 2px solid #0f172a;
            padding-bottom: 6px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }
        .header-brand {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .card-logo {
            max-height: 28px;
            max-width: 64px;
            width: auto;
            height: auto;
            object-fit: contain;
        }
        .title {
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #0f172a;
        }
        .subtitle {
            font-size: 9px;
            color: #475569;
            text-transform: uppercase;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10.5px;
            margin-bottom: 8px;
        }
        .meta-table td {
            padding: 2.5px 0;
            vertical-align: top;
        }
        .label {
            color: #64748b;
            width: 95px;
        }
        .val {
            font-weight: 600;
            color: #0f172a;
        }
        .photo-box {
            width: 24mm;
            height: 32mm;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            color: #94a3b8;
            font-size: 9px;
            overflow: hidden;
            flex-shrink: 0;
        }
        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .content-body {
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }
        .footer-note {
            font-size: 8.5px;
            color: #64748b;
            border-top: 1px dotted #cbd5e1;
            padding-top: 6px;
            margin-top: 6px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .rules-note {
            font-size: 8px;
            color: #475569;
            line-height: 1.3;
            max-width: 65%;
        }
        .qr-placeholder {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .qr-box {
            width: 48px;
            height: 48px;
            border: 1px solid #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: monospace;
            font-size: 7px;
            background: #0f172a;
            color: #fff;
            padding: 2px;
            border-radius: 2px;
        }
        .page-break {
            page-break-after: always;
            break-after: page;
        }
        @media print {
            body {
                background: #ffffff;
            }
            .no-print {
                display: none !important;
            }
            .doc-viewport-container {
            box-sizing: border-box;
                padding: 0;
            }
            .document-wrapper {
                box-shadow: none;
                padding: 0;
                width: 100%;
            }
            .card {
                border: 1.5px dashed #000;
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
            <strong>Kartu Peserta Ujian Massal</strong> — Kelas: {{ $class->name }} ({{ $class->department->name ?? 'Reguler' }}) • Total: {{ $students->count() }} Peserta Didik
        </div>
        <div style="display: flex; gap: 8px;">
            <button onclick="window.print()" class="btn-print">
                <i data-lucide="printer" style="width: 16px; height: 16px;"></i>
                <span>Cetak Kartu (A4)</span>
            </button>
            <a href="{{ route('staff.academic.classes.pdf.cards', $class) }}" class="btn-print" style="background: #0f172a;">
                <i data-lucide="download" style="width: 16px; height: 16px;"></i>
                <span>Unduh PDF Asli</span>
            </a>
            <a href="{{ route('staff.academic.index') }}#classes" class="btn-close">Kembali</a>
        </div>
    </div>

    <div class="doc-viewport-container">
        @php
            $studentChunks = $students->chunk(4);
        @endphp

        <div class="space-y-4">
            @forelse($studentChunks as $pageIndex => $chunk)
                <div class="document-wrapper {{ ! $loop->last ? 'page-break' : '' }}">
                    <div class="grid-container">
                        @foreach($chunk as $student)
                            <div class="card">
                                <div>
                                    <div class="header">
                                        <div class="header-brand">
                                            <img src="{{ $logoUrl }}" alt="Logo" class="card-logo">
                                            <div>
                                                <div class="title">KARTU PESERTA UJIAN (CBT)</div>
                                                <div class="subtitle">{{ $instName }}</div>
                                            </div>
                                        </div>
                                        <div style="font-size: 8px; font-weight: bold; color: #475569; text-align: right;">
                                            {{ $class->academicYear->name ?? date('Y') }}
                                        </div>
                                    </div>

                                    <div class="content-body">
                                        <div class="photo-box">
                                            @if($student->photo_path)
                                                <img src="{{ asset('storage/' . $student->photo_path) }}" alt="{{ $student->name }}">
                                            @else
                                                <span style="text-align: center; line-height: 1.2;">FOTO<br>3 x 4</span>
                                            @endif
                                        </div>
                                        <table class="meta-table">
                                            <tr>
                                                <td class="label">Nama Lengkap</td>
                                                <td>:</td>
                                                <td class="val">{{ Str::limit($student->name, 22) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="label">NISN / Nomor Induk</td>
                                                <td>:</td>
                                                <td class="val">{{ $student->identity_number ?? $student->username }}</td>
                                            </tr>
                                            <tr>
                                                <td class="label">Kelas / Rombel</td>
                                                <td>:</td>
                                                <td class="val">{{ $class->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="label">Jurusan / Peminatan</td>
                                                <td>:</td>
                                                <td class="val">{{ $class->department->name ?? 'Reguler' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="label">Username Login</td>
                                                <td>:</td>
                                                <td class="val" style="font-family: monospace; color: #2e33ff;">{{ $student->username }}</td>
                                            </tr>
                                            <tr>
                                                <td class="label">Status Akun</td>
                                                <td>:</td>
                                                <td class="val" style="color: #059669;">{{ ucfirst($student->status) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="footer-note">
                                    <div class="rules-note">
                                        * Wajib dibawa saat pelaksanaan ujian.<br>
                                        * Login pada portal peserta: https://ujian.tesloka.test<br>
                                        * Jagalah kerahasiaan akun login Anda.
                                    </div>
                                    <div class="qr-placeholder">
                                        <div class="qr-box">
                                            <span>VERIFIED<br>CBT</span>
                                        </div>
                                        <span style="font-size: 7px; color: #94a3b8; margin-top: 2px;">{{ substr(md5($student->id . $class->id), 0, 8) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
    </div>

</body>
</html>

