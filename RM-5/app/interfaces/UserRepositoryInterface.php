<?php
namespace App\Interfaces;

interface UserRepositoryInterface {
    public function findByEmail(string $email);
    public function save(array $data);
}