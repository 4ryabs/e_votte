<?php

use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemilihController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('v_Login');
});

Route::controller(PemilihController::class)->group(function () {
    Route::get('pemilih', 'index')->name(name: 'pemilih');
    Route::get('daftar', 'daftar');
    Route::post('daftar', 'simpan');
    Route::post('validasi/{id}', 'ubah_validasi');
    Route::post('hapus/{id}', 'hapus');
});

Route::controller(KandidatController::class)->group(function () {
    Route::get('kandidat', 'index');
    Route::get('kandidat/daftar', 'daftar');
    Route::post('kandidat', 'store');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name(name: 'login');
    Route::post('login', 'login');
    Route::get('logout', 'logout');
});
