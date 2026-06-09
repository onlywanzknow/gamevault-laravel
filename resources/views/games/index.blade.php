<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cari Game - GameVault</title>

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
            margin-left: 18px;
        }

        .container {
            padding: 50px 8%;
        }

        h1 {
            font-size: 38px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #c5cce0;
            line-height: 1.6;
            max-width: 850px;
        }

        .search-box {
            margin-top: 30px;
            background: #151d31;
            padding: 24px;
            border-radius: 18px;
            border: 1px solid #293552;
        }

        .search-form {
            display: flex;
            gap: 12px;
        }

        input {
            flex: 1;
            padding: 14px;
            border-radius: 10px;
            border: 1px solid #34405e;
            background: #0f1729;
            color: white;
            font-size: 15px;
        }

        input::placeholder {
            color: #7d869c;
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

        button:hover {
            background: #3158c9;
        }

        .alert-error {
            margin-top: 24px;
            background: #3a1d1d;
            border: 1px solid #914646;
            padding: 14px;
            border-radius: 10px;
            color: #ffdada;
        }

        .result-info {
            margin-top: 30px;
            color: #c5cce0;
        }

        .games-grid {
            margin-top: 25px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 22px;
        }

        .game-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .game-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            background: #0f1729;
        }

        .image-placeholder {
            height: 150px;
            background: #0f1729;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8892b0;
        }

        .game-body {
            padding: 16px;
            flex: 1;
        }

        .game-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .game-info {
            color: #aeb8d4;
            font-size: 14px;
            margin-bottom: 7px;
            line-height: 1.4;
        }

        .badge-row {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .badge {
            padding: 5px 9px;
            border-radius: 999px;
            background: #1d263b;
            border: 1px solid #34405e;
            color: #d6defa;
            font-size: 12px;
        }

        .card-footer {
            padding: 0 16px 16px 16px;
        }

        .detail-btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 11px;
            border-radius: 10px;
            background: #1d263b;
            color: #d6defa;
            text-decoration: none;
            border: 1px solid #34405e;
            font-weight: bold;
        }

        .detail-btn:hover {
            background: #25324f;
        }

        .empty-box {
            margin-top: 30px;
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 28px;
            color: #c5cce0;
        }

        .rawg-credit {
            margin-top: 35px;
            color: #8892b0;
            font-size: 14px;
        }

        .rawg-credit a {
            color: #7aa2ff;
        }

        @media (max-width: 700px) {
            .navbar {
                flex-direction: column;
                gap: 12px;
                text-align: center;
            }

            .navbar a {
                display: inline-block;
                margin: 5px 8px;
            }

            .container {
                padding: 35px 6%;
            }

            .search-form {
                flex-direction: column;
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

            @auth
                <a href="{{ route('wishlist.index') }}">Wishlist</a>
                <a href="{{ route('forum.index') }}">Forum</a>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <div class="container">
        <h1>Cari Game</h1>

        <p class="subtitle">
            Cari informasi game dari RAWG API. Data yang ditampilkan meliputi nama game,
            rating, genre, platform, tanggal rilis, dan gambar cover.
        </p>

        <div class="search-box">
            <form action="{{ route('games.index') }}" method="GET" class="search-form">
                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Contoh: Minecraft, GTA V, Valorant, Elden Ring"
                >

                <button type="submit">Cari</button>
            </form>
        </div>

        @if ($error)
            <div class="alert-error">
                {{ $error }}
            </div>
        @endif

        @if (!$error)
            <div class="result-info">
                @if ($search)
                    Hasil pencarian untuk: <strong>{{ $search }}</strong>
                @else
                    Menampilkan beberapa game dengan rating tinggi.
                @endif
            </div>
        @endif

        @if (!$error && count($games) === 0)
            <div class="empty-box">
                Tidak ada game yang ditemukan.
            </div>
        @endif

        @if (!$error && count($games) > 0)
            <div class="games-grid">
                @foreach ($games as $game)
                    @php
                        $genres = collect($game['genres'] ?? [])->pluck('name')->take(3)->join(', ');
                        $platforms = collect($game['platforms'] ?? [])->pluck('platform.name')->take(3)->join(', ');
                    @endphp

                    <div class="game-card">
                        @if (!empty($game['background_image']))
                            <img src="{{ $game['background_image'] }}" alt="{{ $game['name'] ?? 'Game Image' }}">
                        @else
                            <div class="image-placeholder">No Image</div>
                        @endif

                        <div class="game-body">
                            <div class="game-title">{{ $game['name'] ?? 'Unknown Game' }}</div>

                            <div class="game-info">
                                Rating: {{ $game['rating'] ?? '-' }}
                            </div>

                            <div class="game-info">
                                Rilis: {{ $game['released'] ?? '-' }}
                            </div>

                            <div class="game-info">
                                Platform: {{ $platforms ?: '-' }}
                            </div>

                            <div class="badge-row">
                                @if ($genres)
                                    @foreach (explode(', ', $genres) as $genre)
                                        <span class="badge">{{ $genre }}</span>
                                    @endforeach
                                @else
                                    <span class="badge">No Genre</span>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="#" class="detail-btn">Detail nanti</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="rawg-credit">
            Data game disediakan oleh <a href="https://rawg.io" target="_blank">RAWG</a>.
        </div>
    </div>

</body>
</html>