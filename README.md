<div align="center">

# 📣 Laporin!
### Sistem Pengaduan & Aspirasi Siswa Berbasis Web

[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3-38B2AC?style=flat-square&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-3-8BC0D0?style=flat-square&logo=alpine.js&logoColor=white)](https://alpinejs.dev)
[![MySQL](https://img.shields.io/badge/MySQL-8-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://mysql.com)

Aplikasi web untuk menyederhanakan penyampaian aspirasi dan pengaduan siswa di lingkungan sekolah — dari pengiriman laporan hingga tindak lanjut oleh admin, semua dalam satu platform.

</div>

---

## 📌 Tentang Proyek

**Laporin!** dibangun sebagai proyek UKK (Uji Kompetensi Keahlian) sekaligus portfolio pribadi. Proyek ini lahir dari kebutuhan nyata di lingkungan sekolah — menyediakan saluran aspirasi siswa yang terstruktur, terdokumentasi, dan mudah ditindaklanjuti oleh pihak sekolah.

Sistem dirancang dengan **dua peran terpisah** menggunakan Laravel Multi-Guard Authentication, memastikan data dan akses admin serta siswa tidak saling bercampur.

---

## ✨ Fitur Utama

### 👨‍💼 Admin
| Fitur | Deskripsi |
|---|---|
| Dashboard Laporan | Melihat seluruh laporan aspirasi siswa secara terpusat |
| Filter & Pencarian | Filter laporan berdasarkan kategori dan tanggal |
| Manajemen Status | Update status laporan: `Menunggu` → `Proses` → `Selesai` |
| Feedback | Memberikan respons/tindak lanjut pada setiap laporan |
| Manajemen Kategori | Kelola kategori aspirasi yang tersedia |
| Manajemen Siswa | Tambah, edit, dan hapus data siswa |
| Manajemen Admin | Kelola akun admin lainnya |

### 🧑‍🎓 Siswa
| Fitur | Deskripsi |
|---|---|
| Kirim Aspirasi | Menyampaikan pengaduan atau aspirasi secara digital |
| Riwayat Laporan | Memantau status tindak lanjut laporan yang dikirim |
| Lihat Feedback | Melihat respons dari admin atas laporan yang dikirim |

---

## 🛠️ Teknologi

| Kategori | Teknologi |
|---|---|
| Backend | Laravel 13, PHP |
| Frontend | Tailwind CSS, Alpine.js, Vite |
| Database | MySQL |
| Auth | Laravel Multi-Guard Authentication |
| Version Control | Git, GitHub |

---

## ⚙️ Instalasi

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

### Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/jstzaa/laporin.git
cd laporin

# 2. Install dependencies
composer install
npm install

# 3. Konfigurasi environment
cp .env.example .env
php artisan key:generate
```

Sesuaikan konfigurasi database di file `.env`:
```env
DB_DATABASE=laporin
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# 4. Migrasi dan seed data demo
php artisan migrate --seed

# 5. Jalankan aplikasi
npm run dev          # development
php artisan serve
```

---

## 🔐 Akun Demo

Seed data tersedia untuk keperluan testing dan demo fitur.

**Admin**
```
Username : admin1
Password : 12345678
```

**Siswa**
```
NIS      : 1234567890
Password : 12345678
```

> ⚠️ Akun demo hanya untuk keperluan development/testing. Ganti kredensial sebelum deployment ke production.

---

## 🏗️ Arsitektur

```
Laporin!
├── Multi-Guard Auth      → Admin & Siswa memiliki guard, tabel, dan session terpisah
├── Role-based Routing    → Proteksi route berdasarkan guard middleware
├── Password Hashing      → Otomatis via $casts di Model (bcrypt)
└── Seed Data             → Data demo siap pakai untuk testing
```

---

## 📝 Catatan

- Proyek ini belum menggunakan data real dan tidak ditujukan untuk deployment production.
- Password generation menggunakan pola `{NIS}@siswa.sch.id` dan di-hash otomatis oleh model.
- Untuk penggunaan production, sesuaikan aturan password, seed data, dan konfigurasi environment.

---

## 👨‍💻 Author

**Fahriza Kurniawan**
- GitHub: [@jstzaa](https://github.com/jstzaa)
- Portfolio: [zaa-dev.my.id](https://www.zaa-dev.my.id)

---

<div align="center">

Dibuat dengan ❤️ sebagai proyek UKK & portfolio — SMK Al-Khoeriyah Kota Tasikmalaya

</div>