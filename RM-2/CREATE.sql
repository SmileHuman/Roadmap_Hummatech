CREATE DATABASE db_sekolah;

USE db_sekolah;

-- Tabel jurusan
CREATE TABLE jurusan (
    id_jurusan INT AUTO_INCREMENT PRIMARY KEY,
    nama_jurusan VARCHAR(100) NOT NULL UNIQUE
);

-- Tabel kelas
CREATE TABLE kelas (
    id_kelas INT AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR(50) NOT NULL,
    id_jurusan INT NOT NULL,

    FOREIGN KEY (id_jurusan)
        REFERENCES jurusan(id_jurusan)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

-- Tabel siswa
CREATE TABLE siswa (
    id_siswa INT AUTO_INCREMENT PRIMARY KEY,
    nisn VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    nilai DECIMAL(5,2) NOT NULL,
    id_kelas INT NOT NULL,

    FOREIGN KEY (id_kelas)
        REFERENCES kelas(id_kelas)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

-- Tabel ekstrakurikuler
CREATE TABLE ekstrakurikuler (
    id_ekskul INT AUTO_INCREMENT PRIMARY KEY,
    nama_ekskul VARCHAR(100) NOT NULL UNIQUE
);

-- Tabel penghubung siswa dan ekstrakurikuler
CREATE TABLE siswa_ekskul (
    id_siswa INT NOT NULL,
    id_ekskul INT NOT NULL,

    PRIMARY KEY (id_siswa, id_ekskul),

    FOREIGN KEY (id_siswa)
        REFERENCES siswa(id_siswa)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    FOREIGN KEY (id_ekskul)
        REFERENCES ekstrakurikuler(id_ekskul)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);