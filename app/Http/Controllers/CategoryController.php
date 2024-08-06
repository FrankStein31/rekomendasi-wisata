<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('pages.category.index', compact('data'));
    }

    public function show(int $id)
    {
        try {
            $data = Category::findOrFail($id);
            return response()->json($data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'category_wisata' => 'required|string',
            ]);

            $data = new Category();
            $data->category_wisata = $request->category_wisata;
            $data->save();

            return response()->json(['success' => true, 'data' => $data, 'message' => 'Data berhasil disimpan.'], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data gagal disimpan.'], 500);
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $request->validate([
                'category_wisata' => 'required|string',
            ]);

            $data = Category::findOrFail($id);
            $data->category_wisata = $request->category_wisata;
            $data->save();

            return response()->json(['data' => $data, 'message' => 'Data berhasil diperbarui.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Data gagal diperbarui.'], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $data = Category::findOrFail($id);
            $data->delete();
            return response()->json(['message' => 'Data berhasil dihapus.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Data gagal dihapus.'], 500);
        }
    }
}
