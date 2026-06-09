<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Forum Game - GameVault</title>

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

        h1 {
            margin-bottom: 10px;
        }

        .subtitle {
            color: #c5cce0;
            line-height: 1.6;
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

        .form-box {
            margin-top: 30px;
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 24px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #d6defa;
            font-size: 14px;
        }

        input,
        textarea {
            width: 100%;
            max-width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #34405e;
            background: #0f1729;
            color: white;
            display: block;
            font-size: 14px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
            margin-top: 6px;
        }

        input::placeholder,
        textarea::placeholder {
            color: #7d869c;
        }

        .submit-btn {
            margin-top: 18px;
            padding: 12px 18px;
            border-radius: 10px;
            border: none;
            background: #4169e1;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #3158c9;
        }

        .comment-list {
            margin-top: 35px;
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
            font-size: 18px;
        }

        .meta {
            color: #aeb8d4;
            font-size: 13px;
            margin-top: 4px;
        }

        .comment-text {
            color: #e6ebff;
            line-height: 1.6;
            white-space: pre-line;
        }

        .delete-btn {
            padding: 8px 12px;
            border-radius: 10px;
            border: none;
            background: #d9534f;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #c13f3b;
        }

        .empty-box {
            margin-top: 30px;
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 28px;
            color: #c5cce0;
        }

        @media (max-width: 700px) {
            .form-grid {
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

            .comment-header {
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
            <a href="{{ route('wishlist.index') }}">Wishlist</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
    </nav>

    <div class="container">
        <h1>Forum Game</h1>

        <p class="subtitle">
            Tulis komentar atau pendapat tentang game tertentu. Untuk tahap ini,
            komentar masih memakai ID game manual sebelum nanti disambungkan ke halaman detail RAWG API.
        </p>

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

        <div class="form-box">
            <h2>Tulis Komentar Game</h2>

            <form action="{{ route('forum.store') }}" method="POST">
                @csrf

                <div class="form-grid">
                    <div>
                        <label>ID Game RAWG / ID Sementara</label>
                        <input type="number" name="rawg_game_id" placeholder="Contoh: 3498" required>
                    </div>

                    <div>
                        <label>Nama Game</label>
                        <input type="text" name="game_name" placeholder="Contoh: GTA V" required>
                    </div>
                </div>

                <label style="margin-top: 18px;">Komentar</label>
                <textarea name="comment" placeholder="Tulis pendapat kamu tentang game ini..." required></textarea>

                <button type="submit" class="submit-btn">Kirim Komentar</button>
            </form>
        </div>

        @if ($comments->isEmpty())
            <div class="empty-box">
                Belum ada komentar. Coba tulis komentar pertama untuk salah satu game.
            </div>
        @else
            <div class="comment-list">
                @foreach ($comments as $comment)
                    <div class="comment-card">
                        <div class="comment-header">
                            <div>
                                <div class="game-name">{{ $comment->game_name }}</div>
                                <div class="meta">
                                    ID Game: {{ $comment->rawg_game_id }} |
                                    Oleh: {{ $comment->user->name ?? 'User' }} |
                                    {{ $comment->created_at->format('d M Y H:i') }}
                                </div>
                            </div>

                            @if ($comment->user_id === auth()->id())
                                <form action="{{ route('forum.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="delete-btn" onclick="return confirm('Hapus komentar ini?')">
                                        Hapus
                                    </button>
                                </form>
                            @endif
                        </div>

                        <div class="comment-text">{{ $comment->comment }}</div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>