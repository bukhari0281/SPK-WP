<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\Kriteria;
use App\Models\sub_kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $data = sub_kriteria::all();
        // return view("dashboard.sub_kriteria.index")->with('data', $data);
        return view("dashboard.sub_kriteria.index", compact("data"));
    }

    public function create()
    {
        // mengambil data kasus
        // $create_sub_kriteria = alternatif::all();
        // Temukan kriteria berdasarkan ID
        // $kriteria = Kriteria::find($id);
        $kriteria = Kriteria::all();
        // $alternatif = alternatif::find($id);
        // $sub_kriteria = sub_kriteria::where('alternatif_id', $id)->get();

        // if (!$kriteria) {
        //     return response()->json('error', 'Kriteria tidak ditemukan.');
        // }

        // dd($kriteria);
        // dd($kriteria);
        return view("dashboard.sub_kriteria.create", compact('kriteria'));
    }

    public function store(Request $request)
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
        return redirect()->route("sub_kriteria")->with('success', 'Berhasil menambahkan data');
    }

    // public function tambahSubKriteria(Request $request, $id)
    // {
    //     Session::flash('kode_sub_kriteria', $request->kode_sub_kriteria);
    //     Session::flash('name', $request->name);
    //     Session::flash('nilai', $request->nilai);
    //     Session::flash('keterangan', $request->keterangan);
    //     // Validasi input
    //     $request->validate([
    //         [
    //             'kode_sub_kriteria' => 'required',
    //             'name' => 'required',
    //             'nilai' => 'required',
    //             'keterangan' => 'required'
    //         ],[
    //             'kode_sub_kriteria.requred' => 'kode wajib diisi',
    //             'name.requred' => 'name wajib diisi',
    //             'nilai.requred' => 'nilai wajib diisi',
    //             'keterangan.required' => 'keterangan wajib diisi'
    //         ]
    //     ]);

    //     // Temukan kriteria berdasarkan ID
    //     $kriteria = Kriteria::find($id);

    //     if (!$kriteria) {
    //         return response()->json(['message' => 'Kriteria tidak ditemukan'], 404);
    //     }

    //     // Tambahkan data sub_kriteria
    //     $subKriteria = new sub_kriteria([
    //         'kode_sub_kriteria' => $request->input('kode_sub_kriteria'),
    //         'name' => $request->input('name'),
    //         'nilai' => $request->input('nilai'),
    //         'keterangan' => $request->input('keterangan'),
    //     ]);
    //     $kriteria->get_subkriteria()->save($subKriteria);

    //     dd($request->all());
    //     // sub_kriteria::create($subKriteria);
    //     // return response()->json(['message' => 'Data berhasil ditambahkan'], 200);
    //     // return redirect()->route('kriteria')->with('error', 'Berhasil menambahkan data');
    //     return redirect()->route('kriteria.tambah-sub-kriteria', $id)
    //         //    ->withErrors($validator)
    //            ->withInput();

    // }
}
