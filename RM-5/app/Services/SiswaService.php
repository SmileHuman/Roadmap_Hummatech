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
        return $this->repository->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
