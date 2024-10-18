<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    // List of all users
    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    // View for creating a new user
    public function create()
    {
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    // Storing new user to the database
    public function store(Request $request)
    {
        // Validating the input data
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'npm' => 'required|string|max:255',
            'foto' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handling file upload for 'foto'
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('upload', $filename, 'public');

            // Inserting the user with the uploaded file path
            $this->userModel->create([
                'nama' => $request->input('nama'),
                'npm' => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id'),
                'foto' => $filename,
            ]);
        }

        // Redirecting back to user list after successful creation
        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    // Show the profile of a specific user
    public function show($id)
    {
        // Retrieve the user with its associated class (kelas)
        $user = $this->userModel->with('kelas')->find($id);

        // Check if the user exists
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User tidak ditemukan');
        }

        // Prepare data for the profile view
        $data = [
            'title' => 'Profile',
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama ?? 'Kelas tidak ditemukan', // Accessing kelas name via relation
            'foto' => $user->foto,
        ];

        // Return profile view with user data
        return view('profile', $data);
    }
}