<?php

namespace App\Livewire\Nilai;

use Livewire\Component;
use App\Models\Kriteria;
use App\Models\Nilai;

class Edit extends Component
{
    public $id, $kriteria_id, $nilai, $keterangan, $bobot;

    public function mount($id)
    {
        $nilai = Nilai::with('kriteria')->findOrFail($id);

        $this->kriteria_id = $nilai->kriteria_id ?? null;
        $this->nilai = $nilai->nilai;
        $this->keterangan = $nilai->keterangan;
        $this->bobot = $nilai->bobot;
    }

    public function update()
    {
        // dd($this->all());
        // $data = $this->validate([
        //     'nilai' => 'required|string|max:255',
        //     'kriteria_id' => 'required|exists:kriterias,id',
        //     'keterangan' => 'nullable|string',
        //     'bobot' => 'required|numeric|min:0|max:100',
        // ]);

        // dd($data);

        $nilai = Nilai::findOrFail($this->id);

        // dd($nilai);
        $nilai->kriteria_id = $this->kriteria_id;
        $nilai->nilai = $this->nilai;
        $nilai->keterangan = $this->keterangan;
        $nilai->bobot = $this->bobot;
        $nilai->save();

        session()->flash('success', 'Nilai berhasil diperbarui!');
        return $this->redirect(route('nilai.index'), navigate: true);
    }

    public function render()
    {
        $nilais = Nilai::with('kriteria')->find($this->id);
        // dd($nilai);
        $kriterias = Kriteria::all();

        return view('livewire.nilai.edit', compact('kriterias', 'nilais'));
    }
}
