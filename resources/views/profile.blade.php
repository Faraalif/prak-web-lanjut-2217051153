<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #ffc0cb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .profile-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 350px;
            text-align: center;
        }

        .profile-img img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .profile-info {
            width: 100%;
            margin-top: 10px;
            font-size: 14px;
        }

        .profile-info td {
            padding: 5px 10px;
        }

        .profile-info td:first-child {
            text-align: left;
            font-weight: bold;
        }

        .profile-info td:nth-child(2) {
            width: 10px;
        }
    </style>
</head>

<body>

<div class="profile-card">
    <div class="profile-img">
        <img src="https://cdn-icons-png.flaticon.com/512/6997/6997662.png" alt="Profile Image">
    </div>
    <table action="{{ route('user.store') }}" method="POST" class="profile-info">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $nama }}</td>
        </tr>
        <tr>
            <td>NPM</td>
            <td>:</td>
            <td>{{ $npm }}</td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td>{{ $kelas_id ?? 'Kelas tidak ditemukan' }}</td>
        </tr>
    </table>
</div>

</body>
</html>