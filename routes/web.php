<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/mahasiswa/{nama}', function ($nama = "Richie") {
    echo "<h2>Halo Nama Saya $nama</h2>";
});

Route::get('/mahasiswa2/{nama?}', function ($nama = "Richie") {
    echo "<h2>Halo Nama Saya $nama</h2>";
});

Route::get('/profil/{nama?}/{pekerjaan?}', function ($nama = "Richie", $pekerjaan = "Mahasiswa") {
    echo "<h2>Halo Nama Saya $nama. Saya adalah $pekerjaan</h2>";
});

Route::get('/hubungi', function () {
    echo "<h1>Hubungi Kami</h1>";
})->name("call");

route::redirect('/contact', '/hubungi');

route::get('/halo', function () {
    echo "<a href='" . route('call') . "'>" . route('call') . "</a>";
});

route::prefix('/dosen')->group(function () {
    route::get('/jadwal', function () {
        echo "<h1>Jadwal Dosen</h1>";
    });
    route::get('/materi', function () {
        echo "<h1>materi Dosen</h1>";
    });
});