<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaDanBobotController extends Controller
{
    public function index()
    {
        $data = kriteria::with('Kasus')->get();
        return view("dashboard.kriteria.index")->with('data', $data);
    }
    public function create()
    {
        // mengambil data kasus
        $kasus = Kasus::all();
        return view("dashboard.kriteria.create", compact("kasus"));
    }

    public function store(Request $request)
    {
        Session::flash('kode', $request->kode);
        Session::flash('name', $request->name);
        Session::flash('bobot', $request->bobot);
        $request->validate(
            [
                'kode' => 'required',
                'name' => 'required',
                'bobot' => 'required'
            ],[
                'kode.requred' => 'Kode wajib diisi',
                'name.requred' => 'name wajib diisi',
                'bobot.requred' => 'Bobot wajib diisi'
            ]
        );

        $data = [
            'kode'=>$request->kode,
            'name'=>$request->name,
            'kasus_id'=>$request->kasus_id,
            'bobot'=>$request->bobot,
        ];

        Kriteria::create($data);
        return redirect()->route("kriteria")->with('success', 'Berhasil menambahkan data');
    }
    public function edit(int $id)
    {
        $data = kriteria::where('id', $id)->first();
        return view("dashboard.kriteria.edit")->with('data', $data);
    }
}
