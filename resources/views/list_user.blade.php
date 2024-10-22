@extends('layouts.app')

@section('content')
<style>
    /* Style untuk card container */
    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Membuat grid responsif */
        gap: 20px;
        justify-content: center;
        padding: 20px;
    }

    .card {
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        text-align: center;
        padding: 15px;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card img {
        border-radius: 50%;
        width: 120px; /* Ukuran gambar lebih proporsional */
        height: 120px;
        object-fit: cover; /* Agar gambar tidak terdistorsi */
        margin-bottom: 15px;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 14px;
        color: #555;
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #4682B4;
        border: none;
        padding: 8px 16px;
        font-size: 14px;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #5F9EA0;
    }

    .add-user-btn {
        display: block;
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #5F9EA0;
        color: white;
        text-align: center;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .add-user-btn:hover {
        background-color: #4682B4;
    }

    h1 {
        text-align: center;
        color: #5F9EA0;
        margin-bottom: 30px;
    }

    /* Untuk memastikan tampilan responsif */
    @media (max-width: 600px) {
        .card-container {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <a href="{{ route('user.create') }}" class="add-user-btn">Tambah User</a>
            
            <h1 class="text-center mb-4">Daftar Mahasiswa</h1>
            
            <!-- Card container untuk menampilkan daftar user dalam bentuk cards -->
            <div class="card-container">
                @foreach ($users as $user)
                    <div class="card">
                        @if($user->foto)
                            <img class="card-img-top" src="{{ asset('storage/uploads/' . $user->foto) }}" alt="Foto user">
                        @else
                            <img class="card-img-top" src="{{ asset('path/to/default/image.jpg') }}" alt="Default image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->nama }}</h5>
                            <p class="card-text">
                                NPM: {{ $user->npm }}<br>
                                Kelas: {{ $user->nama_kelas }}<br>
                                Jurusan: {{ $user->jurusan }}<br>
                                Semester: {{ $user->semester }}
                            </p>
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection