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
        background: linear-gradient(135deg, #89CFF0 0%, #B0E0E6 100%);
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
        width: 400px;
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #4682B4;
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
        border-color: #4682B4;
        outline: none;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #4682B4;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #5F9EA0;
    }

    button:active {
        background-color: #bf3d4a;
    }

    @media (max-width: 480px) {
        .form-container {
            padding: 20px;
        }
        h2 {
            font-size: 22px;
        }
    }
</style>

<div class="form-container">
    <h2>FORM</h2>

    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $user->nama) }}"
            placeholder="Masukan nama anda" required>
        
        <label for="kelas_id">Kelas</label>
        <select name="kelas_id" id="kelas_id" required>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}" 
                    {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                    {{ $kelasItem->nama_kelas }}
                </option>
            @endforeach
        </select>     
        
        <label for="npm">NPM</label>
        <input type="text" class="form-control" name="npm" id="npm" value="{{ old('npm', $user->npm) }}"
            placeholder="Masukan NPM anda" required>
        
        <label for="foto">Foto:</label>
        <input type="file" id="foto" class="form-control" name="foto"><br><br>
        
        @if ($user->foto)
            <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="User Photo" width="100" style="margin-bottom: 20px;">
        @endif
        
        <button type="submit">Kirim</button>
    </form>
</div>

@endsection
