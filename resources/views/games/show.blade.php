<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Game - GameVault</title>

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

        .back-link {
            color: #7aa2ff;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 24px;
        }

        .alert-error {
            background: #3a1d1d;
            border: 1px solid #914646;
            padding: 14px;
            border-radius: 10px;
            color: #ffdada;
        }

        .alert-success {
            background: #12351f;
            border: 1px solid #2f8f4e;
            padding: 12px;
            border-radius: 10px;
            color: #b9ffd0;
            margin-bottom: 18px;
        }

        .detail-layout {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 28px;
            align-items: start;
        }

        .cover-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 20px;
            overflow: hidden;
        }

        .cover-card img {
            width: 100%;
            height: 340px;
            object-fit: cover;
            background: #0f1729;
        }

        .image-placeholder {
            height: 340px;
            background: #0f1729;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8892b0;
        }

        .info-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 20px;
            padding: 26px;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 38px;
        }

        .description {
            color: #c5cce0;
            line-height: 1.7;
            margin-top: 18px;
        }

        .meta-grid {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .meta-box {
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 14px;
            padding: 14px;
        }

        .meta-label {
            color: #8892b0;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .meta-value {
            color: white;
            font-weight: bold;
            line-height: 1.4;
        }

        .badge-row {
            margin-top: 18px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .badge {
            padding: 7px 11px;
            border-radius: 999px;
            background: #1d263b;
            border: 1px solid #34405e;
            color: #d6defa;
            font-size: 13px;
        }

        .wishlist-btn {
            margin-top: 22px;
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 12px;
            background: #4169e1;
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 15px;
        }

        .wishlist-btn:hover {
            background: #3158c9;
        }

        .login-note {
            margin-top: 22px;
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 14px;
            padding: 16px;
            color: #c5cce0;
        }

        .login-note a {
            color: #7aa2ff;
        }

        .section {
            margin-top: 34px;
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 20px;
            padding: 26px;
        }

        .section h2 {
            margin-top: 0;
        }

        .screenshot-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 16px;
        }

        .screenshot-grid img {
            width: 100%;
            height: 145px;
            object-fit: cover;
            border-radius: 14px;
            border: 1px solid #293552;
            background: #0f1729;
        }

        .requirements-list {
            display: grid;
            gap: 16px;
        }

        .requirement-card {
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 14px;
            padding: 16px;
        }

        .requirement-card h3 {
            margin-top: 0;
            color: #7aa2ff;
        }

        .requirement-text {
            color: #c5cce0;
            white-space: pre-line;
            line-height: 1.6;
            font-size: 14px;
        }

        .empty-box {
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 14px;
            padding: 18px;
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

        @media (max-width: 900px) {
            .detail-layout {
                grid-template-columns: 1fr;
            }

            .meta-grid {
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

            .container {
                padding: 35px 6%;
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
        <a href="{{ route('games.index') }}" class="back-link">← Kembali ke daftar game</a>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error" style="margin-bottom: 18px;">
                @foreach ($errors->all() as $errorMessage)
                    <div>{{ $errorMessage }}</div>
                @endforeach
            </div>
        @endif

        @if ($error)
            <div class="alert-error">
                {{ $error }}
            </div>
        @elseif (!$game)
            <div class="alert-error">
                Data game tidak ditemukan.
            </div>
        @else
            @php
                $genres = collect($game['genres'] ?? [])->pluck('name')->join(', ');
                $platforms = collect($game['platforms'] ?? [])->pluck('platform.name')->take(6)->join(', ');
                $developers = collect($game['developers'] ?? [])->pluck('name')->join(', ');
                $publishers = collect($game['publishers'] ?? [])->pluck('name')->join(', ');
                $description = trim(strip_tags($game['description'] ?? ''));

                $platformRequirements = collect($game['platforms'] ?? [])
                    ->map(function ($item) {
                        return [
                            'platform' => data_get($item, 'platform.name'),
                            'minimum' => data_get($item, 'requirements_en.minimum'),
                            'recommended' => data_get($item, 'requirements_en.recommended'),
                        ];
                    })
                    ->filter(function ($item) {
                        return !empty($item['minimum']) || !empty($item['recommended']);
                    })
                    ->values();
            @endphp

            <div class="detail-layout">
                <div class="cover-card">
                    @if (!empty($game['background_image']))
                        <img src="{{ $game['background_image'] }}" alt="{{ $game['name'] ?? 'Game Image' }}">
                    @else
                        <div class="image-placeholder">No Image</div>
                    @endif
                </div>

                <div class="info-card">
                    <h1>{{ $game['name'] ?? 'Unknown Game' }}</h1>

                    <div class="badge-row">
                        @if ($genres)
                            @foreach (explode(', ', $genres) as $genre)
                                <span class="badge">{{ $genre }}</span>
                            @endforeach
                        @else
                            <span class="badge">No Genre</span>
                        @endif
                    </div>

                    <div class="meta-grid">
                        <div class="meta-box">
                            <div class="meta-label">Rating</div>
                            <div class="meta-value">{{ $game['rating'] ?? '-' }}</div>
                        </div>

                        <div class="meta-box">
                            <div class="meta-label">Tanggal Rilis</div>
                            <div class="meta-value">{{ $game['released'] ?? '-' }}</div>
                        </div>

                        <div class="meta-box">
                            <div class="meta-label">Platform</div>
                            <div class="meta-value">{{ $platforms ?: '-' }}</div>
                        </div>

                        <div class="meta-box">
                            <div class="meta-label">Metacritic</div>
                            <div class="meta-value">{{ $game['metacritic'] ?? '-' }}</div>
                        </div>

                        <div class="meta-box">
                            <div class="meta-label">Developer</div>
                            <div class="meta-value">{{ $developers ?: '-' }}</div>
                        </div>

                        <div class="meta-box">
                            <div class="meta-label">Publisher</div>
                            <div class="meta-value">{{ $publishers ?: '-' }}</div>
                        </div>
                    </div>

                    <div class="description">
                        {{ $description ?: 'Deskripsi game belum tersedia.' }}
                    </div>

                    @auth
                        <form action="{{ route('wishlist.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="rawg_game_id" value="{{ $game['id'] }}">
                            <input type="hidden" name="game_name" value="{{ $game['name'] ?? 'Unknown Game' }}">
                            <input type="hidden" name="game_slug" value="{{ $game['slug'] ?? '' }}">
                            <input type="hidden" name="game_image" value="{{ $game['background_image'] ?? '' }}">
                            <input type="hidden" name="game_rating" value="{{ $game['rating'] ?? '' }}">
                            <input type="hidden" name="game_released" value="{{ $game['released'] ?? '' }}">
                            <input type="hidden" name="status" value="Ingin dimainkan">

                            <button type="submit" class="wishlist-btn">
                                Tambah ke Wishlist
                            </button>
                        </form>
                    @else
                        <div class="login-note">
                            Login dulu untuk menyimpan game ini ke wishlist.
                            <a href="{{ route('login') }}">Login sekarang</a>
                        </div>
                    @endauth
                </div>
            </div>

            <div class="section">
                <h2>Screenshot Game</h2>

                @if (count($screenshots) > 0)
                    <div class="screenshot-grid">
                        @foreach ($screenshots as $screenshot)
                            @if (!empty($screenshot['image']))
                                <img src="{{ $screenshot['image'] }}" alt="Screenshot {{ $game['name'] ?? 'Game' }}">
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="empty-box">
                        Screenshot belum tersedia dari API.
                    </div>
                @endif
            </div>

            <div class="section">
                <h2>Spesifikasi Minimum / Recommended</h2>

                @if ($platformRequirements->isEmpty())
                    <div class="empty-box">
                        Spesifikasi minimum belum tersedia untuk game ini dari RAWG API.
                    </div>
                @else
                    <div class="requirements-list">
                        @foreach ($platformRequirements as $requirement)
                            <div class="requirement-card">
                                <h3>{{ $requirement['platform'] ?? 'Platform' }}</h3>

                                @if (!empty($requirement['minimum']))
                                    <strong>Minimum:</strong>
                                    <div class="requirement-text">{{ $requirement['minimum'] }}</div>
                                @endif

                                @if (!empty($requirement['recommended']))
                                    <br>
                                    <strong>Recommended:</strong>
                                    <div class="requirement-text">{{ $requirement['recommended'] }}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="rawg-credit">
                Data game disediakan oleh <a href="https://rawg.io" target="_blank">RAWG</a>.
            </div>
        @endif
    </div>

</body>
</html>