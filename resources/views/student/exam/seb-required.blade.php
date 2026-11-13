@extends('layouts.student')

@section('title', 'Safe Exam Browser Diwajibkan - ' . $exam->title)

@section('content')
<div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white border border-default-200 rounded-md shadow-sm p-8 text-center">
        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-md flex items-center justify-center mx-auto mb-6">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
        </div>

        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200 mb-3">
            Proteksi Integritas Desktop
        </span>

        <h1 class="text-2xl font-bold text-default-900 tracking-tight mb-2">Safe Exam Browser (SEB) Diwajibkan</h1>
        <p class="text-default-600 text-sm max-w-lg mx-auto mb-8">
            Ujian <strong>{{ $exam->title }}</strong> ({{ $exam->code }}) memerlukan lingkungan peramban terkunci resmi untuk mencegah kecurangan dan menjaga keadilan ujian.
        </p>

        <div class="bg-default-50 border border-default-200 rounded p-6 text-left mb-8 max-w-xl mx-auto space-y-4">
            <h3 class="text-xs font-bold text-default-700 uppercase tracking-wider">Petunjuk Membuka Ujian:</h3>
            <ol class="list-decimal list-inside text-sm text-default-700 space-y-2">
                <li>Pastikan aplikasi <strong>Safe Exam Browser (v3.0+)</strong> telah terpasang di komputer/laptop Anda.</li>
                <li>Unduh berkas konfigurasi ujian resmi (<strong>.seb</strong>) melalui tombol biru di bawah.</li>
                <li>Klik dua kali (buka) berkas <strong>.seb</strong> tersebut. Safe Exam Browser akan otomatis terbuka dan mengunci layar ujian.</li>
                <li>Masukkan sandi keluar ujian pengawas jika diperlukan setelah menyelesaikan ujian.</li>
            </ol>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ $downloadUrl }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded bg-primary hover:bg-primary-hover text-white font-medium text-sm transition shadow-sm cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <span>Unduh Berkas Konfigurasi (.seb)</span>
            </a>
            <a href="{{ route('student.dashboard') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded bg-default-100 hover:bg-slate-200 text-default-700 font-medium text-sm transition">
                <span>Kembali ke Dashboard</span>
            </a>
        </div>
    </div>
</div>
@endsection

