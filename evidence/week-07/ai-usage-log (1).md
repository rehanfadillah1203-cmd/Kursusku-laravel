# AI Usage Log - Pertemuan 7 (KursusKu)

Catatan: periksa dan sesuaikan kolom "diterima/ditolak" dengan yang benar-benar kamu lakukan.

| Waktu | Masalah/tujuan | Prompt singkat | Yang diterima / ditolak |
|---|---|---|---|
| 22/10/2026 | Cek apakah Laravel Installer sudah ada | "cara cek Laravel Installer" | Diterima: perintah `laravel --version`; installer belum ada, pakai `composer create-project` |
| 22/10/2026 | Versi PHP 8.1 tidak sesuai panduan (8.3+) | Mengirim output `php -v` | Diterima: saran memakai Laravel 10 / upgrade PHP |
| 22/10/2026 | `php artisan` gagal di folder `kursusku-prototype` | Mengirim error `artisan` tidak ditemukan | Diterima: kerja di folder `kursusku` (proyek Laravel), bukan prototype |
| 22/10/2026 | Error `Controller` tidak ditemukan | Mengirim screenshot Explorer dan error `route:list` | Diterima: file `controllers.php` salah nama, diganti `Controller.php`; isi file dikoreksi |
| 22/10/2026 | `style.css` tidak bisa masuk folder `css` | Mengirim screenshot `public/` | Diterima: `css` ternyata file kosong, dihapus lalu dibuat folder `css` |
| 22/10/2026 | Membuat CSS dan Blade landing page | Meminta isi CSS tema "Pisang Pride" dan `home.blade.php` | Diterima sebagian: CSS dan Blade dipakai, saya pelajari fungsi class dan `@foreach` |
| 22/10/2026 | Diagram request lifecycle | Meminta diagram Browser -> Route -> Controller -> Blade | Diterima: gambar dipakai sebagai evidence |
