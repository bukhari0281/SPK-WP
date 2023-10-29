<?php

namespace App\Http\Controllers;


use App\Models\Kasus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KasusController extends Controller
{
    public function index()
    {
        $data_kasus = Kasus::latest()->get();
        return view("dashboard.kasus.index")->with('data_kasus', $data_kasus);
    }

    public function create()
    {
        return view("dashboard.kasus.create");
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
