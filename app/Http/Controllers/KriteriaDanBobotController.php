<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaDanBobotController extends Controller
{
    public function index()
    {
        $data = kriteria::orderBy('kriteria', 'asc')->get();
        return view("dashboard.kriteria.index")->with('data', $data);
    }
    public function create()
    {
        return view("dashboard.kriteria.create");
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
