<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illumunate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    // public function insert()
    // {
    //     $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir, alamat, created_at) values (?, ?, ?, ?, ?)', ['1922110006', 'ahmad', 'Palembang' . '2000-01-01', 'JL Rajawali', now()]);
    //     dump($result);
    // }
    // public function update()
    // {
    //     $result = DB::update('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir, alamat, created_at) values (?, ?, ?, ?, ?)', ['1922110006', 'ahmad', 'Palembang' . '2000-01-01', 'JL Rajawali', now()]);
    //     dump($result);
    // }
    // public function delete()
    // {
    //     $result = DB::delete('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir, alamat, created_at) values (?, ?, ?, ?, ?)', ['1922110006', 'ahmad', 'Palembang' . '2000-01-01', 'JL Rajawali', now()]);
    //     dump($result);
    // }
    // public function select()
    // {
    //     $result = DB::select('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir, alamat, created_at) values (?, ?, ?, ?, ?)', ['1922110006', 'ahmad', 'Palembang' . '2000-01-01', 'JL Rajawali', now()]);
    //     dump($result);
    // }
    public function insertElq()
    {
        // $mhs = new Mahasiswa();
        // $mhs->nama = "Richie Jonathan Chaniago";
        // $mhs->npm = "2226250017";
        // $mhs->tempat_lahir = "Palembang";
        // $mhs->tanggal_lahir = date("Y-m-d");
        // $mhs->save();
        // dump($mhs);
        $mhs = Mahasiswa::insert(
            // [
            //     'nama' => 'Jonathan R',
            //     'npm' => '2226250047',
            //     'tempat_lahir' => 'Jakarta',
            //     'tanggal_lahir' => date("Y-m-d")
            // ],
            // [
            //     'nama' => 'Richie',
            //     'npm' => '2226250027',
            //     'tempat_lahir' => 'Bandung',
            //     'tanggal_lahir' => date("Y-m-d")
            // ]
        );
        dump($mhs);


    }
    public function selectElq()
    {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();
        return view("mahasiswa.index", ["allmahasiswa" => $mahasiswa, "kampus" => $kampus]);
    }

    public function updateElq()
    {

        $mahasiswa = Mahasiswa::where('npm', '2226250007')->first();
        $mahasiswa->nama = 'Chiru';
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function deleteElq()
    {

        $mahasiswa = Mahasiswa::where('npm', '2226250047')->first();
        $mahasiswa->delete();
        dump($mahasiswa);

    }
}