@extends('layouts.app')

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="list"></i></div>
                        Bobot
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <a class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#tambahBobot">
                        <i class="me-1" data-feather="plus"></i>
                        Bobot baru
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
                        <th>Kriteria</th>
                        <th>Nama</th>
                        <th>Bobot</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Kriteria</th>
                        <th>Nama</th>
                        <th>Bobot</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->criteria->nama_atribut }}</td>
                        <td>{{ $item->nama_bobot }}</td>
                        <td>{{ $item->bobot }}</td>
                        <td>
                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="{{ route('weight.edit', $item->id_weight) }}">
                                <i data-feather="edit"></i>
                            </a>
                            <form action="{{ route('weight.delete', $item->id_weight) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $item->id_weight }}">
                                <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark">
                                    <i data-feather="trash-2"></i>
                                </button>
                            </form>
                            <script>
                                console.log('Generated edit button for ID: {{ $item->id_weight }}');
                            </script>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahBobot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            </div>
            <div id="message"></div>
            <div class="modal-body">
                <!-- Form input data -->
                <form id="weight-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kode_atribut">Kriteria :</label>
                        <select class="form-control" id="id_criteria" name="id_criteria">
                            @foreach($kriteria as $criterion)
                            <option value="{{ $criterion->id_criteria }}">{{ $criterion->nama_atribut }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_bobot">Nama bobot :</label>
                        <input type="text" class="form-control" id="nama_bobot" name="nama_bobot">
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot nilai :</label>
                        <input type="number" class="form-control" id="bobot" name="bobot">
                    </div>
                    <!-- Tambahkan input lainnya sesuai kebutuhan -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submit-form">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="editBobot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            </div>
            <div id="message-edit"></div>
            <div class="modal-body">
                <!-- Form input data -->
                <form id="edit-weight-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id_weight" name="id_weight">
                    <div class="form-group">
                        <label for="kode_atribut">Kriteria :</label>
                        <select class="form-control" id="id_criteria_edit" name="id_criteria">
                            @foreach($kriteria as $criterion)
                            <option value="{{ $criterion->id_criteria }}">{{ $criterion->nama_atribut }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_nama_bobot">Nama bobot :</label>
                        <input type="text" class="form-control" id="edit_nama_bobot" name="nama_bobot">
                    </div>
                    <div class="form-group">
                        <label for="edit_bobot">Bobot nilai :</label>
                        <input type="number" class="form-control" id="edit_bobot" name="bobot">
                    </div>
                    <!-- Tambahkan input lainnya sesuai kebutuhan -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit-edit-form">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Submit form data for adding new weight
        const form = document.getElementById('weight-form');
        const submitButton = document.getElementById('submit-form');

        submitButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission
            const formData = new FormData(form);

            fetch('{{ route("weight.store") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const messageElement = document.getElementById('message');
                    if (data.success) {
                        messageElement.innerHTML = `<div class="alert alert-success" role="alert">${data.message}</div>`;
                        form.reset(); // Reset form after successful submission
                        $('#tambahBobot').modal('hide'); // Close modal
                        window.location.reload(); // Reload page
                    } else {
                        messageElement.innerHTML = `<div class="alert alert-danger" role="alert">${data.message}</div>`;
                    }
                })
                .catch(error => {
                    const messageElement = document.getElementById('message');
                    messageElement.innerHTML = `<div class="alert alert-danger" role="alert">Terjadi kesalahan: ${error.message}</div>`;
                });
        });

        // Fetch and display data for editing
        document.querySelectorAll('.edit-weight').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                console.log('ID yang diklik:', id); // Display the clicked ID in console

                fetch(`/weight/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data yang diperoleh:', data); // Display fetched data in console

                        document.getElementById('id_weight').value = data.id_weight ?? '';
                        document.getElementById('edit_nama_bobot').value = data.nama_bobot ?? '';
                        document.getElementById('edit_bobot').value = data.bobot ?? '';
                        document.getElementById('id_criteria_edit').value = data.id_criteria ?? '';

                        // Log the values that are being set
                        console.log('id_weight:', data.id_weight ?? '');
                        console.log('edit_nama_bobot:', data.nama_bobot ?? '');
                        console.log('edit_bobot:', data.bobot ?? '');
                        console.log('id_criteria_edit:', data.id_criteria ?? '');

                        // Set form action to update
                        const editForm = document.getElementById('edit-weight-form');
                        editForm.setAttribute('action', `/weight/update/${id}`);
                        editForm.setAttribute('method', 'POST');

                        if (!editForm.querySelector('input[name="_method"]')) {
                            editForm.insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            });
        });

        // Submit form data for editing weight
        const updateButton = document.getElementById('submit-edit-form');
        updateButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission
            const editForm = document.getElementById('edit-weight-form');
            const formData = new FormData(editForm);

            fetch(editForm.getAttribute('action'), {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const messageElement = document.getElementById('message-edit');
                    if (data.success) {
                        messageElement.innerHTML = `<div class="alert alert-success" role="alert">${data.message}</div>`;
                        $('#editBobot').modal('hide'); // Close modal
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
@endsection