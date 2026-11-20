<?php

namespace App\Handlers;

use App\Services\SiswaService;

class SiswaHandler
{
    public function __construct(
        private SiswaService $service
    ) {}

    public function index()
    {
        return $this->service->index();
    }

    public function show(int $id)
    {
        return $this->service->show($id);
    }

    public function store(array $data)
    {
        return $this->service->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->service->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->service->delete($id);
    }
}
