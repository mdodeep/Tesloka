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

class StudentLoginRequest extends FormRequest
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
        $this->ensureIsNotRateLimited();

        $login = $this->input('login');
        $password = $this->input('password');

        // Cari peserta berdasarkan NIM (identity_number), username, atau email
        $user = User::where(function ($query) use ($login) {
            $query->where('identity_number', $login)
                ->orWhere('username', $login)
                ->orWhere('email', $login);
        })->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            RateLimiter::hit($this->throttleKey(), 60);

            AuditLog::record(
                'auth.student_failed',
                $user,
                null,
                ['login' => $login],
                'Gagal login peserta: Kredensial tidak valid'
            );

            throw ValidationException::withMessages([
                'login' => __('NIM / Username atau kata sandi tidak sesuai.'),
            ]);
        }

        // Pastikan akun berstatus active
        if (! $user->isActive()) {
            AuditLog::record(
                'auth.student_blocked',
                $user,
                null,
                ['status' => $user->status],
                "Akses peserta ditolak: Status akun {$user->status}"
            );

            throw ValidationException::withMessages([
                'login' => __('Akun ujian Anda dinonaktifkan atau terkunci. Hubungi pengawas / panitia ujian.'),
            ]);
        }

        // Pastikan user memiliki peran peserta (student)
        if (! $user->isStudent()) {
            AuditLog::record(
                'auth.student_unauthorized_portal',
                $user,
                null,
                null,
                'Pengguna non-peserta mencoba masuk melalui portal siswa'
            );

            throw ValidationException::withMessages([
                'login' => __('Akun ini bukan akun peserta ujian. Silakan login melalui portal staf.'),
            ]);
        }

        Auth::guard('student')->login($user, $this->boolean('remember'));
        RateLimiter::clear($this->throttleKey());

        $user->update([
            'last_login_at' => now(),
            'last_login_ip' => $this->ip(),
        ]);

        AuditLog::record(
            'auth.student_login',
            $user,
            null,
            ['guard' => 'student'],
            'Login peserta berhasil'
        );
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
            'Terlalu banyak percobaan login peserta'
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
        return Str::transliterate('student_login|'.Str::lower($this->input('login')).'|'.$this->ip());
    }
}
