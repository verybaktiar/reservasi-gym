<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Saldo;
use App\Models\SaldoMember;

class PembayaranController extends Controller
{
    public function index()
    {
        $reservasi = session('reservasi');
        if (!$reservasi) {
            return redirect()->back()->with('error', 'Reservasi tidak ditemukan');
        }
        $totalHarga = $this->hitungTotalHarga($reservasi);
    
        return view('pembayaran.index', compact('reservasi', 'totalHarga'));
    }

    public function proses(Request $request)
    {
        $reservasi = session('reservasi');
        if (!$reservasi) {
            return redirect()->route('pembayaran.index')->with('error', 'Reservasi tidak ditemukan');
        }
        $totalHarga = $this->hitungTotalHarga($reservasi);

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('pembayaran.index')->with('error', 'User tidak ditemukan');
        }
        $saldoMember = Saldo::where('user_id', $user->id)->first();

        if ($saldoMember && $saldoMember->saldo >= $totalHarga) {
            // Kurangi saldo user
            $saldoMember->saldo -= $totalHarga;
            $saldoMember->save();

            // Logika penyimpanan data pembayaran
            // ...

            return redirect()->route('home')->with('success', 'Pembayaran berhasil diproses.');
        } else {
            return redirect()->route('pembayaran.index')->with('error', 'Saldo tidak mencukupi.');
        }
    }

    private function hitungTotalHarga($reservasi)
    {
        // Logika perhitungan total harga berdasarkan item yang dipilih
        return 100000; // Contoh harga
    }
}
