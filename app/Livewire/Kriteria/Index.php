<?php

namespace App\Livewire\Kriteria;

use Livewire\Component;
use App\Models\Kriteria;
use App\Models\PekerjaanOrtu;

class Index extends Component
{
    public $kode, $nama, $tipe, $bobot;

    public function render()
    {
        $kriterias = Kriteria::all();

        return view('livewire.kriteria.index', compact('kriterias'));
    }

    public function store()
    {
        try {
            $this->validate([
                'kode' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'tipe' => 'required|in:benefit,cost',
                'bobot' => 'nullable|integer',
            ]);

            Kriteria::create([
                'kode' => $this->kode,
                'nama' => $this->nama,
                'tipe' => $this->tipe,
                'bobot' => $this->bobot,
            ]);

            session()->flash('success', 'Data Kriteria Berhasil Ditambahkan');
            $this->redirect(route('kriteria.index'), navigate: true);
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Terdapat kesalahan pada input data.');
            $this->redirect(route('kriteria.index'), navigate: true);
        }
    }

    public function delete($id)
    {
        $kriteria = Kriteria::find($id);
        if ($kriteria) {
            $kriteria->delete();
            session()->flash('success', 'Data Kriteria Berhasil Dihapus');
            $this->redirect(route('kriteria.index'), navigate: true);
        } else {
            session()->flash('error', 'Data tidak ditemukan.');
            $this->redirect(route('kriteria.index'), navigate: true);
        }
    }
}
