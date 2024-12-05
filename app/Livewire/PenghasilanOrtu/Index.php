<?php

namespace App\Livewire\PenghasilanOrtu;

use Livewire\Component;
use App\Models\Kriteria;
use App\Models\PenghasilanOrtu;

class Index extends Component
{
    public $kriteria_id, $nama, $keterangan, $bobot, $PenghasilanOrtuId;

    public function render()
    {
        $penghasilanOrtus = PenghasilanOrtu::with('kriteria')->get();
        $kriterias = Kriteria::all();
        $dashboard = true;

        return view('livewire.penghasilan-ortu.index', compact('dashboard', 'penghasilanOrtus', 'kriterias'));
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

            PenghasilanOrtu::create($this->all());
            session()->flash('success', 'Data Pekerjaan Ortu Berhasil Ditambahkan');
            $this->redirect(route('penghasilan-ortu.index'), navigate: true);
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Terdapat kesalahan pada input data.');
            $this->redirect(route('penghasilan-ortu.index'), navigate: true);
        }
    }

    public function delete($id)
    {
        $PenghasilanOrtu = PenghasilanOrtu::find($id);
        if ($PenghasilanOrtu) {
            $PenghasilanOrtu->delete();
            session()->flash('success', 'Data Pekerjaan Ortu Berhasil Dihapus');
            $this->redirect(route('penghasilan-ortu.index'), navigate: true);
        } else {
            session()->flash('error', 'Data tidak ditemukan.');
            $this->redirect(route('penghasilan-ortu.index'), navigate: true);
        }
    }
}
