<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TanggunganOrtu extends Model
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