<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['id_pembayaran', 'reservasi_id', 'invoice_id', 'nama', 'total_harga', 'status'];
    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class, 'reservasi_id');
    }}

