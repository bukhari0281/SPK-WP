<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\Kasus;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PembobotanController extends Controller
{
    public function index() {
        $kriterias =Kriteria::with('kasus')->orderBy('kode')->get();
        $kasus =Kasus::with('Kriteria')->get();
        return view('dashboard.pembobotan.index', compact('kriterias','kasus'));
    }

    public function pembobotan()
    {
        // penentuan nilai bobot
		$kriterias = Kriteria::orderBy('kode')->get();
		$bobots = [];
		foreach ($kriterias as $kr) {
			$bobots[] = $kr->bobot / $kriterias->sum('bobot');
		}

        return view('')->with('bobots', $bobots);
    }
}
