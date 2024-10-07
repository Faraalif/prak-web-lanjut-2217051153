<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kartu Identitas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #B7DCE8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .img-bx {
            margin-bottom: 20px;
        }

        .img-bx img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .details {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .details span {
            display: block;
            margin-top: 5px;
        }

        .details span:first-child {
            font-size: 20px;
            color: #28527a;
        }

        .details span:nth-child(2) {
            font-size: 16px;
            color: #4f6367;
        }

        .details span:nth-child(3) {
            font-size: 14px;
            color: #8f9b9d;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="img-bx">
            <img src="assets/img/panda.png" alt="Panda Image">
        </div>
        <div class="details">
            <span>Fara Alif Lailla</span>
            <span>2217051153</span>
            <span>D</span>
        </div>
    </div>
</body>
</html>
