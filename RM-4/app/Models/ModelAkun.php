<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelAkun extends Model
{
    protected $table = 'users_akun';

    protected $fillable = [
        'email',
        'password'
    ];
}
