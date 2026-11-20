<?php

namespace App\Repositories;

use App\Models\ModelSiswa;
use App\Interfaces\SiswaRepositoryInterface;

class SiswaRepository implements SiswaRepositoryInterface
{
    public function index()
    {
        return ModelSiswa::all();
    }

    public function show(int $id)
    {
        return ModelSiswa::find($id);
    }

    public function store(array $data)
    {
        return ModelSiswa::create($data);
    }

    public function update(int $id, array $data)
    {
        $siswa = ModelSiswa::find($id);

        if (!$siswa) {
            return null;
        }

        $siswa->update($data);

        return $siswa;
    }

    public function delete(int $id)
    {
        $siswa = ModelSiswa::find($id);

        if (!$siswa) {
            return false;
        }

        return $siswa->delete();
    }
}
