<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .content {
            background-image: url('asset/library.jpeg');
            background-size: cover;
        }

        .jumbotron {
            margin: 100px auto;
            background-color: transparent;
            color: white;
        }

        button{
            height: 60px;
            background: transparent;
            border: 1px solid white;
            border-radius: 10px;
        }
        button a{
            color: white;
        }
    </style>
</head>

<body>
    <div class="jumbotron">
        <h1 class="display-4">Sistem Perpustakaan 40</h1>
        <hr style="border: 1px solid white;">
        <p class="lead">Tersedia di Sistem Perpustakaan Digital SMKN 40! Selamat datang, temukan beragam sumber pengetahuan dan pelajaran menarik di sini. Selamat menikmati dan memanfaatkan Sistem Perpustakaan Digital SMKN 40. Semoga pengalaman belajar Anda di sini membawa inspirasi dan pengetahuan yang berharga!</p>
        <button class="lead mt-1">
            <a href="<?= base_url('Auth')?>" role="button">Learn more</a>
        </button>
    </div>
</body>

</html>