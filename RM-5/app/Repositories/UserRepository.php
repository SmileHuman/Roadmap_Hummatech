<?php
namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    
    public function findByEmail(string $email) {
        // Contoh query ke database (misal pakai PDO atau Eloquent)
        // return DB::table('users')->where('email', $email)->first();
        return "Data user dengan email $email dari database";
    }

    public function save(array $data) {
        // Contoh menyimpan data ke database
        // return DB::table('users')->insert($data);
        return true; 
    }
}
?>