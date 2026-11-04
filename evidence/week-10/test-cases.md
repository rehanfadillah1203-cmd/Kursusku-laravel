# Test Cases: Modul Course (KursusKu)

Dokumen ini berisi daftar skenario pengujian (Test Cases) untuk memastikan fungsionalitas CRUD Course, validasi input, serta navigasi antarmuka pada aplikasi **KursusKu**.

## 1. Pengujian Navigasi & Antarmuka (Navbar & UI)

| ID Test | Skenario Pengujian | Langkah Pengujian | Hasil yang Diharapkan (Expected) | Status |
| :--- | :--- | :--- | :--- | :--- |
| **TC-NAV-01** | Mengakses Halaman Beranda | 1. Buka aplikasi.<br>2. Klik menu **Beranda** pada navbar. | Halaman beranda utama (`home`) terbuka dengan benar. | [ ] Pass / [ ] Fail |
| **TC-NAV-02** | Mengakses Menu Kursus (Database) | 1. Klik menu **Kursus** pada navbar. | Pengguna diarahkan ke rute `courses.index` dan menampilkan daftar kursus dari database MySQL. | [ ] Pass / [ ] Fail |
| **TC-NAV-03** | Mengakses Menu Pendaftaran | 1. Klik menu **Pendaftaran** pada navbar. | Halaman formulir pendaftaran (`enrollments.create`) terbuka dengan baik. | [ ] Pass / [ ] Fail |

---

## 2. Pengujian CRUD Kursus (Database Integration)

| ID Test | Skenario Pengujian | Langkah Pengujian | Hasil yang Diharapkan (Expected) | Status |
| :--- | :--- | :--- | :--- | :--- |
| **TC-CRS-01** | Menampilkan Daftar Kursus (`index`) | 1. Akses halaman `/courses`. | Menampilkan tabel/kartu daftar kursus yang tersimpan di dalam database tabel `courses`. | [ ] Pass / [ ] Fail |
| **TC-CRS-02** | Membuka Form Tambah Kursus (`create`) | 1. Pada halaman daftar kursus, klik tombol **Tambah Kursus**. | Sistem menampilkan halaman formulir tambah kursus (`courses.create`). | [ ] Pass / [ ] Fail |
| **TC-CRS-03** | Validasi Input Kosong (`store`) | 1. Buka form tambah kursus.<br>2. Biarkan kosong semua input.<br>3. Klik tombol **Simpan**. | Sistem menolak penyimpanan dan memunculkan pesan error validasi (form wajib diisi). | [ ] Pass / [ ] Fail |
| **TC-CRS-04** | Berhasil Menambah Kursus Baru (`store`) | 1. Buka form tambah kursus.<br>2. Isi nama kursus, deskripsi, dan sisa kuota dengan data valid.<br>3. Klik tombol **Simpan**. | 1. Data berhasil disimpan ke database tabel `courses`.<br>2. Pengguna dialihkan kembali ke halaman index dengan pesan sukses (*flash message*).<br>3. Kursus baru otomatis tampil di daftar kursus. | [ ] Pass / [ ] Fail |

---

## 3. Pengujian Lingkungan & Aset (Environment & Vite)

| ID Test | Skenario Pengujian | Langkah Pengujian | Hasil yang Diharapkan (Expected) | Status |
| :--- | :--- | :--- | :--- | :--- |
| **TC-ENV-01** | Memastikan Server Lokal Berjalan | 1. Jalankan `php artisan serve`.<br>2. Akses `http://127.0.0.1:8000`. | Halaman utama terbuka tanpa kendala server. | [ ] Pass / [ ] Fail |
| **TC-ENV-02** | Memastikan Aset Vite Berjalan | 1. Jalankan `npm run dev`.<br>2. Muat ulang halaman aplikasi di browser. | Tampilan gaya CSS/JS ter-load sempurna tanpa error `ViteManifestNotFoundException`. | [ ] Pass / [ ] Fail |