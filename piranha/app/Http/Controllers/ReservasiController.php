<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::all();
       return view('admin.reservasi.index', compact('reservasi'));
    }
    public function store(Request $request)
    {
        
        $reservasi = Reservasi::create($request->all());
        
        $reservasi->save();
         // Simpan reservasi ke session
        session(['reservasi' => $reservasi]);

        // Redirect kembali ke halaman sebelumnya atau ke halaman lain jika perlu
        return redirect()->route('reservasi.detail', ['id' => $reservasi->id]);
        // return redirect()->back()->with('pesan', 'Reservasi berhasil dikirim!');
    }
    public function detail($id)
{
    $reservasi = Reservasi::find($id);
    return view('pelanggan.reservasi.detail', compact('reservasi'));
}
}
