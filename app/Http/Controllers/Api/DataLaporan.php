<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataLaporan as DL;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\DataLaporanExport;
use Maatwebsite\Excel\Facades\Excel;


class DataLaporan extends Controller
{
    public function getAturPeminjaman(Request $request)
    {
        $perPage = 14;
        $query = DL::whereNull('tgl_kembali'); // BELUM LENGKAP

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_lengkap', 'LIKE', '%' . $request->search . '%');
        }

        return response()->json($query->paginate($perPage));
    }


    public function getDataLaporan(Request $request)
    {
        $perPage = 14;
        $query = DL::whereNotNull('tgl_kembali'); // SUDAH LENGKAP

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_lengkap', 'LIKE', '%' . $request->search . '%');
        }

        return response()->json($query->paginate($perPage));
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
    public function updateDataLaporan(Request $request, $id)
    {
        $laporan = DL::findOrFail($id);
        $laporan->update($request->all());
        return response()->json($laporan);
    }
    public function deleteDataLaporan($id)
    {
        DL::destroy($id);
        return response()->json([
            'message' => 'successfully deleted!'
        ]);
    }

    public function exportPdf(Request $request)
    {
        $query = DL::whereNotNull('tgl_kembali');

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_lengkap', 'LIKE', '%' . $request->search . '%');
        }

        $data = $query->get();

        $pdf = Pdf::loadView('pdf.data_laporan', compact('data'))
            ->setPaper('A4', 'landscape');

        return $pdf->download('data_laporan.pdf');
    }

    public function exportExcel(Request $request)
    {
        $query = DL::whereNotNull('tgl_kembali');

        if ($request->has('search') && $request->search !== '') {
            $query->where('nama_lengkap', 'LIKE', '%' . $request->search . '%');
        }

        $data = $query->get();

        // return Excel::download(new DataLaporanExport($data), 'data_laporan.xlsx');
        return Excel::download(new DataLaporanExport($query->get()), 'data_laporan.xlsx');

    }
}
