<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVault - Katalog Game Favorit</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #101624;
            color: #ffffff;
        }

        .navbar {
            width: 100%;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #0b1020;
            border-bottom: 1px solid #1f2a44;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #7aa2ff;
        }

        .nav-links a {
            color: #d6defa;
            text-decoration: none;
            margin-left: 20px;
            font-size: 15px;
        }

        .nav-links a:hover {
            color: #7aa2ff;
        }

        .hero {
            min-height: 80vh;
            padding: 70px 8%;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .hero h1 {
            font-size: 52px;
            margin-bottom: 18px;
            line-height: 1.1;
        }

        .hero p {
            color: #c5cce0;
            font-size: 18px;
            line-height: 1.7;
            max-width: 600px;
        }

        .button-group {
            margin-top: 32px;
        }

        .btn {
            display: inline-block;
            padding: 14px 22px;
            border-radius: 10px;
            text-decoration: none;
            margin-right: 12px;
            font-weight: bold;
            font-size: 15px;
        }

        .btn-primary {
            background: #4169e1;
            color: white;
        }

        .btn-secondary {
            background: #1d263b;
            color: #d6defa;
            border: 1px solid #34405e;
        }

        .preview-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 22px;
            padding: 24px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
        }

        .preview-card h2 {
            margin-top: 0;
            color: #ffffff;
        }

        .game-card {
            background: #0f1729;
            border: 1px solid #25304a;
            padding: 16px;
            border-radius: 14px;
            margin-top: 14px;
        }

        .game-title {
            font-weight: bold;
            margin-bottom: 6px;
        }

        .game-info {
            color: #aeb8d4;
            font-size: 14px;
        }

        .features {
            padding: 50px 8%;
            background: #0b1020;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .feature-box {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 24px;
        }

        .feature-box h3 {
            margin-top: 0;
            color: #7aa2ff;
        }

        .feature-box p {
            color: #c5cce0;
            line-height: 1.6;
        }

        footer {
            padding: 24px 8%;
            text-align: center;
            color: #8892b0;
            background: #0b1020;
            border-top: 1px solid #1f2a44;
        }

        @media (max-width: 800px) {
            .hero {
                grid-template-columns: 1fr;
                padding-top: 40px;
            }

            .hero h1 {
                font-size: 38px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .navbar {
                flex-direction: column;
                gap: 12px;
            }

            .nav-links a {
                margin: 0 8px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">GameVault</div>

        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('games.index') }}">Cari Game</a>
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </nav>

    <section class="hero">
        <div>
            <h1>Cari game favoritmu, simpan ke wishlist pribadi.</h1>

            <p>
                GameVault adalah website katalog game berbasis Laravel.
                Pengguna dapat mencari informasi game, melihat genre, rating,
                tanggal rilis, screenshot, dan menyimpan game yang ingin dimainkan.
            </p>

            <div class="button-group">
                <a href="{{ route('games.index') }}" class="btn btn-primary">Mulai Cari Game</a>
                <a href="#" class="btn btn-secondary">Lihat Wishlist</a>
            </div>
        </div>

        <div class="preview-card">
            <h2>Preview Fitur</h2>

            <div class="game-card">
                <div class="game-title">Search Game</div>
                <div class="game-info">Cari data game dari RAWG API.</div>
            </div>

            <div class="game-card">
                <div class="game-title">Wishlist</div>
                <div class="game-info">Simpan game yang ingin dimainkan nanti.</div>
            </div>

            <div class="game-card">
                <div class="game-title">Forum Diskusi</div>
                <div class="game-info">Tulis komentar di halaman detail game.</div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="feature-box">
            <h3>Katalog Game</h3>
            <p>
                Menampilkan daftar game lengkap dengan genre, platform,
                rating, dan tanggal rilis.
            </p>
        </div>

        <div class="feature-box">
            <h3>Wishlist Pribadi</h3>
            <p>
                User dapat menyimpan game favorit atau game yang ingin dibeli
                ke dalam daftar wishlist.
            </p>
        </div>

        <div class="feature-box">
            <h3>Diskusi Game</h3>
            <p>
                Setiap game memiliki ruang komentar sederhana agar pengguna
                bisa saling berdiskusi.
            </p>
        </div>
    </section>

    <footer>
        GameVault - Project Besar Pemrograman Web Lanjut
    </footer>

</body>
</html>