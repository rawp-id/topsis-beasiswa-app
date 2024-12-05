<?php

namespace App\Livewire\Nilai;

use Livewire\Component;
use App\Models\Kriteria;
use App\Models\Nilai;

class Index extends Component
{
    public $kriteria_id, $nilai, $keterangan, $bobot, $nilaiId;

    public function render()
    {
        $nilais = Nilai::with('kriteria')->get();
        $kriterias = Kriteria::all();
        $dashboard = true;

        return view('livewire.nilai.index', compact('dashboard', 'nilais', 'kriterias'));
    }

    public function store()
    {
        try {
            $this->validate([
                'kriteria_id' => 'nullable|exists:kriterias,id',
                'nilai' => 'required|string|max:255',
                'keterangan' => 'nullable|string|max:255',
                'bobot' => 'nullable|integer',
            ]);

            Nilai::create($this->all());
            session()->flash('success', 'Data Nilai Berhasil Ditambahkan');
            $this->redirect(route('nilai.index'), navigate: true);
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Terdapat kesalahan pada input data.');
            $this->redirect(route('nilai.index'), navigate: true);
        }
    }

    public function delete($id)
    {
        $nilai = Nilai::find($id);
        if ($nilai) {
            $nilai->delete();
            session()->flash('success', 'Data Nilai Berhasil Dihapus');
            $this->redirect(route('nilai.index'), navigate: true);
        } else {
            session()->flash('error', 'Data tidak ditemukan.');
            $this->redirect(route('nilai.index'), navigate: true);
        }
    }
}
