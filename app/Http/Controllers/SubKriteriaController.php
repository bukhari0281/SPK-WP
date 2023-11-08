<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\sub_kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $data = sub_kriteria::with('alternatif')->get();
        return view("dashboard.sub_kriteria.index")->with('data', $data);
    }

    public function create()
    {
        // mengambil data kasus
        $create_sub_kriteria = alternatif::all();
        return view("dashboard.sub_kriteria.create", compact("create_sub_kriteria"));
    }

    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('nilai', $request->nilai);
        Session::flash('keterangan', $request->keterangan);
        $request->validate(
            [
                'kode_sub_kriteria' => 'required',
                'name' => 'required',
                'nilai' => 'required',
                'keterangan' => 'nullable'
            ],[
                'kode_sub_kriteria.requred' => 'kode wajib diisi',
                'name.requred' => 'name wajib diisi',
                'nilai.requred' => 'nilai wajib diisi',
                'keterangan.nullable' => 'keterangan wajib diisi'
            ]
        );

        $data = [
            'kode_sub_kriteria'=>$request->kode_sub_kriteria,
            'name'=>$request->name,
            'nilai'=>$request->nilai,
            'keterangan'=>$request->keterangan,
            'alternatif_id'=>$request->alternatif_id,
        ];
        sub_kriteria::create($data);
        return redirect()->route("sub_kriteria")->with('success', 'Berhasil menambahkan data');
    }
}
