<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bahan;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    public function getBahan(Request $request)
    {
        $perPage = 14;
        $query = Bahan::query();
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_bahan', 'LIKE', '%' . $request->search . '%');
        }
        return response()->json($query->paginate($perPage));
    }


    public function createBahan(Request $request)
    {
        $bahan = Bahan::create($request->all());
        return response()->json($bahan);
    }

    public function updateBahan(Request $request, $id)
    {
        $bahan = Bahan::findOrFail($id);
        $bahan->update($request->all());
        return response()->json($bahan);
    }

    public function deleteBahan($id)
    {
        Bahan::destroy($id);
        return response()->json();
    }
}
