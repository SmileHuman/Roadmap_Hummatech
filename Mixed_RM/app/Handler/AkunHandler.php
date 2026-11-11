<?php
namespace App\Handler;

use App\Service\SiswaService;
use App\Service\AkunService;
class AkunHandler{
    public function __construct(protected AkunService $service)
    {}

    public function register(array $akun){
        return $this->service->register($akun);
    }

    public function login(array $akun){
        return $this->service->login($akun);
    }

    // public function homeGuest(){
    //     return $this->service->homeGuest();
    // }
    // public function homeLogin(){
    //     return $this->service->homeLogin();
    // }
}