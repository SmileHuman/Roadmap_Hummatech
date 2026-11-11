<?php

namespace App\Service;

use App\Repositories\SiswaRepository;
use Illuminate\Support\Facades\Cache;

class SiswaService
{
    public function __construct(
        protected SiswaRepository $repo
    ) {}
    public function index()
    {
        $siCached = Cache::store('redis')->has('siswa');

        $siswa = Cache::store('redis')->remember(
            'siswa',
            40,
            function () {
                return $this->repo->index();
            }
        );

        return response()->json([
            'source' => $siCached ? 'redis' : 'database',
            'data' => $siswa
        ]);
    }
    public function show(string $id)
    {
        $siCached = Cache::store('redis')->has("siswa_{$id}");

        $siswa = Cache::store('redis')->remember(
            "siswa_{$id}",
            20,
            function () use ($id) {
                return $this->repo->show($id);
            }
        );

        return response()->json([
            'source' => $siCached ? 'redis' : 'database',
            'data' => $siswa
        ]);
    }
    public function store(array $siswa) {

        $result = $this->repo->store($siswa);

        Cache::store('redis')->forget('siswa');

        return $result;
    }
    public function update() {}
    public function destroy() {}
}
