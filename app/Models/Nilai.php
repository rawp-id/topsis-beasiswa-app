<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $guarded = ['id'];

    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
