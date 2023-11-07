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
        return view("dashboard.kasus.detail")->with('detail_kasus', $detail_kasus);
    }

    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        $request->validate(
            [
                'name' => 'required',
            ],[
                'name.requred' => 'name wajib diisi',
            ]
        );

        $data = [
            'name'=>$request->name,
        ];
        kasus::create($data);
        return redirect()->route("kasus")->with('success', 'Berhasil menambahkan data');
    }
}
