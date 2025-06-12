<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HargaKomoditas extends Model
{
    protected $fillable = ['komoditas_id', 'bulan', 'harga'];

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class);
    }
}
