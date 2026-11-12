<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use App\Models\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class ModelAkun extends Authenticatable implements JWTSubject
{
    use HasApiTokens;
    protected $table = 'users_akun';

    protected $fillable = [
        'email',
        'password'
    ];

     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
