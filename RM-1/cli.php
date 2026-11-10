<?php
$todos = [];
function tampilkanMenu()
{
    echo "\n====== Aplikasi Tambah Tugas ======\n";
    echo "\n1. Lihat semua tugas\n";
    echo "2. Tambah tugas\n";
    echo "3. Hapus tugas\n";
    echo "4. Menghentikan Program\n";
    echo "Pilih antara No(1 ~ 4): ";
}

while (true) {
    tampilkanMenu();
    $pilihan = trim(fgets(STDIN));

    switch ($pilihan) {
        case 1:
            echo "\n====== Daftar Tugas ======\n";
            try{
                if (empty($todos)) {
                    throw new Exception("\nTugas Kosong");
            }
            foreach ($todos as $index => $tugas) {
                    $nomor = $index + 1;
                    echo "{$nomor}. {$tugas}\n";
                }
            }
            catch (Exception $e){
            echo $e->getMessage();
            }
            echo "\n";

            
            break;
        case 2:
            echo "Masukkan nama tugas: ";
            $tambahTugas = trim(fgets(STDIN));

            try {
                if (empty($tambahTugas)) {
                    throw new Exception("Input tidak boleh kosong!");
                }

                $todos[] = $tambahTugas;
                echo "Data berhasil disimpan!\n";

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage() . "\n";
            }

            break;
        case 3:
    echo "Masukkan nomor tugas yang ingin dihapus: ";
    $inputHapus = trim(fgets(STDIN));

    try {
        if ($inputHapus === '') {
            throw new Exception("Input tidak boleh kosong!");
        }

        if (!is_numeric($inputHapus)) {
            throw new Exception("Input harus berupa angka!");
        }

        $indexTugas = (int)$inputHapus - 1;

        if (!isset($todos[$indexTugas])) {
            throw new Exception("Tugas tidak ditemukan!");
        }

        unset($todos[$indexTugas]);
        $todos = array_values($todos);
        echo "Tugas berhasil dihapus!\n";

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
    break;
        case 4:
            echo "Kamu menghentikan program\n";
            break 2;

        default:
            echo "\nInput tidak valid\n";
    }
}
