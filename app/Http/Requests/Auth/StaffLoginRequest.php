<?php

namespace App\Http\Requests\Auth;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class StaffLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Konversi nilai input sebelum divalidasi untuk mencegah galat boolean.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('remember')) {
            $this->merge([
                'remember' => $this->boolean('remember'),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ];
    }

    public function authenticate(): void
    {
        $this->authenticateStaff();
    }

    public function authenticateStaff(): ?User
    {
        $this->ensureIsNotRateLimited();

        $login = $this->input('login');
        $password = $this->input('password');

        // Cari staf berdasarkan email atau username
        $user = User::where(function ($query) use ($login) {
            $query->where('email', $login)
                ->orWhere('username', $login);
        })->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            RateLimiter::hit($this->throttleKey(), 60);

            AuditLog::record(
                'auth.staff_failed',
                $user,
                null,
                ['login' => $login],
                'Gagal login: Kredensial tidak valid'
            );

            throw ValidationException::withMessages([
                'login' => __('Kredensial yang diberikan tidak cocok dengan data kami.'),
            ]);
        }

        // Pastikan akun berstatus active
        if (! $user->isActive()) {
            AuditLog::record(
                'auth.staff_blocked',
                $user,
                null,
                ['status' => $user->status],
                "Akses ditolak: Status akun {$user->status}"
            );

            $blockedMessage = $user->status === 'pending'
                ? __('Pendaftaran akun staf/dosen Anda masih menunggu persetujuan Administrator.')
                : __('Akun Anda dinonaktifkan atau terkunci. Hubungi administrator.');

            throw ValidationException::withMessages([
                'login' => $blockedMessage,
            ]);
        }

        // Pastikan user memiliki peran staf
        if (! $user->isStaff()) {
            AuditLog::record(
                'auth.staff_unauthorized_portal',
                $user,
                null,
                null,
                'Percobaan akses portal staf oleh pengguna non-staf'
            );

            throw ValidationException::withMessages([
                'login' => __('Akun ini tidak memiliki hak akses ke portal staf. Portal staf khusus untuk Administrator, Guru/Dosen, Pengawas Ujian, Operator CBT, dan Auditor.'),
            ]);
        }

        // Cek Two-Factor Authentication (2FA) (FULL-FEATURE 44.3)
        if ($user->hasEnabledTwoFactorAuthentication()) {
            RateLimiter::clear($this->throttleKey());
            $this->session()->put('staff_2fa_pending_user_id', $user->id);
            $this->session()->put('staff_2fa_remember', $this->boolean('remember'));

            AuditLog::record(
                'auth.staff_2fa_challenge_issued',
                $user,
                null,
                ['guard' => 'staff'],
                'Kredensial staf valid; dialihkan ke tantangan Two-Factor Authentication (2FA).'
            );

            return null;
        }

        Auth::guard('staff')->login($user, $this->boolean('remember'));
        RateLimiter::clear($this->throttleKey());

        $user->update([
            'last_login_at' => now(),
            'last_login_ip' => $this->ip(),
        ]);

        AuditLog::record(
            'auth.staff_login',
            $user,
            null,
            ['guard' => 'staff'],
            'Login staf berhasil'
        );

        return $user;
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), (int) config('cbt.max_login_attempts', 5))) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        AuditLog::record(
            'auth.rate_limited',
            null,
            null,
            ['throttle_key' => $this->throttleKey(), 'seconds' => $seconds],
            'Terlalu banyak percobaan login staf'
        );

        throw ValidationException::withMessages([
            'login' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate('staff_login|'.Str::lower($this->input('login')).'|'.$this->ip());
    }
}
