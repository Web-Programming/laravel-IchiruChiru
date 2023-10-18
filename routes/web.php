<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\ProdiController;
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

Route::get('/dosen', function () {
    return view('dosen');
});

Route::get('/dosen/index', function () {
    return view('dosen.index');
});

Route::get('/fakultas', function () {
    // return view('fakultas.index', ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);
    // return view('fakultas.index', ["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]]);
    // return view('fakultas.index')->with("fakultas", ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]);

    $kampus = "Universitas Multi Data Palembang";
    // $fakultas = [];
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    return view('fakultas.index', compact('fakultas', 'kampus'));


});

Route::get('/prodi', [ProdiController::class, 'index']);

Route::resource("/kurikulum", KurikulumController::class);

Route::apiResource("/dosen", DosenController::class);