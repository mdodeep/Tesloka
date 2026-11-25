# Panduan Optimisasi Server TESLOKA CBT (Dari Spek Terkecil Hingga Enterprise)

Panduan ini disusun dengan bahasa yang sederhana dan angka siap pakai agar server TESLOKA tetap stabil, cepat, dan **tidak mengalami crash atau mati mendadak** pada hari pelaksanaan ujian.

---

## Mengapa Pengaturan Harus Disesuaikan dengan Spesifikasi Server?

Bayangkan **RAM server** seperti kapasitas meja kerja:
- **Sistem Operasi Linux & Panel (aaPanel):** Membutuhkan ruang tetap sekitar `350 MB` s.d. `450 MB`.
- **PostgreSQL (Basis Data Jawaban):** Menyimpan jawaban siswa secara ACID. Butuh memori untuk cache baca/tulis agar tidak lambat.
- **Redis (Cache & Antrean):** Menyimpan sesi login, status ujian, dan antrean pekerjaan.
- **PHP-FPM Workers (`pm.max_children`):** Setiap 1 "pekerja" PHP membutuhkan rata-rata `40 MB` s.d. `60 MB` RAM saat melayani permintaan simpan jawaban atau muat halaman.

> [!WARNING]
> **Kesalahan Paling Fatal pada VPS Kecil (RAM 1 GB atau 2 GB):**
> Memasang angka `pm.max_children = 50` atau `shared_buffers = 1GB` di VPS dengan RAM 2 GB. Akibatnya, saat 40 siswa mengakses bersamaan, kebutuhan RAM melonjak menembus 3 GB lebih, lalu sistem operasi Linux akan membunuh PostgreSQL atau PHP-FPM secara paksa (**OOM Killer / Error 502 Bad Gateway**).

---

## Tabel Ringkasan Profil Optimisasi (7 Spesifikasi Server)

Pilih baris yang paling sesuai dengan kapasitas VPS atau server fisik institusi Anda:

| Profil | Spesifikasi Server | Kapasitas Ujian Serentak | Swap Wajib | PHP-FPM `pm.max_children` | PHP `memory_limit` | PostgreSQL `shared_buffers` | Redis `maxmemory` | Queue Worker |
|:---|:---|:---|:---|:---|:---|:---|:---|:---|
| **Profil A** | **1 vCPU, 1 GB RAM** (Minimal Uji Coba) | 15 - 25 peserta | `2 GB` | `8` | `128M` | `128MB` | `96mb` | `1 worker` |
| **Profil B** | **1 vCPU, 2 GB RAM** (Lab Sekolah Kecil) | 30 - 60 peserta | `2 GB` | `14` | `192M` | `256MB` | `192mb` | `1 worker` |
| **Profil C** | **2 vCPU, 2 GB RAM** (Kelas Paralel) | 60 - 100 peserta | `2 GB` | `16` | `192M` | `256MB` | `192mb` | `1 worker` |
| **Profil D** | **2 vCPU, 4 GB RAM** (Sekolah Menengah) | 120 - 220 peserta | `2 GB` | `30` | `256M` | `768MB` | `384mb` | `2 workers` |
| **Profil E** | **4 vCPU, 8 GB RAM** (Ujian Serentak) | 300 - 500 peserta | `4 GB` | `60` | `256M` | `2GB` | `768mb` | `3 workers` |
| **Profil F** | **4 vCPU, 16 GB RAM, 100 GB SSD RAID 10** (Baseline Produksi) | 500 - 1.000 peserta | `4 GB` | `90` | `512M` | `4GB` | `2gb` | `4 workers` |
| **Profil G** | **8 vCPU, 32 GB RAM+** (Kampus / Dinas Besar) | 1.500 - 2.500 peserta | `4 GB` | `160` | `512M` | `8GB` | `4gb` | `6 workers` |

---

## Panduan Detail Per Profil & Rincian Anggaran RAM

### Profil A: 1 vCPU, 1 GB RAM (VPS Super Hemat / Pengujian)
Pada RAM 1 GB, setiap megabita sangat berharga. **Swap 2 GB bersifat mutlak** dan **OPcache** wajib aktif agar PHP tidak mengompilasi ulang kode di setiap klik siswa.

- **Anggaran RAM (Total ~920 MB + Cadangan Swap 2 GB):**
  - OS Linux + aaPanel + Nginx: `~320 MB`
  - PostgreSQL (`128MB` shared_buffers): `~200 MB`
  - Redis (`96mb` maxmemory): `~110 MB`
  - PHP-FPM (`8` children x `35 MB`): `~280 MB`
- **Langkah Setting di aaPanel:**
  1. **PHP 8.5 -> FPM Profile (`Performance Tuning`):**
     - `pm`: `static` (atau `dynamic`)
     - `pm.max_children`: `8`
     - `pm.start_servers`: `3`
     - `pm.min_spare_servers`: `2`
     - `pm.max_spare_servers`: `5`
     - `pm.max_requests`: `500`
  2. **PHP 8.5 -> Configuration (`Optimization`):**
     - `memory_limit`: `128M` (Catatan: saat menjalankan `composer install` lewat CLI, gunakan `COMPOSER_MEMORY_LIMIT=-1` agar tidak terkena batas `128M` ini).
  3. **Redis -> Performance Tuning:**
     - `maxmemory`: `96mb`
     - `maxmemory-policy`: `allkeys-lru`
  4. **PostgreSQL -> Config File (`postgresql.conf`):**
     ```ini
     max_connections = 60
     shared_buffers = 128MB
     effective_cache_size = 384MB
     work_mem = 2MB
     maintenance_work_mem = 32MB
     ```

