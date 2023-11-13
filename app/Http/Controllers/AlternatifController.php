<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\sub_kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlternatifController extends Controller
{
    public function index()
    {
        $data_alternatif = alternatif::with('sub_kriteria')->get();
        return view('dashboard.alternatif.index')->with('data_alternatif', $data_alternatif);
    }

    public function create()
    {
        $sub_kriteria = sub_kriteria::all();
        return view("dashboard.alternatif.create", compact('sub_kriteria'));
    }
    public function store(Request $request)
    {
        Session::flash('kode', $request->kode);
        Session::flash('name', $request->name);
        $request->validate(
            [
                'kode' => 'required',
                'name' => 'required',
            ],[
                'kode.requred' => 'kode wajib diisi',
                'name.requred' => 'name wajib diisi',
            ]
        );

        $data = [
            'kode'=>$request->kode,
            'name'=>$request->name,
            'sub_kriteria_id'=>$request->sub_kriteria_id,
        ];
        alternatif::create($data);
        return redirect()->route("kasus")->with('success', 'Berhasil menambahkan data');
    }
}

