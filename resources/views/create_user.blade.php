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
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
        width: 350px;
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #f5576c;
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
        border-color: #f5576c;
        outline: none;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #f5576c;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #d94556;
    }
</style>

<div class="form-container">
    <h2>FORM</h2>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required><br>

        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" placeholder="Masukkan NPM Anda" required><br>

        <label for="kelas">Kelas:</label>
        <select name="kelas_id" id="kelas_id" required>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>

        <button type="submit">Submit</button>
    </form>
</div>

@endsection
