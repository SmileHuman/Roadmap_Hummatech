<?php

namespace App\Http\Controllers;

use App\Models\ModelSiswa;
use Exception;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;
use Symfony\Component\Process\ExecutableFinder;

class SiswaController extends Controller
{
    public function index()
    {
        try {
            $data =  ModelSiswa::all();

            if (!$data) {
                throw new Exception('data siswa masih kosong');
            }
            return response()->json([
                'data' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ]);
        }
    }
    public function show(string $id)
    {

        $data = ModelSiswa::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'data tidak ditemukan'
            ]);
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function store(Request $request)
{
    // 1. Validasi format input dasar
    $validated = $request->validate([
        'nisn'  => 'required|string',
        'nama'  => 'required|string',
        'kelas' => 'required|string'
    ]);

    
    $cekSiswa = ModelSiswa::where('nisn', $validated['nisn'])->first();

    if ($cekSiswa) {
        return response()->json([
            'status'  => 'error',
            'message' => 'Data siswa dengan NISN tersebut sudah ada'
        ], 422);
    }
    
    $siswa = ModelSiswa::create($validated);

    return response()->json([
        'status'  => 'success',
        'message' => 'Data telah disimpan',
        'data'    => $siswa
    ], 201);
}
    public function update(string $id, Request $request)
    {
        $data = ModelSiswa::find($id);
        if (!$data) {
            return response()->json([
                'message' => 'siswa tidak ditemukan tidak ditemukan'
            ],404);
        }
        $validated = $request->validate([
        'nisn'  => 'required|string',
        'nama'  => 'required|string',
        'kelas' => 'required|string'
    ]);

        $data->update($validated);

        return response()->json([
            'message' => 'data berhasil di update!',
            'data' => $data
        ], 200);
    }
    public function destroy(string $id)
    {
        $data = ModelSiswa::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'data tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'message' => 'data berhasil dihapus'
        ], 404);
    }
}
