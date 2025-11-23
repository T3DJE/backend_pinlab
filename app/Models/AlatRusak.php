<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatRusak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_alat_rusak',
        'jumlah_alat_rusak',
        'keterangan_rusak'
    ];
}
