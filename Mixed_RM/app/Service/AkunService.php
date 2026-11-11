<?php
namespace App\Service;

use App\Models\ModelAkun;
use App\Repositories\AkunRepository;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class AkunService{
    public function __construct(
        protected AkunRepository $repo
    )
    {}

    public function register(array $akun){
        $akun['password'] = Hash::make($akun['password']);
        return $this->repo->register($akun);
    }

    public function login(array $akun){
        //Belum menambahkan logika token expired
        // $user = ModelAkun::where('email', $akun['email'])->first();
        $email = $akun['email'];

        $user = ModelAkun::where('email', $email)->first();

        if (!$user || !Hash::check($akun['password'], $user['password'])){
            return response()->json([
                    'message' => 'Email atau password salah',
                ], 401);}

                $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'login anda berhasil',
            'token' => $token
        ]);
    }
    public function homeGuest(){
        return response()->json([
            'message' => 'selamat datang tamu'
        ], 200);
    }
}