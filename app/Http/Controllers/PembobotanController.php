<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\bobot_kriteria;
use App\Models\Kasus;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class PembobotanController extends Controller
{
    public function index() {
        $kriterias = Kriteria::with('kasus')->orderBy('kode')->get();
        $kasus = Kasus::find(1)->get();
        $users = Kasus::with('bobot_kriteria')->get();

        return view('dashboard.pembobotan.index', compact('kriterias','kasus','users'));
    }
    public function index_2($id) {
        $kasus = Kasus::find($id);
        // return response()->json(['kasus' => $kasus,]);
        return view('dashboard.pembobotan.index', compact('kasus'));
    }

    public function pembobotan(string $id)
    {
        try {
        // penentuan nilai bobot

		$kriterias = Kasus::with('get_kriteria')->findOrFail($id);

        // Hitung total bobot dari semua kriteria
        $bobot = $kriterias->get_kriteria;

		$bobots = [];
		foreach ($bobot as $kr) {
			$bobots[] = $kr->bobot / $bobot->sum('bobot');

		}
        $sum = array_sum($bobots);
        $results = [];

        // Iterasi pada array bobot dan bagikan setiap elemen dengan totalBobot
        foreach ($bobots as $bobot) {
            $results[] = $bobot / $sum;
        }

        // Simpan data hasil hitungan ke database
        $data = new bobot_kriteria();
        $data->kasus_id = $id;
        $data->bobot = json_encode($results);
        $data->save();

        // Tampilkan hasil pembagian
            return view('dashboard.pembobotan.index', compact('bobots', 'kriterias'));
        } catch (\Exception $e) {
            // Tangani kesalahan
            return $e->getMessage();
        }

    }
}
