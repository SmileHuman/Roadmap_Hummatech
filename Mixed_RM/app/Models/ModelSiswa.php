<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSiswa extends Model
{
    protected $table = 'data_siswa';

    protected $fillable = [
        'nama',
        'kelas',
        'nilai'
    ];
}
