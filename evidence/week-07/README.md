# KursusKu

Project praktikum Pemrograman Web III (Pertemuan 7): memindahkan prototype KursusKu dari PHP biasa ke Laravel dengan alur Route -> Controller -> Blade View.

## Requirement

- PHP 8.1 atau lebih baru (sesuaikan dengan versi yang kamu pakai, panduan kelas meminta 8.3+)
- Composer
- Laravel 10 (sesuaikan dengan hasil `php artisan --version`)
- Laragon / web server lokal

## Cara Menjalankan

1. Buka terminal pada folder project.
2. Jalankan: `composer install`
3. Salin `.env.example` menjadi `.env` jika diperlukan.
4. Jalankan: `php artisan key:generate`
5. Jalankan: `php artisan serve`
6. Buka alamat yang ditampilkan terminal (umumnya http://127.0.0.1:8000).

## Fitur Milestone 7

- Named route `home`
- `HomeController@index`
- Blade landing page (`resources/views/home.blade.php`)
- Data kursus dikirim dari controller
- Asset CSS dan image di folder `public`

## Alur Request

Browser (GET /) -> `routes/web.php` (route `home`) -> `HomeController@index` -> `home.blade.php` -> HTML response ke browser.

## Belum Dikerjakan

- Database
- CRUD
- Authentication
- Relasi data