---

### Profil B & Profil C: 1 vCPU atau 2 vCPU, 2 GB RAM (Paling Populer di Sekolah)
Profil ini cocok untuk ujian satu hingga tiga ruang komputer serentak. Perbedaan 1 vCPU vs 2 vCPU ada pada kecepatan respon saat banyak siswa melakukan *login* atau *submit* di detik yang sama (2 vCPU jauh lebih ringan menghadapi antrean CPU).

- **Anggaran RAM (Total ~1.65 GB dari 2 GB + Swap 2 GB):**
  - OS Linux + aaPanel + Nginx: `~380 MB`
  - PostgreSQL (`256MB` shared_buffers): `~380 MB`
  - Redis (`192mb` maxmemory): `~210 MB`
  - PHP-FPM (`14` s.d. `16` children x `42 MB`): `~670 MB`
- **Langkah Setting di aaPanel:**
  1. **PHP 8.5 -> FPM Profile:**
     - `pm`: `dynamic`
     - `pm.max_children`: `14` (untuk 1 vCPU) atau **`16`** (untuk 2 vCPU)
     - `pm.start_servers`: `4`
     - `pm.min_spare_servers`: `3`
     - `pm.max_spare_servers`: `8`
     - `pm.max_requests`: `800`
  2. **PHP 8.5 -> Configuration:**
     - `memory_limit`: `192M`
     - `max_execution_time`: `120`
  3. **Redis -> Performance Tuning:**
     - `maxmemory`: `192mb`
     - `maxmemory-policy`: `allkeys-lru`
  4. **PostgreSQL -> Config File:**
     ```ini
     max_connections = 100
     shared_buffers = 256MB
     effective_cache_size = 768MB
     work_mem = 4MB
     maintenance_work_mem = 64MB
     random_page_cost = 1.1
     ```

---

### Profil D: 2 vCPU, 4 GB RAM (Menengah)
- **PHP-FPM:** `pm.max_children = 30`, `pm.start_servers = 8`, `pm.min_spare_servers = 6`, `pm.max_spare_servers = 16`, `pm.max_requests = 1000`, `memory_limit = 256M`.
- **Redis:** `maxmemory 384mb`, `maxmemory-policy allkeys-lru`.
- **PostgreSQL:**
  ```ini
  max_connections = 150
  shared_buffers = 768MB
  effective_cache_size = 2GB
  work_mem = 8MB
  maintenance_work_mem = 128MB
  random_page_cost = 1.1
  ```

---

### Profil E: 4 vCPU, 8 GB RAM (Skala Sekolah Besar)
- **PHP-FPM:** `pm = static` (atau `dynamic`), `pm.max_children = 60`, `pm.start_servers = 16`, `pm.min_spare_servers = 12`, `pm.max_spare_servers = 30`, `pm.max_requests = 1000`, `memory_limit = 256M`.
- **Redis:** `maxmemory 768mb`, `maxmemory-policy allkeys-lru`.
- **PostgreSQL:**
  ```ini
  max_connections = 250
  shared_buffers = 2GB
  effective_cache_size = 5GB
  work_mem = 16MB
  maintenance_work_mem = 256MB
  max_worker_processes = 4
  max_parallel_workers = 4
  random_page_cost = 1.1
  ```

---

### Profil F: 4 vCPU, 16 GB RAM, 100 GB SSD Enterprise RAID 10 (Baseline Produksi Resmi)
Ini adalah spesifikasi rekomendasi utama produksi TESLOKA untuk menampung 500 hingga 1.000 peserta aktif serentak (terutama dengan mode penyimpanan autosave PostgreSQL ACID yang cepat).

- **PHP-FPM:** `pm = static`, `pm.max_children = 90`, `pm.max_requests = 1500`, `memory_limit = 512M`.
- **Redis:** `maxmemory 2gb`, `maxmemory-policy allkeys-lru`, `save 900 1`.
- **PostgreSQL:**
  ```ini
  max_connections = 400
  shared_buffers = 4GB
  effective_cache_size = 10GB
  work_mem = 16MB
  maintenance_work_mem = 512MB
  checkpoint_completion_target = 0.9
  wal_buffers = 16MB
  max_worker_processes = 4
  max_parallel_workers = 4
  random_page_cost = 1.1
  ```

---

