# Test Case Pertemuan 11 - Course CRUD Lanjutan (KursusKu)

Nama: M Rahmad Hidayat
Mata kuliah: Pemrograman Web III
Tanggal uji: ____________

Catatan: gunakan data dummy dan database lokal saja. Isi kolom **Actual**, **Status** (Pass/Fail), dan **Bukti** (nama file screenshot) setelah menguji. Kasus bertanda ⭐ adalah yang paling disarankan oleh modul.

## A. Persiapan dan Detail

| No | Kasus | Langkah / Input | Expected | Actual | Status | Bukti |
|----|-------|-----------------|----------|--------|--------|-------|
| 1 | Route lengkap | `php artisan route:list --name=courses` | Ada index, create, store, show, edit, update, destroy | | | 01-route-list.png |
| 2 | Detail course | Klik **Detail** pada salah satu baris | Kode, nama, deskripsi, biaya, kuota, tanggal, status sesuai database | | | 02-course-show.png |
| 3 | Detail ID tidak ada | Buka `/courses/999999` | Halaman 404 | | | 03-show-404.png |

## B. Validasi Tambah (Store)

| No | Kasus | Langkah / Input | Expected | Actual | Status | Bukti |
|----|-------|-----------------|----------|--------|--------|-------|
| 4 ⭐ | Duplicate code saat create | Tambah course dengan code yang sudah ada, misal `WEB-001` | Ditolak, error tampil di bawah field code | | | 04-validation-duplicate-code.png |
| 5 | Nama kosong | `name` = (kosong) | Ditolak, error di field name | | | 05-name-required.png |
| 6 | Nama terlalu pendek | `name` = `AI` | Ditolak, minimal 3 karakter | | | 06-name-min.png |
| 7 ⭐ | Fee negatif | `fee` = `-1000` | Ditolak, minimal 0 | | | 07-fee-negative.png |
| 8 | Fee bukan angka | `fee` = `abc` (ubah type lewat DevTools) | Ditolak, harus integer | | | 08-fee-not-integer.png |
| 9 ⭐ | Quota nol | `quota` = `0` | Ditolak | | | 09-quota-0.png |
| 10 ⭐ | Quota 501 | `quota` = `501` | Ditolak | | | 10-quota-501.png |
| 11 | Quota minimum | `quota` = `1`, data lain valid | Diterima, muncul di index | | | 11-quota-1.png |
| 12 | Quota maksimum | `quota` = `500`, data lain valid | Diterima, muncul di index | | | 12-quota-500.png |
| 13 ⭐ | Tanggal invalid | Kirim `start_date` = `bukan-tanggal` (DevTools atau ubah type input) | Ditolak oleh rule date | | | 13-date-invalid.png |
| 14 ⭐ | Status invalid | Ubah `value` salah satu option menjadi `active` lewat DevTools, lalu submit | Ditolak, hanya draft/open/closed | | | 14-status-invalid.png |
| 15 | Tambah valid | Isi semua field dengan benar | Tersimpan, kembali ke index, pesan "Kursus berhasil ditambahkan." | | | 15-store-success.png |

## C. Edit dan Update

| No | Kasus | Langkah / Input | Expected | Actual | Status | Bukti |
|----|-------|-----------------|----------|--------|--------|-------|
| 16 | Form edit terisi | Klik **Edit** | Semua field berisi nilai database, termasuk tanggal | | | 16-course-edit.png |
| 17 ⭐ | Update dengan code sendiri | Ubah nama saja, code tidak diubah | Berhasil, tidak error unique | | | 17-update-own-code.png |
| 18 ⭐ | Update ke code course lain | Ganti code menjadi code milik course lain | Ditolak, error unique di field code | | | 18-update-duplicate-code.png |
| 19 | Input lama dipertahankan | Di edit, kosongkan nama lalu isi fee `500`, simpan | Error di name, nilai fee `500` tetap tampil (bukan kembali ke nilai database) | | | 19-old-input.png |
| 20 | Update normal | Ubah nama, fee, quota, atau status dengan nilai valid | Pindah ke detail, pesan "Kursus berhasil diperbarui.", data baru tampil | | | 20-update-success.png |

## D. Delete

| No | Kasus | Langkah / Input | Expected | Actual | Status | Bukti |
|----|-------|-----------------|----------|--------|--------|-------|
| 21 | Batal hapus | Buat course dummy `DEL-001`, klik **Hapus**, pilih Cancel | Data tetap ada | | | 21-delete-cancel.png |
| 22 ⭐ | Hapus course dummy | Klik **Hapus**, pilih OK | Data hilang dari index, pesan "Kursus berhasil dihapus." | | | 22-delete-success.png |

## Ringkasan

| Total kasus | Pass | Fail |
|-------------|------|------|
| 22 | | |

Minimal yang dikumpulkan modul: 12 kasus. Kasus ⭐ berjumlah 10, jadi tambahkan minimal 2 kasus lain agar cukup.

## Catatan Fail dan Perbaikan

| No kasus | Masalah | Penyebab | Perbaikan |
|----------|---------|----------|-----------|
| | | | |

## Checklist Akhir

- [ ] Route resource Course lengkap
- [ ] Halaman detail dapat dibuka
- [ ] StoreCourseRequest dan UpdateCourseRequest memakai `authorize() = true`
- [ ] Store dan Update memakai `$request->validated()`
- [ ] Unique pada update mengabaikan record sendiri
- [ ] Edit view memakai `old('field', $course->field)`
- [ ] Error tampil di dekat tiap field
- [ ] Delete memakai CSRF, `@method('DELETE')`, dan konfirmasi
- [ ] Flash success tampil setelah aksi berhasil
- [ ] Minimal 12 test case tercatat dan screenshot tersimpan