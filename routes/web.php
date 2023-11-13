<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\KriteriaDanBobotController;
use App\Http\Controllers\PembobotanController;
use App\Http\Controllers\SubKriteriaController;
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



Route::get("/", function () {
    return view("dashboard.layout");
})->name('home');

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.layout');
    });

    // kriteria dan bobot
    Route::get('kriteria', [KriteriaDanBobotController::class,'index'])->name('kriteria');
    Route::get('kriteria/create', [KriteriaDanBobotController::class,'create'])->name('create_kriteria');
    Route::post('kriteria', [KriteriaDanBobotController::class,'store'])->name('store_kriteria');

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
    Route::get('alternatif/create', [AlternatifController::class,'create'])->name('create_alternatif');
    Route::post('alternatif', [AlternatifController::class,'store'])->name('store_alternatif');
    Route::get('alternatif/{id}/edit', [KriteriaDanBobotController::class,'edit'])->name('edit_alternatif');
    // end of alternatif

    // pembobotan
    Route::get('pembobotan/{id}', [PembobotanController::class,'pembobotan'])->name('pembobotan');
    // end of pembobotan

    // sub kriteria
    Route::get('subkriteria', [SubKriteriaController::class, 'index'])->name('sub_kriteria');
    Route::post('subkriteria', [SubKriteriaController::class, 'store'])->name('create_sub_kriteria');
    // Route::get('kriteria/{id}/subkriteria/create', [SubKriteriaController::class,'create'])->name('create_sub_kriteria');
    // Route::get('kriteria/{id}/subkriteria/create', [SubKriteriaController::class,'create'])->name('create_sub_kriteria');
    // Route::post('kriteria/{id}/subkriteria', [SubKriteriaController::class,'tambahSubKriteria'])->name('tambah_sub_kriteria');
    Route::post('subkriteria/create', [SubKriteriaController::class, 'create'])->name('store_sub_kriteria');
    // ens sub kriteria
});


