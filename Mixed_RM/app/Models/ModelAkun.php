<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class ModelAkun extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $table = 'users_akun';

    protected $fillable = [
        'email',
        'password'
    ];
}
