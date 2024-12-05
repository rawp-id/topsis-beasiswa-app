<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $dashboard = true;
        $title = 'Kriteria';
        return view('admin.kriteria.index', compact('dashboard', 'title'));
    }

    public function edit($id)
    {
        $dashboard = true;
        $title = 'Kriteria';
        return view('admin.kriteria.edit', compact('id', 'dashboard', 'title'));
    }
}
