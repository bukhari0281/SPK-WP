<?php

namespace App\Http\Controllers;

use App\Models\sub_kriteria;
use App\Models\alternatif;
use App\Models\nilai_alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NilaiAlternatifController extends Controller
{
    public function index()
    {

        $alternatif = alternatif::with('sub_kriteria')->get();
        $sub_kriteria = sub_kriteria::orderby('kode');

        // dd($sub_kriteria);
        return view('dashboard.nilai_alternatif.index', ['alternatif' => $alternatif]);
    }

    public function create($id)
    {
        $alternatif = alternatif::all($id);
        // $alternatif = nilai_alternatif::with('alternatif')->get();
        return view('dashboard.nilai_alternatif.index', compact('alternatif'));

    }
    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('bobot', $request->bobot);
        $request->validate(
            [
                'alternatif_id' => 'required',
                'sub_kriteria_id' => 'required',
            ],[
                'alternatif_id.requred' => 'Kode wajib diisi',
                'sub_kriteria_id.requred' => 'sub kriteria wajib diisi',
            ]
        );

        $data = [
            'alternatif_id'=>$request->alternatif_id,
            'kasus_id'=>$request->kasus_id,
        ];

        nilai_alternatif::create($data);
        return redirect()->route("kriteria")->with('success', 'Berhasil menambahkan data');
    }
}
