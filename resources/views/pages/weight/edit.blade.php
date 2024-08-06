@extends('layouts.app')

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="edit"></i></div>
                        Edit Bobot
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-body">
            <form id="edit-weight-form" enctype="multipart/form-data" action="{{ route('weight.update', $weight->id_weight) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="id_weight" name="id_weight" value="{{ $weight->id_weight }}">
                <div class="form-group">
                    <label for="kode_atribut">Kriteria :</label>
                    <select class="form-control" id="id_criteria_edit" name="id_criteria">
                        @foreach($kriteria as $criterion)
                        <option value="{{ $criterion->id_criteria }}" {{ $criterion->id_criteria == $weight->id_criteria ? 'selected' : '' }}>{{ $criterion->nama_atribut }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_nama_bobot">Nama bobot :</label>
                    <input type="text" class="form-control" id="edit_nama_bobot" name="nama_bobot" value="{{ $weight->nama_bobot }}">
                </div>
                <div class="form-group">
                    <label for="edit_bobot">Bobot nilai :</label>
                    <input type="number" class="form-control" id="edit_bobot" name="bobot" value="{{ $weight->bobot }}">
                </div>
                <!-- Tambahkan input lainnya sesuai kebutuhan -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="window.location='{{ url()->previous() }}'">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit-edit-form">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection