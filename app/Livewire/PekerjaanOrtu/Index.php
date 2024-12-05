<?php

namespace App\Livewire\PekerjaanOrtu;

use Livewire\Component;
use App\Models\Kriteria;
use App\Models\PekerjaanOrtu;

class Index extends Component
{
    public $kriteria_id, $nama, $keterangan, $bobot, $pekerjaanOrtuId;

    public function render()
    {
        $pekerjaanOrtus = PekerjaanOrtu::with('kriteria')->get();
        $kriterias = Kriteria::all();
        $dashboard = true;

        return view('livewire.pekerjaan-ortu.index', compact('dashboard', 'pekerjaanOrtus', 'kriterias'));
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

            PekerjaanOrtu::create($this->all());
            session()->flash('success', 'Data Pekerjaan Ortu Berhasil Ditambahkan');
            $this->redirect(route('pekerjaan-ortu.index'), navigate: true);
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Terdapat kesalahan pada input data.');
            $this->redirect(route('pekerjaan-ortu.index'), navigate: true);
        }
    }

    public function delete($id)
    {
        $pekerjaanOrtu = PekerjaanOrtu::find($id);
        if ($pekerjaanOrtu) {
            $pekerjaanOrtu->delete();
            session()->flash('success', 'Data Pekerjaan Ortu Berhasil Dihapus');
            $this->redirect(route('pekerjaan-ortu.index'), navigate: true);
        } else {
            session()->flash('error', 'Data tidak ditemukan.');
            $this->redirect(route('pekerjaan-ortu.index'), navigate: true);
        }
    }
}
