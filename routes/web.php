<?php

use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemilihController;
use Illuminate\Support\Facades\File;
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

Route::get('/cek-folder', function () {
    $path = storage_path('app/public/foto_kandidat');

    if (! File::exists($path)) {
        return 'Folder tidak ditemukan';
    }

    $files = File::files($path);

    if (empty($files)) {
        return 'Folder kosong';
    }

    $result = "<h3>Isi folder foto_kandidat:</h3><ul>";
    foreach ($files as $file) {
        $result .= "<li>" . $file->getFilename() . "</li>";
    }
    $result .= "</ul>";

    return $result;
});

Route::get('/cek', function () {
    $path = storage_path('app/public/foto');

    if (! File::exists($path)) {
        return 'Folder tidak ditemukan';
    }

    $files = File::files($path);

    if (empty($files)) {
        return 'Folder kosong';
    }

    $result = "<h3>Isi folder foto_kandidat:</h3><ul>";
    foreach ($files as $file) {
        $result .= "<li>" . $file->getFilename() . "</li>";
    }
    $result .= "</ul>";

    return $result;
});
