<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\sub_kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlternatifController extends Controller
{
    public function index()
    {
        $data_alternatif = alternatif::all();
        return view('dashboard.alternatif.index')->with('data_alternatif', $data_alternatif);
    }

    public function detail_alternatif($id)
    {

        $detail_alternatif = alternatif::with('sub_kriteria')->find($id);
        $sub_kriteria = $detail_alternatif->sub_kriteria;
        // $sub_kriteria = sub_kriteria::with('alternatif')->find($id);

        // dd($sub_kriteria);
        return view("dashboard.alternatif.detail", compact('detail_alternatif', 'sub_kriteria')) ;
    }

    public function create_alternatif()
    {
        // $alternatif = alternatif::find($id);
        // return view("dashboard.alternatif.create", compact('alternatif'));
        return view("dashboard.alternatif.create");
    }
    public function create_sub_kriteria($id)
    {
        $alternatif = alternatif::find($id);
        $sub_kriteria = sub_kriteria::all();
        // return view("dashboard.alternatif.create", compact('alternatif'));
        return view("dashboard.alternatif.create_sub_kriteria", compact('alternatif', 'sub_kriteria'));
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
        return redirect()->route("alternatif")->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id){
        $alternatif = alternatif::find($id);
        $sub_kriteria = sub_kriteria::where('alternatif_id', $id)->get();

        return view('pegawai.edit', compact(
            'alternatif', 'sub_kriteria'
        ));
    }

    public function store_sub_kriteria($id, Request $request)
    {
        $alternatif = alternatif::find($id);

        if (!$alternatif) {
            return redirect()->route('alternatif')->with('error', 'Alternatif tidak ditemukan.');
        }

        // Attach pivot data
        $alternatif->sub_kriteria()->attach($request->input('sub_kriteria_id'));

        return redirect()->route('detail_alternatif', $alternatif)->with('success', 'Data berhasil ditambahkan ke alternatif dengan ID ', );
        // return response()->json(['success']);
    }


}

