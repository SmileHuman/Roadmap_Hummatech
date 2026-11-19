<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Services\UserService;

class UserController {
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function registerStore(Request $request) {
        try {
            // 1. Ambil data input dari request user
            $inputData = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];

            // 2. Lempar ke Service untuk diproses
            $this->userService->register($inputData);

            // 3. Kembalikan respons sukses ke client
            return json_encode([
                'status' => 'success',
                'message' => 'Registrasi berhasil!'
            ]);

        } catch (\Exception $e) {
            // Tangkap error jika ada validasi yang gagal
            return json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}