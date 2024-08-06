@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Rangking</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Wisata</th>
                        <th>Nama Wisata</th>
                        <th>Hasil</th>
                        <th>Rangking</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $results = App\Models\Result::all();
                        $hasilArray = $results->pluck('hasil')->toArray();
                        rsort($hasilArray);
                        $topResults = $results->sortByDesc('hasil')->take(10);
                    @endphp
                    @foreach($topResults as $result)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $result->code_wisata }}</td>
                            <td>{{ $result->nama_wisata }}</td>
                            <td>{{ $result->hasil }}</td>
                            <td>{{ array_search($result->hasil, $hasilArray) + 1 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
