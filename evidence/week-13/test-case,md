# Test Case Praktikum 13 — Search, Filter Status, dan Pagination

## Informasi Pengujian

| Item | Keterangan |
|---|---|
| Proyek | KursusKu (Laravel 10) |
| Halaman diuji | Course Index (`/courses`) |
| Basis URL | `http://kursusku-laravel.test:8080` |
| Tanggal pengujian | 21/11/2026 |
| Browser | Google Chrome |
| Jumlah data (total Course) | 28 |
| Jumlah status open / closed / draft | 13 / 7 / 8 |
| Data per halaman | 10 |

## Implementasi yang Diuji

- Search parameter `q` pada kolom `code` dan `name` (LIKE).
- Filter `status` dengan whitelist `open`, `closed`, `draft`.
- Pagination `paginate(10)` dengan `withQueryString()`.
- Empty state menggunakan `@forelse`.
- Form GET sebagai fallback tanpa JavaScript.

## Skenario Uji Utama

| No | Skenario | Input (URL) | Expected | Actual | Status |
|---|---|---|---|---|---|
| 1 | 0 hasil | `/courses?q=tidak-ada-xyz-999` | Empty state tampil tanpa error | Tabel kosong, tampil teks "Tidak ada kursus yang sesuai pencarian/filter." dan ringkasan "Menampilkan 0-0 dari 0 kursus". Tidak ada error. | Pass |
| 2 | 1 hasil | `/courses?q=WEB-MOD` | Tepat 1 course tampil | Tampil 1 baris (WEB-MOD / Web Modern / Open), ringkasan "Menampilkan 1-1 dari 1 kursus". | Pass |
| 3 | Lebih dari 10 hasil | `/courses` | Halaman 1 maksimal 10 data + pagination | Tampil 10 baris, ringkasan "Menampilkan 1-10 dari 28 kursus", pagination halaman 1, 2, 3 muncul. | Pass |
| 4 | Keyword dengan spasi | `/courses?q=Web Modern` | Keyword terbaca benar, course Web Modern tampil | Diuji dengan keyword "web modern". URL menjadi `?q=web+modern&status=`, kotak cari tetap terisi, tampil 1 baris WEB-MOD / Web Modern. Pencarian tidak peka huruf besar-kecil. | Pass |
| 5 | Filter + halaman 2 | `/courses?q=Kursus&page=2` (atau `status=...&page=2`) | `q`/`status` tetap ada di URL dan hasil halaman 2 sesuai | Diuji dengan keyword "kursus". URL `?q=kursus&page=2`, kotak cari tetap terisi, tampil 8 baris (DMY-02 sampai DMY-09), ringkasan "Menampilkan 11-18 dari 18 kursus", halaman 2 aktif di pagination. | Pass |

## Pengujian Tambahan

| No | Skenario | Input (URL) | Expected | Actual | Status |
|---|---|---|---|---|---|
| 6 | Filter status open | `/courses?status=open` | Semua baris berstatus Open | Dropdown dipilih "Open", URL menjadi `?q=&status=open`. Semua baris di halaman 1 berstatus Open, ringkasan "Menampilkan 1-10 dari 13 kursus", pagination halaman 1 dan 2. | Pass |
| 7 | Filter status tidak valid | `/courses?status=abc` | Status diabaikan, semua data tampil (bukan 0 hasil) | Belum diuji | - |
| 8 | Kombinasi search + filter | `/courses?q=kursus&status=open` | Hanya course sesuai keyword dan berstatus open | Belum diuji | - |
| 9 | Tombol Reset | Klik Reset | URL kembali ke `/courses`, semua data tampil | Belum diuji | - |

## Pengujian Tanpa JavaScript

| Langkah | Expected | Actual | Status |
|---|---|---|---|
| Nonaktifkan JavaScript (DevTools) lalu reload `/courses` | Halaman tetap terbuka | Halaman tetap terbuka dan tabel tampil normal. Peringatan JavaScript nonaktif muncul di tab Sources DevTools. | Pass |
| Isi keyword, klik Cari | Hasil berubah lewat reload normal | Hasil pencarian "kursus" tampil lewat reload halaman. | Pass |
| Klik halaman 2 | Pagination berfungsi, `q` tetap di URL | Halaman 2 tampil (DMY-02 dan seterusnya), URL berisi `q=kursus&page=2`, kotak cari tetap terisi. | Pass |
| Aktifkan kembali JavaScript, reload | Tidak ada regresi | Belum diuji | - |

URL yang dipakai saat JavaScript nonaktif: `http://kursusku-laravel.test:8080/courses?q=kursus&page=2`

## Evidence

| File | Keterangan |
|---|---|
| `01-course-index.png` | Course index normal (10 baris, pagination) |
| `02-search-zero.png` | Skenario 0 hasil (empty state) |
| `03-search-satu-hasil.png` | Skenario 1 hasil (`q=WEB-MOD`) |
| `04-filter-status.png` | Filter status Open (`status=open`) |
| `05-keyword-spasi.png` | Keyword dengan spasi (`q=web+modern`) |
| `06-page2-query-state.png` | Halaman 2 dengan `q=kursus&page=2` |
| `07-tanpa-javascript.png` | Pencarian dan pagination dengan JavaScript nonaktif |
| `08-controller-index.png` | Method `index()` pada `CourseController.php` |
| `09a-view-form.png` | Form GET pada `index.blade.php` |
| `09b-view-pagination.png` | `{{ $courses->links() }}` pada `index.blade.php` |
| `10-test-matrix.png` | Preview Markdown tabel skenario uji |