<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = ['id_kategori','nama'];
    protected $primaryKey = 'id_kategori';

    public function pakets()
    {
        return $this->hasMany(Paket::class, 'kategori_id');
    }
    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}
