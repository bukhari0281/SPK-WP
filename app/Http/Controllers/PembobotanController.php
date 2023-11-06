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
        $kasus =Kasus::find(1)->get();
        $users = Kasus::with('kriteria')->get();

        return view('dashboard.pembobotan.index', compact('kriterias','kasus','users'));
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
