@extends('main')

@section('title', 'Paket')

@section('breadcrumbs')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Paket</h1>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="#">Paket</a></li>
          <li class="active">Data</li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
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
      <strong class="card-title">Data Paket</strong>
      <div class="pull-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Tambah Data Paket
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
                <div class="modal-body">
                  <form action="{{ url('member/store') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="kategori">Pilih Kategori</label>
                      <select class="form-control" id="kategori" name="kategori_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategoriList as $kategori)
                        <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                      <label for="nama">username</label>
                      <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                      <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nama">No Hp</label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="form-group">
                      <label for="nama">Tanggal</label>
                      <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                      <label for="nama">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                      <label for="kategori">Pilih Produk</label>
                      <select class="form-control" id="paket" name="produk_id" required>
                        <option value="">Pilih Paket</option>
                        @foreach($produk as $produk)
                        <option value="{{ $produk->id_produk }}">{{ $produk->nama_produk}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="kategori">Pilih Plan</label>
                      <select class="form-control" id="paket" name="paket_id" required>
                        <option value="">Pilih Plan</option>
                        @foreach($paketList as $paket)
                        <option value="{{ $paket->id_paket }}">{{ $paket->nama_paket }}</option>
                        @endforeach
                      </select>
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
    </div>


    <div class="card-body table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>No</th>
          <th>Kategori</th>
          <th>Nama Lengkap</th>
          <th>username</th>
          <th>Jenis Kelamin</th>
          <th>No HP</th>
          <th>Tanggal</th>
          <th>Alamat</th>
          <th>Paket</th>
          <th>Plan</th>
          <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($member as $key => $value)
          <tr>
            <td>{{ intval($key) + 1 }}</td>
            <td>{{ $value->kategori->nama }}</td>
            <td>{{ $value->nama_lengkap }}</td>
            <td>{{ $value->username }}</td>
            <td>{{ $value->jenis_kelamin }}</td>
            <td>{{ $value->no_hp }}</td>
            <td>{{ $value->tanggal }}</td>
            <td>{{ $value->alamat }}</td>
            <td>  @if ($value->produk)
            {{ $value->produk->nama_produk }}
            @endif</td>
            <td>{{ $value->paket->nama_paket }}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">

              <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$value->id_member}}"><i class="fa fa-edit"></i></a>
              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal{{$value->id_member}}"><i class="fa fa-trash-o"></i></a>

              </div>
            </td>

            <!-- Modal Hapus -->
        <div class="modal fade" id="hapusModal{{$value->id_member}}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{$value->id_member}}" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel{{$value->id_member}}">Konfirmasi Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <!-- Link untuk menghapus data -->
                <a href="{{ url('member/hapus/' . $value->id_member) }}" class="btn btn-danger">Ya, Hapus</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Edit -->
        <div class="modal fade" id="editModal{{$value->id_member}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$value->id_member}}" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$value->id_member}}">Edit Data Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ url('member/update', $value->id_member) }}" method="post">
                  @csrf
                  <!-- Form input fields for member data -->
                  <div class="form-group">
                    <label for="kategori">Pilih Kategori</label>
                    <select class="form-control" id="kategori" name="kategori_id" required>
                      <option value="">Pilih Kategori</option>
                      @foreach($kategoriList as $kategori)
                      <option value="{{ $kategori->id_kategori }}" {{ $kategori->id_kategori == $value->kategori_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $value->nama }}" required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $value->username }}" required>
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                      <option value="">Pilih Jenis Kelamin</option>
                      <option value="laki-laki" {{ $value->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                      <option value="perempuan" {{ $value->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nama">No HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $value->no_hp }}" required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $value->tanggal }}" required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $value->alamat }}" required>
                  </div>
                  <div class="form-group">
                    <label for="kategori">Pilih Produk</label>
                    <label for="kategori">Pilih Produk</label>
                    <select class="form-control" id="produk" name="produk_id" required>
                      <option value="">Pilih Produk</option>
                      @foreach($produkList as $produk)
                      <option value="{{ $produk->id_produk }}" {{ $produk->id_produk == $value->produk_id ? 'selected' : '' }}>
                        {{ $produk->nama_produk }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="kategori">Pilih Plan</label>
                    <select class="form-control" id="paket" name="paket_id" required>
                      <option value="">Pilih Plan</option>
                      @foreach($paketList as $paket)
                      <option value="{{ $paket->id_paket }}" {{ $paket->id_paket == $value->paket_id ? 'selected' : '' }}>{{ $paket->nama_paket }}</option>
                      @endforeach
                    </select>
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

          </tr>
          @endforeach
        </tbody>





        </tbody>
      </table>
    </div>

  </div>

</div>
@endsection