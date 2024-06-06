@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Pembayaran</h2>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reservasi ID</th>
                <th>Invoice ID</th>
                <th>Nama</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayarans as $pembayaran)
            <tr>
                <td>{{ $pembayaran->id_pembayaran }}</td>
                <td>{{ $pembayaran->reservasi_id }}</td>
                <td>{{ $pembayaran->invoice_id }}</td>
                <td>{{ $pembayaran->nama }}</td>
                <td>{{ $pembayaran->total_harga }}</td>
                <td>
                    @if($pembayaran->status == 'pending')
                    <span class="badge badge-warning">Pending</span>
                    @else
                    <span class="badge badge-success">Paid</span>
                    @endif
                </td>
                <td>
                    @if($pembayaran->status == 'pending')
                    <form action="{{ route('pembayaran.bayar', $pembayaran->id_pembayaran) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Bayar</button>
                    </form>
                    @else
                    <a href="{{ route('pembayaran.invoice', $pembayaran->id_pembayaran) }}" class="btn btn-primary btn-sm">Invoice</a>
                    @endif
                </td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection