<?php

namespace App\Livewire\Tanggungan;

use Livewire\Component;
use App\Models\Kriteria;
use App\Models\TanggunganOrtu;

class Edit extends Component
{
    public $id;
    public $kriteria_id;
    public $nama;
    public $keterangan;
    public $bobot;

    public function mount($id)
    {
        $tanggungan = TanggunganOrtu::with('kriteria')->findOrFail($id);

        $this->kriteria_id = $tanggungan->kriteria_id;
        $this->nama = $tanggungan->nama;
        $this->keterangan = $tanggungan->keterangan;
        $this->bobot = $tanggungan->bobot;
    }

    public function update()
    {
        // $this->validate([
        //     'nama' => 'required|string|max:255',
        //     'kriteria_id' => 'required|exists:kriterias,id',
        //     'keterangan' => 'nullable|string',
        //     'bobot' => 'required|numeric|min:0|max:100',
        // ]);

        $tanggungan = TanggunganOrtu::findOrFail($this->id);
        $tanggungan->kriteria_id = $this->kriteria_id;
        $tanggungan->nama = $this->nama;
        $tanggungan->keterangan = $this->keterangan;
        $tanggungan->bobot = $this->bobot;
        $tanggungan->save();

        session()->flash('success', 'Penghasilan Ortu berhasil diperbarui!');
        return $this->redirect(route('tanggungan-ortu.index'), navigate: true);
    }

    public function render()
    {
        $tanggungan = TanggunganOrtu::with('kriteria')->find($this->id);
        $kriterias = Kriteria::all();

        return view('livewire.tanggungan.edit', compact( 'kriterias', 'tanggungan'));
    }
}
