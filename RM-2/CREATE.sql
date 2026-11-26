CREATE DATABASE sekolah_sql;

USE sekolah_sql;

-- Tabel jurusan
CREATE TABLE jurusan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_jurusan VARCHAR(100) NOT NULL UNIQUE
);

-- Tabel kelas
CREATE TABLE kelas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR(50) NOT NULL,
    jurusan_id INT NOT NULL,

    CONSTRAINT fk_kelas_jurusan
    FOREIGN KEY (jurusan_id)
        REFERENCES jurusan(id)
);

-- Tabel siswa
CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nisn VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    nilai INT NOT NULL,
    kelas_id INT NOT NULL,

    CONSTRAINT fk_siswa_kelas
    FOREIGN KEY (kelas_id)
        REFERENCES kelas(id)
);