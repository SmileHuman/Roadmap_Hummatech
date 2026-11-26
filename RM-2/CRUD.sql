INSERT INTO kelas (nama_kelas, id_jurusan) 
VALUES ('X RPL 1', 1);

INSERT INTO siswa (nisn, nama, nilai, id_kelas) 
VALUES  ('0011223344', 'Budi Santoso', 85, 1),
        ('0011223345', 'Budi Sampul', 80, 1),
        ('0011223346', 'Budi Hartono', 70, 1);


SELECT * FROM siswa;

SELECT FROM siswa
WHERE id_siswa = 1;

SELECT id_siswa, nisn, nama, nilai
FROM siswa
WHERE nilai >= 80
ORDER BY nilai DESC;

SELECT id_siswa, nisn, nama, nilai
FROM siswa
WHERE nilai >= 80
ORDER BY nilai ASC;


UPDATE siswa
SET nama = "Raditya"
WHERE nisn = "111"

UPDATE siswa SET nilai = 32 WHERE nis = '111';
UPDATE siswa SET nilai = 93 WHERE nis = '222';
UPDATE siswa SET nilai = 11 WHERE nis = '333';

UPDATE kelas
SET nama_kelas = 'X RPL A'
WHERE id_kelas = 1;


DELETE FROM siswa
WHERE id = 1;

DELETE FROM siswa WHERE nisn = "111";
DELETE FROM siswa WHERE nisn = "222";
DELETE FROM siswa WHERE nisn = "333";