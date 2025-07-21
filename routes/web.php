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

Route::get('/foto/{filename}', function ($filename) {
    $path = storage_path('app/public/foto/' . $filename);

    if (! File::exists($path)) {
        abort(404);
    }

    return Response::file($path);
});

Route::get('/foto_kandidat/{filename}', function ($filename) {
    $path = storage_path('app/public/foto_kandidat/' . $filename);

    if (! File::exists($path)) {
        abort(404);
    }

    return Response::file($path);
});
