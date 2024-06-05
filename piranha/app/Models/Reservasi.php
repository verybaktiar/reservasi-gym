<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'durasi',
        'jumlah_orang',
        'catatan'
    ];
}
