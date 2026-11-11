<?php

namespace App\Repositories;

use App\Models\ModelSiswa;
use Illuminate\Support\Facades\Cache;

class SiswaRepository
{
    public function index()
    {
        $data = ModelSiswa::all();
        
        return $data ? $data->toArray() : null;
    }
    public function show(string $id)
    {
        $data = ModelSiswa::find($id);

        return $data ? $data->toArray() : null;

    }
    public function store(array $siswa) {
        return ModelSiswa::create($siswa);
    }
    public function update() {}
    public function destroy() {}
}
