<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Pembayaran;
use App\Models\Reservasi;
use App\Models\Pendapatan;
use App\Models\Saldo;
use App\Models\Topup;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMember = Member::count();
        $totalReservasi = Reservasi::count();
        $totalPendapatan = Pembayaran::sum('total_harga'); // Asumsi ada kolom 'amount'
        $totalTopup = Saldo::sum('saldo_member'); // Asumsi ada kolom 'amount'
        $grandTotal = $totalMember + $totalReservasi + $totalPendapatan + $totalTopup;

        return view('admin.dashboard', compact('totalMember', 'totalReservasi', 'totalPendapatan', 'totalTopup', 'grandTotal'));
    }
}
