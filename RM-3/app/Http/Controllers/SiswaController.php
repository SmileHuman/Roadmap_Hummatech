<?php

namespace App\Http\Controllers;

use App\Models\ModelSiswa;
use Exception;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        try {
            $data = ModelSiswa::all();

            return response()->json([
                'data' => $data
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat mengambil data'
            ], 500);
        }
    }

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn'  => 'required|string',
            'nama'  => 'required|string',
            'kelas' => 'required|string'
        ]);

        $cekSiswa = ModelSiswa::where('nisn', $validated['nisn'])->first();

        if ($cekSiswa) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data siswa dengan NISN tersebut sudah ada'
            ], 422);
        }

        $siswa = ModelSiswa::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data telah disimpan',
            'data' => $siswa
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $data = ModelSiswa::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data siswa tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nisn'  => 'required|string',
            'nama'  => 'required|string',
            'kelas' => 'required|string'
        ]);

        $cekSiswa = ModelSiswa::where('nisn', $validated['nisn'])
            ->where('id', '!=', $id)
            ->first();

        if ($cekSiswa) {
            return response()->json([
                'status' => 'error',
                'message' => 'NISN sudah digunakan siswa lain'
            ], 422);
        }

        $data->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diperbarui',
            'data' => $data
        ], 200);
    }

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
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}
