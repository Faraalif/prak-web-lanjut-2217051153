<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stylish Form</title>
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

        select {
            padding: 12px;
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

        button:active {
            background-color: #bf3d4a;
        }

        /* Profile Card */
        .profile-card {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
            width: 100px;
            text-align: center;
            margin-top: 20px;
        }

        .profile-card img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .profile-card p {
            font-size: 14px;
            color: #333;
            margin: 5px 0;
        }

        .profile-card .label {
            color: #666;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h2>FORM</h2>

        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <label for="name">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukan nama anda" required>
            
            <label for="npm">NPM</label>
            <input type="text" name="npm" id="npm" placeholder="Masukan NPM anda" required>
            
            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" id="kelas_id" required>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select>     

            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>
