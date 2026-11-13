<p align="center">
  <img src="public/assets/images/logo-tesloka-cbt.webp" alt="TESLOKA CBT" width="200">
</p>

<h1 align="center">TESLOKA</h1>

<p align="center">
  Sistem Computer-Based Test (CBT) untuk institusi pendidikan Indonesia.<br>
  Satu instalasi, satu institusi — sepenuhnya on-premise.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel 13">
  <img src="https://img.shields.io/badge/PHP-8.5-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP 8.5">
  <img src="https://img.shields.io/badge/PostgreSQL-16-4169E1?style=flat-square&logo=postgresql&logoColor=white" alt="PostgreSQL 16">
  <img src="https://img.shields.io/badge/Redis-7-DC382D?style=flat-square&logo=redis&logoColor=white" alt="Redis 7">
  <img src="https://img.shields.io/badge/Tailwind_CSS-4-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white" alt="TailwindCSS 4">
  <img src="https://img.shields.io/badge/Vite-8-646CFF?style=flat-square&logo=vite&logoColor=white" alt="Vite 8">
</p>

---

## Apa Itu TESLOKA?

TESLOKA adalah aplikasi ujian berbasis komputer (CBT) yang dibangun di atas Laravel 13 dan PostgreSQL 16. Aplikasi ini dirancang untuk diinstal secara mandiri di server milik institusi (on-premise) — bukan SaaS. Satu instalasi digunakan oleh satu institusi: sekolah, madrasah, perguruan tinggi, lembaga pelatihan, atau penyelenggara ujian profesional.

Sistem ini mengelola seluruh siklus ujian: mulai dari penyusunan bank soal, konfigurasi ujian, penjadwalan sesi, pelaksanaan daring dengan pengawasan real-time, penilaian otomatis & manual, penetapan kelulusan, hingga penerbitan sertifikat berverifikasi digital.

### Arsitektur Tiga Portal

TESLOKA memisahkan antarmuka pengguna ke dalam tiga subdomain:

| Portal | Subdomain | Pengguna |
|:---|:---|:---|
| **Staff & Administrasi** | `staff.<domain>` | Admin, dosen/guru, pengawas ujian |
| **Peserta Ujian** | `ujian.<domain>` | Mahasiswa/siswa peserta ujian |
| **Verifikasi Publik** | `sertifikat.<domain>` | Siapa pun yang ingin memverifikasi keabsahan sertifikat |

Portal ketiga bersifat publik tanpa login — cukup masukkan nomor resi sertifikat atau scan QR Code untuk verifikasi instan.

---

## Fitur Utama

### 📋 Manajemen Akademik
- Struktur akademik fleksibel: tahun ajaran, semester, program studi, kelas, dan mata kuliah/pelajaran.
- Penugasan dosen/guru per mata kuliah, enrollmen mahasiswa/siswa per kelas.
- Tidak terbatas pada jenjang tertentu — mendukung SD, SMP, SMA/SMK, perguruan tinggi, hingga sertifikasi profesi.

### 📝 Bank Soal & Paket Ujian
- **6 tipe soal:** Pilihan Ganda Tunggal, Pilihan Ganda Kompleks (Multi-Jawaban), Menjodohkan (Matching), Esai Terstruktur, Skala/Matriks, dan Benar/Salah.
- Media soal: gambar, audio (listening), video terenkripsi lokal, dan rumus matematika LaTeX.
- Impor massal butir soal dari Excel.
- Blueprint ujian dengan distribusi soal per kategori/topik.
- Snapshot versi soal — soal yang sudah digunakan dalam ujian tidak berubah meskipun versi asli diedit.

### 🖥️ Pelaksanaan Ujian
- Timer server-side — sisa waktu dihitung dari jam server, bukan jam peramban klien.
- Autosave transaksional dengan revision sequencing, idempotency key, dan penguncian database. Revisi lama yang tiba terlambat tidak menimpa revisi baru.
- Submit idempotent menghasilkan tanda terima (receipt) berisi hash SHA-256.
- Navigasi soal responsif dengan palet nomor soal (drawer popup di mobile).
- Dukungan akomodasi khusus: perpanjangan waktu individu.

