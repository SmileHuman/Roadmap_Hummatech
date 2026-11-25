--========================================
-- 1. CREATE (INSERT)
-- ==========================================
INSERT INTO jurusan (nama_jurusan) VALUES ('Rekayasa Perangkat Lunak');
INSERT INTO jurusan (nama_jurusan) VALUES ('Teknik Komputer dan Jaringan');

INSERT INTO kelas (nama_kelas, id_jurusan) VALUES ('X RPL 1', 1);
INSERT INTO kelas (nama_kelas, id_jurusan) VALUES ('X TKJ 1', 2);

INSERT INTO siswa (nisn, nama, nilai, id_kelas) VALUES ('0011223344', 'Budi Santoso', 85.50, 1);
INSERT INTO siswa (nisn, nama, nilai, id_kelas) VALUES ('0011223345', 'Siti Aminah', 90.00, 1);
INSERT INTO siswa (nisn, nama, nilai, id_kelas) VALUES ('0011223346', 'Andi Pratama', 78.00, 2);

INSERT INTO ekstrakurikuler (nama_ekskul) VALUES ('Pramuka');
INSERT INTO ekstrakurikuler (nama_ekskul) VALUES ('Basket');

INSERT INTO siswa_ekskul (id_siswa, id_ekskul) VALUES (1, 1);
INSERT INTO siswa_ekskul (id_siswa, id_ekskul) VALUES (1, 2);
INSERT INTO siswa_ekskul (id_siswa, id_ekskul) VALUES (2, 1);


-- ==========================================
-- 2. READ (SELECT & JOIN)
-- ==========================================
SELECT * FROM siswa;

SELECT id_siswa, nisn, nama, nilai
FROM siswa
WHERE nilai >= 80
ORDER BY nilai DESC;

-- JOIN siswa, kelas, dan jurusan
SELECT siswa.id_siswa, siswa.nisn, siswa.nama, siswa.nilai, kelas.nama_kelas, jurusan.nama_jurusan
FROM siswa
INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas
INNER JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan;

-- JOIN siswa dengan ekstrakurikuler melalui tabel penghubung
SELECT siswa.nama, ekstrakurikuler.nama_ekskul
FROM siswa
LEFT JOIN siswa_ekskul ON siswa.id_siswa = siswa_ekskul.id_siswa
LEFT JOIN ekstrakurikuler ON siswa_ekskul.id_ekskul = ekstrakurikuler.id_ekskul;


-- ==========================================
-- 3. UPDATE
-- ==========================================
UPDATE siswa
SET nilai = 88.00
WHERE id_siswa = 1;

UPDATE kelas
SET nama_kelas = 'X RPL A'
WHERE id_kelas = 1;


-- ==========================================
-- 4. DELETE
-- ==========================================
DELETE FROM siswa_ekskul
WHERE id_siswa = 1 AND id_ekskul = 2;

DELETE FROM siswa
WHERE id_siswa = 3;