<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function getAlat(Request $request)
    {
        $perPage = 14;
        $query = Alat::query();
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_alat', 'LIKE', '%' . $request->search . '%');
        }
        return response()->json($query->paginate($perPage));
    }


    public function createAlat(Request $request)
    {
        $alat = Alat::create($request->all());
        return response()->json($alat);
    }

    public function updateAlat(Request $request, $id)
    {
        $alat = Alat::findOrFail($id);
        $alat->update($request->all());
        return response()->json($alat);
    }

    public function deleteAlat($id)
    {
        Alat::destroy($id);
        return response()->json();
    }
}
