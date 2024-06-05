<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $primaryKey = 'id_member';
    protected $fillable = ['id_member', 'kategori_id', 'nama', 'username', 'jenis_kelamin', 'no_hp', 'tanggal', 'alamat', 'produk_id', 'paket_id'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
    // public function produks()
    // {
    //     return $this->hasMany(Produk::class, 'paket_id');
    // }
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id_produk');
    }
}
