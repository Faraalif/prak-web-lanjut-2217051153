<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

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
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function create(){
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request){
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'kelas_id' => 'required',
            'npm' => 'required',
            'foto' => 'image|file|max:2048',
            'jurusan' => 'required',
            'semester' => 'required',
        ]);

        // Proses upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename, 'public');

            // Simpan data user ke database
            $this->userModel->create([
                'nama' => $request->input('nama'),
                'kelas_id' => $request->input('kelas_id'),
                'npm' => $request->input('npm'),
                'foto' => $filename,
                'jurusan' => $request->input('jurusan'),
                'semester' => $request->input('semester'),
            ]);
        }

        return redirect()->route('user.list')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id)
    {
        $user = $this->userModel->getUser($id);

        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User tidak ditemukan');
        }

        $kelas = Kelas::find($user->kelas_id); // Menampilkan nama kelas jika ada

        $data = [
            'title' => 'Profile',
            'user' => $user,
            'nama_kelas' => $kelas ? $kelas->nama_kelas : null, // Pastikan nama kelas ada, jika tidak tampilkan null
            'foto' => $user->foto
        ];

        return view('profile', $data);
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = $this->kelasModel->getKelas();
        $title = 'Edit User';

        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        // Update data user lainnya
        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        // Cek apakah ada file foto yang di-upload
        if ($request->hasFile('foto')) {
            // Ambil nama file foto lama dari database
            $oldFilename = $user->foto;

            // Hapus foto lama jika ada
            if ($oldFilename) {
                $oldFilePath = public_path('storage/uploads/' . $oldFilename);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); // Hapus foto lama dari folder
                }
            }

            // Simpan file baru dengan storeAs
            $file = $request->file('foto');
            $newFilename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $newFilename, 'public'); // Menyimpan file ke folder uploads dalam storage/public

            // Update nama file di database
            $user->foto = $newFilename;
        }

        // Update jurusan dan semester
        $user->jurusan = $request->jurusan;
        $user->semester = $request->semester;

        // Simpan perubahan pada user
        $user->save();

        return redirect()->route('user.list')->with('success', 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('user.list')->with('success', 'User berhasil dihapus');
    }
}
