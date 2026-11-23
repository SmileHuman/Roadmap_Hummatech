<?php

namespace App\Http\Controllers;

use App\Models\ModelSiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => ModelSiswa::all()
        ], 200);
    }

    public function show(string $id)
    {
        $siswa = ModelSiswa::find($id);

        if (!$siswa) {
            return response()->json([
                'message' => 'Data siswa tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'data' => $siswa
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nisn' => 'required|string|unique:data_siswa,nisn',
            'nama' => 'required|string',
            'nilai' => 'required|numeric'
        ]);

        $siswa = ModelSiswa::create($data);

        return response()->json([
            'message' => 'Data siswa berhasil ditambahkan',
            'data' => $siswa
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $siswa = ModelSiswa::find($id);

        if (!$siswa) {
            return response()->json([
                'message' => 'Data siswa tidak ditemukan'
            ], 404);
        }

        $data = $request->validate([
            'nama' => 'required|string',
            'nilai' => 'required|numeric'
        ]);

        $siswa->update($data);

        return response()->json([
            'message' => 'Data siswa berhasil diperbarui',
            'data' => $siswa
        ], 200);
    }

    public function destroy(string $id)
    {
        $siswa = ModelSiswa::find($id);

        if (!$siswa) {
            return response()->json([
                'message' => 'Data siswa tidak ditemukan'
            ], 404);
        }

        $siswa->delete();

        return response()->json([
            'message' => 'Data siswa berhasil dihapus'
        ], 200);
    }
}
