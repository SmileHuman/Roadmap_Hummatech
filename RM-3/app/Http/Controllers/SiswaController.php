<?php

namespace App\Http\Controllers;

use App\Models\ModelSiswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return ModelSiswa::all();
        // $data = ModelSiswa::all();
        // return response()->json([
        //     'data' => $data
        // ]);
    }
    public function show(string $id)
    {
        return ModelSiswa::findOrFail($id);
    }
    public function store(Request $request)
    {

        $data = ([$request]);

        return ModelSiswa::create($data);
    }
    public function update(string $id, Request $request)
    {
        $data = ModelSiswa::find($id);
        if (!$data) {
            return response()->json([
                'message' => 'data tidak ditemukan'
            ]);
        }
        $input = $request->validate([
            'nama' => 'required',
            'nilai' => 'required'
        ]);

        $data->update($input);

        return response()->json([
            'message' => 'data berhasil di update!',
            'data' => $data
        ]);
    }
    public function destroy(string $id)
    {
        $data = ModelSiswa::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'data tidak ditemukan'
            ]);
        }

        $data->delete();

        return response()->json([
            'message' => 'data berhasil dihapus'
        ]);
    }
}
