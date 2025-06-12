<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusimPanen extends Model
{
    protected $fillable = ['komoditas_id', 'bulan'];

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class);
    }
}
