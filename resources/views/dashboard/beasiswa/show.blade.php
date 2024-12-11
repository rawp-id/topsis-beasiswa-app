@extends('layouts.app')

@section('content-dashboard')
    <div class="content-body">
        <div class="container pd-x-0">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Beasiswa</h4>
                </div>
                <div class="card-body">
                    @if ($beasiswa)
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td>{{ $beasiswa->nama }}</td>
                            </tr>
                            <tr>
                                <th>Asal Sekolah</th>
                                <td>{{ $beasiswa->asal_sekolah }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Induk</th>
                                <td>{{ $beasiswa->nomor_induk }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $beasiswa->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $beasiswa->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $beasiswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>{{ $beasiswa->agama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $beasiswa->alamat }}</td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td>{{ $beasiswa->no_hp }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan Orang Tua</th>
                                <td>{{ $beasiswa->pekerjaanOrtu->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggungan Orang Tua</th>
                                <td>{{ $beasiswa->tanggunganOrtu->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Penghasilan Orang Tua</th>
                                <td>{{ $beasiswa->penghasilanOrtu->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nilai</th>
                                <td>{{ $beasiswa->nilai->nilai ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Usia Orang Tua</th>
                                <td>{{ $beasiswa->usiaOrtu->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $beasiswa->keterangan ?? '-' }}</td>
                            </tr>
                        </table>
                    @else
                        <p class="text-danger">Data beasiswa tidak ditemukan.</p>
                    @endif
                </div>
            </div>
            <div class="text-end mt-4">
                <a href="/ranking" class="btn btn-primary" wire:navigate>Back</a>
            </div>
        </div>
    </div>
@endsection
