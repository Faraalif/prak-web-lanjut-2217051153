<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = '', $kelas = '', $npm = '')
{
    $data = [
        'nama' => 'Fara Alif Lailla',
        'kelas' => 'D' ,
        'npm' => '2217051153'
    ];

    return view('profile', $data);
}

}