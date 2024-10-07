<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\UserModel; 

class UserController extends Controller
{
    public function create()
    {
        $kelas = Kelas::all(); // Pastikan ini mengembalikan data dari database
        return view('create_user', ['kelas' => $kelas]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = UserModel::create($validatedData);

        $user->load('kelas');

        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'kelas_id' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);
    }
}