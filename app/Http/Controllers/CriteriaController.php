<?php

namespace App\Http\Controllers;

use App\Models\Criteria;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CriteriaController extends Controller
{

    public function index(): View
    {
        $data = Criteria::all();
        return view('pages.criteria.index', compact('data'));
    }

    public function show(int $id)
    {
        try {
            $data = Criteria::findOrFail($id);
            return response()->json($data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kode_atribut' => 'required|string',
                'nama_atribut' => 'required|string',
                'atribut' => 'required|integer',
                'keterangan' => 'nullable|string',
            ]);

            $data = new Criteria();
            $data->kode_atribut = $request->kode_atribut;
            $data->nama_atribut = $request->nama_atribut;
            $data->atribut = $request->atribut;
            $data->keterangan = $request->keterangan;
            $data->save();

            return response()->json(['success' => true, 'data' => $data, 'message' => 'Data berhasil disimpan.'], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_atribut' => 'required|string|max:255',
            'nama_atribut' => 'required|string|max:255',
            'atribut' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $criteria = Criteria::find($id);
        if (!$criteria) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan']);
        }

        $criteria->kode_atribut = $request->kode_atribut;
        $criteria->nama_atribut = $request->nama_atribut;
        $criteria->atribut = $request->atribut;
        $criteria->keterangan = $request->keterangan;
        $criteria->save();

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $data = Criteria::findOrFail($id);
        $data->delete();
        return redirect()->route('criteria');
    }
}
