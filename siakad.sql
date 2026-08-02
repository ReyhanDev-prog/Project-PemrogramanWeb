CREATE DATABASE IF NOT EXISTS siakad_sederhana;
USE siakad_sederhana;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','dosen','mahasiswa') NOT NULL
);

CREATE TABLE dosen (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNIQUE NOT NULL,
    nidn VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNIQUE NOT NULL,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    program_studi VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE mata_kuliah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_mk VARCHAR(10) UNIQUE NOT NULL,
    nama_mk VARCHAR(100) NOT NULL,
    sks INT NOT NULL,
    semester_ajaran VARCHAR(10),
    dosen_id INT,
    FOREIGN KEY (dosen_id) REFERENCES dosen(id) ON DELETE SET NULL
);

CREATE TABLE krs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_id INT NOT NULL,
    mata_kuliah_id INT NOT NULL,
    semester VARCHAR(10) NOT NULL,
    tahun_akademik VARCHAR(10) NOT NULL,
    nilai VARCHAR(2),
    FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa(id) ON DELETE CASCADE,
    FOREIGN KEY (mata_kuliah_id) REFERENCES mata_kuliah(id) ON DELETE CASCADE,
    UNIQUE KEY unique_krs (mahasiswa_id, mata_kuliah_id, semester, tahun_akademik)
);

-- Data awal
INSERT INTO users (username, password, role) VALUES 
('admin', MD5('admin123'), 'admin'),
('dosen1', MD5('dosen123'), 'dosen'),
('mahasiswa1', MD5('mhs123'), 'mahasiswa');

INSERT INTO dosen (user_id, nidn, nama) VALUES (2, '1234567890', 'Cecep Suwanda, S.Si., M.Kom.');
INSERT INTO mahasiswa (user_id, nim, nama, program_studi) VALUES (3, '301230017', 'Reyhan Aditya Kusumah', 'Teknik Informatika');

INSERT INTO mata_kuliah (kode_mk, nama_mk, sks, semester_ajaran, dosen_id) VALUES
('MK001', 'Pemrograman Web', 3, 'Ganjil', 1),
('MK002', 'Basis Data', 3, 'Ganjil', 1);