### Profil G: 8 vCPU, 32 GB RAM+ (Skala Kampus / Wilayah)
- **PHP-FPM:** `pm = static`, `pm.max_children = 160`, `pm.max_requests = 2000`, `memory_limit = 512M`.
- **Redis:** `maxmemory 4gb`, `maxmemory-policy allkeys-lru`.
- **PostgreSQL:**
  ```ini
  max_connections = 600
  shared_buffers = 8GB
  effective_cache_size = 20GB
  work_mem = 32MB
  maintenance_work_mem = 1GB
  checkpoint_completion_target = 0.9
  max_worker_processes = 8
  max_parallel_workers = 8
  random_page_cost = 1.1
  ```

---

## 5 Optimisasi Wajib untuk Semua Spesifikasi Server (1 GB s.d. 32 GB)

Terlepas dari ukuran VPS Anda, lakukan kelima optimisasi berikut di aaPanel:

### 1. Pastikan Ekstensi OPcache Aktif dan Optimal
OPcache menyimpan bytecode PHP di RAM sehingga respon halaman melonjak hingga 3 kali lebih cepat tanpa membaca ulang file PHP dari disk.
- Buka **App Store -> PHP 8.5 -> Install Extensions -> Install `opcache`**.
- Tambahkan atau sesuaikan pada **Configuration (`php.ini`)**:
  ```ini
  opcache.enable=1
  opcache.memory_consumption=128
  opcache.interned_strings_buffer=16
  opcache.max_accelerated_files=20000
  opcache.validate_timestamps=0
  ```
  > [!TIP]
  > Jika `opcache.validate_timestamps=0`, selalu klik **Restart PHP** setiap kali Anda mengunggah pembaruan kode baru ke server. Untuk lingkungan yang sering diubah, gunakan `opcache.validate_timestamps=1` dan `opcache.revalidate_freq=2`.

### 2. Gunakan Cache Config & Route Laravel Setelah Instalasi
Jalankan satu kali setiap kali selesai memasang atau mengubah `.env`:
```bash
cd /www/wwwroot/domainanda.sch.id
sudo -u www /www/server/php/85/bin/php artisan optimize
```
*(Jika ingin mengubah `.env` lagi, bersihkan cache dulu dengan `php artisan optimize:clear`).*

### 3. Aktifkan Kompresi Gzip & Cache Aset Statis di Nginx
Buka **App Store -> Nginx -> Configuration**:
- Pastikan `gzip on;` dan `gzip_comp_level 5;` aktif agar file JS/CSS/font `sora.ttf` dan gambar soal dikirim lebih hemat bandwidth ke browser peserta.
- Atur `worker_processes auto;` agar jumlah proses Nginx otomatis mengikuti jumlah vCPU server Anda.

### 4. Pastikan Redis Eviction Policy Tidak Memakai `noeviction`
Jika Redis penuh dengan policy bawaan `noeviction`, aplikasi akan melempar error `OOM command not allowed`. Selalu pasang:
```ini
maxmemory-policy allkeys-lru
```

### 5. Verifikasi Kesehatan Memori Server Sebelum Hari-H Ujian
Jalankan perintah ini di Terminal SSH sebelum ujian dimulai untuk memastikan RAM, Swap, dan layanan aman:
```bash
free -h
swapon --show
systemctl is-active nginx php-fpm-85 postgresql redis tesloka-worker
```
Pastikan masih tersisa setidaknya **25% RAM kosong (`available`)** saat server dalam kondisi idle sebelum peserta mulai login beramai-ramai.

---

## Panduan Bandwidth & Resource untuk Monitoring Real-Time + Kamera Live

| Mode Pengawasan | Beban VPS Utama (4 vCPU / 16 GB) | Kebutuhan Bandwidth per Siswa | Rekomendasi Penggunaan |
| :--- | :--- | :--- | :--- |
| **HTTP Auto-Sync Polling + Snapshot (Default)** | Sangat ringan (~5-10% CPU untuk 100 siswa) | ~15-30 KB tiap 30 detik (~5 kbps rata-rata) | Lab sekolah, koneksi internet terbatas, hingga 500 peserta pada 1 VPS |
| **Laravel Reverb WebSocket + Near-Live Zoom** | Ringan (~150-300 MB RAM tambahan untuk daemon Reverb) | ~2 kbps standby + ~35 KB/3 detik hanya saat pengawas membuka modal Zoom | Pengawasan cepat < 1 detik tanpa membebani jaringan siswa |
| **LiveKit WebRTC SFU Live Video (240p/360p/480p)** | **Wajib pisah VPS/Cloud** untuk > 50 peserta aktif | **240p:** ~150 kbps upload/siswa<br>**360p:** ~250 kbps upload/siswa<br>**480p:** ~450 kbps upload/siswa | Pengawasan daring penuh dengan video CCTV bergerak serentak |

> [!TIP]
> **Simulasi Bandwidth Ruang Pengawas (LiveKit):** Jika 1 pengawas memantau **30 tile kamera sekaligus**, sistem TESLOKA secara otomatis memaksa `VideoQuality.LOW` untuk seluruh tile grid (~150 kbps x 30 = **~4,5 Mbps downstream** di komputer pengawas) dan menaikkan ke `VideoQuality.HIGH` hanya untuk 1 siswa yang sedang di-Zoom. Pastikan koneksi internet ruangan pengawas memiliki minimal **10 Mbps download stabil** bila memantau 30 kamera video bergerak serentak.
