<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - GameVault</title>

    <style>
        * {
            box-sizing: border-box;
        }

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
            margin-right: 18px;
        }

        .container {
            padding: 50px 8%;
        }

        .card {
            background: #151d31;
            border: 1px solid #293552;
            padding: 26px;
            border-radius: 18px;
            margin-top: 20px;
        }

        .quick-links {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-top: 25px;
        }

        .quick-card {
            background: #151d31;
            border: 1px solid #293552;
            padding: 22px;
            border-radius: 18px;
            text-decoration: none;
            color: white;
        }

        .quick-card h3 {
            margin-top: 0;
            color: #7aa2ff;
        }

        .quick-card p {
            color: #c5cce0;
            line-height: 1.5;
        }

        .logout-btn {
            padding: 10px 16px;
            border-radius: 10px;
            border: none;
            background: #d9534f;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .success {
            background: #12351f;
            border: 1px solid #2f8f4e;
            padding: 12px;
            border-radius: 10px;
            color: #b9ffd0;
            margin-bottom: 18px;
        }

        @media (max-width: 800px) {
            .quick-links {
                grid-template-columns: 1fr;
            }

            .navbar {
                flex-direction: column;
                gap: 12px;
                text-align: center;
            }

            .navbar a {
                display: inline-block;
                margin: 5px 8px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">GameVault</div>

        <div>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('games.index') }}">Cari Game</a>
            <a href="{{ route('wishlist.index') }}">Wishlist</a>
            <a href="{{ route('forum.index') }}">Forum</a>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <h1>Dashboard</h1>

        <div class="card">
            <h2>Halo, {{ auth()->user()->name }}</h2>
            <p>Email: {{ auth()->user()->email }}</p>
            <p>
                Ini adalah dashboard awal GameVault. Dari sini kamu bisa membuka katalog game,
                mengelola wishlist, dan masuk ke forum diskusi game.
            </p>
        </div>

        <div class="quick-links">
            <a href="{{ route('games.index') }}" class="quick-card">
                <h3>Cari Game</h3>
                <p>Lihat halaman pencarian game. Nanti data akan diambil dari RAWG API.</p>
            </a>

            <a href="{{ route('wishlist.index') }}" class="quick-card">
                <h3>Wishlist</h3>
                <p>Simpan game yang ingin dimainkan atau dibeli ke daftar pribadi.</p>
            </a>

            <a href="{{ route('forum.index') }}" class="quick-card">
                <h3>Forum</h3>
                <p>Tulis komentar dan diskusi sederhana berdasarkan game tertentu.</p>
            </a>
        </div>
    </div>

</body>
</html>