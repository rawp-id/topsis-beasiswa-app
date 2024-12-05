<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $guarded = ['id'];

    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function usiaOrtu()
    {
        return $this->hasMany(UsiaOrtu::class);
    }

    public function penghasilanOrtu()
    {
        return $this->hasMany(PenghasilanOrtu::class);
    }

    public function tanggunganOrtu()
    {
        return $this->hasMany(TanggunganOrtu::class);
    }

    public function pekerjaanOrtu()
    {
        return $this->hasMany(PekerjaanOrtu::class);
    }
}
