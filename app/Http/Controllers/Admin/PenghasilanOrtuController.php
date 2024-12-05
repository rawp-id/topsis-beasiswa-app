<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenghasilanOrtuController extends Controller
{
    public function index()
    {
        $dashboard = true;
        $title = 'Penghasilan';
        return view('admin.penghasilan.index', compact('dashboard', 'title'));
    }

    public function edit($id)
    {
        $dashboard = true;
        $title = 'Penghasilan';
        return view('admin.penghasilan.edit', compact('dashboard', 'id', 'title'));
    }
}
