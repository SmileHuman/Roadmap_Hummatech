<?php

namespace App\Http\Controllers;

use App\Services\SiswaService;
use App\Models\ModelSiswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct(
        private SiswaService $service
    ) {}

    public function index()
    {
        return response()->json([
            'data' => $this->service->index()
        ]);
    }

    public function show(string $id)
    {
        if (!ctype_digit($id)) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data = $this->service->show((int) $id);

        if (!$data) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nisn' => 'required|string|unique:data_siswa,nisn',
            'nama' => 'required|string|max:255',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);
        
        $this->service->store($data);

        return response()->json([
            'message' => 'Data berhasil ditambahkan'
        ], 201);
    }

    public function update(int $id, array $data)
    {
        $siswa = ModelSiswa::find($id);

        if (!$siswa) {
            return response()->json([
                'message' => 'data tidak ditemukan'
            ]);
        }

        $siswa->update($data);

        return $siswa->fresh();
    }

    public function destroy(string $id)
    {
        $deleted = $this->service->delete((int) $id);

        if (!$deleted) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
