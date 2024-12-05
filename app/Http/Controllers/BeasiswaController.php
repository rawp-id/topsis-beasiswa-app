<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function create()
    {
        $dashboard = true;
        $title = 'apply';
        return view('dashboard.beasiswa.create', compact('dashboard', 'title'));
    }
}