### 👁️ Pengawasan Ujian (Proctoring)
- Dashboard pengawas real-time: pantau status koneksi peserta, jumlah soal terjawab, sisa waktu, dan peringatan pelanggaran.
- Aksi pengawas: force submit, tambah waktu, pause/resume sesi, kirim pengumuman broadcast.
- Deteksi tab switch / window blur sebagai sinyal pengawasan (bukan vonis otomatis).
- Integrasi Safe Exam Browser (SEB): pembuatan berkas `.seb` terenkripsi dan pemeriksaan Browser Exam Key / Config Key.
- Pencatatan insiden dan snapshot kamera pengawas.

### ✅ Penilaian & Analitik
- Grading otomatis untuk soal objektif.
- Antarmuka koreksi esai dengan rubrik penilaian.
- Regrade massal — jalankan ulang penilaian jika kunci jawaban diperbaiki.
- Analisis butir soal: Indeks Kesukaran, Daya Pembeda, Efektivitas Pengecoh, Koefisien Reliabilitas KR-20 / Cronbach's Alpha.
- Alur remidi terintegrasi: penentuan peserta remidi otomatis berdasarkan KKM, pendaftaran sesi remidi, dan kalkulasi nilai efektif.

### 🎓 Kelulusan & Sertifikat Digital
- Penetapan kelulusan berdasarkan hasil penilaian dan persyaratan administratif.
- Desain sertifikat A4 Landscape dengan layout presisi cetak.
- Dua pejabat penandatangan dengan upload tanda tangan digital transparan (PNG) dan stempel institusi.
- QR Code verifikasi dinamis mengarah ke portal publik `sertifikat.*`.
- Verifikasi keabsahan sertifikat secara instan tanpa login.

### 🔒 Keamanan & Tata Kelola
- Role-Based Access Control (RBAC) dengan permission granular.
- Four-Eyes Approval: mekanisme persetujuan ganda untuk aksi kritis (publikasi nilai, penghapusan bank soal, regrade massal).
- Delegasi wewenang berbatas waktu antar staf.
- Autentikasi 2FA TOTP (Google Authenticator / Aegis).
- Audit log lengkap untuk seluruh aksi penting.
- Proteksi IDOR, CSRF, XSS, dan SQL Injection di sisi server.

### ⚙️ Pengaturan & Kustomisasi
- Branding institusi: logo, favicon, nama aplikasi, warna tema primer & aksen.
- Template blangko dokumen resmi A4 (sertifikat kelulusan, kartu peserta, berita acara, daftar hadir, denah meja).
- Template email notifikasi yang dapat disesuaikan (akun baru, jadwal ujian, hasil ujian).
- Konfigurasi SMTP langsung dari dashboard.
- Backup database terjadwal dan unduh manual.
- Health check sistem (PHP, PostgreSQL, Redis, disk, queue).

### 📄 Cetak Dokumen Resmi
- Kartu Peserta Ujian
- Denah/Tempelan Meja Ruangan
- Berita Acara Pelaksanaan Ujian
- Daftar Hadir Pengawas & Peserta
- Sertifikat Kelulusan
- Seluruh dokumen presisi A4 dengan dukungan `@media print` dan scrolling horizontal di mobile.

---

## Persyaratan Sistem

### Development

| Komponen | Versi |
|:---|:---|
| PHP | 8.5+ (ekstensi: `pdo_pgsql`, `redis`, `gd`, `fileinfo`, `mbstring`, `zip`, `bcmath`) |
| Composer | 2.x |
| PostgreSQL | 16+ |
| Redis | 7+ |
| Node.js | 20+ |
| NPM | 10+ |

Development environment yang sudah teruji: **Laragon** (Windows) dengan Apache.

### Production

| Komponen | Rekomendasi |
|:---|:---|
| OS | Ubuntu 22.04 / 24.04 LTS |
| Web Server | Nginx + PHP 8.5-FPM |
| Database | PostgreSQL 16+ |
| Cache & Queue | Redis 7+ |
| Process Manager | Supervisor (queue worker + scheduler) |
| TLS | Let's Encrypt / sertifikat institusi |
| Panel (opsional) | aaPanel |

Panduan deployment lengkap untuk production tersedia di [`deploy/INSTALL-AAPANEL.md`](deploy/INSTALL-AAPANEL.md).

---

## Instalasi Lokal

### 1. Clone repository

