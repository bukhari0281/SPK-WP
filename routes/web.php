<?php

use App\Http\Controllers\KasusController;
use App\Http\Controllers\KriteriaDanBobotController;
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
    Route::post('kasus', [KasusController::class,'store'])->name('store_kasus');
    // end of kasus
});


