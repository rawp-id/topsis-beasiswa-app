<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsiaOrtu;

class UsiaOrtuController extends Controller
{
    public function index()
    {
        $dashboard = true;
        $title = 'Usia';
        return view('admin.usia-ortu.index', compact('dashboard', 'title'));
    }

    public function edit($id)
    {
        $dashboard = true;
        $title = 'Usia';
        return view('admin.usia-ortu.edit', compact('id', 'dashboard', 'title'));
    }
}
