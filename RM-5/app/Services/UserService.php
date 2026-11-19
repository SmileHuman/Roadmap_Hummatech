<?php

namespace App\Services;

use App\Interfaces\UserRepositoryInterface;

class UserService {
    protected $userRepository;

    // Dependency Injection: Menerima interface melalui constructor
    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function register(array $requestData) {
        // 1. Cek apakah email sudah terdaftar lewat repository
        $existingUser = $this->userRepository->findByEmail($requestData['email']);
        
        if ($existingUser) {
            throw new \Exception("Email sudah terdaftar!");
        }

        // 2. Logika bisnis: Enkripsi password sebelum disimpan
        $requestData['password'] = password_hash($requestData['password'], PASSWORD_BCRYPT);

        // 3. Simpan data lewat repository
        return $this->userRepository->save($requestData);
    }
}
?>