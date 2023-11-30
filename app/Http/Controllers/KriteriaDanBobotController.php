<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Kriteria;
use App\Models\sub_kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaDanBobotController extends Controller
{
    public function index()
    {
        $data = kriteria::with('Kasus')->get();

        // return json_decode($data, true);
        return view("dashboard.kriteria.index", compact("data"));
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

    public function store_sub_kriteria(Request $request)
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
            'kriteria_id'=>$request->kriteria_id,
        ];
        sub_kriteria::create($data);
        return redirect()->route('kriteria')->with('success', 'Berhasil menambahkan data');
    }

    public function edit(int $id)
    {
        $data = kriteria::where('id', $id)->first();
        return view("dashboard.kriteria.edit")->with('data', $data);
    }
}
