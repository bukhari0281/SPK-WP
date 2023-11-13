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
        $data_alternatif = alternatif::all();
        return view('dashboard.alternatif.index')->with('data_alternatif', $data_alternatif);
    }

    public function create($id)
    {
        $alternatif = alternatif::find($id);
        return view("dashboard.alternatif.create", compact('alternatif'));
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
        ];
        alternatif::create($data);
        return redirect()->route("kasus")->with('success', 'Berhasil menambahkan data');
    }
}

