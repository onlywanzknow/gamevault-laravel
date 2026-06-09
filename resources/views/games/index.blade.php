<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Game - GameVault</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #101624;
            color: white;
        }

        .navbar {
            padding: 20px 8%;
            background: #0b1020;
            border-bottom: 1px solid #1f2a44;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #7aa2ff;
            font-weight: bold;
            font-size: 24px;
        }

        .navbar a {
            color: #d6defa;
            text-decoration: none;
            margin-left: 18px;
        }

        .container {
            padding: 50px 8%;
        }

        h1 {
            font-size: 38px;
            margin-bottom: 10px;
        }

        p {
            color: #c5cce0;
            line-height: 1.6;
        }

        .search-box {
            margin-top: 30px;
            background: #151d31;
            padding: 24px;
            border-radius: 18px;
            border: 1px solid #293552;
        }

        input {
            width: 75%;
            padding: 14px;
            border-radius: 10px;
            border: 1px solid #34405e;
            background: #0f1729;
            color: white;
            font-size: 15px;
        }

        button {
            padding: 14px 20px;
            border-radius: 10px;
            border: none;
            background: #4169e1;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .info {
            margin-top: 30px;
            color: #8892b0;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">GameVault</div>

        <div>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('games.index') }}">Cari Game</a>
            <a href="#">Login</a>
        </div>
    </nav>

    <div class="container">
        <h1>Cari Game</h1>

        <p>
            Halaman ini nanti akan digunakan untuk mencari data game dari RAWG API.
            Untuk tahap sekarang, halaman dibuat dulu supaya struktur project mulai terbentuk.
        </p>

        <div class="search-box">
            <input type="text" placeholder="Contoh: Minecraft, GTA V, Valorant">
            <button>Cari</button>
        </div>

        <div class="info">
            Fitur pencarian API akan dibuat pada tahap berikutnya.
        </div>
    </div>

</body>
</html>