<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GameVault - Katalog Game dan Wishlist</title>

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

        .navbar-links {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .navbar a {
            color: #d6defa;
            text-decoration: none;
        }

        .navbar a:hover {
            color: white;
        }

        .logout-form {
            margin: 0;
        }

        .logout-btn {
            padding: 9px 13px;
            border-radius: 9px;
            border: 1px solid #914646;
            background: #3a1d1d;
            color: #ffdada;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #552626;
        }

        .container {
            padding: 55px 8%;
        }

        .hero {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 30px;
            align-items: center;
            background:
                linear-gradient(135deg, rgba(65, 105, 225, 0.22), rgba(21, 29, 49, 0.96)),
                #151d31;
            border: 1px solid #293552;
            border-radius: 28px;
            padding: 38px;
        }

        .hero-badge {
            display: inline-block;
            padding: 8px 13px;
            border-radius: 999px;
            background: #1d263b;
            border: 1px solid #34405e;
            color: #d6defa;
            font-size: 14px;
            margin-bottom: 16px;
        }

        .hero h1 {
            margin: 0;
            font-size: 48px;
            line-height: 1.15;
        }

        .hero h1 span {
            color: #7aa2ff;
        }

        .hero p {
            margin-top: 18px;
            color: #c5cce0;
            line-height: 1.8;
            font-size: 16px;
        }

        .hero-actions {
            margin-top: 26px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .primary-btn,
        .secondary-btn {
            display: inline-block;
            padding: 13px 19px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
        }

        .primary-btn {
            background: #4169e1;
            color: white;
        }

        .primary-btn:hover {
            background: #3158c9;
        }

        .secondary-btn {
            background: #1d263b;
            color: #d6defa;
            border: 1px solid #34405e;
        }

        .secondary-btn:hover {
            background: #26334f;
        }

        .hero-panel {
            background: rgba(15, 23, 41, 0.85);
            border: 1px solid #34405e;
            border-radius: 22px;
            padding: 22px;
        }

        .hero-panel-title {
            color: #7aa2ff;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 14px;
        }

        .hero-panel-item {
            background: #101624;
            border: 1px solid #293552;
            border-radius: 14px;
            padding: 14px;
            margin-top: 10px;
            color: #c5cce0;
            line-height: 1.5;
        }

        .hero-panel-item strong {
            color: white;
        }

        .stats-grid {
            margin-top: 28px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .stat-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 20px;
        }

        .stat-label {
            color: #aeb8d4;
            font-size: 14px;
            margin-bottom: 9px;
        }

        .stat-number {
            color: #7aa2ff;
            font-size: 34px;
            font-weight: bold;
        }

        .section-header {
            margin-top: 48px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 16px;
        }

        .section-header h2 {
            margin: 0;
            font-size: 30px;
        }

        .section-header p {
            margin: 8px 0 0 0;
            color: #c5cce0;
            line-height: 1.6;
        }

        .section-link {
            color: #7aa2ff;
            text-decoration: none;
            font-weight: bold;
            white-space: nowrap;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .feature-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 22px;
        }

        .feature-icon {
        width: 54px;
        height: 54px;
        border-radius: 16px;
        background: #838a9aff;
        border: 1px solid #34405e;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
        }

        .feature-icon img {
        width: 32px;
        height: 32px;
        object-fit: contain;
        }

        .feature-card h3 {
            margin: 0 0 9px 0;
        }

        .feature-card p {
            margin: 0;
            color: #c5cce0;
            line-height: 1.6;
        }

        .alert-error {
            background: #3a1d1d;
            border: 1px solid #914646;
            padding: 14px;
            border-radius: 10px;
            color: #ffdada;
            margin-bottom: 18px;
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
            line-height: 1.4;
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
            background: #26334f;
        }

        .community-grid {
            display: grid;
            grid-template-columns: 0.8fr 1.2fr;
            gap: 22px;
            align-items: start;
        }

        .community-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 20px;
            padding: 24px;
        }

        .community-card h3 {
            margin-top: 0;
            font-size: 24px;
        }

        .community-card p {
            color: #c5cce0;
            line-height: 1.7;
        }

        .comment-list {
            display: grid;
            gap: 14px;
        }

        .comment-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 16px;
            padding: 17px;
        }

        .comment-game {
            color: #7aa2ff;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .comment-meta {
            color: #aeb8d4;
            font-size: 13px;
            margin-bottom: 9px;
        }

        .comment-text {
            color: #e6ebff;
            line-height: 1.6;
            font-size: 14px;
        }

        .empty-box {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 24px;
            color: #c5cce0;
            line-height: 1.6;
        }

        .footer {
            margin-top: 55px;
            padding-top: 24px;
            border-top: 1px solid #293552;
            color: #8892b0;
            line-height: 1.6;
            font-size: 14px;
        }

        .footer a {
            color: #7aa2ff;
        }

        @media (max-width: 1050px) {
            .hero,
            .community-grid {
                grid-template-columns: 1fr;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 700px) {
            .navbar {
                flex-direction: column;
                gap: 14px;
                text-align: center;
            }

            .navbar-links {
                justify-content: center;
            }

            .container {
                padding: 35px 6%;
            }

            .hero {
                padding: 26px;
            }

            .hero h1 {
                font-size: 34px;
            }

            .hero-actions {
                display: grid;
            }

            .primary-btn,
            .secondary-btn {
                text-align: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .section-header {
                flex-direction: column;
                align-items: start;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">GameVault</div>

        <div class="navbar-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('games.index') }}">Cari Game</a>

            @auth
                <a href="{{ route('wishlist.index') }}">Wishlist</a>
                <a href="{{ route('forum.index') }}">Forum</a>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('profile.edit') }}">Profile</a>

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

    <div class="container">
        <section class="hero">
            <div>
                <div class="hero-badge">Game catalog, wishlist, dan forum komunitas</div>

                <h1>
                    Simpan game favoritmu di <span>GameVault</span>.
                </h1>

                <p>
                    GameVault membantu kamu mencari informasi game, melihat detail dari RAWG API,
                    menyimpan game ke wishlist pribadi, mengatur status game, dan berdiskusi dengan user lain.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('games.index') }}" class="primary-btn">Mulai Cari Game</a>

                    @auth
                        <a href="{{ route('dashboard') }}" class="secondary-btn">Buka Dashboard</a>
                    @else
                        <a href="{{ route('register') }}" class="secondary-btn">Buat Akun</a>
                    @endauth
                </div>
            </div>

            <div class="hero-panel">
                <div class="hero-panel-title">Yang bisa dilakukan</div>

                <div class="hero-panel-item">
                    <strong>1. Cari game</strong><br>
                    Temukan game berdasarkan nama, genre, platform, dan rating.
                </div>

                <div class="hero-panel-item">
                    <strong>2. Simpan wishlist</strong><br>
                    Simpan game yang ingin dimainkan, sedang dimainkan, selesai, atau favorit.
                </div>

                <div class="hero-panel-item">
                    <strong>3. Diskusi game</strong><br>
                    Tulis komentar pada halaman detail game dan lihat diskusi komunitas.
                </div>
            </div>
        </section>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">User Terdaftar</div>
                <div class="stat-number">{{ $userCount }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Game di Wishlist</div>
                <div class="stat-number">{{ $wishlistCount }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Komentar Forum</div>
                <div class="stat-number">{{ $commentCount }}</div>
            </div>
        </div>

        <div class="section-header">
            <div>
                <h2>Fitur Utama</h2>
                <p>Fitur yang dibuat untuk mendukung katalog game, wishlist user, dan komunitas diskusi.</p>
            </div>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                <img src="{{ asset('icons/console.png') }}" alt="Console Icon">
                </div>
                <h3>Katalog Game</h3>
                <p>
                    Menampilkan daftar game dari RAWG API lengkap dengan rating, genre,
                    platform, tanggal rilis, screenshot, dan detail game.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                <img src="{{ asset('icons/wishlist.png') }}" alt="Wishlist Icon">
                </div>
                <h3>Wishlist Pribadi</h3>
                <p>
                    User dapat menyimpan game ke wishlist, mengubah status game,
                    memfilter wishlist, dan membuka detail game kembali.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                <img src="{{ asset('icons/chat.png') }}" alt="Chat Icon">
                </div>
                <h3>Forum Game</h3>
                <p>
                    Setiap game memiliki area diskusi sendiri, dan halaman forum utama
                    menampilkan aktivitas komentar komunitas.
                </p>
            </div>
        </div>

        <div class="section-header">
            <div>
                <h2>Game Populer</h2>
                <p>Beberapa game populer yang diambil langsung dari RAWG API.</p>
            </div>

            <a href="{{ route('games.index') }}" class="section-link">Lihat semua →</a>
        </div>

        @if ($error)
            <div class="alert-error">
                {{ $error }}
            </div>
        @elseif ($popularGames->isEmpty())
            <div class="empty-box">
                Data game populer belum bisa ditampilkan.
            </div>
        @else
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

        <div class="section-header">
            <div>
                <h2>Aktivitas Komunitas</h2>
                <p>Komentar terbaru dari user GameVault pada forum game.</p>
            </div>

            @auth
                <a href="{{ route('forum.index') }}" class="section-link">Buka forum →</a>
            @else
                <a href="{{ route('login') }}" class="section-link">Login untuk diskusi →</a>
            @endauth
        </div>

        <div class="community-grid">
            <div class="community-card">
                <h3>Forum per-game</h3>

                <p>
                    Setiap game di GameVault memiliki ruang diskusi sendiri.
                    User bisa membuka detail game, menulis komentar, lalu komentar tersebut akan tersimpan sesuai game yang dipilih.
                </p>

                <p>
                    Halaman forum utama menampilkan semua diskusi komunitas,
                    sehingga user bisa melihat game apa saja yang sedang dibahas.
                </p>

                <a href="{{ route('games.index') }}" class="primary-btn">
                    Cari Game untuk Diskusi
                </a>
            </div>

            <div>
                @if ($recentComments->isEmpty())
                    <div class="empty-box">
                        Belum ada komentar komunitas. Login, buka detail game, lalu mulai tulis komentar pertama.
                    </div>
                @else
                    <div class="comment-list">
                        @foreach ($recentComments as $comment)
                            <div class="comment-card">
                                <div class="comment-game">
                                    {{ $comment->game_name }}
                                </div>

                                <div class="comment-meta">
                                    Oleh {{ $comment->user->name ?? 'User' }} |
                                    {{ $comment->created_at->format('d M Y H:i') }}
                                </div>

                                <div class="comment-text">
                                    {{ $comment->comment }}
                                </div>

                                <div style="margin-top: 12px;">
                                    <a href="{{ route('games.show', $comment->rawg_game_id) }}" class="section-link">
                                        Buka detail game →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

       <div class="footer">
    <strong>GameVault</strong> dibuat sebagai project Pemrograman Web Lanjut.
    Data game disediakan oleh <a href="https://rawg.io" target="_blank">RAWG</a>.
    <br><br>

    Icon attribution:
    <a href="https://www.flaticon.com/free-icon/console_686589" target="_blank">
        Console icon created by Good Ware - Flaticon
    </a>,
    <a href="https://www.flaticon.com/free-icon/wishlist_4379561" target="_blank">
        Wishlist icon created by Pixel perfect - Flaticon
    </a>,
    <a href="https://www.flaticon.com/free-icon/chat_3820102" target="_blank">
        Chat icon created by Freepik - Flaticon
    </a>.
</div>

</body>
</html>