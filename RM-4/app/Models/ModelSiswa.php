<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSiswa extends Model
{
    protected $table = 'users_akun';

    protected $fillable = [
        'nama',
        'nilai'
    ];
}
