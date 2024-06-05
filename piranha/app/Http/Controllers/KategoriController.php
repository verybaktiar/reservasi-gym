<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index()
    {
        $data= Kategori::all();
        return view('admin.kategori.kategori', compact('data'));
    }
    public function tambah()
    {
        return view('admin.kategori.tambah');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        Kategori::create($request->all());
        return redirect('kategori')->with('pesan', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $data = Kategori::find($id);
        return view('admin.kategori.edit', compact('data'));
    }
    public function update(Request $request, $id_kategori)
    {
        $request->validate([
            'nama' => 'required'
        ]);
    
        // Cari entri kategori berdasarkan ID
        $kategori = Kategori::find($id_kategori);
    
        // Periksa jika entri kategori ditemukan
        if ($kategori) {
            // Update nama kategori
            $kategori->nama = $request->nama;
            $kategori->save(); // Simpan perubahan
    
            return redirect('kategori')->with('pesan', 'Data berhasil diubah');
        } else {
            // Jika entri kategori tidak ditemukan, kembalikan dengan pesan error
            return redirect()->back()->with('error', 'Kategori tidak ditemukan');
        }
    }
    
    public function delete($id_kategori)
    {
        Kategori::find($id_kategori)->delete();
        return redirect('kategori')->with('hapus', 'Data berhasil dihapus');
    }

}
