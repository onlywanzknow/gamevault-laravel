<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GameVault - Katalog Game Favorit</title>

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
            margin-left: 18px;
            font-size: 15px;
        }

        .nav-links a:hover {
            color: #7aa2ff;
        }

        .logout-form {
            display: inline;
        }

        .logout-btn {
            margin-left: 18px;
            padding: 9px 14px;
            border-radius: 10px;
            border: none;
            background: #d9534f;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .hero {
            min-height: 75vh;
            padding: 70px 8%;
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 40px;
            align-items: center;
        }

        .hero h1 {
            font-size: 52px;
            margin-top: 0;
            margin-bottom: 18px;
            line-height: 1.1;
        }

        .hero p {
            color: #c5cce0;
            font-size: 18px;
            line-height: 1.7;
            max-width: 660px;
        }

        .button-group {
            margin-top: 32px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            display: inline-block;
            padding: 14px 22px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;
        }

        .btn-primary {
            background: #4169e1;
            color: white;
        }

        .btn-primary:hover {
            background: #3158c9;
        }

        .btn-secondary {
            background: #1d263b;
            color: #d6defa;
            border: 1px solid #34405e;
        }

        .btn-secondary:hover {
            background: #26334f;
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

        .preview-item {
            background: #0f1729;
            border: 1px solid #25304a;
            padding: 16px;
            border-radius: 14px;
            margin-top: 14px;
        }

        .preview-title {
            font-weight: bold;
            margin-bottom: 6px;
            color: #7aa2ff;
        }

        .preview-info {
            color: #aeb8d4;
            font-size: 14px;
            line-height: 1.5;
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
            margin-bottom: 0;
        }

        .popular-section {
            padding: 55px 8%;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 24px;
        }

        .section-header h2 {
            margin: 0;
            font-size: 32px;
        }

        .section-header p {
            margin: 8px 0 0 0;
            color: #c5cce0;
            line-height: 1.6;
        }

        .section-header a {
            color: #7aa2ff;
            text-decoration: none;
            font-weight: bold;
        }

        .alert-error {
            background: #3a1d1d;
            border: 1px solid #914646;
            padding: 14px;
            border-radius: 10px;
            color: #ffdada;
            margin-bottom: 22px;
        }

        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
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
            height: 145px;
            object-fit: cover;
            background: #0f1729;
        }

        .image-placeholder {
            height: 145px;
            background: #0f1729;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #8892b0;
        }

        .game-body {
            padding: 16px;
            flex: 1;
        }

        .game-title {
            font-weight: bold;
            font-size: 17px;
            margin-bottom: 8px;
        }

        .game-info {
            color: #aeb8d4;
            font-size: 14px;
            margin-bottom: 6px;
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
            background: #26334f;
        }

        .empty-box {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 24px;
            color: #c5cce0;
        }

        .project-note {
            padding: 50px 8%;
            background: #0b1020;
        }

        .note-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 24px;
            color: #c5cce0;
            line-height: 1.7;
        }

        .note-card strong {
            color: white;
        }

        .rawg-credit {
            padding: 24px 8%;
            text-align: center;
            color: #8892b0;
            background: #0b1020;
            border-top: 1px solid #1f2a44;
            font-size: 14px;
        }

        .rawg-credit a {
            color: #7aa2ff;
        }

        @media (max-width: 900px) {
            .hero {
                grid-template-columns: 1fr;
                padding-top: 45px;
            }

            .hero h1 {
                font-size: 38px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .section-header {
                flex-direction: column;
                align-items: start;
            }

            .navbar {
                flex-direction: column;
                gap: 12px;
                text-align: center;
            }

            .nav-links a {
                display: inline-block;
                margin: 5px 8px;
            }

            .logout-btn {
                margin-left: 0;
                margin-top: 8px;
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

            @auth
                <a href="{{ route('wishlist.index') }}">Wishlist</a>
                <a href="{{ route('forum.index') }}">Forum</a>
                <a href="{{ route('dashboard') }}">Dashboard</a>

                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <section class="hero">
        <div>
            <h1>Cari game favorit, simpan ke wishlist, lalu diskusi bareng.</h1>

            <p>
                GameVault adalah aplikasi katalog game berbasis Laravel.
                Pengguna dapat mencari informasi game dari RAWG API, melihat detail game,
                menyimpan game ke wishlist pribadi, dan ikut berdiskusi di halaman game.
            </p>

            <div class="button-group">
                <a href="{{ route('games.index') }}" class="btn btn-primary">Mulai Cari Game</a>

                @auth
                    <a href="{{ route('wishlist.index') }}" class="btn btn-secondary">Buka Wishlist</a>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-secondary">Buat Akun</a>
                @endauth
            </div>
        </div>

        <div class="preview-card">
            <h2>Fitur Utama</h2>

            <div class="preview-item">
                <div class="preview-title">Katalog Game</div>
                <div class="preview-info">
                    Menampilkan game dari RAWG API lengkap dengan rating, genre, platform, dan tanggal rilis.
                </div>
            </div>

            <div class="preview-item">
                <div class="preview-title">Wishlist Pribadi</div>
                <div class="preview-info">
                    User bisa menyimpan game yang ingin dimainkan, sedang dimainkan, selesai, atau favorit.
                </div>
            </div>

            <div class="preview-item">
                <div class="preview-title">Forum Per-Game</div>
                <div class="preview-info">
                    Setiap game memiliki ruang komentar sendiri sehingga diskusi tidak tercampur.
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="feature-box">
            <h3>Detail Game</h3>
            <p>
                Pengguna dapat melihat deskripsi, developer, publisher, rating,
                platform, dan screenshot game.
            </p>
        </div>

        <div class="feature-box">
            <h3>Spesifikasi PC</h3>
            <p>
                Jika tersedia dari API, halaman detail menampilkan spesifikasi minimum
                dan recommended untuk game tertentu.
            </p>
        </div>

        <div class="feature-box">
            <h3>Dashboard User</h3>
            <p>
                Dashboard menampilkan total wishlist, total komentar, game favorit,
                dan aktivitas terbaru user.
            </p>
        </div>
    </section>

    <section class="popular-section">
        <div class="section-header">
            <div>
                <h2>Game Populer</h2>
                <p>
                    Beberapa game dari RAWG API yang bisa langsung dibuka detailnya.
                </p>
            </div>

            <a href="{{ route('games.index') }}">Lihat Semua →</a>
        </div>

        @if ($error)
            <div class="alert-error">
                {{ $error }}
            </div>
        @endif

        @if (!$error && $popularGames->isEmpty())
            <div class="empty-box">
                Data game belum tersedia. Pastikan RAWG_API_KEY sudah diisi di file .env.
            </div>
        @endif

        @if (!$error && $popularGames->isNotEmpty())
            <div class="games-grid">
                @foreach ($popularGames as $game)
                    @php
                        $genres = collect($game['genres'] ?? [])->pluck('name')->take(2)->join(', ');
                        $platforms = collect($game['platforms'] ?? [])->pluck('platform.name')->take(2)->join(', ');
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
                            <a href="{{ route('games.show', $game['id']) }}" class="detail-btn">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <section class="project-note">
        <div class="note-card">
            <strong>GameVault</strong> dibuat sebagai project besar Pemrograman Web Lanjut
            menggunakan Laravel, PHP, SQLite, Blade, dan RAWG API.
            Data game berasal dari API, sedangkan data user, wishlist, dan komentar
            disimpan di database lokal aplikasi.
        </div>
    </section>

    <footer class="rawg-credit">
        Data game disediakan oleh <a href="https://rawg.io" target="_blank">RAWG</a>.
        GameVault - Project Besar Pemrograman Web Lanjut.
    </footer>

</body>
</html>