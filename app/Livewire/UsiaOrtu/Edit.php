<?php

namespace App\Livewire\UsiaOrtu;

use Livewire\Component;
use App\Models\Kriteria;
use App\Models\UsiaOrtu;

class Edit extends Component
{
    public $id;
    public $kriteria_id;
    public $nama;
    public $keterangan;
    public $bobot;

    public function mount($id)
    {   
        $usia = UsiaOrtu::with('kriteria')->findOrFail($id);

        $this->kriteria_id = $usia->kriteria_id ?? null;
        $this->nama = $usia->nama;
        $this->keterangan = $usia->keterangan;
        $this->bobot = $usia->bobot;
    }

    public function update()
    {
        // $this->validate([
        //     'nama' => 'required|string|max:255',
        //     'kriteria_id' => 'required|exists:kriterias,id',
        //     'keterangan' => 'nullable|string',
        //     'bobot' => 'required|numeric|min:0|max:100',
        // ]);

        $usia = usiaOrtu::findOrFail($this->id);
        $usia->kriteria_id = $this->kriteria_id;
        $usia->nama = $this->nama;
        $usia->keterangan = $this->keterangan;
        $usia->bobot = $this->bobot;
        $usia->save();

        session()->flash('success', 'Usia berhasil diperbarui!');
        return $this->redirect(route('usia-ortu.index'), navigate: true);
    }

    public function render()
    {
        $usiaOrtu = usiaOrtu::with('kriteria')->find($this->id);
        $kriterias = Kriteria::all();

        return view('livewire.usia-ortu.edit', compact( 'kriterias', 'usiaOrtu'));
    }
}
