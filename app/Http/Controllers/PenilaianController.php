<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function proses()
	{
		// Mengambil data bobot kriteria dari database atau sumber lain
		$bobotKriteria = Kriteria::pluck('bobot')->toArray();

		// Mengambil data nilai alternatif dari database atau sumber lain
		$nilaiAlternatif = alternatif::select('nilai')->get()->map(function ($item) {
		    return $item->nilai;
		})->toArray();

		// Menghitung jumlah bobot kriteria
		$jumlahBobotKriteria = array_sum($bobotKriteria);

		// Normalisasi bobot kriteria
		$normalizedBobotKriteria = array_map(function ($bobot) use ($jumlahBobotKriteria) {
		    return $bobot / $jumlahBobotKriteria;
		}, $bobotKriteria);

		// Menghitung vektor S untuk setiap alternatif
		$vektorS = array_map(function ($nilai) use ($normalizedBobotKriteria) {
		    $vektor = 1;
		    foreach ($nilai as $index => $nilaiKriteria) {
		        $vektor *= pow($nilaiKriteria, $normalizedBobotKriteria[$index]);
		    }
		    return $vektor;
		}, $nilaiAlternatif);

		// Menghitung jumlah total vektor S
		$jumlahTotalVektorS = array_sum($vektorS);

		// Menghitung vektor V (preferensi) untuk setiap alternatif
		$vektorV = array_map(function ($s) use ($jumlahTotalVektorS) {
		    return $s / $jumlahTotalVektorS;
		}, $vektorS);

		// Hasil akhir penghitungan vektor
		return $vektorV;
	}
}
