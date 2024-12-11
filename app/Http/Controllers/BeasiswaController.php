<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function create()
    {
        $dashboard = true;
        $title = 'apply';
        return view('dashboard.beasiswa.create', compact('dashboard', 'title'));
    }

    public function show(Request $request, $id)
    {
        $dashboard = true;
        $title = 'beasiswa';
        $beasiswa = Beasiswa::with('pekerjaanOrtu', 'tanggunganOrtu', 'penghasilanOrtu', 'nilai', 'usiaOrtu')->find($id);
        return view('dashboard.beasiswa.show', compact('dashboard', 'title', 'beasiswa'));
    }
}
