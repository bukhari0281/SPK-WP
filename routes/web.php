<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\KriteriaDanBobotController;
use App\Http\Controllers\NilaiAlternatifController;
use App\Http\Controllers\PembobotanController;
use App\Http\Controllers\SubKriteriaController;
use App\Models\alternatif;
use App\Models\sub_kriteria;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get("/", [DashboardController::class,'index'])->name('home');

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.layout');
    });

    // kriteria dan bobot
    Route::get('kriteria', [KriteriaDanBobotController::class,'index'])->name('kriteria');
    Route::get('kriteria/create', [KriteriaDanBobotController::class,'create'])->name('create_kriteria');
    Route::post('kriteria', [KriteriaDanBobotController::class,'store'])->name('store_kriteria');
    Route::post('kriteria/add', [KriteriaDanBobotController::class,'store_sub_kriteria'])->name('store_sub_kriteria');

    Route::get('kriteria/{id}/edit', [KriteriaDanBobotController::class,'edit'])->name('edit_kriteria');
    // end of kriteria dan bobot

    // kasus
    Route::get('kasus', [KasusController::class,'index'])->name('kasus');
    Route::get('kasus/create', [KasusController::class,'create'])->name('create_kasus');
    Route::get('kasus/{id}', [KasusController::class,'detail_kasus'])->name('detail_kasus');
    Route::post('kasus', [KasusController::class,'store'])->name('store_kasus');
    // end of kasus

    // alternatif
    Route::get('alternatif', [AlternatifController::class,'index'])->name('alternatif');
    Route::get('alternatif/{id}', [AlternatifController::class,'detail_alternatif'])->name('detail_alternatif');
    Route::post('alternatif/{id}/store', [AlternatifController::class,'add_sub_kriteria'])->name('add_sub_kriteria');
    Route::get('alternatif/{id}/create', [AlternatifController::class,'create_sub_kriteria'])->name('create_sub_kriteria');
    Route::get('alternatif/create', [AlternatifController::class,'create_alternatif'])->name('create_alternatif');
    Route::post('alternatif', [AlternatifController::class,'store'])->name('store_alternatif');
    Route::get('alternatif/{id}/edit', [KriteriaDanBobotController::class,'edit'])->name('edit_alternatif');
    // end of alternatif

    // pembobotan
    Route::get('pembobotan/{id}', [PembobotanController::class,'pembobotan'])->name('pembobotan');
    // end of pembobotan

    // sub kriteria
    Route::get('subkriteria', [SubKriteriaController::class, 'index'])->name('sub_kriteria');
    Route::get('subkriteria/create', [SubKriteriaController::class, 'create'])->name('create_sk');
    // Route::get('kriteria/{id}/subkriteria/create', [SubKriteriaController::class,'create'])->name('create_sub_kriteria');
    // Route::get('kriteria/{id}/subkriteria/create', [SubKriteriaController::class,'create'])->name('create_sub_kriteria');
    // Route::post('kriteria/{id}/subkriteria', [SubKriteriaController::class,'tambahSubKriteria'])->name('tambah_sub_kriteria');
    // Route::post('subkriteria', [SubKriteriaController::class, 'store'])->name('store_sub_kriteria');
    // ens sub kriteria

    // nilai alternatif
    Route::get('nilai_alternatif', [NilaiAlternatifController::class,'index'])->name('nilai_alternatif');
    Route::get('nilai_alternatif/create/{id}', [NilaiAlternatifController::class,'create'])->name('create_nilai_alternatif');
    Route::post('nilai_alternatif', [NilaiAlternatifController::class,'store'])->name('store_nilai_alternatif');
    // end of nilai alternatif


});

Route::get('/alternatif', function () {
    $alternatif = alternatif::all();
    echo $alternatif;
});

Route::get('/sub_kriteria', function () {
    $sub_kriteria = sub_kriteria::find(2);
    echo $sub_kriteria->name;
});

Route::get('/alternatif_sub_kriteria', function () {
    $alternatif = alternatif::find(1);
    $sub_kriteria = ['4', '3'];
    $alternatif->sub_kriteria()->attach($sub_kriteria);
    echo 'success';
});


Route::get('/hapus', function () {
    $alternatif = alternatif::find(1);
    $sub_kriteria = ['4'];
    $alternatif->sub_kriteria()->detach($sub_kriteria);
    echo 'success hapus data';
});

Route::get('/show', function () {
    $alternatif = alternatif::with('sub_kriteria')->find(1);
    echo $alternatif;
});



