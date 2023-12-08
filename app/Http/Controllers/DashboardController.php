<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\Kasus;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kasus = Kasus::all();
        $kriteria = Kriteria::all();
        $alternatif = alternatif::all();

        return view('dashboard.beranda.index', compact('kasus', 'kriteria', 'alternatif'));
    }
}
