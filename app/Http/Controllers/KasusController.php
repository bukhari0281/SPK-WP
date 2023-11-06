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
        $data_kasus = Kasus::with('Kriteria')->get();
        return view("dashboard.kasus.index")->with('data_kasus', $data_kasus);
    }

    public function create()
    {
        return view("dashboard.kasus.create");
    }

    public function detail_kasus(int $id)
    {
        $detail_kasus = Kriteria::with('Kasus')->where('id', $id)->first();
        return view("dashboard.kasus.detail",compact("detail_kasus"));
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
