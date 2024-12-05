<?php

use App\Livewire\DataPekerjaanOrtu;
use App\Http\Livewire\PekerjaanOrtus;
use App\Livewire\PekerjaanOrtu\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopsisController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\Admin\NIlaiController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\UsiaOrtuController;
use App\Http\Controllers\Admin\PekerjaanOrtuController;
use App\Http\Controllers\Admin\TanggunganOrtuController;
use App\Http\Controllers\Admin\PenghasilanOrtuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $dashboard = true;
        $title = 'Dashboard';
        return view('dashboard.index', compact('dashboard', 'title'));
    });

    Route::resource('kriteria', KriteriaController::class);
    Route::resource('pekerjaan-ortu', PekerjaanOrtuController::class);
    Route::resource('tanggungan-ortu', TanggunganOrtuController::class);
    Route::resource('pekerjaan-ortu', PekerjaanOrtuController::class);
    Route::resource('nilai', NIlaiController::class);
    Route::resource('penghasilan-ortu', PenghasilanOrtuController::class);
    Route::resource('usia-ortu', UsiaOrtuController::class);

    Route::resource('beasiswa', BeasiswaController::class);
});


Route::get('/topsis', [TopsisController::class, 'index'])->name('topsis.index');