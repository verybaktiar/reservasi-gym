@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="invoice">
        <div class="invoice-header">
            <h2>INVOICE #{{ $pembayaran->invoice_id }}</h2>
            <span class="badge badge-success">PAID</span>
        </div>
        <div class="invoice-info">
            <div class="invoice-to">
                <strong>Invoiced To:</strong>
                <p>{{ $pembayaran->nama }}</p>
                <p>{{ $pembayaran->alamat }}</p>
            </div>
            <div class="invoice-details">
                <strong>Invoice Date:</strong>
                <p>{{ $pembayaran->created_at->format('d/m/Y') }}</p>
                <strong>Payment Method:</strong>
                <p>{{ $pembayaran->metode_pembayaran }}</p>
            </div>
        </div>
        <div class="invoice-items">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pembayaran->deskripsi }}</td>
                        <td>{{ $pembayaran->total_harga }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="invoice-total">
            <strong>Total:</strong>
            <p>{{ $pembayaran->total_harga }}</p>
        </div>
    </div>
</div>
@endsection
