<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\User;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index()
    {
        $saldo = Saldo::all();
        $users = User::all();
        return view('admin.saldo.index', compact('saldo', 'users'));
    }
    public function store (Request $request)
    {

        Saldo::create($request->all());
        return redirect('saldo')->with('pesan', 'Data Pengguna berhasil ditambahkan');
    }
}
