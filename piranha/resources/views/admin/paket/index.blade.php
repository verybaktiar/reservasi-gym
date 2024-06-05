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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ url('paket/store') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="kategori">Pilih Kategori</label>
                    <select class="form-control" id="kategori" name="kategori_id" required>
                      <option value="">Pilih Kategori</option>
                      @foreach($kategoriList as $kategori)
                      <option value="{{ $kategori->id_kategori }}">{{ $kategori->id_kategori }} - {{ $kategori->nama }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama kategori</label>
                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
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
            <th>Nama</th>
            <th>Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $key => $value)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->nama_paket }}</td>
            <td>{{ $value->kategori->nama }}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">

                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$value->id_paket}}"><i class="fa fa-edit"></i></a>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal{{$value->id_paket}}"><i class="fa fa-trash-o"></i></a>

              </div>
            </td>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{$value->id_paket}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$value->id_paket}}" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel{{$value->id_paket}}">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="modal-body">
                      <form action="{{ route('kategori.update', $value->id_paket) }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="kategori_id">Kategori</label>
                          <select class="form-control" id="kategori_id" name="kategori_id">
                            @foreach($kategoriList as $kategori)
                            <option value="{{ $kategori->id_kategori }}" {{ $kategori->id_kategori == $paket->kategori_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="nama">Nama kategori</label>
                          <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{$value->nama_paket}}" required>
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
            <!-- Modal Hapus -->
            <div class="modal fade" id="hapusModal{{$value->id_paket}}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{$value->id_paket}}" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel{{$value->id_paket}}">Konfirmasi Hapus Data</h5>
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
                    <a href="{{ url('paket/hapus/' . $value->id_paket) }}" class="btn btn-danger">Ya, Hapus</a>
                  </div>
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