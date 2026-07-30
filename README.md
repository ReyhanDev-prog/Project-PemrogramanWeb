# Project-PemrogramanWeb
# 📘 README.md untuk Repository SIAKAD Sederhana

Tambahkan file `README.md` di root folder `siakad/` dengan isi sebagai berikut:

---

# SIAKAD Sederhana
**Sistem Informasi Akademik** sederhana berbasis PHP native (tanpa framework) dengan template AdminLTE dan Bootstrap.

---

## Fitur
- **Admin** – Kelola data dosen, mahasiswa, dan mata kuliah (CRUD).
- **Dosen** – Isi nilai mahasiswa untuk mata kuliah yang diampu.
- **Mahasiswa** – Isi KRS (Kartu Rencana Studi) dan hitung IPK.

---

## 🛠 Teknologi
- **Backend:** PHP 8.x (native, tanpa framework)
- **Frontend:** HTML, CSS, JavaScript (Bootstrap 4, AdminLTE 3)
- **Database:** MySQL
- **Version Control:** Git (commit > 25 kali)

---

## Struktur Folder

siakad/
├── assets/              # CSS, JS, plugin
├── config/
│   └── database.php     # Koneksi database
├── admin/               # Modul Admin (CRUD dosen, mahasiswa, MK)
├── dosen/               # Modul Dosen (isi nilai)
├── mahasiswa/           # Modul Mahasiswa (KRS, IPK)
├── login.php
├── logout.php
├── dashboard.php
├── index.php
├── siakad.sql           # Skema database + data awal
└── README.md
```

---

## Instalasi
1. **Clone repositori** (atau unduh zip):
   ```bash
   git clone https://github.com/username/siakad-sederhana.git
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


---

## Cara Menambahkan ke Repository

1. Buat file `README.md` di root folder `siakad/`.
2. Copy-paste isi di atas.
3. Tambahkan screenshot (jika ada) di folder `screenshots/` dan tautkan di bagian **Screenshot**.
4. Commit dan push ke GitHub:
   ```bash
   git add README.md
   git commit -m "Menambahkan README.md"
   git push origin main
   ```

---

Selesai! File README ini akan membantu pengguna lain memahami proyek Anda. 😊
