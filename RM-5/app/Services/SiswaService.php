<?php

namespace App\Services;

use App\Interfaces\SiswaRepositoryInterface;

class SiswaService
{
    public function __construct(
        private SiswaRepositoryInterface $repository
    ) {}

    public function index()
    {
        return $this->repository->index();
    }

    public function show(int $id)
    {
        return $this->repository->show($id);
    }

    public function store(array $data)
    {
        $data['status_kompetensi'] = $this->tentukanStatusKompeten((int) $data['nilai']);

        return $this->repository->store($data);
    }

    public function update(int $id, array $data)
    {
        if (array_key_exists('nilai', $data)) {
            $data['status_kompetensi'] = $this->tentukanStatusKompeten((int) $data['nilai']);
        }

        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    public function tentukanStatusKompeten(int $nilai): string
    {
        if ($nilai >= 90) {
            return 'sangat kompeten';
        }

        if ($nilai >= 75) {
            return 'kompeten';
        }

        return 'tidak kompeten';
    }
}