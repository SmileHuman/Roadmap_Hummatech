<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ModelAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $cekAkun = ModelAkun::where('email', $validate['email'])->first();

        if($cekAkun){
            return response()->json([
                'message' => 'akun sudah terdaftar'
            ]);
        }
        
        $validate['password'] = Hash::make($validate['password']);

        ModelAkun::create($validate);

        return response()->json([
            'message' => 'registrasi berhasil',
            'data' => $validate
        ]);
    }

    public function login(Request $request)
{
    $credentials = $request->only(
        'email',
        'password'
    );

    $token = auth::guard('api')->attempt($credentials);

    if (!$token) {
        return response()->json([
            'message' => 'Login gagal'
        ], 401);
    }

    return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer'
    ]);
}

// public function login(Request $request)
// {
//     $credentials = $request->only('email', 'password');

//     $token = Auth::guard('api')->attempt($credentials);

//     if (!$token) {
//         return response()->json([
//             'message' => 'Login gagal'
//         ], 401);
//     }

//     return response()->json([
//         'access_token' => $token,
//         'token_type' => 'bearer'
//     ]);
// }
}
