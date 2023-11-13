<?php

namespace App\Http\Controllers;

use App\Models\nilai_alternatif;
use Illuminate\Http\Request;

class NilaiAlternatifController extends Controller
{
    public function index()
    {
        $alternatif = nilai_alternatif::all();
        // $alternatif = nilai_alternatif::with('alternatif')->get();
        // $sub_kriteria = nilai_alternatif::with('sub_kriteria')->get();
        // return json_decode($data, true);
        return view('dashboard.nilai_alternatif.index', compact('alternatif'));
    }

    public function create()
    {

    }
    public function store()
    {

    }
}
