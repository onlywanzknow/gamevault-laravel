<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Wishlist Saya - GameVault</title>

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
            margin-right: 18px;
        }

        .container {
            padding: 50px 8%;
        }

        h1 {
            margin-bottom: 10px;
        }

        .subtitle {
            color: #c5cce0;
            line-height: 1.6;
        }

        .empty-box {
            margin-top: 30px;
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 28px;
            color: #c5cce0;
        }

        .grid {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 22px;
        }

        .card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: 130px;
            object-fit: cover;
            background: #0f1729;
        }

        .card-body {
            padding: 16px;
        }

        .game-title {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .game-info {
            color: #aeb8d4;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .status {
            display: inline-block;
            margin-top: 8px;
            padding: 6px 10px;
            background: #1d263b;
            border: 1px solid #34405e;
            border-radius: 999px;
            color: #d6defa;
            font-size: 13px;
        }

        .back-link {
            display: inline-block;
            margin-top: 25px;
            color: #7aa2ff;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">GameVault</div>

        <div>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('games.index') }}">Cari Game</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
    </nav>

    <div class="container">
        <h1>Wishlist Saya</h1>

        <p class="subtitle">
            Halaman ini akan menampilkan daftar game yang kamu simpan.
            Nanti game dari RAWG API bisa ditambahkan ke wishlist pribadi.
        </p>

        @if ($wishlists->isEmpty())
            <div class="empty-box">
                Belum ada game di wishlist.
                Nanti setelah fitur pencarian RAWG API dibuat, kamu bisa menyimpan game dari halaman detail.
            </div>
        @else
            <div class="grid">
                @foreach ($wishlists as $item)
                    <div class="card">
                        @if ($item->game_image)
                            <img src="{{ $item->game_image }}" alt="{{ $item->game_name }}">
                        @else
                            <img src="" alt="No image">
                        @endif

                        <div class="card-body">
                            <div class="game-title">{{ $item->game_name }}</div>
                            <div class="game-info">Rating: {{ $item->game_rating ?? '-' }}</div>
                            <div class="game-info">Rilis: {{ $item->game_released ?? '-' }}</div>
                            <span class="status">{{ $item->status }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <a href="{{ route('dashboard') }}" class="back-link">Kembali ke Dashboard</a>
    </div>

</body>
</html>