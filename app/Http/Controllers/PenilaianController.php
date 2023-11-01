<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function proses()
	{
		$alternatifs = alternatif::orderBy('kode')->get();
		$kriterias = Kriteria::orderBy('kode')->get();
		// penentuan nilai bobot
		$bobots = [];
		foreach ($kriterias as $kr) {
			$bobots[] = $kr->bobot / $kriterias->sum('bobot');
		}

		// penentuan matriks keputusan
		$matrix = [];
		foreach ($alternatifs as $ka => $alt) {
			foreach ($alt->kriteria as $kk => $krit) {
				$matrix[$ka][$kk] = $krit->pivot->nilai;
			}
		}

		// penentuan nilai vektor S
		$vectors = [];
		foreach ($matrix as $mat) {
			$vec = [];
			foreach ($mat as $km => $m) {
				$vec[] = pow($m, $bobots[$km]);
			}
			$vectors[] = array_product($vec);
		}

		// penentuan nilai bobot preferensi
		$prefs = [];
		$sigma_si = array_sum($vectors);
		foreach ($vectors as $vector) {
			$prefs[] = $vector / $sigma_si;
		}

		// masukkan hasil penilaian ke data alternatif
		foreach ($alternatifs as $key => $alternatif) {
			$alternatif->nilai = round($prefs[$key], 4);
		}

		return $alternatifs;
	}

    
}
