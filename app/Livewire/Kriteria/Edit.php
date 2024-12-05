<?php

namespace App\Livewire\Kriteria;

use Livewire\Component;
use App\Models\Kriteria;

class Edit extends Component
{
    public $id, $kode, $nama, $tipe, $bobot;

    public function mount($id)
    {
        $kriteria = Kriteria::findOrFail($id);

        $this->kode = $kriteria->kode;
        $this->nama = $kriteria->nama;
        $this->tipe = $kriteria->tipe;
        $this->bobot = $kriteria->bobot;
    }

    public function update()
    {
        // dd($this->all());
        // $this->validate([
        //     'kode' => 'required|string|max:255',
        //     'nama' => 'required|string|max:255',
        //     'tipe' => 'required|string|max:255',
        //     'bobot' => 'required|numeric|min:0|max:100',
        // ]);

        $kriteria = Kriteria::findOrFail($this->id);

        // dd($kriteria);
        $kriteria->kode = $this->kode;
        $kriteria->nama = $this->nama;
        $kriteria->tipe = $this->tipe;
        $kriteria->bobot = $this->bobot;
        $kriteria->save();

        session()->flash('success', 'Kriteria berhasil diperbarui!');
        return $this->redirect(route('kriteria.index'), navigate: true);
    }

    public function render()
    {
        $kriteria = Kriteria::find($this->id);

        return view('livewire.kriteria.edit', compact('kriteria'));
    }
}
