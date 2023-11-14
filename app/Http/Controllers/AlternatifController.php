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

    public function create()
    {
        // $alternatif = alternatif::find($id);
        // return view("dashboard.alternatif.create", compact('alternatif'));
        return view("dashboard.alternatif.create");
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

    public function edit($id){
        $alternatif = alternatif::find($id);
        $sub_kriteria = sub_kriteria::where('alternatif_id', $id)->get();

        return view('pegawai.edit', compact(
            'alternatif', 'sub_kriteria'
        ));
    }
}

