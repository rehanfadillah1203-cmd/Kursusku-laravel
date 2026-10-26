# Matriks Pemenuhan Milestone - Pertemuan 9 (Week-09)

Proyek: KursusKu (Laravel)

| No | Requirement | Implementasi | File / Lokasi | Evidence | Status |
| --- | --- | --- | --- | --- | --- |
| 1 | Master layout reusable | Layout utama memakai `@yield` dan `@section`, halaman lain memakai `@extends` | `resources/views/layouts/app.blade.php` | `01-home.png` | Selesai |
| 2 | Navbar reusable & responsif | Navbar dipisah ke partial, memakai Bootstrap collapse (hamburger di mobile) | `resources/views/partials/navbar.blade.php` | `01-home.png` | Selesai |
| 3 | Tema visual kuning pisang | Palet kuning pisang, teks cokelat tua, tanpa neon/glassmorphism/gradasi | `public/css/` (sesuaikan nama file) | `01-home.png` | Selesai |
| 4 | Hero section 2 kolom | Teks di satu kolom, gambar di kolom lain | `public/images/hero-kursus.jpg` | `01-home.png` | Selesai |
| 5 | Form pendaftaran kursus | Form dengan dropdown "Pilihan Kursus" dan tombol "Daftar Sekarang" | `resources/views/enrollments/create.blade.php` | `02-form.png` | Selesai |
| 6 | Cek ketersediaan kursus via AJAX | Memilih kursus memanggil endpoint `availability` dan menampilkan sisa kursi tanpa reload | Route + controller `availability` (sesuaikan nama) | `03-availability.png` | Selesai |
| 7 | Respons JSON valid | Endpoint mengembalikan `course`, `code`, `remaining`, `status` (contoh: `WEB-01`, `12`, `open`) | Controller `availability` | `04-network-json.png` | Selesai |
| 8 | Tampilan responsif (mobile) | Diuji di mode responsif DevTools 360 px | Seluruh halaman | `02-form.png`, `03-availability.png` | Selesai |
| 9 | Dokumentasi penggunaan AI | Log konsultasi AI yang jujur | `ai-usage-week09.md` | - | Selesai |

## Daftar Evidence

| File | Isi | Cara Pengambilan |
| --- | --- | --- |
| `01-home.png` | Halaman beranda (hero, navbar, tema) | Screenshot halaman `/` |
| `02-form.png` | Form pendaftaran di tampilan mobile | Mode responsif DevTools, halaman `/enrollments/create` |
| `03-availability.png` | Pesan "Tersisa 12 kursi" setelah memilih kursus | Pilih kursus di dropdown, lalu screenshot |
| `04-network-json.png` | Request `availability` di tab Network, sub-tab Preview | DevTools, Network, Fetch/XHR |