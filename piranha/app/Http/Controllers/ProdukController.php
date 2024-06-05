<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $paketList = Paket::all();
        $kategoriList = Kategori::all();
        $data = Paket::all();
        $paket = new Paket(); // Membuat instance paket baru
        return view('admin.produk.index', compact('data', 'kategoriList', 'paket','produk','paketList'));
    }
    public function store(Request $request)
    {
        $produk = Produk::create($request->all());
        if ($request->hasFile('gambar')) {
            $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images'), $imageName);
            $produk->gambar = $imageName;
            $produk->save();
        }
        
        return redirect('produk')->with('pesan', 'Data berhasil ditambahkan');
      
    }
    public function edit($id_produk)
    {
        $produk = Produk::find($id_produk);
        $paketList = Paket::all();
        $kategoriList = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategoriList', 'paketList'));
    }
    public function update(Request $request, $id_produk)
    {
        $produk = Produk::find($id_produk);
        $produk->update($request->all());
        if ($request->hasFile('gambar')) {
            $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images'), $imageName);
            $produk->gambar = $imageName;
            $produk->save();
        }
    
        return redirect('produk')->with('pesan', 'Data berhasil diubah');
    }
    public function delete($id_produk)
    {
        $produk = Produk::find($id_produk);
        Member::where('produk_id', $id_produk)->delete();
        $produk->delete();
        
        return redirect('produk')->with('hapus', 'Data berhasil dihapus');
    }
    
    
}
