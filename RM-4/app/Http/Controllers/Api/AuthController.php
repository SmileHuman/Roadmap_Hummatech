<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ModelAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $data['password'] = Hash::make($request->password);

        ModelAkun::create($data);

        return response()->json([
            'message' => 'registrasi berhasil',
            'data' => $data
        ]);
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Hash::check($data['password']) || ){
            
        }
    }
}
