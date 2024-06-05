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
                                <form action="{{ url('saldo/store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="user_id">Nama Member</label>
                                        <select class="form-control" id="users_id" name="users_id" required>
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}" data-nama="{{ $user->nama }}">{{ $user->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" id="nama_member" name="nama_member">


                                    <div class="form-group">
                                        <label for="saldo">Saldo Member</label>
                                        <input type="text" class="form-control" id="saldo_member" name="saldo_member" required>
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
                        <th>Nama Member</th>
                        <th>Saldo Member</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($saldo as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->nama_member }}</td>
                        <td>{{ $value->saldo_member }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $value->idsaldo_member }}">
                                Edit
                            </button>

                           
                            <!-- Tombol Hapus -->
                            <form action="{{ url('saldo/destroy', $value->idsaldo_member) }}" method="post" style="display:inline;">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script>
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    $(document).ready(function() {
        $('#saldo_member').on('input', function() {
            var value = $(this).val();
            $(this).val(formatRupiah(value, 'Rp.'));
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#users_id').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var namaMember = selectedOption.data('nama');
            $('#nama_member').val(namaMember);
        });

        $('form').on('submit', function(e) {
            var namaMember = $('#nama_member').val();
            if (!namaMember) {
                e.preventDefault();
                alert('Nama Member tidak boleh kosong.');
            }
        });
    });
</script>
@endsection