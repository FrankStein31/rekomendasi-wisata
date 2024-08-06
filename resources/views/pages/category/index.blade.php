@extends('layouts.app')

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="list"></i></div>
                        Kategori Wisata
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <a class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#tambahCategory">
                        <i class="me-1" data-feather="plus"></i>
                        Kategori Wisata Baru
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
                        <th>Kategori Wisata</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Kategori Wisata</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->category_wisata }} </td>
                            <td>
                                <form action="{{ route('category.delete', $item->id_kategori) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $item->id_kategori }}">
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

<!-- Modal -->
<div class="modal fade" id="tambahCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Wisata</h5>
            </div>
            <div id="message"></div>
            <div class="modal-body">
                <!-- Form input data -->
                <form id="category-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category_wisata">Kategori Wisata</label>
                        <input type="text" class="form-control" id="category_wisata" name="category_wisata" required>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen form dan tombol submit
        const form = document.getElementById('category-form');
        const submitButton = document.getElementById('submit-form');

        // Tambahkan event listener untuk tombol submit
        submitButton.addEventListener('click', function (event) {
            event.preventDefault();
            // Buat FormData dari form
            const formData = new FormData(form);

            // Kirim form menggunakan fetch API
            fetch('{{ route("category.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                // Tampilkan pesan success atau error
                const messageElement = document.getElementById('message');
                if (data.success) {
                    messageElement.innerHTML = `<div class="alert alert-success" role="alert">${data.message}</div>`;
                    $('#tambahCategory').modal('hide'); // Tutup modal
                    window.location.reload(); // Reload halaman
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
