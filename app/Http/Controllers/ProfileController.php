<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = "", $foto = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
            'foto' => $foto,
            'jurusan' => $jurusan,
            'semester' => $semester,

        ];
        return view('profile', $data);
    }
}