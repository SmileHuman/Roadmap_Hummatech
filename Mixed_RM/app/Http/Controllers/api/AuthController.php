<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllValidateRequests;
use App\Handler\AkunHandler;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class AuthController extends Controller
{

    public function __construct(
        protected AkunHandler $handler)
    {}
    public function register(Request $request){
        try{
        $akun = $request->validate([
            'email' => 'required|email|unique:users_akun,email',
            'password' => 'required|min:8'
        ]);

        $this->handler->register($akun);

        return response()->json([
            'message' => 'register berhasil'
        ]);
        }
        catch(ValidationException $e){
            throw $e;
        }
    }
    public function login(Request $request){
        //Belum menambahkan logika token expired 
        try{
            $akun = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        return $this->handler->login($akun);
        }
        catch(ValidationException $e){
            throw $e;
        }
    }

    // public function homeGuest(){
    //     return response()->json([
    //         'message' => 'selamat datang tamu'
    //     ]);
    // }
    // public function homeLogin(){
    //     $sambutanEmail = $this->handler->homeLogin();

    //     return response()->json([
    //         'message' => "selamat datang "
    //     ]);
    // }
}