```bash
git clone https://github.com/<username>/tesloka.git
cd tesloka
```

### 2. Instal dependensi

```bash
composer install
npm install
```

### 3. Konfigurasi environment

```bash
cp .env.example .env
php artisan key:generate
```

Buka file `.env` dan sesuaikan:

```ini
# Database PostgreSQL
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=tesloka
DB_USERNAME=postgres
DB_PASSWORD=password_anda

# Cache & Queue
CACHE_STORE=redis
QUEUE_CONNECTION=redis

# Redis
REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
```

### 4. Siapkan database

Buat database `tesloka` di PostgreSQL, lalu jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

Seeder akan membuat:
- Institusi default (Tesloka)
- Role dan permission (Admin, Dosen, Pengawas, Mahasiswa)
- Akun admin default
- Struktur akademik contoh
- Template notifikasi email

### 5. Buat symbolic link storage

```bash
php artisan storage:link
```

### 6. Kompilasi aset frontend

```bash
# Development (hot reload):
npm run dev

# Production build:
npm run build
```

### 7. Konfigurasi domain lokal (Laragon)

Jika menggunakan Laragon, tambahkan virtual host untuk tiga subdomain:

| Portal | Domain |
|:---|:---|
| Staff | `https://staff.tesloka.test` |
| Peserta | `https://ujian.tesloka.test` |
| Verifikasi | `https://sertifikat.tesloka.test` |

Pastikan ketiga subdomain diarahkan ke direktori `public/` proyek ini.

### 8. Login pertama kali

Setelah seeder berhasil, gunakan akun admin default untuk login di portal staff:

| Field | Nilai |
|:---|:---|
| URL | `https://staff.tesloka.test/login` |
| Username | `admin` |
| Password | Lihat output seeder atau file `database/seeders/UserSeeder.php` |

---

## Perintah yang Sering Digunakan

```bash
# Menjalankan development server:
php artisan dev

# Menjalankan seluruh test suite:
php artisan test

# Menjalankan test spesifik:
php artisan test --filter=NamaTestClass

# Membersihkan semua cache:
php artisan optimize:clear

# Menjalankan queue worker:
php artisan queue:work redis --tries=3

# Menjalankan scheduler:
php artisan schedule:work
```

---

## Struktur Proyek

```
tesloka/
├── app/
│   ├── Console/Commands/     # Artisan commands kustom
│   ├── Http/
│   │   ├── Controllers/      # 39 controllers (Staff, Student, Public)
│   │   ├── Middleware/        # Middleware autentikasi & otorisasi
│   │   └── Requests/         # Form request validation
│   ├── Jobs/                 # Queue jobs (ekspor, email, regrade)
│   ├── Models/               # 51 Eloquent models
│   ├── Providers/            # Service providers
│   └── Services/             # Business logic services
├── database/
│   ├── factories/            # Model factories untuk testing
│   ├── migrations/           # 27 migration files
│   └── seeders/              # 6 seeders (institusi, role, user, akademik, template)
├── deploy/                   # Konfigurasi production deployment
│   ├── nginx/                # Nginx virtual host config
│   ├── php-fpm/              # PHP-FPM pool config
│   ├── redis/                # Redis config khusus Tesloka
│   ├── supervisor/           # Worker & scheduler supervisor config
│   ├── livekit/              # LiveKit (kamera proctoring) config
│   └── INSTALL-AAPANEL.md    # Panduan deployment aaPanel
├── public/
│   └── assets/images/        # Logo, favicon, default avatar
├── resources/
│   ├── css/                  # Stylesheet (Tailwind CSS 4)
│   ├── js/                   # JavaScript frontend
│   └── views/                # 84 Blade templates
│       ├── staff/            # 20 modul portal staf
│       ├── student/          # Portal peserta ujian
│       ├── public/           # Portal verifikasi sertifikat
│       ├── components/       # Komponen Blade reusable
│       ├── layouts/          # Layout utama (staff, student, auth)
│       └── errors/           # Halaman error kustom
├── routes/
│   ├── staff.php             # Rute portal staf
│   ├── student.php           # Rute portal peserta
│   ├── api.php               # API endpoints (autosave, heartbeat)
│   ├── web.php               # Rute publik (verifikasi sertifikat)
│   └── console.php           # Artisan console routes
├── tests/                    # 35 file test (Feature & Unit)
├── template-envato/          # Referensi desain Tailwick UI Kit
└── docs/                     # Dokumentasi internal pengembangan
```

