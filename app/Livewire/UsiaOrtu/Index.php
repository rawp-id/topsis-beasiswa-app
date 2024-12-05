<?php

namespace App\Livewire\UsiaOrtu;

use App\Models\UsiaOrtu;
use Livewire\Component;
use App\Models\Kriteria;

class Index extends Component
{
    public $kriteria_id, $nama, $keterangan, $bobot, $pekerjaanOrtuId;

    public function render()
    {
        $usia = UsiaOrtu::with('kriteria')->get();
        $kriterias = Kriteria::all();
        $dashboard = true;

        return view('livewire.usia-ortu.index', compact('dashboard', 'usia', 'kriterias'));
    }

    public function store()
    {
        try {
            $this->validate([
                'kriteria_id' => 'nullable|exists:kriterias,id',
                'nama' => 'required|string|max:255',
                'keterangan' => 'nullable|string|max:255',
                'bobot' => 'nullable|integer',
            ]);

            UsiaOrtu::create($this->all());
            session()->flash('success', 'Data Usia Ortu Berhasil Ditambahkan');
            $this->redirect(route('usia-ortu.index'), navigate: true);
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Terdapat kesalahan pada input data.');
            $this->redirect(route('usia-ortu.index'), navigate: true);
        }
    }

    public function delete($id)
    {
        $usia = UsiaOrtu::find($id);
        if ($usia) {
            $usia->delete();
            session()->flash('success', 'Data Usia Ortu Berhasil Dihapus');
            $this->redirect(route('usia-ortu.index'), navigate: true);
        } else {
            session()->flash('error', 'Data tidak ditemukan.');
            $this->redirect(route('usia-ortu.index'), navigate: true);
        }
    }
}
