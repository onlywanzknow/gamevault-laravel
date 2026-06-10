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
            padding: 50px 8%;
        }

        .alert-success {
            background: #12351f;
            border: 1px solid #2f8f4e;
            padding: 12px;
            border-radius: 10px;
            color: #b9ffd0;
            margin-bottom: 20px;
        }

        .hero {
            background:
                linear-gradient(135deg, rgba(65, 105, 225, 0.22), rgba(21, 29, 49, 0.95)),
                #151d31;
            border: 1px solid #293552;
            border-radius: 24px;
            padding: 30px;
            display: grid;
            grid-template-columns: 1.4fr 0.8fr;
            gap: 24px;
            align-items: center;
        }

        .hero h1 {
            margin: 0 0 12px 0;
            font-size: 38px;
        }

        .hero p {
            color: #c5cce0;
            line-height: 1.7;
            margin: 0;
        }

        .profile-card {
            background: rgba(15, 23, 41, 0.8);
            border: 1px solid #34405e;
            border-radius: 18px;
            padding: 20px;
        }

        .profile-title {
            color: #7aa2ff;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 14px;
        }

        .profile-row {
            margin-bottom: 10px;
            color: #c5cce0;
            line-height: 1.5;
        }

        .profile-row strong {
            color: white;
        }

        .quick-actions {
            margin-top: 24px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .primary-link,
        .secondary-link,
        .danger-link {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .primary-link {
            background: #4169e1;
            color: white;
        }

        .secondary-link {
            background: #1d263b;
            color: #d6defa;
            border: 1px solid #34405e;
        }

        .danger-link {
            background: #3a1d1d;
            color: #ffdada;
            border: 1px solid #914646;
        }

        .stats-grid {
            margin-top: 28px;
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 14px;
        }

        .stat-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 16px;
            padding: 18px;
        }

        .stat-label {
            color: #aeb8d4;
            font-size: 13px;
            margin-bottom: 8px;
            min-height: 32px;
        }

        .stat-number {
            color: #7aa2ff;
            font-size: 30px;
            font-weight: bold;
        }

        .content-grid {
            margin-top: 28px;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 22px;
            align-items: start;
        }

        .panel {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 20px;
            padding: 22px;
        }

        .panel h2 {
            margin-top: 0;
            margin-bottom: 14px;
        }

        .progress-box {
            margin-top: 12px;
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 16px;
            padding: 18px;
        }

        .progress-title {
            color: #d6defa;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .progress-desc {
            color: #aeb8d4;
            line-height: 1.6;
            margin-bottom: 14px;
        }

        .progress-track {
            width: 100%;
            height: 16px;
            border-radius: 999px;
            background: #1d263b;
            overflow: hidden;
            border: 1px solid #34405e;
        }

        .progress-fill {
            height: 100%;
            width: {{ $progressPercent }}%;
            background: linear-gradient(90deg, #4169e1, #7aa2ff);
        }

        .progress-percent {
            margin-top: 10px;
            color: #7aa2ff;
            font-weight: bold;
        }

        .status-list {
            margin-top: 18px;
            display: grid;
            gap: 10px;
        }

        .status-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 12px;
            padding: 12px;
            color: #c5cce0;
        }

        .status-row strong {
            color: white;
        }

        .activity-list {
            display: grid;
            gap: 14px;
        }

        .activity-card {
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 14px;
            padding: 14px;
        }

        .activity-title {
            color: white;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .activity-meta {
            color: #aeb8d4;
            font-size: 13px;
            line-height: 1.5;
        }

        .activity-text {
            margin-top: 8px;
            color: #d6defa;
            line-height: 1.6;
            font-size: 14px;
        }

        .activity-actions {
            margin-top: 10px;
        }

        .small-link {
            color: #7aa2ff;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .empty-box {
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 14px;
            padding: 18px;
            color: #c5cce0;
            line-height: 1.6;
        }

        .section-title {
            margin-top: 34px;
            margin-bottom: 0;
            font-size: 26px;
        }

        @media (max-width: 1150px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .hero,
            .content-grid {
                grid-template-columns: 1fr;
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

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 31px;
            }

            .quick-actions {
                display: grid;
            }

            .primary-link,
            .secondary-link,
            .danger-link {
                text-align: center;
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
            <a href="{{ route('wishlist.index') }}">Wishlist</a>
            <a href="{{ route('forum.index') }}">Forum</a>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="hero">
            <div>
                <h1>Halo, {{ $user->name }}.</h1>

                <p>
                    Ini adalah pusat aktivitas kamu di GameVault. Dari sini kamu bisa melihat ringkasan wishlist,
                    perkembangan game yang sudah selesai, komentar forum terbaru, dan membuka fitur utama dengan cepat.
                </p>

                <div class="quick-actions">
                    <a href="{{ route('games.index') }}" class="primary-link">Cari Game Baru</a>
                    <a href="{{ route('wishlist.index') }}" class="secondary-link">Kelola Wishlist</a>
                    <a href="{{ route('forum.index') }}" class="secondary-link">Buka Forum</a>
                </div>
            </div>

            <div class="profile-card">
                <div class="profile-title">Profil Akun</div>

                <div class="profile-row">
                    <strong>Nama:</strong><br>
                    {{ $user->name }}
                </div>

                <div class="profile-row">
                    <strong>Email:</strong><br>
                    {{ $user->email }}
                </div>

                <div class="profile-row">
                    <strong>Tanggal Daftar:</strong><br>
                    {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                </div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Wishlist</div>
                <div class="stat-number">{{ $wishlistCount }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Komentar Forum</div>
                <div class="stat-number">{{ $commentCount }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Favorit</div>
                <div class="stat-number">{{ $favoriteCount }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Selesai</div>
                <div class="stat-number">{{ $completedCount }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Sedang Dimainkan</div>
                <div class="stat-number">{{ $playingCount }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Ingin Dimainkan</div>
                <div class="stat-number">{{ $wantToPlayCount }}</div>
            </div>
        </div>

        <div class="content-grid">
            <div class="panel">
                <h2>Progress Wishlist</h2>

                <div class="progress-box">
                    <div class="progress-title">Game selesai dari wishlist</div>

                    <div class="progress-desc">
                        Progress dihitung dari jumlah game berstatus <strong>Selesai</strong>
                        dibandingkan dengan total game di wishlist kamu.
                    </div>

                    <div class="progress-track">
                        <div class="progress-fill"></div>
                    </div>

                    <div class="progress-percent">{{ $progressPercent }}% selesai</div>
                </div>

                <div class="status-list">
                    <div class="status-row">
                        <span>Ingin dimainkan</span>
                        <strong>{{ $wantToPlayCount }}</strong>
                    </div>

                    <div class="status-row">
                        <span>Sedang dimainkan</span>
                        <strong>{{ $playingCount }}</strong>
                    </div>

                    <div class="status-row">
                        <span>Selesai</span>
                        <strong>{{ $completedCount }}</strong>
                    </div>

                    <div class="status-row">
                        <span>Favorit</span>
                        <strong>{{ $favoriteCount }}</strong>
                    </div>
                </div>
            </div>

            <div class="panel">
                <h2>Wishlist Terbaru</h2>

                @if ($recentWishlists->isEmpty())
                    <div class="empty-box">
                        Kamu belum menambahkan game ke wishlist.
                        Buka halaman Cari Game untuk mulai menyimpan game favorit.
                    </div>
                @else
                    <div class="activity-list">
                        @foreach ($recentWishlists as $wishlist)
                            <div class="activity-card">
                                <div class="activity-title">{{ $wishlist->game_name }}</div>

                                <div class="activity-meta">
                                    Status: {{ $wishlist->status }} |
                                    Ditambahkan: {{ $wishlist->created_at->format('d M Y H:i') }}
                                </div>

                                <div class="activity-actions">
                                    <a href="{{ route('games.show', $wishlist->rawg_game_id) }}" class="small-link">
                                        Buka Detail Game
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <h2 class="section-title">Komentar Terbaru</h2>

        <div class="panel" style="margin-top: 18px;">
            @if ($recentComments->isEmpty())
                <div class="empty-box">
                    Kamu belum menulis komentar forum. Buka detail game lalu tulis komentar pada bagian Diskusi Game.
                </div>
            @else
                <div class="activity-list">
                    @foreach ($recentComments as $comment)
                        <div class="activity-card">
                            <div class="activity-title">{{ $comment->game_name }}</div>

                            <div class="activity-meta">
                                Ditulis: {{ $comment->created_at->format('d M Y H:i') }}
                            </div>

                            <div class="activity-text">
                                {{ $comment->comment }}
                            </div>

                            <div class="activity-actions">
                                <a href="{{ route('games.show', $comment->rawg_game_id) }}" class="small-link">
                                    Buka Diskusi Game
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</body>
</html>