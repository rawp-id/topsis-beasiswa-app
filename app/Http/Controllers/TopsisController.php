<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Beasiswa;
use App\Models\Kriteria;
use App\Models\UsiaOrtu;
use Illuminate\Http\Request;
use App\Models\PekerjaanOrtu;
use App\Models\TanggunganOrtu;
use App\Models\PenghasilanOrtu;
use Illuminate\Support\Facades\DB;

class TopsisController extends Controller
{
    public function index()
    {
        $beasiswas = Beasiswa::with(
            'pekerjaanOrtu',
            'tanggunganOrtu',
            'penghasilanOrtu',
            'nilai',
            'usiaOrtu'
        )->get();

        $matriksKeputusan = [];
        foreach ($beasiswas as $beasiswa) {
            $matriksKeputusan[] = [
                'id' => $beasiswa->id,
                'nama' => $beasiswa->nama,
                $beasiswa->pekerjaanOrtu->kriteria->kode => $beasiswa->pekerjaanOrtu->bobot ?? 0,
                $beasiswa->tanggunganOrtu->kriteria->kode => $beasiswa->tanggunganOrtu->bobot ?? 0,
                $beasiswa->penghasilanOrtu->kriteria->kode => $beasiswa->penghasilanOrtu->bobot ?? 0,
                $beasiswa->nilai->kriteria->kode => $beasiswa->nilai->bobot ?? 0,
                $beasiswa->usiaOrtu->kriteria->kode => $beasiswa->usiaOrtu->bobot ?? 0,
            ];
        }

        $matriksNormalisasi = $this->normalisasiMatriks($matriksKeputusan);
        $matriksNormalisasiTerbobot = $this->bobotMatriks($matriksNormalisasi);
        [$solusiIdealPositif, $solusiIdealNegatif] = $this->hitungSolusiIdeal($matriksNormalisasiTerbobot);
        $preferensi = $this->hitungNilaiPreferensi($matriksNormalisasiTerbobot, $solusiIdealPositif, $solusiIdealNegatif);

        $ranking = $this->ranking($preferensi, $matriksKeputusan);

        $data_ranking = [];

        foreach ($ranking as $key => $value) {
            $data_ranking[] = [
                'id' => $value['id'],
                'data' => Beasiswa::find($value['id'])->toArray(),
                'nilai' => $value['nilai']
            ];
        }

        // dd($data_ranking);

        // dd($ranking);

        $dashboard = true;
        $title = 'TOPSIS';
        return view('topsis.index', compact(
            'title',
            'dashboard',
            'matriksKeputusan',
            'matriksNormalisasi',
            'matriksNormalisasiTerbobot',
            'solusiIdealPositif',
            'solusiIdealNegatif',
            'preferensi',
            'ranking',
            'data_ranking'
        ));
    }

    public function rank_view()
    {
        $beasiswas = Beasiswa::with(
            'pekerjaanOrtu',
            'tanggunganOrtu',
            'penghasilanOrtu',
            'nilai',
            'usiaOrtu'
        )->get();

        $matriksKeputusan = [];
        foreach ($beasiswas as $beasiswa) {
            $matriksKeputusan[] = [
                'id' => $beasiswa->id,
                'nama' => $beasiswa->nama,
                $beasiswa->pekerjaanOrtu->kriteria->kode => $beasiswa->pekerjaanOrtu->bobot ?? 0,
                $beasiswa->tanggunganOrtu->kriteria->kode => $beasiswa->tanggunganOrtu->bobot ?? 0,
                $beasiswa->penghasilanOrtu->kriteria->kode => $beasiswa->penghasilanOrtu->bobot ?? 0,
                $beasiswa->nilai->kriteria->kode => $beasiswa->nilai->bobot ?? 0,
                $beasiswa->usiaOrtu->kriteria->kode => $beasiswa->usiaOrtu->bobot ?? 0,
            ];
        }

        $matriksNormalisasi = $this->normalisasiMatriks($matriksKeputusan);
        $matriksNormalisasiTerbobot = $this->bobotMatriks($matriksNormalisasi);
        [$solusiIdealPositif, $solusiIdealNegatif] = $this->hitungSolusiIdeal($matriksNormalisasiTerbobot);
        $preferensi = $this->hitungNilaiPreferensi($matriksNormalisasiTerbobot, $solusiIdealPositif, $solusiIdealNegatif);

        $ranking = $this->ranking($preferensi, $matriksKeputusan);

        $data_ranking = [];

        foreach ($ranking as $key => $value) {
            $data_ranking[] = [
                'id' => $value['id'],
                'data' => Beasiswa::find($value['id'])->toArray(),
                'nilai' => $value['nilai']
            ];
        }

        $title = 'Ranking';
        $dashboard = true;

        return view('topsis.ranking', compact('data_ranking', 'title', 'dashboard'));
    }

