@extends('layouts.app')
@section('content')
    <div class="content content-fixed content-auth">
        <div class="container">
            <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
                <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                    <div class="wd-100p">

                        <livewire:auth.form-login />

                        <div class="divider-text">atau</div>
                        <div class="d-grid gap-2">
                            <a href="/auth/google" class="btn btn-outline-facebook btn-block">Masuk Dengan Google</a>
                            {{-- <button class="btn btn-outline-twitter btn-block">Masuk Dengan Twitter</button> --}}
                        </div>
                        <div class="tx-13 mg-t-20 tx-center">Belum punya akun? <a href="/register" wire:navigate>Buat
                                Akun</a></div>
                    </div>
                </div><!-- sign-wrapper -->
            </div><!-- media -->
        </div><!-- container -->
    </div><!-- content -->
@endsection
