<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'id_produk',
        'kategori_id',
        'nama_produk',
        'paket_id',
        'durasi_paket',
        'harga_produk',
        'gambar',
        'deskripsi_produk'
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'produk_id');
    }

}
