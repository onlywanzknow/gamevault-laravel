<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Forum Komunitas - GameVault</title>

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
            margin-bottom: 10px;
            font-size: 38px;
        }

        .subtitle {
            color: #c5cce0;
            line-height: 1.6;
            max-width: 850px;
        }

        .alert-success {
            background: #12351f;
            border: 1px solid #2f8f4e;
            padding: 12px;
            border-radius: 10px;
            color: #b9ffd0;
            margin-bottom: 18px;
        }

        .alert-error {
            background: #3a1d1d;
            border: 1px solid #914646;
            padding: 12px;
            border-radius: 10px;
            color: #ffdada;
            margin-bottom: 18px;
        }

        .top-actions {
            margin-top: 25px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .primary-link {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 10px;
            background: #4169e1;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .secondary-link {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 10px;
            background: #1d263b;
            color: #d6defa;
            text-decoration: none;
            border: 1px solid #34405e;
            font-weight: bold;
        }

        .search-box {
            margin-top: 28px;
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 22px;
        }

        .search-form {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr auto;
            gap: 12px;
            align-items: end;
        }

        .form-group label {
            display: block;
            color: #d6defa;
            font-size: 14px;
            margin-bottom: 7px;
        }

        input,
        select {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            border: 1px solid #34405e;
            background: #0f1729;
            color: white;
            font-size: 15px;
        }

        input::placeholder {
            color: #7d869c;
        }

        .search-btn {
            padding: 13px 18px;
            border-radius: 10px;
            border: none;
            background: #4169e1;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .reset-link {
            display: inline-block;
            margin-top: 12px;
            color: #7aa2ff;
            text-decoration: none;
            font-size: 14px;
        }

        .summary-box {
            margin-top: 28px;
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 20px;
            color: #c5cce0;
            line-height: 1.6;
        }

        .comment-list {
            margin-top: 28px;
            display: grid;
            gap: 18px;
        }

        .comment-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 20px;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 12px;
        }

        .game-name {
            color: #7aa2ff;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 4px;
        }

        .meta {
            color: #aeb8d4;
            font-size: 13px;
            line-height: 1.5;
        }

        .comment-text {
            color: #e6ebff;
            line-height: 1.6;
            white-space: pre-line;
            margin-top: 12px;
        }

        .comment-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 16px;
        }

        .detail-btn {
            display: inline-block;
            padding: 10px 14px;
            border-radius: 10px;
            background: #1d263b;
            color: #d6defa;
            text-decoration: none;
            border: 1px solid #34405e;
            font-weight: bold;
            font-size: 14px;
        }

        .delete-btn {
            padding: 10px 14px;
            border-radius: 10px;
            border: none;
            background: #d9534f;
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
        }

        .empty-box {
            margin-top: 28px;
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 28px;
            color: #c5cce0;
            line-height: 1.6;
        }

        .pagination-box {
            margin-top: 28px;
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .page-info {
            color: #c5cce0;
            line-height: 1.6;
        }

        .page-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .page-btn {
            display: inline-block;
            padding: 11px 15px;
            border-radius: 10px;
            background: #1d263b;
            color: #d6defa;
            text-decoration: none;
            border: 1px solid #34405e;
            font-weight: bold;
        }

        .page-btn:hover {
            background: #26334f;
        }

        .page-btn.disabled {
            opacity: 0.45;
            pointer-events: none;
        }

        @media (max-width: 1050px) {
            .search-form {
                grid-template-columns: 1fr 1fr;
            }

            .search-btn {
                width: 100%;
            }
        }

        @media (max-width: 800px) {
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
                grid-template-columns: 1fr;
            }

            .comment-header {
                flex-direction: column;
            }

            .pagination-box {
                align-items: stretch;
            }

            .page-buttons {
                width: 100%;
            }

            .page-btn {
                flex: 1;
                text-align: center;
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
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('profile.edit') }}">Profile</a>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <h1>Forum Komunitas</h1>

        <p class="subtitle">
            Halaman ini menampilkan semua komentar dari pengguna GameVault.
            Untuk menulis komentar baru, buka halaman detail game lalu gunakan bagian Diskusi Game.
        </p>

        <div class="top-actions">
            <a href="{{ route('games.index') }}" class="primary-link">Cari Game untuk Diskusi</a>
            <a href="{{ route('dashboard') }}" class="secondary-link">Kembali ke Dashboard</a>
        </div>

        <div class="search-box">
            <form action="{{ route('forum.index') }}" method="GET" class="search-form">
                <div class="form-group">
                    <label>Cari Forum</label>
                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Cari berdasarkan nama game atau isi komentar"
                    >
                </div>

                <div class="form-group">
                    <label>Tampilkan</label>
                    <select name="scope">
                        @foreach ($scopeOptions as $value => $label)
                            <option value="{{ $value }}" {{ $selectedScope === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Urutkan</label>
                    <select name="sort">
                        @foreach ($sortOptions as $value => $label)
                            <option value="{{ $value }}" {{ $selectedSort === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="search-btn">Terapkan</button>
            </form>

            @if ($search || $selectedScope !== 'all' || $selectedSort !== 'latest')
                <a href="{{ route('forum.index') }}" class="reset-link">Reset forum</a>
            @endif
        </div>

        <div class="summary-box">
            @if ($search || $selectedScope !== 'all' || $selectedSort !== 'latest')
                Menampilkan <strong>{{ $comments->total() }}</strong> hasil forum

                @if ($selectedScope !== 'all')
                    dari <strong>{{ $scopeOptions[$selectedScope] ?? 'Komentar Saya' }}</strong>
                @endif

                @if ($search)
                    untuk pencarian <strong>{{ $search }}</strong>
                @endif

                dengan urutan <strong>{{ $sortOptions[$selectedSort] ?? 'Komentar Terbaru' }}</strong>.
            @else
                Total komentar forum saat ini: <strong>{{ $comments->total() }}</strong>.
            @endif
        </div>

        @if ($comments->total() === 0)
            <div class="empty-box">
                Belum ada komentar yang cocok. Buka halaman Cari Game, pilih salah satu game,
                lalu tulis komentar dari halaman detail game.
            </div>
        @else
            <div class="comment-list">
                @foreach ($comments as $comment)
                    <div class="comment-card">
                        <div class="comment-header">
                            <div>
                                <div class="game-name">{{ $comment->game_name }}</div>

                                <div class="meta">
                                    ID Game: {{ $comment->rawg_game_id }} <br>
                                    Oleh: {{ $comment->user->name ?? 'User' }} |
                                    {{ $comment->created_at->format('d M Y H:i') }}
                                </div>
                            </div>
                        </div>

                        <div class="comment-text">{{ $comment->comment }}</div>

                        <div class="comment-actions">
                            <a href="{{ route('games.show', $comment->rawg_game_id) }}" class="detail-btn">
                                Buka Detail Game
                            </a>

                            @if ($comment->user_id === auth()->id())
                                <form action="{{ route('forum.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="delete-btn" onclick="return confirm('Hapus komentar ini?')">
                                        Hapus Komentar
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($comments->hasPages())
                <div class="pagination-box">
                    <div class="page-info">
                        Halaman {{ $comments->currentPage() }} dari {{ $comments->lastPage() }}
                        <br>
                        Menampilkan {{ $comments->firstItem() }} - {{ $comments->lastItem() }}
                        dari {{ $comments->total() }} komentar
                    </div>

                    <div class="page-buttons">
                        @if ($comments->onFirstPage())
                            <span class="page-btn disabled">← Sebelumnya</span>
                        @else
                            <a href="{{ $comments->previousPageUrl() }}" class="page-btn">
                                ← Sebelumnya
                            </a>
                        @endif

                        @if ($comments->hasMorePages())
                            <a href="{{ $comments->nextPageUrl() }}" class="page-btn">
                                Berikutnya →
                            </a>
                        @else
                            <span class="page-btn disabled">Berikutnya →</span>
                        @endif
                    </div>
                </div>
            @endif
        @endif
    </div>

</body>
</html>