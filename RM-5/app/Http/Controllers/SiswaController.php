<?php

namespace App\Http\Controllers;

use App\Handlers\SiswaHandler;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct(
        private SiswaHandler $handler
    ) {}

    public function index()
    {
        return response()->json([
            'data' => $this->handler->index()
        ]);
    }

    public function show(string $id)
    {
        $data = $this->handler->show((int) $id);

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
            'nama' => 'required|string',
            'nilai' => 'required|numeric'
        ]);

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $this->handler->store($data)
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'nilai' => 'required|numeric'
        ]);

        $siswa = $this->handler->update((int) $id, $data);

        if (!$siswa) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data' => $siswa
        ]);
    }

    public function destroy(string $id)
    {
        $deleted = $this->handler->delete((int) $id);

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
