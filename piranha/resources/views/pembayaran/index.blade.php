@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Halaman Pembayaran</h2>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <td>{{ $reservasi ? $reservasi->nama : 'Reservasi tidak ditemukan' }}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>{{ $totalHarga }}</td>
        </tr>
    </table>
    <form action="{{ route('pembayaran.proses') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
    </form>
</div>
@endsection
