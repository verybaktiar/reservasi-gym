<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Paket;
use App\Models\Produk;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $member= Member::all();
        $produk = Produk::all();
        $produkList = Produk::all();
        $paketList = Paket::all();
        $kategoriList = Kategori::all();
        $data = Paket::all();
        $paket = new Paket(); // Membuat instance paket baru
        return view('admin.member.index', compact('member','data', 'kategoriList','produkList', 'paket','produk','paketList'));
     
    }
    public function store(Request $request)
    {
        $member = Member::create($request->all());
        
        $member->save();
        return redirect('member');
    }
    public function update(Request $request, $id_member)
    {
        // Temukan member berdasarkan ID
        $member = Member::find($id_member);
    
        // Perbarui data member dengan data yang dikirimkan melalui request
        $member->update($request->all());
    
        // Redirect kembali ke halaman member dengan pesan sukses
        return redirect('member')->with('pesan', 'Data berhasil diubah');
    }
    


    public function delete($id_member)
    {
        Member::find($id_member)->delete();
        return redirect('member')->with('hapus', 'Data berhasil dihapus');
    }


}
