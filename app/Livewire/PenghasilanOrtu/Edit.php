<?php

namespace App\Livewire\PenghasilanOrtu;

use Livewire\Component;
use App\Models\Kriteria;
use App\Models\PenghasilanOrtu;

class Edit extends Component
{
    public $id;
    public $kriteria_id;
    public $nama;
    public $keterangan;
    public $bobot;

    public function mount($id)
    {   
        $penghasilan_ortu = PenghasilanOrtu::with('kriteria')->findOrFail($id);

        $this->kriteria_id = $penghasilan_ortu->kriteria_id;
        $this->nama = $penghasilan_ortu->nama;
        $this->keterangan = $penghasilan_ortu->keterangan;
        $this->bobot = $penghasilan_ortu->bobot;
    }

    public function update()
    {
        // $this->validate([
        //     'nama' => 'required|string|max:255',
        //     'kriteria_id' => 'required|exists:kriterias,id',
        //     'keterangan' => 'nullable|string',
        //     'bobot' => 'required|numeric|min:0|max:100',
        // ]);

        $penghasilan_ortu = PenghasilanOrtu::findOrFail($this->id);
        $penghasilan_ortu->kriteria_id = $this->kriteria_id;
        $penghasilan_ortu->nama = $this->nama;
        $penghasilan_ortu->keterangan = $this->keterangan;
        $penghasilan_ortu->bobot = $this->bobot;
        $penghasilan_ortu->save();

        session()->flash('success', 'Penghasilan Ortu berhasil diperbarui!');
        return $this->redirect(route('penghasilan-ortu.index'), navigate: true);
    }

    public function render()
    {
        $PenghasilanOrtu = PenghasilanOrtu::with('kriteria')->find($this->id);
        $kriterias = Kriteria::all();

        return view('livewire.penghasilan-ortu.edit', compact( 'kriterias', 'PenghasilanOrtu'));
    }
}
