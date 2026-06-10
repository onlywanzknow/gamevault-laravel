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
            margin-left: 18px;
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

        .container {
            padding: 50px 8%;
        }

        .success {
            background: #12351f;
            border: 1px solid #2f8f4e;
            padding: 12px;
            border-radius: 10px;
            color: #b9ffd0;
            margin-bottom: 18px;
        }

        .hero-card {
            background: #151d31;
            border: 1px solid #293552;
            padding: 28px;
            border-radius: 20px;
            margin-bottom: 25px;
        }

        .hero-card h1 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .hero-card p {
            color: #c5cce0;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 22px;
        }

        .stat-label {
            color: #aeb8d4;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: #7aa2ff;
        }

        .quick-links {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .quick-card {
            background: #151d31;
            border: 1px solid #293552;
            padding: 22px;
            border-radius: 18px;
            text-decoration: none;
            color: white;
            display: block;
        }

        .quick-card:hover {
            border-color: #4169e1;
        }

        .quick-card h3 {
            margin-top: 0;
            color: #7aa2ff;
        }

        .quick-card p {
            color: #c5cce0;
            line-height: 1.5;
            margin-bottom: 0;
        }

        .section-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .section-card {
            background: #151d31;
            border: 1px solid #293552;
            padding: 24px;
            border-radius: 18px;
        }

        .section-card h2 {
            margin-top: 0;
            margin-bottom: 18px;
        }

        .item-list {
            display: grid;
            gap: 12px;
        }

        .list-item {
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 14px;
            padding: 14px;
        }

        .item-title {
            color: white;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .item-meta {
            color: #aeb8d4;
            font-size: 13px;
            line-height: 1.5;
        }

        .empty-box {
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 14px;
            padding: 18px;
            color: #c5cce0;
        }

        .detail-link {
            display: inline-block;
            margin-top: 8px;
            color: #7aa2ff;
            text-decoration: none;
            font-size: 14px;
        }

        @media (max-width: 900px) {
            .stats-grid,
            .quick-links,
            .section-grid {
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

            .logout-btn {
                margin-left: 0;
                margin-top: 8px;
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

        <div class="hero-card">
            <h1>Halo, {{ auth()->user()->name }}</h1>

            <p>
                Ini dashboard GameVault kamu. Dari sini kamu bisa melihat ringkasan wishlist,
                komentar forum, dan membuka fitur utama project.
            </p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Wishlist</div>
                <div class="stat-number">{{ $wishlistCount }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Total Komentar</div>
                <div class="stat-number">{{ $commentCount }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Game Favorit</div>
                <div class="stat-number">{{ $favoriteCount }}</div>
            </div>
        </div>

        <div class="quick-links">
            <a href="{{ route('games.index') }}" class="quick-card">
                <h3>Cari Game</h3>
                <p>Cari game dari RAWG API berdasarkan nama game yang ingin kamu lihat.</p>
            </a>

            <a href="{{ route('wishlist.index') }}" class="quick-card">
                <h3>Wishlist</h3>
                <p>Lihat daftar game yang sudah kamu simpan dan ubah statusnya.</p>
            </a>

            <a href="{{ route('forum.index') }}" class="quick-card">
                <h3>Forum</h3>
                <p>Lihat komentar komunitas dari berbagai game yang sudah dibahas.</p>
            </a>
        </div>

        <div class="section-grid">
            <div class="section-card">
                <h2>Wishlist Terbaru</h2>

                @if ($recentWishlists->isEmpty())
                    <div class="empty-box">
                        Belum ada game di wishlist. Coba cari game lalu tambahkan ke wishlist.
                    </div>
                @else
                    <div class="item-list">
                        @foreach ($recentWishlists as $wishlist)
                            <div class="list-item">
                                <div class="item-title">{{ $wishlist->game_name }}</div>

                                <div class="item-meta">
                                    Status: {{ $wishlist->status }} <br>
                                    Rating: {{ $wishlist->game_rating ?? '-' }} |
                                    Rilis: {{ $wishlist->game_released ?? '-' }}
                                </div>

                                <a href="{{ route('games.show', $wishlist->rawg_game_id) }}" class="detail-link">
                                    Lihat Detail
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="section-card">
                <h2>Komentar Terbaru</h2>

                @if ($recentComments->isEmpty())
                    <div class="empty-box">
                        Belum ada komentar. Kamu bisa menulis komentar di halaman detail game.
                    </div>
                @else
                    <div class="item-list">
                        @foreach ($recentComments as $comment)
                            <div class="list-item">
                                <div class="item-title">{{ $comment->game_name }}</div>

                                <div class="item-meta">
                                    {{ $comment->created_at->format('d M Y H:i') }}
                                </div>

                                <div class="item-meta" style="margin-top: 6px;">
                                    {{ \Illuminate\Support\Str::limit($comment->comment, 110) }}
                                </div>

                                <a href="{{ route('games.show', $comment->rawg_game_id) }}" class="detail-link">
                                    Buka Diskusi
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

</body>
</html>