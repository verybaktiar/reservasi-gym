@extends('main')

@section('title', 'Paket')

@section('breadcrumbs')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Produk</h1>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="#">Produk</a></li>
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
      <strong class="card-title">Data kategori</strong>
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
                <form action="{{ url('produk/store') }}" method="post">
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
                    <label for="kategori">Pilih Paket</label>
                    <select class="form-control" id="paket" name="paket_id" required>
                      <option value="">Pilih Paket</option>
                      @foreach($paketList as $paket)
                      <option value="{{ $paket->id_paket }}">{{ $paket->nama_paket }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Durasi Paket</label>
                    <input type="text" class="form-control" id="durasi_paket" name="durasi_paket" required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Harga</label>
                    <input type="text" class="form-control" id="harga_produk" name="harga_produk" required>
                  </div>
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control" type="file" name="gambar" id="gambar">
                  </div>
                  <div class="form-group">
                    <label for="nama">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" required>
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
            <th>No</th>
            <th>Kategori</th>
            <th>Paket</th>
            <th>Judul</th>
            <th>Durasi Paket</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($produk as $key => $value)
          <tr>
            <td>{{ intval($key) + 1 }}</td>
            <td>{{ $value->kategori->nama }}</td>
            <td>{{ $value->paket->nama_paket }}</td>
            <td>{{ $value->nama_produk }}</td>
            <td>{{ $value->durasi_paket }}</td>
            <td>{{ $value->harga_produk}}</td>

            <td><img src="{{ asset('images/' . $value->gambar) }}" width="100px"></td>
            <td class="px-4 py-3">{{ $value->deskripsi_produk }}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$value->id_produk}}"><i class="fa fa-edit"></i></a>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal{{$value->id_produk}}"><i class="fa fa-trash-o"></i></a>
              </div>
            </td>
            <!-- Modal Hapus -->
          <div class="modal fade" id="hapusModal{{$value->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{$value->id_produk}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="hapusModalLabel{{$value->id_produk}}">Konfirmasi Hapus Data</h5>
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
                  <a href="{{ url('produk/hapus/' . $value->id_produk) }}" class="btn btn-danger">Ya, Hapus</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Edit -->
          <div class="modal fade" id="editModal{{$value->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$value->id_produk}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel{{$value->id_produk}}">Edit Produk</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('produk/update', $value->id_produk) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="kategori_id">Pilih Kategori</label>
                      <select class="form-control" id="kategori_id" name="kategori_id">
                        @foreach($kategoriList as $kategori)
                        <option value="{{ $kategori->id_kategori }}" {{ $kategori->id_kategori == $value->kategori_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="paket_id">Pilih Paket</label>
                      <select class="form-control" id="paket_id" name="paket_id">
                        @foreach($paketList as $paket)
                        <option value="{{ $paket->id_paket }}" {{ $paket->id_paket == $value->paket_id ? 'selected' : '' }}>{{ $paket->nama_paket }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="nama_produk">Nama Produk</label>
                      <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{$value->nama_produk}}" required>
                    </div>
                    <div class="form-group">
                      <label for="durasi_paket">Durasi Paket</label>
                      <input type="text" class="form-control" id="durasi_paket" name="durasi_paket" value="{{$value->durasi_paket}}" required>
                    </div>
                    <div class="form-group">
                      <label for="harga_produk">Harga</label>
                      <input type="text" class="form-control" id="harga_produk" name="harga_produk" value="{{$value->harga_produk}}" required>
                    </div>
                    <div class="form-group">
                      
                      <label for="gambar">Gambar</label>
                      <input class="form-control" type="file" name="gambar" id="gambar">
                      <!-- Tampilkan gambar yang sudah ada -->
                      <img src="{{ asset('images/' . $value->gambar) }}" width="100px">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi_produk">Deskripsi</label>
                      <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" value="{{$value->deskripsi_produk}}" required>
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