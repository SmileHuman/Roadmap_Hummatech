<?php

namespace App\Interface;

interface AkunRepositoriesInterface
{
    public function register(array $akun);
    public function CacheAkun(string $email);
}
