<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    @php
        $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
        $logoUrl = $institution?->logo_url ?? $branding['logo_url'];
        $faviconUrl = $institution?->favicon_url ?? $branding['favicon_url'];
        $instName = $institution?->name ?? $branding['institution_name'];
        $instAddress = $institution?->address ?? $branding['institution_address'];
    @endphp
    <title>Verifikasi Keaslian Dokumen : {{ $branding['app_name'] }}</title>
    <link rel="icon" type="image/x-icon" href="{{ $faviconUrl }}">
    <style>
        @font-face {
            font-family: 'Sora';
            src: url('{{ asset('assets/fonts/sora.ttf') }}') format('truetype');
            font-display: swap;
        }
        body {
            font-family: 'Sora', sans-serif;
            background-color: #f8fafc;
            color: #14213d;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-cbt.branding-styles />
</head>
<body class="min-h-screen bg-default-50 flex flex-col justify-between p-4 sm:p-6 antialiased">
    <!-- Top Header Brand -->
    <header class="w-full max-w-4xl mx-auto py-4 flex items-center justify-between border-b border-default-200 mb-6">
        <div class="flex items-center gap-3">
            <img src="{{ $logoUrl }}" alt="{{ $instName }}" class="h-auto w-auto max-h-11 sm:max-h-12 max-w-[200px] sm:max-w-[290px] object-contain">
            <div class="hidden sm:block">
                <div class="text-xs font-bold text-default-800 uppercase tracking-tight">{{ $instName }}</div>
                <div class="text-[10px] text-default-400">Verifikasi Resmi Dokumen</div>
            </div>
        </div>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-primary text-xs font-bold border border-blue-200">
            <i data-lucide="shield-check" class="size-3.5"></i>
            Public Validator
        </span>
    </header>

    <!-- Main Verification Result Container -->
    <main class="w-full max-w-4xl mx-auto flex-1">
        @if($isValid && $attempt)
            <div class="bg-white border border-default-200/90 rounded-xl shadow-2xs overflow-hidden space-y-6">
                <!-- Status Banner: VALID -->
                <div class="p-6 sm:p-8 bg-linear-to-r from-emerald-50 via-teal-50/60 to-white border-b border-emerald-200 flex items-start sm:items-center gap-5">
                    <div class="size-14 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-md">
                        <i data-lucide="check" class="size-8"></i>
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-black text-default-900 tracking-tight">Dokumen Asli Resmi Terverifikasi</h1>
                        <p class="text-xs text-default-600 mt-1">
                            Dokumen evaluasi ini sah dan tercatat permanen pada sistem penyimpanan data primer {{ $branding['system_label'] }}.
                        </p>
                    </div>
                </div>

                <!-- Document Details Grid -->
                <div class="px-6 sm:px-8 space-y-6 pb-8">
                    <!-- Participant & Exam Info -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-5 rounded-xl bg-default-50 border border-default-200 text-xs shadow-2xs">
                        <div>
                            <span class="text-default-500 font-semibold block text-xs">Nama Peserta Ujian:</span>
                            <span class="text-default-900 font-bold text-sm block mt-0.5">{{ $attempt->student->name }}</span>
                            <span class="text-default-500 font-mono text-[11px]">NIM/NISN: {{ $attempt->student->identity_number ?? $attempt->student->username }}</span>
                        </div>
                        <div>
                            <span class="text-default-500 font-semibold block text-xs">Lembaga Penyelenggara:</span>
                            <span class="text-default-900 font-bold text-sm block mt-0.5">{{ $instName }}</span>
                            @if($instAddress)
                                <span class="text-default-500 text-[11px]">{{ $instAddress }}</span>
                            @endif
                        </div>
                        <div>
                            <span class="text-default-500 font-semibold block text-xs">Ujian &amp; Mata Pelajaran:</span>
                            <span class="text-default-900 font-bold text-xs block mt-0.5">{{ $attempt->exam->title }}</span>
                            <span class="text-default-500 text-[11px]">{{ $attempt->exam->subject->name ?? 'Evaluasi Terstandar' }} &bull; Kode: {{ $attempt->exam->code }}</span>
                        </div>
                        <div>
                            <span class="text-default-500 font-semibold block text-xs">Waktu Pengumpulan Sah:</span>
                            <span class="text-default-900 font-bold text-xs block mt-0.5">{{ $attempt->submitted_at?->translatedFormat('d F Y, H:i') ?? '-' }} WIB</span>
                            <span class="text-default-500 text-[11px]">Tipe Kumpul: {{ ucfirst($attempt->submission_type ?? 'Resmi') }}</span>
                        </div>
                    </div>

                    <!-- Scores & Achievement Result -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="p-4 sm:p-5 rounded-xl bg-white border border-default-200/90 shadow-2xs text-center">
                            <span class="text-xs font-semibold text-default-500">Nilai Akhir Ujian</span>
                            <div class="text-3xl font-black text-primary mt-1">{{ number_format($breakdown['total_score'], 1) }}</div>
                            <span class="text-[10px] text-default-500 font-medium">Skala 0 - 100</span>
                        </div>
                        <div class="p-4 sm:p-5 rounded-xl bg-white border border-default-200/90 shadow-2xs text-center">
                            <span class="text-xs font-semibold text-default-500">Predikat Nilai</span>
                            <div class="text-3xl font-black text-default-800 mt-1">{{ $letterGrade }}</div>
                            <span class="text-[10px] text-default-500 font-medium">{{ $gradePredicate }}</span>
                        </div>
                        @php
                            $isCertVerify = $attempt->exam && (!($attempt->exam->has_passing_grade ?? true) || $attempt->exam->isCertification());
                        @endphp
                        <div class="p-4 sm:p-5 rounded-xl {{ $isPassed ? 'bg-emerald-50/50 border-emerald-200' : 'bg-rose-50/50 border-rose-200' }} border shadow-2xs text-center">
                            <span class="text-xs font-semibold {{ $isPassed ? 'text-emerald-700' : 'text-rose-700' }}">Status {{ $isCertVerify ? 'Sertifikasi' : 'Kelulusan' }}</span>
                            <div class="text-lg font-black {{ $isPassed ? 'text-emerald-800' : 'text-rose-800' }} mt-1">
                                {{ $isCertVerify ? 'TERSERTIFIKASI' : ($isPassed ? 'LULUS' : 'REMEDIAL') }}
                            </div>
                            <span class="text-[10px] {{ $isPassed ? 'text-emerald-600' : 'text-rose-600' }}">
                                {{ $isCertVerify ? 'Tanpa Batas KKM' : 'KKM: ' . (float) ($attempt->exam->passing_grade ?? $breakdown['passing_grade'] ?? 75) . '%' }}
                            </span>
                        </div>
                    </div>

                    <!-- Cryptographic Proof Box -->
                    <div class="p-4 rounded-xl bg-secondary text-slate-100 font-mono text-xs space-y-2 border border-secondary-800 shadow-2xs">
                        <div class="flex items-center justify-between text-default-400 text-[10px] uppercase font-bold border-b border-secondary-800 pb-2">
                            <span>Integritas Kriptografis (SHA-256)</span>
                            <span class="text-emerald-400">Database Record Match</span>
                        </div>
                        <div class="break-all">
                            <span class="text-default-500">Receipt Token :</span> <span class="text-amber-300 font-bold">{{ $attempt->submission_receipt }}</span>
                        </div>
                        <div class="break-all">
                            <span class="text-default-500">Attempt ID    :</span> #{{ $attempt->id }}
                        </div>
                        <div class="break-all">
                            <span class="text-default-500">Verification Hash :</span> <span class="text-emerald-400">{{ $verificationHash }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons Bar -->
                    <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2.5 pt-2 border-t border-default-200">
                        <a href="{{ route('certificate.search') }}" class="px-4 py-2.5 bg-default-100 hover:bg-default-200 text-default-700 rounded-lg font-semibold text-xs transition inline-flex items-center justify-center gap-1.5 cursor-pointer">
                            <i data-lucide="search" class="size-3.5"></i>
                            <span>Cari Dokumen Lain</span>
                        </a>
                        @if($isPassed)
                            <a href="{{ route('document.certificate', $token) }}" target="_blank" rel="noopener noreferrer" class="px-5 py-2.5 bg-primary hover:bg-primary-hover text-white rounded-lg font-bold text-xs shadow-xs transition inline-flex items-center justify-center gap-1.5 cursor-pointer">
                                <i data-lucide="printer" class="size-4"></i>
                                <span>Cetak Sertifikat A4</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <!-- Status Banner: INVALID -->
            <div class="bg-white border border-default-200/90 rounded-xl shadow-2xs overflow-hidden space-y-6">
                <div class="p-6 sm:p-8 bg-linear-to-r from-rose-50 via-red-50/60 to-white border-b border-rose-100 flex items-start sm:items-center gap-4">
                    <div class="size-14 rounded-xl bg-rose-600 text-white flex items-center justify-center shrink-0 shadow-md">
                        <i data-lucide="x" class="size-8"></i>
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-black text-default-900 tracking-tight">Dokumen Tidak Ditemukan atau Tidak Valid</h1>
                        <p class="text-xs text-default-600 mt-1">
                            Token atau kode verifikasi resi yang Anda periksa tidak terdaftar pada basis data resmi sistem {{ $branding['system_label'] }}.
                        </p>
                    </div>
                </div>

                <div class="px-6 sm:px-8 space-y-6 pb-8">
                    <div class="p-4 rounded-xl bg-default-50 border border-default-200 text-xs font-mono">
                        <span class="text-default-400">Token Diperiksa:</span> <span class="text-rose-600 font-bold">{{ $token }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-800 leading-relaxed">
                        <strong>Pemberitahuan Keamanan:</strong> Pastikan Anda memindai kode QR resmi yang tercetak langsung pada lembar dokumen asli (SKHU, Tanda Terima, atau Sertifikat). Jika Anda menduga terdapat pemalsuan, hubungi bagian administrasi akademik.
                    </div>

                    <div class="pt-2 border-t border-default-200 flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-2.5">
                        <a href="{{ route('certificate.search') }}" class="px-4 py-2.5 bg-primary hover:bg-primary-hover text-white rounded-lg font-bold text-xs shadow-xs transition inline-flex items-center justify-center gap-1.5 cursor-pointer">
                            <i data-lucide="search" class="size-4"></i>
                            <span>Cari Dokumen Lain</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="w-full max-w-4xl mx-auto py-6 text-center text-xs text-default-400">
        @if($branding['is_white_label'])
            &copy; {{ date('Y') }} {{ $instName }}
        @else
            &copy; {{ date('Y') }} {{ $instName }} &bull; Didukung oleh Sistem CBT TESLOKA
        @endif
    </footer>
</body>
</html>

