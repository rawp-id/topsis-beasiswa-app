<?php

namespace App\Livewire\PekerjaanOrtu;

use Livewire\Component;
use App\Models\Kriteria;
use App\Models\PekerjaanOrtu;

class Edit extends Component
{
    public $id;
    public $kriteria_id;
    public $nama;
    public $keterangan;
    public $bobot;

    public function mount($id)
    {   
        $pekerjaan = PekerjaanOrtu::with('kriteria')->findOrFail($id);

        $this->kriteria_id = $pekerjaan->kriteria_id ?? null;
        $this->nama = $pekerjaan->nama;
        $this->keterangan = $pekerjaan->keterangan;
        $this->bobot = $pekerjaan->bobot;
    }

    public function update()
    {
        // $this->validate([
        //     'nama' => 'required|string|max:255',
        //     'kriteria_id' => 'required|exists:kriterias,id',
        //     'keterangan' => 'nullable|string',
        //     'bobot' => 'required|numeric|min:0|max:100',
        // ]);

        $pekerjaan = PekerjaanOrtu::findOrFail($this->id);
        $pekerjaan->kriteria_id = $this->kriteria_id;
        $pekerjaan->nama = $this->nama;
        $pekerjaan->keterangan = $this->keterangan;
        $pekerjaan->bobot = $this->bobot;
        $pekerjaan->save();

        session()->flash('success', 'Pekerjaan berhasil diperbarui!');
        return $this->redirect(route('pekerjaan-ortu.index'), true);
    }

    public function render()
    {
        $pekerjaanOrtu = PekerjaanOrtu::with('kriteria')->find($this->id);
        $kriterias = Kriteria::all();

        return view('livewire.pekerjaan-ortu.edit', compact( 'kriterias', 'pekerjaanOrtu'));
    }
}
