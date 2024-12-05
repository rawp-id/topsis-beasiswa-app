<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NIlaiController extends Controller
{
    public function index()
    {
        $dashboard = true;
        $title = 'Nilai';
        return view('admin.nilai.index', compact('dashboard', 'title'));
    }

    public function edit($id)
    {
        $dashboard = true;
        $title = 'Nilai';
        return view('admin.nilai.edit', compact('dashboard', 'id', 'title'));
    }
}
