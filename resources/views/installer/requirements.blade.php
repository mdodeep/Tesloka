@extends('installer.layout')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h1 style="font-size: 1.375rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.375rem; letter-spacing: -0.01em;">
            Pemeriksaan Kesiapan Server
        </h1>
        <p style="color: var(--color-muted); font-size: 0.875rem; line-height: 1.5;">
            Sistem memverifikasi versi PHP, ekstensi wajib, dan izin baca-tulis folder untuk memastikan TESLOKA CBT berjalan dengan performa maksimal dan stabil.
        </p>
    </div>

    @if (! $requirements['all_passed'])
        <div class="alert alert-danger">
            Terdapat beberapa persyaratan sistem yang belum terpenuhi. Harap lengkapi atau ubah hak akses direktori sebelum melanjutkan pemasangan.
        </div>
    @else
        <div class="alert alert-success">
            Seluruh persyaratan lingkungan server telah memenuhi standar teknis TESLOKA CBT. Anda siap melanjutkan konfigurasi basis data.
        </div>
    @endif

    <!-- Versi PHP -->
    <div style="margin-bottom: 1.5rem;">
        <h2 style="font-size: 0.9375rem; font-weight: 600; margin-bottom: 0.625rem; color: var(--color-dark);">
            1. Lingkungan Runtime PHP
        </h2>
        <div class="table-responsive">
            <table class="status-table">
                <thead>
                    <tr>
                        <th>Komponen</th>
                        <th>Standar Minimum</th>
                        <th>Status Aktual</th>
                        <th style="text-align: right;">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>{{ $requirements['php']['name'] }}</strong></td>
                        <td style="color: var(--color-muted);">{{ $requirements['php']['required'] }}</td>
                        <td>{{ $requirements['php']['current'] }}</td>
                        <td style="text-align: right;">
                            @if ($requirements['php']['passed'])
                                <span class="badge badge-success">MEMENUHI</span>
                            @else
                                <span class="badge badge-danger">TIDAK MEMENUHI</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Ekstensi PHP -->
    <div style="margin-bottom: 1.5rem;">
        <h2 style="font-size: 0.9375rem; font-weight: 600; margin-bottom: 0.625rem; color: var(--color-dark);">
            2. Ekstensi PHP yang Dibutuhkan
        </h2>
        <div class="table-responsive">
            <table class="status-table">
                <thead>
                    <tr>
                        <th>Nama Ekstensi</th>
                        <th>Fungsi Sistem</th>
                        <th style="text-align: right;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requirements['extensions'] as $ext)
                        <tr>
                            <td><code>{{ $ext['name'] }}</code></td>
                            <td style="color: var(--color-muted);">{{ $ext['label'] }}</td>
                            <td style="text-align: right;">
                                @if ($ext['passed'])
                                    <span class="badge badge-success">AKTIF</span>
                                @else
                                    @if (!empty($ext['critical']))
                                        <span class="badge badge-danger">BELUM TERPASANG</span>
                                    @else
                                        <span class="badge badge-warning">OPSIONAL</span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Hak Akses Direktori -->
    <div style="margin-bottom: 1.5rem;">
        <h2 style="font-size: 0.9375rem; font-weight: 600; margin-bottom: 0.625rem; color: var(--color-dark);">
            3. Izin Tulis Direktori Penyimpanan
        </h2>
        <div class="table-responsive">
            <table class="status-table">
                <thead>
                    <tr>
                        <th>Jalur Direktori</th>
                        <th>Izin yang Dibutuhkan</th>
                        <th style="text-align: right;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requirements['directories'] as $dir)
                        <tr>
                            <td><code>{{ $dir['path'] }}</code></td>
                            <td style="color: var(--color-muted);">Writable (0775 / www-data)</td>
                            <td style="text-align: right;">
                                @if ($dir['passed'])
                                    <span class="badge badge-success">TERSEDIA</span>
                                @else
                                    <span class="badge badge-danger">DITOLAK</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="btn-row">
        <a href="{{ route('installer.index') }}" class="btn btn-secondary">
            Periksa Ulang
        </a>

        @if ($requirements['all_passed'])
            <a href="{{ route('installer.database') }}" class="btn btn-primary">
                <span>Lanjutkan ke Konfigurasi Basis Data</span>
                <span>&rarr;</span>
            </a>
        @else
            <button type="button" class="btn btn-primary btn-disabled" disabled>
                Selesaikan Persyaratan Dahulu
            </button>
        @endif
    </div>
@endsection
