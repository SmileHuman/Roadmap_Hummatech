<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ModelAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users_akun,email',
            'password' => 'required|string|min:5'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $akun = ModelAkun::create($validated);

        return response()->json([
            'message' => 'Registrasi berhasil',
            'data' => [
                'id' => $akun->id,
                'email' => $akun->email
            ]
        ], 201);
    }

    // LOGIN
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $token = auth('api')->attempt($credentials);

        if (!$token) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    // MELIHAT AKUN YANG SEDANG LOGIN
    public function me()
    {
        return response()->json([
            'data' => auth('api')->user()
        ], 200);
    }

    // LOGOUT
    public function logout()
    {
        auth('api')->logout();

        return response()->json([
            'message' => 'Logout berhasil'
        ], 200);
    }

    // REFRESH TOKEN
    public function refresh()
    {
        $token = auth('api')->refresh();

        return $this->respondWithToken($token);
    }

    // FORMAT RESPONSE TOKEN
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ], 200);
    }
}
