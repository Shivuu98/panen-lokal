<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    protected $fillable = ['nama', 'deskripsi'];

    public function musimPanen()
    {
        return $this->hasMany(MusimPanen::class);
    }

    public function harga()
    {
        return $this->hasMany(HargaKomoditas::class);
    }
}
