<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Produk;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        $paket = Paket::all();
        return view('pelanggan.index', compact('produk', 'paket'));
    }
    public function service()
    {
        return view('pelanggan.service');
    }
    public function membership()
    {
        $produk = Produk::all();

        $paket = Paket::all();
        return view('pelanggan.index', compact('produk', 'paket'));
    }
    public function reservasi(Request $request)
    {
        dd($request->reservasi);
        // $reservasi = Reservasi::create($request->all());
        
        // $reservasi->save();

        // Redirect kembali ke halaman sebelumnya atau ke halaman lain jika perlu
        return redirect()->back()->with('pesan', 'Reservasi berhasil dikirim!');
    }
}
