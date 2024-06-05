@extends('main')

@section('title', 'Reservasi')

@section('breadcrumbs')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Reservasi</h1>
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
      <strong class="card-title">Data Reservasi</strong>
      <div class="pull-right">
        <!-- Button trigger modal -->
       
        

      </div>
    </div>


    <div class="card-body table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Jam_Mulai</th>
            <th>Jam_Selesai</th>
            <th>Durasi</th>
            <th>Jumlah_orang</th>
            <th>Catatan</th>
        
          </tr>
        </thead>
        <tbody>
          @foreach ($reservasi as $key => $value)
          <tr>
          <td>{{ intval($key) + 1 }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->tanggal }}</td>
            <td>{{ $value->jam_mulai }}</td>
            <td>{{ $value->jam_selesai }}</td>
            <td>{{ $value->durasi }}</td>
            <td>{{ $value->jumlah_orang }}</td>
            <td>{{ $value->catatan }}</td>

          
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