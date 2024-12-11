@extends('layouts.app')

@section('content-dashboard')
    <div class="content-body">
        <div class="container pd-x-0">
            <div class="text-center mb-5">
                <h1>Analisis TOPSIS</h1>
            </div>

            <h2>Matriks Keputusan</h2>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriksKeputusan as $item)
                        <tr>
                            <td>{{ $item['id'] . ' ~ ' . $item['nama'] }}</td>
                            <td>{{ $item['C1'] }}</td>
                            <td>{{ $item['C2'] }}</td>
                            <td>{{ $item['C3'] }}</td>
                            <td>{{ $item['C4'] }}</td>
                            <td>{{ $item['C5'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Matriks Keputusan Ternormalisasi</h2>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriksNormalisasi as $item)
                        <tr>
                            <td>{{ number_format($item['C1'], 4) }}</td>
                            <td>{{ number_format($item['C2'], 4) }}</td>
                            <td>{{ number_format($item['C3'], 4) }}</td>
                            <td>{{ number_format($item['C4'], 4) }}</td>
                            <td>{{ number_format($item['C5'], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Matriks Ternormalisasi Terbobot</h2>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriksNormalisasiTerbobot as $item)
                        <tr>
                            <td>{{ number_format($item['C1'], 4) }}</td>
                            <td>{{ number_format($item['C2'], 4) }}</td>
                            <td>{{ number_format($item['C3'], 4) }}</td>
                            <td>{{ number_format($item['C4'], 4) }}</td>
                            <td>{{ number_format($item['C5'], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Solusi Ideal</h2>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr>
                        <th></th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Solusi Ideal Positif</th>
                        <td>{{ number_format($solusiIdealPositif['C1'], 4) }}</td>
                        <td>{{ number_format($solusiIdealPositif['C2'], 4) }}</td>
                        <td>{{ number_format($solusiIdealPositif['C3'], 4) }}</td>
                        <td>{{ number_format($solusiIdealPositif['C4'], 4) }}</td>
                        <td>{{ number_format($solusiIdealPositif['C5'], 4) }}</td>
                    </tr>
                    <tr>
                        <th>Solusi Ideal Negatif</th>
                        <td>{{ number_format($solusiIdealNegatif['C1'], 4) }}</td>
                        <td>{{ number_format($solusiIdealNegatif['C2'], 4) }}</td>
                        <td>{{ number_format($solusiIdealNegatif['C3'], 4) }}</td>
                        <td>{{ number_format($solusiIdealNegatif['C4'], 4) }}</td>
                        <td>{{ number_format($solusiIdealNegatif['C5'], 4) }}</td>
                    </tr>
                </tbody>
            </table>

            <h2>Nilai Preferensi</h2>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <th>Nilai Preferensi (Semakin Dekat ke 1 Semakin Baik)</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($preferensi) --}}
                    @foreach ($preferensi as $item)
                        <tr>
                            <td>Alternatif {{ $loop->iteration }}</td>
                            <td>{{ number_format($item, 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Ranking</h2>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Alternatif</th>
                        <th>Nilai Preferensi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_ranking as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['id'] . ' ~ ' . $item['data']['nama'] }}</td>
                            <td>{{ number_format($item['nilai'], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