---

## Arsitektur & Prinsip Desain

### PostgreSQL Sebagai Source of Truth

Seluruh data permanen — jawaban peserta, tanda terima submit, snapshot soal, nilai, audit log — tersimpan di PostgreSQL dengan transaksi ACID. Redis hanya digunakan untuk cache sementara (TTL), session, queue, rate limiting, dan lock.

### Autosave Transaksional

Jawaban peserta disimpan secara berkala ke PostgreSQL melalui HTTP POST API. Setiap request autosave membawa revision number dan idempotency key. Database transaction memastikan atomisitas, dan request lama yang tiba terlambat tidak akan menimpa revisi yang lebih baru.

### Isolasi Layanan

Operasi berat (ekspor massal, kalkulasi psikometri KR-20, regrade, pengiriman email) dialihkan ke queue worker via Redis, sehingga request HTTP tetap responsif. Portal verifikasi sertifikat publik diisolasi melalui subdomain terpisah dengan caching Redis agar traffic verifikasi tidak membebani server saat ujian berlangsung.

### Timer Server-Side

Sisa waktu ujian dihitung dari jam server (bukan jam peramban klien), mengeliminasi kemungkinan manipulasi waktu di sisi peserta.

---

## Deployment Production

Panduan lengkap deployment ke VPS dengan aaPanel tersedia di:

📄 **[`deploy/INSTALL-AAPANEL.md`](deploy/INSTALL-AAPANEL.md)**

Panduan tersebut mencakup:
- Instalasi aaPanel pada Ubuntu 24.04 LTS
- Konfigurasi Nginx, PHP 8.5-FPM, PostgreSQL, Redis
- Tuning database untuk 16 GB RAM
- Setup Supervisor untuk queue worker dan scheduler
- Konfigurasi SSL/TLS
- Konfigurasi tiga subdomain (staff, ujian, sertifikat)

Konfigurasi siap pakai tersedia di direktori `deploy/`:

| File | Keterangan |
|:---|:---|
| `deploy/nginx/tesloka.conf` | Nginx virtual host |
| `deploy/php-fpm/tesloka.conf` | PHP-FPM pool |
| `deploy/redis/redis-tesloka.conf` | Redis instance |
| `deploy/supervisor/tesloka-worker.conf` | Queue worker |
| `deploy/supervisor/tesloka-scheduler.conf` | Task scheduler |
| `deploy/livekit/` | LiveKit (kamera proctoring) |

---

## Testing

Proyek ini dilengkapi 35 file test (Feature & Unit) menggunakan PHPUnit:

```bash
# Jalankan seluruh test:
php artisan test

# Jalankan test tertentu:
php artisan test --filter=CertificateZeroImpactAndTemplateTest
php artisan test --filter=SecurityCrossTenantAuthorizationAuditTest

# Jalankan test dengan output verbose:
php artisan test -v
```

Pastikan `npm run build` (0 error) dan `php artisan test` (seluruh test pass) sebelum melakukan push.

---

## Tech Stack

| Layer | Teknologi |
|:---|:---|
| Backend Framework | Laravel 13 |
| Bahasa | PHP 8.5 |
| Database | PostgreSQL 16 |
| Cache & Queue | Redis 7 |
| Frontend | Tailwind CSS 4 + Blade Templates |
| UI Kit | Tailwick (Envato) |
| Icons | Lucide + Iconify |
| Build Tool | Vite 8 |
| Rich Text Editor | Quill 2 |
| Charts | ApexCharts 8 |
| Dropdown Select | Choices.js 11 |
| File Upload | Dropzone 6 |
| Scrollbar | SimpleBar 6 |
| Browser Automation | Puppeteer Core 25 (SEB config generation) |
| Testing | PHPUnit 12 |

---

## Lisensi

Hak Cipta &copy; 2026 **TESLOKA**. Seluruh hak dilindungi undang-undang.

Dilisensikan secara tertutup (*proprietary*) untuk institusi pengguna berlisensi resmi. Kode sumber ini tidak boleh didistribusikan, disalin, atau digunakan tanpa izin tertulis dari pemilik lisensi.
