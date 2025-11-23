<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AlatRusak;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AlatRusakController extends Controller
{
    public function getAlatRusak(Request $request)
    {
        $perPage = 14;
        $query = AlatRusak::query();
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_alat_rusak', 'LIKE', '%' . $request->search . '%');
        }
        return response()->json($query->paginate($perPage));
    }

    public function createAlatRusak(Request $request)
    {
        $alat_rusak = AlatRusak::create($request->all());
        return response()->json($alat_rusak);
    }

    public function updateAlatRusak(Request $request, $id)
    {
        $alat_rusak = AlatRusak::findOrFail($id);
        $alat_rusak->update($request->all());
        return response()->json($alat_rusak);
    }

    public function deleteAlatRusak($id)
    {
        AlatRusak::destroy($id);
        return response()->json();
    }

    public function exportPdf()
    {
        try {
            $data = AlatRusak::all();
            $pdf = Pdf::loadView('pdf.alat_rusak', compact('data'))
                ->setPaper('A4', 'portrait');
            return $pdf->stream('alat-rusak.pdf');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'PDF Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
