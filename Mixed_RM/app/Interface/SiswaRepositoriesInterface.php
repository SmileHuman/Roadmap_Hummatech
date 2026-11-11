<?php

namespace App\Interface;

interface SiswaRepositoriesInterface
{
    public function index();
    public function show(string $id);
    public function store();
    public function update();
    public function destroy();
}