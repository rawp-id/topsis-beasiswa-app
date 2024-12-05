<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pekerjaanOrtu()
    {
        return $this->belongsTo(PekerjaanOrtu::class, 'Pekerjaan_Ortu_id', 'id');
    }

    public function tanggunganOrtu()
    {
        return $this->belongsTo(TanggunganOrtu::class, 'Tanggungan_Ortu_id', 'id');
    }

    public function penghasilanOrtu()
    {
        return $this->belongsTo(PenghasilanOrtu::class, 'Penghasilan_Ortu_id', 'id');
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class, 'Nilai_id', 'id');
    }

    public function usiaOrtu()
    {
        return $this->belongsTo(UsiaOrtu::class, 'Usia_Orangtua_id', 'id');
    }
}
