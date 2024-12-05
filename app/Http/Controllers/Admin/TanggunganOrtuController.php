<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TanggunganOrtu;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class TanggunganOrtuController extends Controller
{
    public function index()
    {
        $dashboard = true;
        $title = 'Tanggungan';
        return view('admin.tanggungan-ortu.index', compact('dashboard', 'title'));
    }

    public function edit($id)
    {
        $dashboard = true;
        $title = 'Tanggungan';
        return view('admin.tanggungan-ortu.edit', compact('id', 'dashboard', 'title'));
    }
}
