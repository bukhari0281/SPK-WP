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
        $kriterias =Kriteria::with('kasus')->orderBy('kode')->get();
        $kasus =Kasus::find(1)->get();
        $users = Kasus::with('kriteria')->get();

        return view('dashboard.pembobotan.index', compact('kriterias','kasus','users'));
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
        $data->kasus = $id;
        $data->bobots = json_encode($results);
        $data->save();

        // Tampilkan hasil pembagian
            return view('dashboard.pembobotan.index', compact('bobots', 'kriterias'));
        } catch (\Exception $e) {
            // Tangani kesalahan
            return $e->getMessage();
        }

    }
}
