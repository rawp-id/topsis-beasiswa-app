<?php

namespace App\Livewire\Tanggungan;

use Livewire\Component;
use App\Models\Kriteria;
use App\Models\TanggunganOrtu;

class Index extends Component
{
    public $kriteria_id, $nama, $keterangan, $bobot, $PenghasilanOrtuId;

    public function render()
    {
        $tanggungan = TanggunganOrtu::with('kriteria')->get();
        $kriterias = Kriteria::all();
        $dashboard = true;

        return view('livewire.tanggungan.index', compact('dashboard', 'tanggungan', 'kriterias'));
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

            TanggunganOrtu::create($this->all());
            session()->flash('success', 'Data Tanggungan Ortu Berhasil Ditambahkan');
            $this->redirect(route('tanggungan-ortu.index'), navigate: true);
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Terdapat kesalahan pada input data.');
            $this->redirect(route('tanggungan-ortu.index'), navigate: true);
        }
    }

    public function delete($id)
    {
        $tanggungan = TanggunganOrtu::find($id);
        if ($tanggungan) {
            $tanggungan->delete();
            session()->flash('success', 'Data Tanggungan Ortu Berhasil Dihapus');
            $this->redirect(route(name: 'tanggungan-ortu.index'), navigate: true);
        } else {
            session()->flash('error', 'Data tidak ditemukan.');
            $this->redirect(route('tanggungan-ortu.index'), navigate: true);
        }
    }
}
