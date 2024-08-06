<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlternativeController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        $data = Alternative::all();

        return view('pages.alternative.index', compact('categories', 'data'));
    }

    public function getAlternatives()
    {
        $data = Alternative::all();
        return response()->json($data);
    }

    public function show(int $id)
    {
        $data = Alternative::findOrFail($id);
        return response()->json($data);
    }


    public function create(): View
    {
        return view('');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_wisata' => 'required|string',
                'alamat' => 'required|string',
                'code_wisata' => 'required|string',
                'latitude' => 'nullable|string',
                'longitude' => 'nullable|string',
                'jenis_wisata' => 'required|string',
                'img_wisata' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('img_wisata')) {
                $file = $request->file('img_wisata');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);
            }

            $alternative = new Alternative();
            $alternative->nama_wisata = $request->nama_wisata;
            $alternative->alamat = $request->alamat;
            $alternative->code_wisata = $request->code_wisata;
            $alternative->latitude = $request->latitude;
            $alternative->longitude = $request->longitude;
            $alternative->jenis_wisata = $request->jenis_wisata;
            $alternative->img_wisata = $fileName;
            $alternative->save();

            return response()->json(['success' => true, 'data' => $alternative, 'message' => 'Data berhasil disimpan.'], 201);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $th->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_wisata' => 'required|string',
                'alamat' => 'required|string',
                'code_wisata' => 'required|string',
                'latitude' => 'required|string',
                'longitude' => 'required|string',
                'jenis_wisata' => 'required|string',
                'img_wisata' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
            ]);

            $alternative = Alternative::findOrFail($id);

            if ($request->hasFile('img_wisata')) {
                // Hapus gambar lama jika ada
                if ($alternative->img_wisata && file_exists(public_path('uploads/' . $alternative->img_wisata))) {
                    unlink(public_path('uploads/' . $alternative->img_wisata));
                }

                $file = $request->file('img_wisata');
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $namaFile);
                $alternative->img_wisata = $namaFile;
            }

            // Update data di database
            $alternative->nama_wisata = $request->nama_wisata;
            $alternative->alamat = $request->alamat;
            $alternative->code_wisata = $request->code_wisata;
            $alternative->latitude = $request->latitude;
            $alternative->longitude = $request->longitude;
            $alternative->jenis_wisata = $request->jenis_wisata;
            $alternative->save();

            return redirect()->route('alternative')->with('success', 'Data bobot berhasil diperbarui');
            // return response()->json([
            //     'success' => true,
            //     'message' => 'Data berhasil diupdate.',
            //     'data' => $alternative
            // ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $alternative = Alternative::findOrFail($id);
        $categories = Category::all(); // Jika Anda memiliki kategori untuk dropdown
        return view('pages.alternative.edit', compact('alternative', 'categories'));
    }

    public function destroy($id)
    {
        $data = Alternative::findOrFail($id);

        // Hapus file gambar jika ada
        if ($data->img_wisata) {
            $imagePath = public_path('uploads/' . $data->img_wisata);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $data->delete();
        return redirect()->route('alternative');
    }
}
