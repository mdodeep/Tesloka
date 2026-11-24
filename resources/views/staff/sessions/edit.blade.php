@extends('layouts.staff')

@section('title', 'Edit Sesi : ' . $session->name)
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', 'Edit Sesi Ujian')
@section('page-subtitle', 'Perbarui jadwal pelaksanaan, ruang ujian, atau identitas sesi dengan perlindungan integritas ujian aktif.')

@section('page-actions')
    <a href="{{ route('staff.sessions.show', $session) }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="arrow-left" class="size-4"></i>
        <span>Kembali ke Detail Sesi</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">
    @if($hasActiveAttempts)
        <x-cbt.alert type="warning">
            <strong>Mode Perlindungan Sesi Berlangsung:</strong> Terdapat peserta yang sedang mengerjakan ujian pada sesi ini. Perubahan ujian induk, ruang lab, dan pengunduran waktu mulai dikunci secara otomatis; Anda tetap dapat memperpanjang <strong>Waktu Selesai Sesi</strong>.
        </x-cbt.alert>
    @endif

    <div class="max-w-2xl">
        <x-cbt.card title="Formulir Edit Sesi : {{ $session->session_code }}">
            <form action="{{ route('staff.sessions.update', $session) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Ujian Terkait *</label>
                    <select id="select-session-exam" name="exam_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" {{ $hasActiveAttempts ? 'readonly' : '' }} required>
                        @foreach($exams as $ex)
                            <option value="{{ $ex->id }}"
                                data-duration="{{ $ex->duration_minutes }}"
                                data-start="{{ $ex->scheduled_start?->format('d/m/Y H:i') ?? '' }}"
                                data-end="{{ $ex->scheduled_end?->format('d/m/Y H:i') ?? '' }}"
                                {{ (old('exam_id', $session->exam_id) == $ex->id) ? 'selected' : '' }}>
                                {{ $ex->title }} ({{ $ex->code }}) - Durasi {{ $ex->duration_minutes }} menit [{{ $ex->getDeliveryModeLabel() }}]
                            </option>
                        @endforeach
                    </select>
                    <div id="exam-window-hint" class="hidden mt-2 p-2.5 rounded-lg bg-sky-50 border border-sky-200 text-[11px] text-sky-900"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Mode Pelaksanaan Sesi *</label>
                        <select name="delivery_mode" id="select-session-delivery-mode" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                            <option value="online" {{ old('delivery_mode', $session->delivery_mode ?? 'online') == 'online' ? 'selected' : '' }}>Daring / Jarak Jauh (Online)</option>
                            <option value="offline" {{ old('delivery_mode', $session->delivery_mode) == 'offline' ? 'selected' : '' }}>Luring / Tatap Muka (Ruang Lab)</option>
                            <option value="hybrid" {{ old('delivery_mode', $session->delivery_mode) == 'hybrid' ? 'selected' : '' }}>Hybrid (Daring &amp; Luring)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nama / Keterangan Sesi *</label>
                        <input type="text" name="name" value="{{ old('name', $session->name) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                    </div>
                </div>

                <div id="container-exam-room">
                    <div class="flex items-center justify-between mb-1">
                        <label class="block text-xs font-semibold text-default-700 uppercase">
                            Ruang Ujian Fisik <span id="room-required-indicator" class="text-rose-500 hidden">*</span>
                        </label>
                        <span id="room-optional-badge" class="text-[11px] text-teal-600 font-medium">Opsional pada mode Daring</span>
                    </div>
                    <select name="exam_room_id" id="select-exam-room" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium">
                        <option value="">-- Daring / Jarak Jauh (Tanpa Ruangan Fisik) --</option>
                        @foreach($rooms as $rm)
                            <option value="{{ $rm->id }}" {{ old('exam_room_id', $session->exam_room_id) == $rm->id ? 'selected' : '' }}>
                                {{ $rm->name }} ({{ $rm->code }}) &bull; Kapasitas {{ $rm->capacity }} Peserta &bull; {{ $rm->location ?? 'Gedung Utama' }}
                            </option>
                        @endforeach
                    </select>
                    <p id="room-info-help" class="text-[11px] text-default-500 mt-1">
                        Sistem otomatis memvalidasi bentrok jadwal antar sesi pada ruang lab yang sama.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Waktu Mulai Sesi (WIB) *</label>
                        <input type="datetime-local" name="start_time" value="{{ old('start_time', $session->start_time?->format('Y-m-d\TH:i')) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Waktu Selesai Sesi (WIB) *</label>
                        <input type="datetime-local" name="end_time" value="{{ old('end_time', $session->end_time?->format('Y-m-d\TH:i')) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Kode Sesi *</label>
                    <input type="text" name="session_code" value="{{ old('session_code', $session->session_code) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-mono" required>
                </div>

                <div class="pt-4 flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-between gap-2 sm:gap-3 border-t border-default-100">
                    <div></div>
                    <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center gap-2 sm:gap-3">
                        <a href="{{ route('staff.sessions.show', $session) }}" class="w-full sm:w-auto px-4 py-2.5 bg-white hover:bg-default-50 text-default-700 text-xs font-semibold rounded border border-default-200 shadow-2xs transition text-center">
                            Batal
                        </a>
                        <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded shadow-xs transition cursor-pointer">
                            Simpan Perubahan Sesi
                        </button>
                    </div>
                </div>
            </form>
        </x-cbt.card>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectMode = document.getElementById('select-session-delivery-mode');
        const selectRoom = document.getElementById('select-exam-room');
        const reqIndicator = document.getElementById('room-required-indicator');
        const optBadge = document.getElementById('room-optional-badge');
        const selectExam = document.getElementById('select-session-exam');
        const examWindowHint = document.getElementById('exam-window-hint');

        function updateRoomMode() {
            if (!selectMode) return;
            if (selectMode.value === 'offline') {
                if (reqIndicator) reqIndicator.classList.remove('hidden');
                if (optBadge) optBadge.classList.add('hidden');
                if (selectRoom) selectRoom.required = true;
            } else {
                if (reqIndicator) reqIndicator.classList.add('hidden');
                if (optBadge) optBadge.classList.remove('hidden');
                if (selectRoom) selectRoom.required = false;
            }
        }
        function updateExamWindowHint() {
            if (!selectExam || !examWindowHint) return;
            const opt = selectExam.options[selectExam.selectedIndex];
            if (!opt || !opt.value) {
                examWindowHint.classList.add('hidden');
                return;
            }
            const dur = opt.dataset.duration || '-';
            const st = opt.dataset.start || '';
            const en = opt.dataset.end || '';
            let msg = `<strong>Durasi Ujian:</strong> ${dur} menit. `;
            if (st || en) {
                msg += `<strong>Periode Ketersediaan Ujian Induk:</strong> ${st || 'Fleksibel'} s/d ${en || 'Fleksibel'} WIB.`;
            } else {
                msg += 'Periode ketersediaan ujian induk bersifat fleksibel.';
            }
            examWindowHint.innerHTML = msg;
            examWindowHint.classList.remove('hidden');
        }
        if (selectMode) {
            selectMode.addEventListener('change', updateRoomMode);
            updateRoomMode();
        }
        if (selectExam) {
            selectExam.addEventListener('change', updateExamWindowHint);
            updateExamWindowHint();
        }
    });
</script>
@endpush
@endsection
