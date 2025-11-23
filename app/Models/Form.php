<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nim',
        'keperluan_praktikum',
        'alat_bahan',
    ];

    protected $casts = [
        'alat_bahan' => 'array'
    ];
}
