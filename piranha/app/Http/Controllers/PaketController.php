<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    //
    public function index()
    {
        $kategoriList = Kategori::all();
        $data = Paket::all();
        $paket = new Paket(); // Membuat instance paket baru
        return view('admin.paket.index', compact('data', 'kategoriList', 'paket'));
    }

    public function index2()
    {
        $kategoriList = Kategori::all();
        $data = Paket::all();
        $paket = new Paket(); // Membuat instance paket baru
        return view('admin.paket.index2', compact('data', 'kategoriList', 'paket'));
    }

    

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama_paket' => 'required',
            'kategori_id' => 'required|exists:kategori,id_kategori' // Pastikan ID kategori yang dipilih ada di tabel kategori
        ]);

        // Simpan data paket ke dalam database
        Paket::create([
            'nama_paket' => $request->nama_paket,
            'kategori_id' => $request->kategori_id
        ]);;
        return redirect('paket')->with('pesan', 'Data berhasil ditambahkan');
    }


    public function update(Request $request, $id_paket)
{
    // Dapatkan data paket yang ingin diubah
    $paket = Paket::findOrFail($id_paket);

    // Validasi data yang diterima dari formulir
    $request->validate([
        'nama_paket' => 'required',
        'kategori_id' => 'required|exists:kategori,id_kategori'
    ]);

    // Simpan data paket ke dalam database
    $paket->update([
        'nama_paket' => $request->nama_paket,
        'kategori_id' => $request->kategori_id
    ]);

    return redirect('paket')->with('pesan', 'Data berhasil diubah');
}
public function delete($id_paket)
    {
        Paket::find($id_paket)->delete();
        return redirect('paket')->with('hapus', 'Data berhasil dihapus');
    }


    

}
