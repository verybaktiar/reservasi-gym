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
          Tambah Data kategori
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
                <form action="{{ url('kategori/store') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="nama">Nama kategori</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
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
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $key => $value)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->nama }}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">

                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$value->id_kategori}}"><i class="fa fa-edit"></i></a>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal{{$value->id_kategori}}"><i class="fa fa-trash-o"></i></a>

              </div>
            </td>
          
           
          </tr>
          @endforeach
        </tbody>
          <!-- Modal Hapus -->
    <div class="modal fade" id="hapusModal{{$value->id_kategori}}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{$value->id_kategori}}" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="hapusModalLabel{{$value->id_kategori}}">Konfirmasi Hapus Data</h5>
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
            <a href="{{ url('kategori/delete/' . $value->id_kategori) }}" class="btn btn-danger">Ya, Hapus</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal{{$value->id_kategori}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$value->id_kategori}}" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="hapusModalLabel{{$value->id_kategori}}">Konfirmasi Hapus Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="modal-body">
            <form action="{{ route('kategori.update', $value->id_kategori) }}" method="post">

                @csrf
                <div class="form-group">
                  <label for="nama">Nama kategori</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="{{$value->nama}}" required>
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

      </table>
      <div class="pull-right">

      </div>
    </div>
    </td>
    </tr>


    </tbody>
    </table>
  </div>

</div>
</div>
@endsection