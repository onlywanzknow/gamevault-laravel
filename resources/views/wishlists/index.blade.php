<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Wishlist Saya - GameVault</title>

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
            overflow: hidden;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .form-grid > div {
            min-width: 0;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #d6defa;
            font-size: 14px;
        }

        input,
        select {
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

        input::placeholder {
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
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
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
            height: 140px;
            object-fit: cover;
            background: #0f1729;
        }

        .image-placeholder {
            height: 140px;
            background: #0f1729;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8892b0;
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

        .delete-btn {
            margin-top: 14px;
            width: 100%;
            padding: 10px;
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

        .back-link {
            display: inline-block;
            margin-top: 25px;
            color: #7aa2ff;
            text-decoration: none;
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
            Simpan daftar game yang ingin dimainkan atau dibeli.
            Untuk tahap ini, data game masih ditambahkan manual dulu sebelum terhubung ke RAWG API.
        </p>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="form-box">
            <h2>Tambah Game ke Wishlist</h2>

            <form action="{{ route('wishlist.store') }}" method="POST">
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

                    <div>
                        <label>Slug Game</label>
                        <input type="text" name="game_slug" placeholder="Contoh: grand-theft-auto-v">
                    </div>

                    <div>
                        <label>URL Gambar</label>
                        <input type="text" name="game_image" placeholder="Boleh dikosongkan dulu">
                    </div>

                    <div>
                        <label>Rating</label>
                        <input type="number" step="0.1" min="0" max="5" name="game_rating" placeholder="Contoh: 4.5">
                    </div>

                    <div>
                        <label>Tanggal Rilis</label>
                        <input type="date" name="game_released">
                    </div>

                    <div>
                        <label>Status</label>
                        <select name="status" required>
                            <option value="Ingin dimainkan">Ingin dimainkan</option>
                            <option value="Sedang dimainkan">Sedang dimainkan</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Favorit">Favorit</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Tambah ke Wishlist</button>
            </form>
        </div>

        @if ($wishlists->isEmpty())
            <div class="empty-box">
                Belum ada game di wishlist. Coba tambahkan satu game lewat form di atas.
            </div>
        @else
            <div class="grid">
                @foreach ($wishlists as $item)
                    <div class="card">
                        @if ($item->game_image)
                            <img src="{{ $item->game_image }}" alt="{{ $item->game_name }}">
                        @else
                            <div class="image-placeholder">No Image</div>
                        @endif

                        <div class="card-body">
                            <div class="game-title">{{ $item->game_name }}</div>
                            <div class="game-info">Rating: {{ $item->game_rating ?? '-' }}</div>
                            <div class="game-info">Rilis: {{ $item->game_released ?? '-' }}</div>
                            <span class="status">{{ $item->status }}</span>

                            <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-btn" onclick="return confirm('Hapus game ini dari wishlist?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <a href="{{ route('dashboard') }}" class="back-link">Kembali ke Dashboard</a>
    </div>

</body>
</html>