@extends('layouts.app')

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="list"></i></div>
                        Perhitungan
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <a class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#tambahAlternative">
                        <i class="me-1" data-feather="plus"></i>
                        Perhitungan
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data input user</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Lokasi</th>
                            <th>Harga</th>
                            <th>Fasilitas</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <!-- <th>Jenis</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(App\Models\Calculation::take(6)->get() as $calculation)
                            <tr>
                                <td>{{ $calculation->id }}</td>
                                <td>{{ $calculation->lokasi }}</td>
                                <td>{{ $calculation->harga }}</td>
                                <td>{{ $calculation->fasilitas }}</td>
                                <td>{{ $calculation->latitude }}</td>
                                <td>{{ $calculation->longitude }}</td>
                                <!-- <td>{{ $calculation->jenis }}</td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Nilai Euclidean</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Wisata</th>
                                <th>Nama Wisata</th>
                                <th>Latitude User</th>
                                <th>Latitude Wisata</th>
                                <th>Longitude User</th>
                                <th>Longitude Wisata</th>
                                <th>Nilai Euclidean</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $calculation = App\Models\Calculation::first();
                            @endphp
                            @foreach(App\Models\Alternative::take(6)->get() as $alternative)
                                @php
                                    // Calculate the Euclidean distance
                                    $distance = sqrt(pow($calculation->latitude - $alternative->latitude , 2) + pow($calculation->longitude - $alternative->longitude, 2)) * 0.5;
                                @endphp
                                <tr>
                                    <td>{{ $alternative->code_wisata }}</td>
                                    <td>{{ $alternative->nama_wisata }}</td>
                                    <td>{{ $calculation->latitude }}</td>
                                    <td>{{ $alternative->latitude }}</td>
                                    <td>{{ $calculation->longitude }}</td>
                                    <td>{{ $alternative->longitude }}</td>
                                    <td>{{ $distance }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Jarak Minimal dan Maksimal</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Minimum Euclidean Distance</th>
                        <th>Maximum Euclidean Distance</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $distances = [];
                        foreach(App\Models\Alternative::take(6)->get() as $alternative) {
                            foreach(App\Models\Calculation::take(6)->get() as $calculation) {
                                $distance = sqrt(pow($calculation->latitude - $alternative->latitude , 2) + pow($calculation->longitude - $alternative->longitude, 2)) * 0.5;
                                $distances[] = $distance;
                            }
                        }
                        $minDistance = min($distances);
                        $maxDistance = max($distances);
                    @endphp
                    <tr>
                        <td>{{ $minDistance }}</td>
                        <td>{{ $maxDistance }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Normalisasi</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Wisata</th>
                        <th>Nama Wisata</th>
                        <th>Normalisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Models\Alternative::take(6)->get() as $alternative)
                        @foreach(App\Models\Calculation::take(6)->get() as $calculation)
                            @php
                                // Calculate the Euclidean distance
                                $distance = sqrt(pow($calculation->latitude - $alternative->latitude, 2) + pow($calculation->longitude - $alternative->longitude, 2)) * 0.5;

                                // Ensure $maxDistance is defined and not zero to avoid division by zero
                                $maxDistance = $maxDistance ?? 1; // Default to 1 if $maxDistance is not set

                                // Calculate the custom formula
                                $customFormula = 5 - ($distance / $maxDistance * 5) + 1;
                            @endphp
                            <tr>
                                <td>{{ $alternative->code_wisata }}</td>
                                <td>{{ $alternative->nama_wisata }}</td>
                                <td>{{ number_format($customFormula, 2) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Perhitungan Vektor S</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Wisata</th>
                    <th>Nama Wisata</th>
                    <th>Hasil</th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\Alternative::take(6)->get() as $alternative)
                    @foreach(App\Models\Calculation::take(6)->get() as $calculation)
                        @php
                            // Calculate the Euclidean distance
                            $distance = sqrt(pow($calculation->latitude - $alternative->latitude , 2) + pow($calculation->longitude - $alternative->longitude, 2)) * 0.5;
                            // Calculate the custom formula
                            $customFormula = 5 - ($distance / $maxDistance * 5) + 1;
                            // Calculate the formula result
                            $formulaResult = pow($calculation->lokasi, 0.4) * pow($calculation->harga, 0.3) * pow($calculation->fasilitas, -0.2) * pow($customFormula, 0.1);
                            // Add the formula result to the total
                            $totalResult = isset($totalResult) ? $totalResult + $formulaResult : $formulaResult;

                        @endphp
                        <tr>
                            <td>{{ $alternative->code_wisata }}</td>
                            <td>{{ $alternative->nama_wisata }}</td>
                            <td>{{ $formulaResult }}</td>
                        </tr>
                    @endforeach
                @endforeach
                <tfoot>
                    <tr>
                        <td colspan="2">Total</td>
                        <td>{{ $totalResult }}</td>
                    </tr>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Perhitungan Vektor V</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Wisata</th>
                        <th>Nama Wisata</th>
                        <th>Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Models\Alternative::take(6)->get() as $alternative)
                        @foreach(App\Models\Calculation::take(6)->get() as $calculation)
                            @php
                                // Calculate the Euclidean distance
                                $distance = sqrt(pow($calculation->latitude - $alternative->latitude , 2) + pow($calculation->longitude - $alternative->longitude, 2)) * 0.5;

                                // Calculate the custom formula
                                $customFormula = 5 - ($distance / $maxDistance * 5) + 1;

                                // Calculate the formula result
                                $formulaResult = pow($calculation->lokasi, 0.4) * pow($calculation->harga, 0.3) * pow($calculation->fasilitas, -0.2) * pow($customFormula, 0.1);

                                $formulaResult = $formulaResult / $totalResult;

                                // Add the formula result to the total
                                $totalResultV = isset($totalResultV) ? $totalResultV + $formulaResult : $formulaResult;
                            @endphp
                            <tr>
                                @php
                                    // Check if the result already exists in the database
                                    $existingResult = \App\Models\Result::where('code_wisata', $alternative->code_wisata)
                                                                        ->where('nama_wisata', $alternative->nama_wisata)
                                                                        ->first();

                                    // Save the result to the database if it does not already exist
                                    if (!$existingResult) {
                                        \App\Models\Result::create([
                                            'code_wisata' => $alternative->code_wisata,
                                            'nama_wisata' => $alternative->nama_wisata,
                                            'hasil' => $formulaResult,
                                        ]);
                                    }
                                @endphp
                                <td>{{ $alternative->code_wisata }}</td>
                                <td>{{ $alternative->nama_wisata }}</td>
                                <td>{{ $formulaResult }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    <tfoot>
                        <tr>
                            <td colspan="2">Total</td>
                            <td>{{ $totalResultV }}</td>
                        </tr>
                    </tfoot>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
