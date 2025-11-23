<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Bahan;
use App\Models\Form;
use App\Models\DataLaporan as DL;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getForm()
    {
        return response()->json([
            Form::all()
        ]);
    }

    public function submitForm(Request $request)
    {
        $form = Form::create($request->all());
        return response()->json($form);
    }

    public function getAlat()
    {
        return response()->json(Alat::all());
    }

    public function getBahan()
    {
        return response()->json(Bahan::all());
    }

    public function submitDataLaporan(Request $request)
    {
        $laporan = DL::create([
            'nama_lengkap' => $request->nama_lengkap,
            'alat_bahan' => $request->alat_bahan,
            'keperluan_praktikum' => $request->keperluan_praktikum,
            "tgl_pinjam" => now(),
            "tgl_kembali" => $request->tgl_kembali ?? null,
            'kondisi_sebelum' => $request->kondisi_sebelum ?? 'B',
            'kondisi_sesudah' => $request->kondisi_sesudah ?? null,
            'keterangan' => $request->keterangan ?? null
        ]);
        return response()->json($laporan);
    }
}
