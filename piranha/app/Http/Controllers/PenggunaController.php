<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $data = Pengguna::all();
        return view('admin.pengguna.index', compact('data'));
    }

    public function store(Request $request)
    {
        Pengguna::create([
            'nama' => $request->nama,
            'username' =>$request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);;
        

        
        return redirect('pengguna')->with('pesan', 'Data Pengguna berhasil ditambahkan');
    }
    public function edit($id)
    {
        $data = Pengguna::find($id);
        return view('admin.pengguna.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pengguna::find($id);
        $data->update($request->all());
        return redirect('pengguna')->with('pesan', 'Data Pengguna berhasil diubah');
    }

    public function delete($id)
    {
        $pengguna = Pengguna::find($id);
        $pengguna->delete();
        return redirect('pengguna')->with('pesan', 'Data berhasil dihapus');
    }
}
