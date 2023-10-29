<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\kriteria;
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
        Session::flash('kriteria', $request->kriteria);
        Session::flash('bobot', $request->bobot);
        $request->validate(
            [
                'kriteria' => 'required',
                'bobot' => 'required'
            ],[
                'kriteria.requred' => 'Kriteria wajib diisi',
                'bobot.requred' => 'Bobot wajib diisi'
            ]
        );

        $data = [
            'kriteria'=>$request->kriteria,
            'kasus_id'=>$request->kasus_id,
            'bobot'=>$request->bobot,
        ];
        kriteria::create($data);
        return redirect()->route("kriteria")->with('success', 'Berhasil menambahkan data');
    }
    public function edit(int $id)
    {
        $data = kriteria::where('id', $id)->first();
        return view("dashboard.kriteria.edit")->with('data', $data);
    }
}
