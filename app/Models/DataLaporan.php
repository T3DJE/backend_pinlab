<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLaporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'alat_bahan',
        'keperluan_praktikum',
        "tgl_pinjam",
        "tgl_kembali",
        'kondisi_sebelum',
        'kondisi_sesudah',
        'keterangan'
    ];

    protected $casts = [
        'alat_bahan' => 'array'
    ];
}
