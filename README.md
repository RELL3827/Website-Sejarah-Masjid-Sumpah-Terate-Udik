# Website Dokumentasi Digital "Masjid Sumpah Terate Udik Cilegon"

Website arsip sejarah digital untuk Masjid Sumpah di Kampung Terate Udik, Kota Cilegon, Banten. Dibangun dengan **Laravel 12** (PHP 8.2+), **Blade**, **Bootstrap 5**, dan **SQLite / MySQL**.

## Fitur

**Sisi Publik**
- Beranda: hero, artikel unggulan, ringkasan sejarah, panitia/sekretariat, galeri pilihan
- Halaman Sejarah (Kronologi), Timeline (linimasa peristiwa), Artikel + detail & pencarian (dengan filter kategori)
- Galeri foto dengan lightbox (filter kategori)
- Tentang, Lokasi (embed Google Maps), Kontak
- Pencarian global, halaman Sitemap (`/sitemap.xml`)
- SEO: judul, meta description, Open Graph, Twitter Card, canonical URL
- Responsif (mobile-first), font Google (Playfair Display + Source Sans 3)

**Panel Admin** (`/admin`)
- Login/Logout (akses terbatas pengguna `is_admin = true`)
- Dashboard: ringkasan statistik konten
- Manajemen Artikel (CRUD + upload thumbnail, status published/draft, unggulan, slug otomatis)
- Manajemen Kategori (CRUD + proteksi hapus bila masih berisi artikel)
- Manajemen Timeline (CRUD + upload gambar)
- Manajemen Galeri (CRUD + upload gambar, filter kategori)
- Kelola Informasi Masjid
- Pengaturan Website (nama, tagline, hero, kontak, sosial media)

## Teknologi

- Laravel 12, PHP ^8.2
- MySQL / MariaDB
- Bootstrap 5.3 + Bootstrap Icons (via Vite, bukan CDN)
- Eloquent ORM, migrations, seeders
- Laravel feature tests (PHPUnit)

## Persyaratan

- PHP >= 8.2 (aktifkan extension: `pdo_mysql`, `mysqli`, `fileinfo`, `gd` opsional, `zip` untuk Composer)
- Composer 2.x
- Node.js + npm (untuk membangun aset frontend)
- MySQL / MariaDB server

> Catatan Windows/XAMPP: Jika MySQL tidak otomatis berjalan, mulai manual:
> `C:\xampp\mysql\bin\mysqld.exe --defaults-file=C:\xampp\mysql\bin\my.ini`
> Aktifkan `extension=zip` di `C:\xampp\php\php.ini` agar Composer berjalan.

## Instalasi

```bash
# 1. Clone / salin proyek, lalu masuk ke folder
cd masjid-sumpah-masigit

# 2. Install dependensi PHP
composer install

# 3. Install dan bangun aset frontend
npm install
npm run build        # produksi
# atau npm run dev    # development (hot reload)

# 4. Siapkan file lingkungan
copy .env.example .env
php artisan key:generate
```

Edit `.env` sesuai server Anda:

```
APP_NAME="Masjid Sumpah Masigit Cilegon"
APP_URL=http://localhost:8000
APP_LOCALE=id

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=masjid_sumpah_masigit
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
CACHE_STORE=file
```

Buat database MySQL terlebih dahulu:

```sql
CREATE DATABASE masjid_sumpah_masigit CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Lalu jalankan migrasi + seeder (data contoh):

```bash
php artisan migrate --seed
# atau dari awal:
php artisan migrate:fresh --seed
```

Hubungkan storage untuk akses file yang di-upload:

```bash
php artisan storage:link
```

Jalankan server:

```bash
php artisan serve
```

Buka **http://localhost:8000**.

## Akun Admin Demo

- **Email:** `admin@masjidsumpahmasigit.id`
- **Password:** `admin123`
- Panel admin: **http://localhost:8000/admin/login**

> Penting: ganti password segera sebelum dipakai produksi.

## Struktur Penting

```
app/Http/Controllers/        # Kontroler publik + Admin\
app/Http/Middleware/         # EnsureUserIsAdmin (middleware admin)
app/Models/                  # Article, Category, Timeline, Gallery, dst.
app/helpers.php              # setting(), format_date(), image_url()
bootstrap/app.php            # Alias middleware 'admin' + redirectGuestsTo
database/migrations/         # Skema 7 tabel
database/seeders/            # Data awal + contoh
resources/views/             # Blade: layouts, components, publik, admin
resources/css/custom.css     # Tema "Historical Islamic Modern"
resources/js/custom.js       # Lightbox, reveal, sidebar, dst.
routes/web.php               # Seluruh routing
public/images/masjid/        # Gambar placeholder bawaan
```

## Menjalankan Tes

```bash
php artisan test
```

## Catatan Konten Sejarah

Data sejarah pada seeder hanyalah **konten contoh/placeholder** yang diberi penanda jelas, agar tidak ada fakta sejarah yang dikarang. Isilah data asli melalui panel admin setelah diverifikasi dari sumber-sumber resmi pengurus masjid/kelurahan/balai pelestarian.

## Lisensi

Proyek ini dibuat untuk kebutuhan dokumentasi komunitas. Silakan digunakan dan dikembangkan lebih lanjut.