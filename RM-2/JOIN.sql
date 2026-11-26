SELECT 
    s.id AS id_siswa,
    s.nisn,
    s.nama AS nama_siswa,
    s.nilai,
    k.nama_kelas,
    j.nama_jurusan
FROM siswa s
INNER JOIN kelas k ON s.kelas_id = k.id
INNER JOIN jurusan j ON k.jurusan_id = j.id;