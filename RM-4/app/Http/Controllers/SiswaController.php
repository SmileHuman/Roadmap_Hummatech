<?php

namespace App\Http\Controllers;

use App\Models\ModelSiswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // MENAMPILKAN SEMUA SISWA
    public function index()
    {
        $data = ModelSiswa::all();

        return response()->json([
            'data' => $data
        ], 200);
    }

    // MENAMPILKAN SISWA BERDASARKAN ID
    public function show(string $id)
    {
        $data = ModelSiswa::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data siswa tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'data' => $data
        ], 200);
    }

    // MENAMBAHKAN SISWA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|string',
            'nama' => 'required|string',
            'kelas' => 'required|string'
        ]);

        $data = ModelSiswa::create($validated);

        return response()->json([
            'message' => 'Data siswa berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    // MEMPERBARUI SISWA
    public function update(Request $request, string $id)
    {
        $data = ModelSiswa::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data siswa tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nisn' => 'required|string',
            'nama' => 'required|string',
            'kelas' => 'required|string'
        ]);

        $data->update($validated);

        return response()->json([
            'message' => 'Data siswa berhasil diperbarui',
            'data' => $data
        ], 200);
    }

    // MENGHAPUS SISWA
    public function destroy(string $id)
    {
        $data = ModelSiswa::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data siswa tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'message' => 'Data siswa berhasil dihapus'
        ], 200);
    }
}
