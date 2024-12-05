<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PekerjaanOrtu;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;

class PekerjaanOrtuController extends Controller
{
    public function index()
    {
        $dashboard = true;
        $title = 'Pekerjaan';
        return view('admin.pekerjaan_ortu.index', compact(  'dashboard', 'title'));
    }

    public function edit($id)
    {
        $dashboard = true;
        $title = 'Pekerjaan';
        return view('admin.pekerjaan_ortu.edit', compact('dashboard', 'id', 'title'));
    }
}
