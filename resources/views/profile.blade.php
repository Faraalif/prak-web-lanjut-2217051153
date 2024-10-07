<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="card">
        <div class="img-bx">
            <img src="{{ asset('assets/img/profil.jpg') }}" alt="Profile Image" />
        </div>
        <div class="content">
            <div class="detail">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $nama ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $kelas ?></td>
                    </tr>
                    <tr>
                        <td>NPM</td>
                        <td>:</td>
                        <td><?= $npm ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
