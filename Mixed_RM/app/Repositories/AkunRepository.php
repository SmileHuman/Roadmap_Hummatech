<?php
namespace App\Repositories;

use App\Models\ModelAkun;
use Illuminate\Support\Facades\Cache;
class AkunRepository{
    public function register(array $akun){
        ModelAkun::create($akun);
    }
}