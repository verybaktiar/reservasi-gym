<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'invoice_id',
        'nama',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'durasi',
        'jumlah_orang',
        'catatan',
        'total_harga'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->invoice_id = 'INV-' . strtoupper(Str::random(8));
        });
        
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'reservasi_id');
    }
}
