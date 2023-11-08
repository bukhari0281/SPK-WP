<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
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
        // $Bobot = $kriterias->Kasus->get_kriteria('bobot');
        $bobot = $kriterias->get_kriteria;
        // $C = $bobot->pluck('bobot')->toArray();

        // $arr = [$C];

		$bobots = [];
		foreach ($bobot as $kr) {
			$bobots[] = $kr->bobot / $bobot->sum('bobot');

		}
        // $txt = array(5,3,4,4,2);
        // $sum = array_sum($txt);
        $sum = array_sum($bobots);
        $results = [];

        // Iterasi pada array bobot dan bagikan setiap elemen dengan totalBobot
        foreach ($bobots as $bobot) {
            $results[] = $bobot / $sum;
        }


        // Tampilkan hasil pembagian
        // dd($results);

        // foreach ($bobot as $k) {
        //     (float)$r = $k / $sum;
        //     // $t = (float)$r;
        //     echo "$k / $sum = $r";

        // }
        // foreach ($txt as $value) {
        //     $r = $value / $sum;
        //   echo "$value / $sum = $r  <br>";
        // }
        // dd($bobots);

            return view('dashboard.pembobotan.index', compact('bobots', 'kriterias'));
        } catch (\Exception $e) {
            // Tangani kesalahan
            return $e->getMessage();
        }

    }
}
