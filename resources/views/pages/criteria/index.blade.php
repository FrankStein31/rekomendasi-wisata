@extends('layouts.app')

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="list"></i></div>
                        Kriteria
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <a class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#tambahKriteria">
                        <i class="me-1" data-feather="plus"></i>
                        Kriteria baru
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid px-4">
    <div class="card">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Kriteria</th>
                        <th>Bobot</th>
                        <th>Keterangan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Kriteria</th>
                        <th>Bobot</th>
                        <th>Keterangan</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_atribut }} </td>
                        <td>{{ $item->nama_atribut}}</td>
                        <td>{{ $item->atribut }} %</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a class="btn btn-datatable btn-icon btn-transparent-dark me-2 edit-criteria" data-bs-toggle="modal" data-bs-target="#editCriteria" data-id="{{ $item->id_criteria }}">
                                <i data-feather="edit"></i>
                            </a>
                            <form action="{{ route('criteria.delete', $item->id_criteria) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
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

<!-- Tambah Kriteria Modal -->
<div class="modal fade" id="tambahKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            </div>
            <div id="message"></div>
            <div class="modal-body">
                <form id="criteria-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kode_atribut">Kode :</label>
                        <input type="text" class="form-control" id="kode_atribut" name="kode_atribut">
                    </div>
                    <div class="form-group">
                        <label for="nama_atribut">Kriteria :</label>
                        <input type="text" class="form-control" id="nama_atribut" name="nama_atribut">
                    </div>
                    <div class="form-group">
                        <label for="atribut">Bobot :</label>
                        <input type="number" class="form-control" id="atribut" name="atribut">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan :</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submit-form">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Kriteria Modal -->
<div class="modal fade" id="editCriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            </div>
            <div id="message"></div>
            <div class="modal-body">
                <form id="edit-criteria-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Tambahkan ini -->
                    <input type="hidden" id="id_criteria" name="id_criteria">
                    <div class="form-group">
                        <label for="kode_atribut">Kode :</label>
                        <input type="text" class="form-control" id="edit_kode_atribut" name="kode_atribut" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_atribut">Kriteria :</label>
                        <input type="text" class="form-control" id="edit_nama_atribut" name="nama_atribut" required>
                    </div>
                    <div class="form-group">
                        <label for="atribut">Bobot :</label>
                        <input type="number" class="form-control" id="edit_atribut" name="atribut" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan :</label>
                        <input type="text" class="form-control" id="edit_keterangan" name="keterangan">
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
        const form = document.getElementById('criteria-form');
        const submitButton = document.getElementById('submit-form');
        const editSubmitButton = document.getElementById('submit-edit-form');

        submitButton.addEventListener('click', function(event) {
            event.preventDefault();
            const formData = new FormData(form);

            fetch('{{ route("criteria.store") }}', {
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
                        form.reset();
                        $('#tambahKriteria').modal('hide');
                        window.location.reload();
                    } else {
                        messageElement.innerHTML = `<div class="alert alert-danger" role="alert">${data.message}</div>`;
                    }
                })
                .catch(error => {
                    const messageElement = document.getElementById('message');
                    messageElement.innerHTML = `<div class="alert alert-danger" role="alert">Terjadi kesalahan: ${error.message}</div>`;
                });
        });

        document.addEventListener('click', function(event) {
            if (event.target.closest('.edit-criteria')) {
                const button = event.target.closest('.edit-criteria');
                const id = button.getAttribute('data-id');
                fetch(`/criteria/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('id_criteria').value = data.id_criteria;
                        document.getElementById('edit_kode_atribut').value = data.kode_atribut;
                        document.getElementById('edit_nama_atribut').value = data.nama_atribut;
                        document.getElementById('edit_atribut').value = data.atribut ?? '';
                        document.getElementById('edit_keterangan').value = data.keterangan ?? '';

                        // Set form action URL
                        const editForm = document.getElementById('edit-criteria-form');
                        editForm.action = `/criteria/update/${id}`;
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }
        });

        editSubmitButton.addEventListener('click', function(event) {
            event.preventDefault();
            const editForm = document.getElementById('edit-criteria-form');
            const formData = new FormData(editForm);

            fetch(editForm.action, {
                    method: 'POST', // Menggunakan POST untuk PUT request
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
                        $('#editCriteria').modal('hide');
                        window.location.reload();
                    } else {
                        messageElement.innerHTML = `<div class="alert alert-danger" role="alert">${data.message}</div>`;
                    }
                })
                .catch(error => {
                    const messageElement = document.getElementById('message');
                    messageElement.innerHTML = `<div class="alert alert-danger" role="alert">Terjadi kesalahan: ${error.message}</div>`;
                });
        });
    });
</script>
@endsection