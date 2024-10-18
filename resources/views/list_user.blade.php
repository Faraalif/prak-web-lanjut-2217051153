@extends('layouts.app')

@section('content')
<style>
    .btn-blue {
        background-color: #5F9EA0;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        transition: all 0.3s;
    }

    .btn-blue:hover {
        background-color: #4682B4;
        color: white;
    }

    .btn-blue-outline {
        color: #5F9EA0;
        border: 1px solid #5F9EA0;
        background-color: transparent;
        transition: all 0.3s;
    }

    .btn-blue-outline:hover {
        background-color: #B0E0E6;
    }

    .btn-pink-outline {
        color: #FF69B4;
        border: 1px solid #FF69B4;
        background-color: transparent;
        transition: all 0.3s;
    }

    .btn-pink-outline:hover {
        background-color: #FFC0CB;
    }

    .table-container {
        background-color: #B0E0E6;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        margin-top: 20px;
        overflow: hidden;
        text-align: center;
    }

    .table {
        margin: 0 auto;
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        border-collapse: collapse;
        width: 100%;
        max-width: 1200px;
        font-size: 16px;
    }

    .table, .table th, .table td {
        border: 1px solid #4682B4;
    }

    .table thead th {
        border-bottom: 2px solid #4682B4;
        color: #5F9EA0;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 18px;
        padding: 15px;
    }

    .table tbody tr {
        transition: all 0.2s;
        height: 60px;
    }

    .table tbody tr:hover {
        background-color: #B0E0E6;
    }

    .table td {
        padding: 15px;
        vertical-align: middle;
        color: #666;
        font-size: 16px;
    }

    img {
        width: 120px;
        height: auto;
    }

    .add-user-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        background-color: #5F9EA0;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        text-transform: uppercase;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .add-user-btn:hover {
        background-color: #5F9EA0;
        color: white;
    }

</style>

<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <a href="{{ route('user.create') }}" class="add-user-btn">Tambah User</a>
            
            <h1 class="text-center mb-4" style="color: #5F9EA0; text-align: center;">Daftar Mahasiswa</h1>
            
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>NPM</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->nama_kelas }}</td> 
                                <td>{{ $user->npm }}</td>
                                <td>
                                    @if($user->foto)
                                        <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="foto user" width="100">
                                    @else
                                        <img src="{{ asset('path/to/default/image.jpg') }}" alt="foto default" width="100">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-warning mb-3">View</a>
                                    
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-blue-outline">Edit</a>
                                    
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-pink-outline" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
