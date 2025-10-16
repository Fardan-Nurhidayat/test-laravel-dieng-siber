# README — Instalasi Project

Repository: https://github.com/Fardan-Nurhidayat/test-laravel-dieng-siber.git

Petunjuk singkat untuk menginstal project Laravel ini.

## Prasyarat

-   PHP 8.1+ (atau versi yang disyaratkan oleh project)
-   Composer
-   Database (MySQL, PostgreSQL, SQLite, dsb.)
-   Git (opsional, bila clone dari repo)

## Langkah instalasi

1. Clone repository (atau salin ke folder project)

```bash
git clone https://github.com/Fardan-Nurhidayat/test-laravel-dieng-siber.git .
```

2. Masuk ke direktori project

```bash
cd /e:/Test-Dieng-Cyber/test-laravel
```

3. Salin file environment

```bash
cp .env.example .env
```

4. Install dependency PHP

```bash
composer install
```

5. Generate application key

```bash
php artisan key:generate
```

6. Konfigurasi .env

-   Atur koneksi database (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
-   Atur konfigurasi lain yang diperlukan (MAIL, REDIS, dsb.)

7. Jalankan migrasi dan seeder (jika ada)

```bash
php artisan migrate
```

8. Jalankan server development

```bash
php artisan serve
```

    Akses di: http://127.0.0.1:8000

## Informasi Tester

-   Nama : Fardan Nurhidayat
-   Test : Technical Test Magang Dieng Siber

Jika ada konfigurasi khusus untuk project ini (contoh: queue worker, scheduler, third-party API), tambahkan instruksi tambahan sesuai kebutuhan.
