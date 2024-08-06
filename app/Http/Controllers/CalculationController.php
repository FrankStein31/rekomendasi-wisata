<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Calculation;
use App\Models\Alternative;

class CalculationController extends Controller
{
    public function index() : View
    {
        $data = Alternative::all();

        return view('pages.calculation.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => 'required',
            'harga' => 'required',
            'fasilitas' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $calculation = new Calculation();
        $calculation->lokasi = $request->lokasi;
        $calculation->harga = $request->harga;
        $calculation->fasilitas = $request->fasilitas;
        $calculation->latitude = $request->latitude;
        $calculation->longitude = $request->longitude;
        $calculation->save();

        return response()->json(['success' => true, 'results' => 'Calculation saved successfully!']);
    }
}
