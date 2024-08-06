@extends('layouts.app')

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="list"></i></div>
                        Alternative
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <a class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#tambahAlternative">
                        <i class="me-1" data-feather="plus"></i>
                        Alternative baru
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-fluid px-4">

    <div class="card">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Wisata</th>
                        <th>Alamat</th>
                        <th>Kode Wisata</th>
                        <th>Jenis Wisata</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nama Wisata</th>
                        <th>Alamat</th>
                        <th>Kode Wisata</th>
                        <th>Jenis Wisata</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_wisata }} </td>
                        <td>{{ $item->alamat}}</td>
                        <td>{{ $item->code_wisata }}</td>
                        <td>{{ $item->jenis_wisata }}</td>
                        <td>{{ $item->latitude }}</td>
                        <td>{{ $item->longitude }}</td>
                        <td>
                            @if ($item->img_wisata)
                            <img src="{{ asset('uploads/'. $item->img_wisata) }}" alt="{{ $item->img_wisata }}" width="175">
                            @endif
                        </td>
                        <td>
                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2 edit-alternative" href="{{ route('alternative.edit', $item->id_alternative) }}">
                                <i data-feather="edit"></i>
                            </a>
                            <form action="{{ route('alternative.delete', $item->id_alternative) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $item->id_alternative }}">
                                <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark">
                                    <i data-feather="trash-2"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahAlternative" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            </div>
            <div id="message-tambah"></div>
            <div class="modal-body">
                <!-- Form input data -->
                <form id="alternative-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_wisata">Nama Wisata</label>
                        <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat :</label>
                        <textarea class="form-control" rows="3" id="alamat" name="alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="code_wisata">Kode Wisata :</label>
                        <input type="text" class="form-control" id="code_wisata" name="code_wisata" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_wisata">Jenis Wisata :</label>
                        <select class="form-control" id="jenis_wisata" name="jenis_wisata" required>
                            @foreach ($categories as $category)
                            <option value="{{ $category->category_wisata }}">{{ $category->category_wisata }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="img_wisata">Image Wisata :</label>
                        <input type="file" class="form-control" id="img_wisata" name="img_wisata" required>
                    </div>
                    <div class="form-group">
                        <label for="map">Map :</label>
                        <div id="map" style="height: 400px;"></div>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude :</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" required>
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude :</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" required>
                    </div>
                    <!-- Tambahkan input lainnya sesuai kebutuhan -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submit-form" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div id="editAlternative" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            </div>
            <div id="message-edit"></div>
            <div class="modal-body">
                <form id="edit-alternative-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id_alternative" name="id_alternative">
                    <div class="form-group">
                        <label for="nama_wisata">Nama Wisata</label>
                        <input type="text" class="form-control" id="edit_nama_wisata" name="nama_wisata" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat :</label>
                        <textarea class="form-control" rows="3" id="edit_alamat" name="alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="code_wisata">kode Wisata :</label>
                        <input type="text" class="form-control" id="edit_code_wisata" name="code_wisata" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_wisata">Jenis Wisata :</label>
                        <input type="text" class="form-control" id="edit_jenis_wisata" name="jenis_wisata" required>
                    </div>
                    <div class="form-group">
                        <label for="img_wisata">Image Wisata :</label>
                        <input type="file" class="form-control" id="edit_img_wisata" name="img_wisata">
                    </div>
                    <div class="form-group">
                        <label for="edit_map">Edit Map :</label>
                        <div id="edit_map" style="height: 400px;"></div>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude :</label>
                        <input type="text" class="form-control" id="edit_latitude" name="latitude" required>
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude :</label>
                        <input type="text" class="form-control" id="edit_longitude" name="longitude" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submit-edit-form" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen form dan tombol submit
        const form = document.getElementById('alternative-form');
        const submitButton = document.getElementById('submit-form');

        // Tambahkan event listener untuk tombol submit
        submitButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Buat FormData dari form
            const formData = new FormData(form);

            // Kirim form menggunakan fetch API
            fetch('{{ route("alternative.store") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Tampilkan pesan success atau error
                    const messageElement = document.getElementById('message-tambah');
                    if (data.success) {
                        messageElement.innerHTML = `<div class="alert alert-success" role="alert">${data.message}</div>`;
                        form.reset(); // Reset form setelah submit sukses
                        $('#tambahAlternative').modal('hide'); // Tutup modal
                        window.location.reload(); // Reload halaman
                    } else {
                        messageElement.innerHTML = `<div class="alert alert-danger" role="alert">${data.message}</div>`;
                    }
                })
                .catch(error => {
                    const messageElement = document.getElementById('message-tambah');
                    messageElement.innerHTML = `<div class="alert alert-danger" role="alert">Terjadi kesalahan: ${error.message}</div>`;
                });
        });

        document.querySelectorAll('.edit-alternative').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                console.log('Editing alternative with ID:', id); // Debug log

                fetch(`/alternative/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Fetched data:', data); // Debug log

                        // Populate the form with the fetched data
                        document.getElementById('id_alternative').value = data.id_alternative;
                        document.getElementById('edit_nama_wisata').value = data.nama_wisata;
                        document.getElementById('edit_alamat').value = data.alamat;
                        document.getElementById('edit_code_wisata').value = data.code_wisata;
                        document.getElementById('edit_latitude').value = data.latitude;
                        document.getElementById('edit_longitude').value = data.longitude;
                        document.getElementById('edit_jenis_wisata').value = data.jenis_wisata;

                        // Set the form action to update
                        const editForm = document.getElementById('edit-alternative-form');
                        editForm.setAttribute('action', `/alternative/update/${id}`);
                        editForm.setAttribute('method', 'POST');
                        editForm.insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            });
        });

        $('#editAlternative').on('shown.bs.modal', function() {
            initEditMap();
        });

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

        const editSubmitButton = document.getElementById('submit-edit-form');
        const editForm = document.getElementById('edit-alternative-form');


        editSubmitButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Create FormData from the edit form
            const editFormData = new FormData(editForm);

            // Get the ID from the hidden input field
            const id = document.getElementById('id_alternative').value;

            // Send the form using fetch API
            fetch(`/alternative/update/${id}`, {
                    method: 'POST',
                    body: editFormData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Display success or error message
                    const messageElement = document.getElementById('message-edit');
                    if (data.success) {
                        messageElement.innerHTML = `<div class="alert alert-success" role="alert">${data.message}</div>`;
                        editForm.reset(); // Reset form after successful submit
                        $('#editAlternative').modal('hide'); // Close modal
                        window.location.reload(); // Reload page
                    } else {
                        messageElement.innerHTML = `<div class="alert alert-danger" role="alert">${data.message}</div>`;
                    }
                })
                .catch(error => {
                    const messageElement = document.getElementById('message-edit');
                    messageElement.innerHTML = `<div class="alert alert-danger" role="alert">Terjadi kesalahan: ${error.message}</div>`;
                });
        });
    });
</script>

<!-- Include Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ_ADRt4zr70La0m-JvnqskgYK1uGexCo&callback=initMap&v=weekly&solution_channel=GMP_CCS_geocodingservice_v2" async defer></script>

<script>
    /**
     * @license
     * Copyright 2019 Google LLC. All Rights Reserved.
     * SPDX-License-Identifier: Apache-2.0
     */
    let map;
    let marker;
    let geocoder;
    let response;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: {
                lat: -7.81689500,
                lng: 112.01139800
            },
            mapTypeControl: false,
        });
        geocoder = new google.maps.Geocoder();

        const inputText = document.createElement("input");

        inputText.type = "text";
        inputText.placeholder = "Enter a location";

        const submitButton = document.createElement("input");

        submitButton.type = "button";
        submitButton.value = "Submit";
        submitButton.classList.add("button", "button-primary");

        const clearButton = document.createElement("input");

        clearButton.type = "button";
        clearButton.value = "Clear";
        clearButton.classList.add("button", "button-secondary");
        response = document.createElement("pre");
        response.id = "response";
        response.innerText = "";


        const instructionsElement = document.createElement("p");


        instructionsElement.innerHTML =
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputText);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(submitButton);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(clearButton);
        map.controls[google.maps.ControlPosition.LEFT_TOP].push(
            instructionsElement
        );
        marker = new google.maps.Marker({
            map,
        });
        map.addListener("click", (e) => {
            geocode({
                location: e.latLng
            });
        });
        submitButton.addEventListener("click", () =>
            geocode({
                address: inputText.value
            })
        );
        clearButton.addEventListener("click", () => {
            clear();
        });
        clear();
    }

    function clear() {
        marker.setMap(null);
    }

    function geocode(request) {
        clear();
        geocoder
            .geocode(request)
            .then(response => {
                if (response.results.length === 0) {
                    return null;
                }
                let lat = response.results[0].geometry.location.lat();
                let lng = response.results[0].geometry.location.lng();
                return {
                    lat,
                    lng
                };
            })
            .then(({
                lat,
                lng
            }) => {
                map.setCenter({
                    lat,
                    lng
                });
                marker.setPosition({
                    lat,
                    lng
                });
                marker.setMap(map);
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
                response.innerText = JSON.stringify({
                    lat,
                    lng
                }, null, 2);
                return {
                    lat,
                    lng
                };
            })
            .catch((e) => {
                alert("Geocode was not successful for the following reason: " + e);
            });
    }

    window.initMap = initMap;
</script>

@endsection