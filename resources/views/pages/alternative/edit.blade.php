@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Alternative</h3>
        </div>
        <div class="card-body">
            <form id="edit-alternative-form" action="{{ route('alternative.update', $alternative->id_alternative) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="id_alternative" name="id_alternative" value="{{ $alternative->id_alternative }}">
                <div class="form-group">
                    <label for="nama_wisata">Nama Wisata</label>
                    <input type="text" class="form-control" id="edit_nama_wisata" name="nama_wisata" value="{{ $alternative->nama_wisata }}" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" rows="3" id="edit_alamat" name="alamat" required>{{ $alternative->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="code_wisata">Kode Wisata</label>
                    <input type="text" class="form-control" id="edit_code_wisata" name="code_wisata" value="{{ $alternative->code_wisata }}" required>
                </div>
                <div class="form-group">
                    <label for="jenis_wisata">Jenis Wisata</label>
                    <select class="form-control" id="jenis_wisata" name="jenis_wisata" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->category_wisata }}" @if($category->category_wisata == $alternative->jenis_wisata) selected @endif>{{ $category->category_wisata }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="img_wisata">Image Wisata</label>
                    @if($alternative->img_wisata)
                    <div>
                        <img src="{{ asset('uploads/' . $alternative->img_wisata) }}" alt="Image Wisata" width="150">
                    </div>
                    @endif
                    <input type="file" class="form-control" id="edit_img_wisata" name="img_wisata">
                </div>
                <div class="form-group">
                    <label for="map">Map</label>
                    <div id="edit_map" style="height: 400px;"></div>
                </div>
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" id="edit_latitude" name="latitude" value="{{ $alternative->latitude }}" required>
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" id="edit_longitude" name="longitude" value="{{ $alternative->longitude }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('alternative') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    function initEditMap() {
        const editMapElement = document.getElementById('edit_map');
        const latitude = parseFloat(document.getElementById('edit_latitude').value) || -7.81689500;
        const longitude = parseFloat(document.getElementById('edit_longitude').value) || 112.01139800;

        const editMap = new google.maps.Map(editMapElement, {
            zoom: 8,
            center: {
                lat: latitude,
                lng: longitude
            },
            mapTypeControl: false,
        });

        const marker = new google.maps.Marker({
            position: {
                lat: latitude,
                lng: longitude
            },
            map: editMap,
        });

        editMap.addListener('click', (e) => {
            marker.setPosition(e.latLng);
            document.getElementById('edit_latitude').value = e.latLng.lat();
            document.getElementById('edit_longitude').value = e.latLng.lng();
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        initEditMap();
    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ_ADRt4zr70La0m-JvnqskgYK1uGexCo&callback=initEditMap" async defer></script>
@endsection