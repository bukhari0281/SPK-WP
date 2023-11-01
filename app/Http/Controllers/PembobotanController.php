<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PembobotanController extends Controller
{
    public function index() {
        $kriterias =Kriteria::orderBy('kode')->get();
        $alternatif =alternatif::orderBy('kode')->get();
        return view('dashboard.pembobotan.index', compact('kriterias','alternatif'));
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
