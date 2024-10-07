@extends('layouts.app')

@section('content')
<style>
    /* Light Blue Theme Styles */
    .card {
        border: none;
        border-radius: 15px;
        background-color: #fff;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    
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
    }
    
    .table, .table th, .table td {
        border: 1px solid #4682B4;
    }
    
    .table thead th {
        border-bottom: 2px solid #4682B4;
        color: #5F9EA0;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 14px;
        padding: 12px;
    }
    
    .table tbody tr {
        transition: all 0.2s;
    }
    
    .table tbody tr:hover {
        background-color: #B0E0E6;
    }
    
    .table td {
        padding: 12px;
        vertical-align: middle;
        color: #666;
    }
</style>
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="text-center mb-4" style="color: #5F9EA0; text-align: center;">Daftar Mahasiswa</h1>
            
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['nama'] ?></td>
                                <td><?= $user['npm'] ?></td>
                                <td><?= $user['nama_kelas'] ?></td>    
                                <td>
                                    <button class="btn btn-sm btn-blue-outline">Edit</button>
                                    <button class="btn btn-sm btn-blue-outline">Hapus</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
