@extends('layouts.app')
@section('content-dashboard')
    <div class="content-body">
        <div class="container pd-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <h5 class="mg-b-0 tx-spacing--1 mb-2">Hai, {{ Auth::user()->name }}!</h5>
                    <h3 class="mg-b-0 tx-spacing--1">Welcome to Beasiswa App</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img class="card-img-top"
                            src="https://fahum.umsu.ac.id/blog/wp-content/uploads/2024/08/langkah-langkah-mendaftar-beasiswa-s1-2024-730x375.jpeg"
                            alt="Gambar Beasiswa">
                        <div class="card-body">
                            <h5 class="card-title">Beasiswa Prestasi Akademik</h5>
                            <p class="card-text">
                                Beasiswa ini diberikan kepada siswa berprestasi dengan nilai rata-rata rapor minimal 90.
                                Penerima beasiswa juga akan mendapatkan bimbingan belajar gratis.
                            </p>
                            <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img class="card-img-top"
                            src="https://fahum.umsu.ac.id/blog/wp-content/uploads/2024/08/langkah-langkah-mendaftar-beasiswa-s1-2024-730x375.jpeg"
                            alt="Gambar Beasiswa">
                        <div class="card-body">
                            <h5 class="card-title">Beasiswa Ekonomi Lemah</h5>
                            <p class="card-text">
                                Beasiswa ini dikhususkan untuk siswa dari keluarga dengan pendapatan rendah. Persyaratan
                                termasuk surat keterangan tidak mampu dari kelurahan setempat.
                            </p>
                            <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img class="card-img-top"
                            src="https://fahum.umsu.ac.id/blog/wp-content/uploads/2024/08/langkah-langkah-mendaftar-beasiswa-s1-2024-730x375.jpeg"
                            alt="Gambar Beasiswa">
                        <div class="card-body">
                            <h5 class="card-title">Beasiswa Bidang Olahraga</h5>
                            <p class="card-text">
                                Beasiswa ini diberikan kepada siswa yang memiliki prestasi di bidang olahraga, seperti juara
                                tingkat kabupaten atau provinsi. Bukti prestasi harus dilampirkan.
                            </p>
                            <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- container -->
    </div>
@endsection
