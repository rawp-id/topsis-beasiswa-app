<?php

namespace App\Livewire\Beasiswa;

use App\Models\Nilai;
use Livewire\Component;
use App\Models\Beasiswa;
use App\Models\UsiaOrtu;
use App\Models\PekerjaanOrtu;
use App\Models\TanggunganOrtu;
use App\Models\PenghasilanOrtu;
use Illuminate\Support\Facades\Auth;

class Form extends Component
{
    public $nama, $asal_sekolah, $nomor_induk, $tempat_lahir, $tanggal_lahir, $jenis_kelamin;
    public $agama, $alamat, $no_hp, $Pekerjaan_Ortu_id, $Tanggungan_Ortu_id;
    public $Penghasilan_Ortu_id, $Nilai_id, $Usia_Orangtua_id, $keterangan;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'asal_sekolah' => 'required|string|max:255',
        'nomor_induk' => 'required|string|max:50',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',
        'agama' => 'required|string|max:50',
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:20',
        'Pekerjaan_Ortu_id' => 'nullable|exists:pekerjaan_ortus,id',
        'Tanggungan_Ortu_id' => 'nullable|exists:tanggungan_ortus,id',
        'Penghasilan_Ortu_id' => 'nullable|exists:penghasilan_ortus,id',
        'Nilai_id' => 'nullable|exists:nilais,id',
        'Usia_Orangtua_id' => 'nullable|exists:usia_ortus,id',
        'keterangan' => 'nullable|string',
    ];

    public function submit()
    {
        $this->validate();

        Beasiswa::create([
            'user_id' => Auth::id(),
            'nama' => $this->nama,
            'asal_sekolah' => $this->asal_sekolah,
            'nomor_induk' => $this->nomor_induk,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'Pekerjaan_Ortu_id' => $this->Pekerjaan_Ortu_id,
            'Tanggungan_Ortu_id' => $this->Tanggungan_Ortu_id,
            'Penghasilan_Ortu_id' => $this->Penghasilan_Ortu_id,
            'Nilai_id' => $this->Nilai_id,
            'Usia_Orangtua_id' => $this->Usia_Orangtua_id,
            'keterangan' => $this->keterangan,
        ]);

        session()->flash('message', 'Pengajuan beasiswa berhasil disimpan!');
        return redirect()->to('/dashboard');
    }

    public function render()
    {
        $pekerjaanOrtus = PekerjaanOrtu::all();
        $tanggunganOrtus = TanggunganOrtu::all();
        $penghasilanOrtus = PenghasilanOrtu::all();
        $nilais = Nilai::all();
        $usiaOrtus = UsiaOrtu::all();
        
        return view('livewire.beasiswa.form', compact('pekerjaanOrtus', 'tanggunganOrtus', 'penghasilanOrtus', 'nilais', 'usiaOrtus'));
    }
}