    private function normalisasiMatriks($matriks)
    {
        $normalisasi = [];
        $jumlahKriteria = count($matriks[0]) - 1;

        for ($j = 2; $j <= $jumlahKriteria; $j++) {
            $jumlahKuadrat = 0;
            foreach ($matriks as $baris) {
                $jumlahKuadrat += pow($baris[array_keys($baris)[$j]], 2);
            }
            $penyebut = sqrt($jumlahKuadrat);

            foreach ($matriks as $i => $baris) {
                $normalisasi[$i][array_keys($baris)[$j]] = $baris[array_keys($baris)[$j]] / $penyebut;
            }
        }

        return $normalisasi;
    }

    private function bobotMatriks($matriksNormalisasi)
    {
        $bobot = Kriteria::all()->pluck('bobot', 'kode')->toArray();
        // $bobot1 = [
        //     'pekerjaan' => 5,
        //     'tanggungan' => 4,
        //     'penghasilan' => 4,
        //     'nilai' => 2,
        //     'usia' => 3
        // ];

        // dd($bobot, $bobot1);

        foreach ($matriksNormalisasi as $i => $baris) {
            foreach ($baris as $kunci => $nilai) {
                $matriksNormalisasi[$i][$kunci] = $nilai * ($bobot[$kunci] ?? 1);
            }
        }

        return $matriksNormalisasi;
    }

    // private function hitungSolusiIdeal($matriksTertimbang)
    // {
    //     $solusiIdealPositif = [];
    //     $solusiIdealNegatif = [];

    //     foreach ($matriksTertimbang[0] as $kunci => $nilai) {
    //         $nilaiKolom = array_column($matriksTertimbang, $kunci);

    //         $solusiIdealPositif[$kunci] = max($nilaiKolom);
    //         $solusiIdealNegatif[$kunci] = min($nilaiKolom);
    //     }

    //     return [$solusiIdealPositif, $solusiIdealNegatif];
    // }

    private function hitungSolusiIdeal($matriksTertimbang)
    { 
        $kriterias = DB::table('kriterias')->pluck('tipe', 'kode');

        $solusiIdealPositif = [];
        $solusiIdealNegatif = [];

        foreach ($matriksTertimbang[0] as $kode => $nilai) {
            $nilaiKolom = array_column($matriksTertimbang, $kode);

            if ($kriterias[$kode] === 'benefit') {
                $solusiIdealPositif[$kode] = max($nilaiKolom);
                $solusiIdealNegatif[$kode] = min($nilaiKolom);
            } elseif ($kriterias[$kode] === 'cost') {
                $solusiIdealPositif[$kode] = min($nilaiKolom);
                $solusiIdealNegatif[$kode] = max($nilaiKolom);
            }
        }

        return [$solusiIdealPositif, $solusiIdealNegatif];
    }

    private function hitungNilaiPreferensi($matriksTertimbang, $solusiIdealPositif, $solusiIdealNegatif)
    {
        $preferensi = [];

        foreach ($matriksTertimbang as $i => $baris) {
            $jarakPositif = 0;
            $jarakNegatif = 0;

            foreach ($baris as $kunci => $nilai) {
                $jarakPositif += pow($nilai - $solusiIdealPositif[$kunci], 2);
                $jarakNegatif += pow($nilai - $solusiIdealNegatif[$kunci], 2);
            }

            $jarakPositif = sqrt($jarakPositif);
            $jarakNegatif = sqrt($jarakNegatif);

            // dd($matriksTertimbang);

            $preferensi[$i] = $jarakNegatif / ($jarakNegatif + $jarakPositif);
        }

        // dd($preferensi);

        return $preferensi;
    }

    private function ranking($preferensi, $matriksKeputusan)
    {
        arsort($preferensi);
        $ranking = [];
        foreach ($preferensi as $index => $nilai) {
            $ranking[] = [
                'id' => $matriksKeputusan[$index]['id'],
                'nilai' => $nilai
            ];
        }
        return $ranking;
    }
}
