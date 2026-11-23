<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ModelAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users_akun,email',
            'password' => 'required|string|min:8'
        ]);

        $data['password'] = Hash::make($data['password']);

        $akun = ModelAkun::create($data);

        return response()->json([
            'message' => 'Registrasi berhasil',
            'data' => [
                'id' => $akun->id,
                'email' => $akun->email
            ]
        ], 201);
    }

    
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

    return response()->json([
        'message' => 'Login berhasil',
        'access_token' => $token,
        'token_type' => 'bearer'
    ], 200);
}

}
