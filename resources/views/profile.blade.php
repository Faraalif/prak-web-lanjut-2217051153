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
            background-color: #B0E0E6;
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
            padding: 40px;
            width: 450px;
            text-align: center;
        }

        /* Profile image at the top with full width and no cropping */
        .profile-img img {
            width: auto;
            max-width: 100%; /* Adjusts to the full width of the card */
            height: auto; /* Ensures the height scales proportionally */
            margin-bottom: 20px;
        }

        .profile-info {
            width: 100%;
            margin-top: 10px;
            font-size: 18px; /* Slightly larger font size */
        }

        .profile-info td {
            padding: 5px 10px;
            text-align: center; /* Align text to center */
        }

        /* Remove labels, show only the content */
    </style>
</head>

<body>

<div class="profile-card">
    <div class="profile-img">
        <img src="{{ asset('storage/upload/' . $foto ?? 'image-not-found.png') }}" alt="Profile Image"> 
        <!-- The image now respects the original aspect ratio and fits fully -->
    </div>
    <table action="{{ route('user.store') }}" method="POST" class="profile-info">
        <tr>
            <td>{{ $nama }}</td> <!-- Only showing the value for Nama -->
        </tr>
        <tr>
            <td>{{ $npm }}</td> <!-- Only showing the value for NPM -->
        </tr>
        <tr>
             <td>{{ $nama_kelas }}</td>
        </tr>
    </table>
</div>

</body>
</html>
