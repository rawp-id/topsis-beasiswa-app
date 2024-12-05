@extends('layouts.app')
@section('content')
<div class="content content-fixed content-auth">
    <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p">
            <div class="sign-wrapper mg-lg-r-50 mg-xl-r-60">
                <div class="pd-t-20 wd-100p">
                    <h4 class="tx-color-01 mg-b-5">Buat Akun Baru</h4>
                    <p class="tx-color-03 tx-13 mg-b-40">Gratis untuk mendaftar dan hanya membutuhkan waktu satu menit.</p>

                    <livewire:auth.form-register />
                    
                    <div class="divider-text">atau</div>
                    <div class="d-grid gap-2">
                        <a href="/auth/google" class="btn btn-outline-facebook btn-block">Daftar Dengan Google</a>
                    </div>
                    <div class="tx-13 mg-t-20 tx-center">Sudah punya akun? <a href="/login" wire:navigate>Masuk</a>
                    </div>
                </div>
            </div><!-- sign-wrapper -->
        </div><!-- media -->
    </div><!-- container -->
</div><!-- content -->
@endsection