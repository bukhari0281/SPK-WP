<?php

namespace App\Http\Controllers;

use App\Models\alternatif;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlternatifController extends Controller
{
    public function index()
    {
        $data_alternatif = alternatif::orderBy('kode')->get();
        return view('dashboard.alternatif.index', compact('data_alternatif'));
    }

    public function create()
    {
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
}

