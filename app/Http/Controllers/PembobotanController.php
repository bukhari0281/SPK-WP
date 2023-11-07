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



    public function pembobotan($id)
    {
        // penentuan nilai bobot
		$kriterias = Kriteria::with('kasus')->find($id);

        // Hitung total bobot dari semua kriteria
        // $Bobot = $kriterias->Kasus->get_kriteria('bobot');
        $bobot = $kriterias->Kasus->get_kriteria;
		$bobots = [];
		foreach ($bobot as $kr) {
			$bobots[] = $kr->bobot / $kriterias->sum('bobot');
		}

        dd($bobots);

        return view('dashboard.kasus.index')->with('bobots', $bobots);
    }
}
