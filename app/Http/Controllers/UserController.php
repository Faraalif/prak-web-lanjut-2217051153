<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\UserModel; 

class UserController extends Controller
{

    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }
    
    public function index(){
        $data = [
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
            'kelas' => $this->userModel->getUser(),
        ];

        return view ('list_user', $data);

    }

    public function create()
    {
        // $kelas = Kelas::all(); // Pastikan ini mengembalikan data dari database
        // return view('create_user', ['kelas' => $kelas]);

        $kelasModel = new Kelas();

        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request)
    {

        // $validatedData = $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'npm' => 'required|string|max:255',
        //     'kelas_id' => 'required|exists:kelas,id',
        // ]);

        // $user = UserModel::create($validatedData);

        // $user->load('kelas');

        // return view('profile', [
        //     'nama' => $user->nama,
        //     'npm' => $user->npm,
        //     'kelas_id' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        // ]);

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->to('/user');
    }
}