<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use App\Models\Criteria;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeightController extends Controller
{
    //
    public function index(): View
    {
        $data = Weight::with('criteria')->get();
        $kriteria = Criteria::all();
        return view('pages.weight.index', compact('data', 'kriteria'));
    }

    public function show(int $id)
    {
        try {
            $data = Weight::findOrFail($id);
            return response()->json($data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_criteria' => 'required|integer',
                'nama_bobot' => 'required|string',
                'bobot' => 'required|string',
            ]);

            $data = new Weight();
            $data->id_criteria = $request->id_criteria;
            $data->nama_bobot = $request->nama_bobot;
            $data->bobot = $request->bobot;
            $data->save();

            return response()->json(['success' => true, 'data' => $data, 'message' => 'Data berhasil disimpan.'], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data gagal disimpan.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $weight = Weight::findOrFail($id);
        $weight->id_criteria = $request->input('id_criteria');
        $weight->nama_bobot = $request->input('nama_bobot');
        $weight->bobot = $request->input('bobot');
        $weight->save();

        return redirect()->route('weight')->with('success', 'Data bobot berhasil diperbarui');
    }


    public function edit($id)
    {
        $weight = Weight::findOrFail($id);
        $kriteria = Criteria::all();

        return view('pages.weight.edit', compact('weight', 'kriteria'));
    }


    public function destroy(int $id)
    {
        $data = Weight::findOrFail($id);
        $data->delete();
        return redirect()->route('weight');
    }
}
