@extends('layouts.staff')

@section('title', 'Jadwalkan Sesi Ujian Baru — TESLOKA CBT')
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', 'Jadwalkan Sesi Baru')
@section('page-subtitle', 'Pilih ujian, tentukan ruang ujian sesuai batasan kapasitas DEC-001, dan jadwalkan rentang waktu pelaksanaan.')

@section('page-actions')
    <a href="{{ route('staff.sessions.index') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        <span>Kembali ke Sesi</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    @if($errors->any())
        <x-cbt.alert type="danger" dismissible="true">
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </x-cbt.alert>
    @endif

    <div class="max-w-2xl">
        <x-cbt.card title="Formulir Penjadwalan Sesi">
            <form action="{{ route('staff.sessions.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Ujian Terkait *</label>
                    <select name="exam_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                        <option value="">-- Pilih Ujian --</option>
                        @foreach($exams as $ex)
                            <option value="{{ $ex->id }}" {{ (old('exam_id') == $ex->id || $selectedExamId == $ex->id) ? 'selected' : '' }}>
                                {{ $ex->title }} ({{ $ex->code }}) - Durasi {{ $ex->duration_minutes }} menit
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Ruang Ujian *</label>
                    <select name="exam_room_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                        <option value="">-- Pilih Ruang Ujian --</option>
                        @foreach($rooms as $rm)
                            <option value="{{ $rm->id }}" {{ old('exam_room_id') == $rm->id ? 'selected' : '' }}>
                                {{ $rm->name }} ({{ $rm->code }}) &bull; Kapasitas {{ $rm->capacity }} Peserta &bull; {{ $rm->location ?? 'Gedung Utama' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nama / Keterangan Sesi *</label>
                    <input type="text" name="name" value="{{ old('name', 'Sesi 1') }}" placeholder="Contoh: Sesi 1 (Pagi) / Shift 1" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Waktu Mulai Sesi *</label>
                        <input type="datetime-local" name="start_time" value="{{ old('start_time', now()->addHour()->format('Y-m-d\TH:00')) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Waktu Selesai Sesi *</label>
                        <input type="datetime-local" name="end_time" value="{{ old('end_time', now()->addHours(3)->format('Y-m-d\TH:00')) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Kode Sesi (Opsional)</label>
                    <input type="text" name="session_code" value="{{ old('session_code') }}" placeholder="Otomatis jika kosong (cth: SES-AB12CD)" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-mono">
                </div>

                <div class="pt-4 flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 border-t border-default-100">
                    <a href="{{ route('staff.sessions.index') }}" class="w-full sm:w-auto px-4 py-2.5 bg-white hover:bg-default-50 text-default-700 text-xs font-semibold rounded border border-default-200 shadow-2xs transition text-center">
                        Batal
                    </a>
                    <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded shadow-xs transition">
                        Jadwalkan Sesi Ujian
                    </button>
                </div>
            </form>
        </x-cbt.card>
    </div>
</div>
@endsection

