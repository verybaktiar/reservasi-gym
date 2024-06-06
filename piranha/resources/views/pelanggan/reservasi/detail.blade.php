<!-- resources/views/pelanggan/reservasi/detail.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Detail Reservasi</h2>
    <table class="table table-bordered">
        <tr>
            <th>Invoice ID</th>
            <td>{{ $reservasi->invoice_id }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $reservasi->nama }}</td>
        </tr>
        <tr>
            <th>Tanggal Reservasi</th>
            <td>{{ $reservasi->tanggal }}</td>
        </tr>
        <tr>
            <th>Jam Mulai</th>
            <td>{{ $reservasi->jam_mulai }}</td>
        </tr>
        <tr>
            <th>Jam Selesai</th>
            <td>{{ $reservasi->jam_selesai }}</td>
        </tr>
        <tr>
            <th>Durasi</th>
            <td>{{ $reservasi->durasi }} Jam</td>
        </tr>
        <tr>
            <th>Jumlah Orang</th>
            <td>{{ $reservasi->jumlah_orang }}</td>
        </tr>
        <tr>
            <th>Catatan Tambahan</th>
            <td>{{ $reservasi->catatan }}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>{{ $reservasi->total_harga }}</td>
        </tr>
    </table>
    <form action="{{ route('pembayaran.simpan') }}" method="POST">
        @csrf
        <input type="hidden" name="reservasi_id" value="{{ $reservasi->id }}">
        <input type="hidden" name="invoice_id" value="{{ $reservasi->invoice_id }}">
        
        <input type="hidden" name="nama" value="{{ $reservasi->nama }}">
        <input type="hidden" name="total_harga" value="{{ $reservasi->total_harga }}">
        <button type="submit" class="btn btn-primary">Lanjutkan ke Pembayaran</button>
    </form>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
</div>
@endsection
