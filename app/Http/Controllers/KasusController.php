<?php

namespace App\Http\Controllers;


use App\Models\Kasus;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KasusController extends Controller
{
    public function index()
    {
        $data_kasus = Kasus::all();
        return view("dashboard.kasus.index", ['data_kasus'=>$data_kasus]);
    }

    public function create()
    {
        return view("dashboard.kasus.create");
    }

    public function detail_kasus($id)
    {
        $detail_kasus = Kasus::find($id);
        $kriteria = $detail_kasus->get_kriteria;
        return view("dashboard.kasus.detail", compact('detail_kasus', 'kriteria'));
    }

    public function store(Request $request)
    {
        Session::flash('kode', $request->name);
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
        kasus::create($data);
        return redirect()->route("kasus")->with('success', 'Berhasil menambahkan data');
    }
}
