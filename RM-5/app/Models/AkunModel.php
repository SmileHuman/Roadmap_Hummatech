<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AkunModel extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'akun_users';

    protected $fillable = [
        'email',
        'password'
    ];
}
