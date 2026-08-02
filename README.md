# Project-PemrogramanWeb

# SIAKAD
**Sistem Informasi Akademik** sederhana berbasis PHP native (tanpa framework) dengan template AdminLTE dan Bootstrap.

---

## Fitur
- **Admin** – Kelola data dosen, mahasiswa, dan mata kuliah (CRUD).
- **Dosen** – Isi nilai mahasiswa untuk mata kuliah yang diampu.
- **Mahasiswa** – Isi KRS (Kartu Rencana Studi) dan hitung IPK.

---

## Teknologi
- **Backend:** PHP 8.x (native, tanpa framework)
- **Frontend:** HTML, CSS
- **Database:** MySQL
- **Version Control:** Git (commit > 25 kali)

---

## Struktur Proyek

```text
siakad/
├── admin/
│   ├── dosen.php
│   ├── dosen_tambah.php
│   ├── dosen_edit.php
│   ├── mahasiswa.php
│   ├── mahasiswa_tambah.php
│   ├── mahasiswa_edit.php
│   ├── matakuliah.php
│   ├── matakuliah_tambah.php
│   ├── matakuliah_edit.php
│   ├── proses.php
│   ├── header.php
│   ├── footer.php
│   └── index.php          # Dashboard Admin
├── config/
│   └── database.php       # Konfigurasi koneksi database
├── dosen/
│   ├── index.php          # Dashboard Dosen
│   ├── nilai.php          # Input dan kelola nilai mahasiswa
│   ├── header.php
│   └── footer.php
├── mahasiswa/
│   ├── index.php          # Dashboard Mahasiswa
│   ├── krs.php            # Pengisian KRS
│   ├── ipk.php            # Perhitungan dan tampilan IPK
│   ├── header.php
│   └── footer.php
├── config/
│   └── database.php       # Koneksi database
├── dashboard.php          # Dashboard berdasarkan hak akses
├── index.php              # Halaman utama
├── login.php              # Login pengguna
├── logout.php             # Logout pengguna
├── siakad.sql             # Struktur database dan data awal
└── README.md              # Dokumentasi proyek
```

---

## Instalasi
1. **Clone repositori** (atau unduh zip):
   ```bash
   https://github.com/ReyhanDev-prog/Project-PemrogramanWeb.git
   ```
   
2. Pindahkan folder ke `htdocs` (XAMPP) atau `www` (Laragon).
3. Import `siakad.sql` ke MySQL (via phpMyAdmin atau command line).
4. Sesuaikan koneksi database di `config/database.php`:
   ```php
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $dbname = 'siakad_sederhana';
   ```
5. Jalankan server Apache & MySQL.
6. Akses `http://localhost/siakad/`.

---

## Akun Demo
| Role      | Username    | Password   |
|-----------|-------------|------------|
| Admin     | `admin`     | `admin123` |
| Dosen     | `dosen1`    | `dosen123` |
| Mahasiswa | `mahasiswa1`| `mhs123`   |

---

## Catatan Pengembangan
- Menggunakan `__DIR__` untuk keperluan `require_once` agar path absolut.
- Password di-hash dengan MD5 (hanya untuk demonstrasi, tidak aman untuk produksi).
- Proyek ini dibuat sebagai tugas akademik, bukan untuk production deployment.

---

## Kontributor
- Reyhan Aditya K / 301230017

---

## Lisensi
MIT License – bebas digunakan untuk keperluan belajar.

