@extends('layouts.app')

@section('content')

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #89CFF0 0%, #B0E0E6 100%); /* Latar belakang biru */
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-container {
        background-color: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        width: 400px; /* Memperlebar box form */
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #4682B4; /* Judul biru */
    }

    label {
        font-size: 14px;
        color: #666;
        display: block;
        margin-bottom: 8px;
        text-align: left;
    }

    input[type="text"], select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus, select:focus {
        border-color: #4682B4; /* Warna fokus biru */
        outline: none;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #4682B4; /* Tombol biru */
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #5F9EA0; /* Tombol hover sedikit lebih terang */
    }

    button:active {
        background-color: #bf3d4a; /* Warna tombol saat aktif */
    }

    @media (max-width: 480px) {
        .form-container {
            padding: 20px; /* Menyesuaikan padding */
        }
        h2 {
            font-size: 22px; /* Menyesuaikan ukuran font */
        }
    }
</style>

<div class="form-container">
    <h2>FORM</h2>

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="Masukan nama anda" required>
        
        <label for="id_kelas">Kelas</label>
        <select name="kelas_id" id="kelas_id" required>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>     
        
        <label for="npm">NPM</label>
        <input type="text" name="npm" id="npm" placeholder="Masukan NPM anda" required>
        
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto"><br><br>

        <!-- Bagian tambahan untuk Jurusan dan Semester -->
        <div class="mb-3">
            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan') }}" placeholder="Masukkan jurusan">
        </div>

        <div class="mb-3">
            <label for="semester">Semester:</label>
            <input type="text" id="semester" name="semester" value="{{ old('semester') }}" placeholder="Masukkan semester">
        </div>

        <button type="submit">Kirim</button>
    </form>
</div>
@endsection
