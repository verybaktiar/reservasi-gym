@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="card">
        <div class="card-header">
            @if(session()->has('pesan'))
            <!-- Tampilkan pesan session dalam bentuk Toastr saat dokumen dimuat -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Panggil metode Toastr
                    toastr.success("{{ session('pesan') }}");
                });
            </script>
            @endif
            @if(session()->has('hapus'))
            <!-- Tampilkan pesan session dalam bentuk Toastr saat dokumen dimuat -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Panggil metode Toastr
                    toastr.warning("{{ session('hapus') }}");
                });
            </script>
            @endif
            <strong class="card-title">Data kategori</strong>
            <div class="pull-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data Pengguna
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('pengguna/store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama Pengguna</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Password</label>
                                        <input type="text" class="form-control" id="password" name="password" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->username }}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $value->id }}">
                                Edit
                            </button>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $value->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $value->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $value->id }}">Edit Pengguna</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('pengguna/update', $value->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="nama">Nama Pengguna</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $value->nama }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="{{ $value->username }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" value="{{ $value->email }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="text" class="form-control" id="password" name="password" value="{{ $value->password }}" required>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Hapus -->
                            <form action="{{ url('pengguna/destroy', $value->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pull-right">
            </div>
        </div>
    </div>
</div>
@endsection
