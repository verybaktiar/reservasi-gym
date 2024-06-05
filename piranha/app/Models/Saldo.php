<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;
    protected $table = 'saldo_member';
    protected $fillable = ['users_id','nama_member','saldo_member'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
