<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Saldo;
use App\Models\SaldoMember;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::all();
        return view('pembayaran.index', compact('pembayarans'));
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
        $saldoMember = SaldoMember::where('users_id', $user->id)->first();

        if ($saldoMember && $saldoMember->saldo_member >= $totalHarga) {
            // Kurangi saldo user
            $saldoMember->saldo_member -= $totalHarga;
            $saldoMember->save();

            // Logika penyimpanan data pembayaran
            // ...

            return redirect()->route('home')->with('success', 'Pembayaran berhasil diproses.');
        } else {
            return redirect()->route('pembayaran.index')->with('error', 'Saldo tidak mencukupi.');
        }
    }

    public function simpan(Request $request)
    {
        $pembayaran = new Pembayaran();
        $pembayaran->reservasi_id = $request->reservasi_id;
        $pembayaran->invoice_id = $request->invoice_id;
        $pembayaran->nama = $request->nama;
        $pembayaran->total_harga = $request->total_harga;
        $pembayaran->status = 'pending'; // atau 'belum dibayar'
        $pembayaran->save();

        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil disimpan.');
    }

    public function bayar($id_pembayaran)
    {
        $pembayaran = Pembayaran::find($id_pembayaran);
        $user = Auth::user();
        $saldoMember = Saldo::where('users_id', $user->id)->first();

        if ($pembayaran && $saldoMember) {
            // Konversi total_harga dan saldo_member dari string ke float
            $totalHarga = floatval(str_replace(['Rp.', ','], '', $pembayaran->total_harga));
            $saldo = floatval(str_replace(['Rp.', ','], '', $saldoMember->saldo_member));

            if ($saldo >= $totalHarga) {
                $saldoMember->saldo_member = $saldo - $totalHarga;
                $saldoMember->save();

                $pembayaran->status = 'sudah dibayar';
                $pembayaran->save();

                return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dilakukan.');
            } else {
                return redirect()->route('pembayaran.index')->with('error', 'Saldo tidak mencukupi.');
            }
        }

        return redirect()->route('pembayaran.index')->with('error', 'Pembayaran tidak ditemukan.');
    }

    public function invoice($id_pembayaran)
    {
        $pembayaran = Pembayaran::findOrFail($id_pembayaran);
        return view('pembayaran.invoice', compact('pembayaran'));
    }

    private function hitungTotalHarga($reservasi)
    {
        // Logika perhitungan total harga berdasarkan item yang dipilih
        return 100000; // Contoh harga
    }
}
