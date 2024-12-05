@extends('layouts.app')
@section('content')

<div class="home-slider">
    <div class="home-lead">
        <p class="home-text">Aplikasi Beasiswa Terbaik untuk Mahasiswa</p>

        <h6 class="home-headline">Dapatkan beasiswa impian Anda dengan aplikasi <span>terpercaya</span> dan
            <span>berkualitas tinggi</span> yang dirancang khusus untuk membantu mahasiswa.
        </h6>

        <div class="d-flex wd-lg-350">
            <a href="https://themeforest.net/item/dashforge-responsive-admin-dashboard-template/23725961"
                class="btn btn-brand-01 btn-uppercase flex-fill">Daftar Sekarang</a>
            <a href="template/classic/dashboard-one.html" class="btn btn-white btn-uppercase flex-fill mg-l-10">Pelajari
                Lebih Lanjut</a>
        </div>

    </div>
    <div class="home-slider-img">
        <div><img
                src="https://www.prasetiyamulya.ac.id/wp-content/uploads/2024/03/7-Keahlian-Penting-yang-Perlu-Dipelajari-Mahasiswa-Saat-Kuliah-Universitas-Prasetiya-Mulya.jpg"
                alt=""></div>
        <div><img src="https://www.umn.ac.id/wp-content/uploads/2022/10/tips-lancar-kuliah-800x534.jpg" alt="">
        </div>
        <div><img src="https://tangselpos.id/storage/2023/07/jalan-buntu-gerakan-mahasiswa-13072023-231334.jpg" alt="">
        </div>
    </div>
    <div class="home-slider-bg-one"></div>
</div><!-- home-slider -->

@endsection