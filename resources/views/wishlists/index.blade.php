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

        .stats-grid {
            margin-top: 28px;
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 14px;
        }

        .stat-card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 16px;
            padding: 16px;
        }

        .stat-label {
            color: #aeb8d4;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .stat-number {
            color: #7aa2ff;
            font-size: 28px;
            font-weight: bold;
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

        .filter-box {
            margin-top: 28px;
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            padding: 22px;
        }

        .filter-form {
            display: grid;
            grid-template-columns: 1.4fr 1fr auto;
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
            max-width: 100%;
            padding: 13px;
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

        .filter-btn {
            padding: 13px 18px;
            border-radius: 10px;
            border: none;
            background: #4169e1;
            color: white;
            font-weight: bold;
            cursor: pointer;
            white-space: nowrap;
        }

        .reset-link {
            display: inline-block;
            margin-top: 12px;
            color: #7aa2ff;
            text-decoration: none;
            font-size: 14px;
        }

        .result-info {
            margin-top: 24px;
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
            line-height: 1.6;
        }

        .grid {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 22px;
        }

        .card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .card img {
            width: 100%;
            height: 155px;
            object-fit: cover;
            background: #0f1729;
        }

        .image-placeholder {
            height: 155px;
            background: #0f1729;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8892b0;
        }

        .card-body {
            padding: 16px;
            flex: 1;
        }

        .game-title {
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 18px;
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

        .status-form {
            margin-top: 14px;
        }

        .status-form label {
            display: block;
            margin-bottom: 6px;
            color: #d6defa;
            font-size: 14px;
        }

        .update-btn {
            margin-top: 10px;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: none;
            background: #4169e1;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .card-actions {
            padding: 0 16px 16px 16px;
            display: grid;
            gap: 10px;
        }

        .detail-btn {
            display: block;
            width: 100%;
            padding: 11px;
            border-radius: 10px;
            background: #1d263b;
            color: #d6defa;
            text-align: center;
            text-decoration: none;
            border: 1px solid #34405e;
            font-weight: bold;
        }

        .delete-btn {
            width: 100%;
            padding: 11px;
            border-radius: 10px;
            border: none;
            background: #d9534f;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .rawg-note {
            margin-top: 35px;
            color: #8892b0;
            font-size: 14px;
        }

        .rawg-note a {
            color: #7aa2ff;
        }

        @media (max-width: 1000px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .filter-form {
                grid-template-columns: 1fr;
            }

            .filter-btn {
                width: 100%;
            }
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

            .stats-grid {
                grid-template-columns: 1fr;
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
            <a href="{{ route('forum.index') }}">Forum</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
    </nav>

    <div class="container">
        <h1>Wishlist Saya</h1>

        <p class="subtitle">
            Daftar game yang kamu simpan dari halaman detail game. Kamu bisa mencari game,
            memfilter berdasarkan status, mengubah status, membuka detail, atau menghapus game dari wishlist.
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

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Wishlist</div>
                <div class="stat-number">{{ $statusCounts['total'] }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Ingin Dimainkan</div>
                <div class="stat-number">{{ $statusCounts['ingin_dimainkan'] }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Sedang Dimainkan</div>
                <div class="stat-number">{{ $statusCounts['sedang_dimainkan'] }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Selesai</div>
                <div class="stat-number">{{ $statusCounts['selesai'] }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Favorit</div>
                <div class="stat-number">{{ $statusCounts['favorit'] }}</div>
            </div>
        </div>

        <div class="top-actions">
            <a href="{{ route('games.index') }}" class="primary-link">Cari Game Baru</a>
            <a href="{{ route('dashboard') }}" class="secondary-link">Kembali ke Dashboard</a>
        </div>

        <div class="filter-box">
            <form action="{{ route('wishlist.index') }}" method="GET" class="filter-form">
                <div class="form-group">
                    <label>Cari Nama Game</label>
                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Contoh: GTA, Minecraft, Elden Ring"
                    >
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status">
                        @foreach ($statusOptions as $value => $label)
                            <option value="{{ $value }}" {{ $selectedStatus === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="filter-btn">Terapkan</button>
            </form>

            @if ($search || $selectedStatus)
                <a href="{{ route('wishlist.index') }}" class="reset-link">Reset filter wishlist</a>
            @endif
        </div>

        <div class="result-info">
            @if ($search || $selectedStatus)
                Menampilkan hasil wishlist
                @if ($search)
                    untuk pencarian <strong>{{ $search }}</strong>
                @endif

                @if ($selectedStatus)
                    dengan status <strong>{{ $selectedStatus }}</strong>
                @endif
                .
            @else
                Menampilkan semua game yang kamu simpan.
            @endif
        </div>

        @if ($wishlists->isEmpty())
            <div class="empty-box">
                Tidak ada game yang cocok. Coba ubah pencarian/filter, atau buka halaman Cari Game
                lalu tambahkan game baru ke wishlist.
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

                            <div class="game-info">
                                Rating: {{ $item->game_rating ?? '-' }}
                            </div>

                            <div class="game-info">
                                Rilis: {{ $item->game_released ?? '-' }}
                            </div>

                            <span class="status">{{ $item->status }}</span>

                            <form action="{{ route('wishlist.updateStatus', $item->id) }}" method="POST" class="status-form">
                                @csrf
                                @method('PATCH')

                                <label>Ubah Status</label>

                                <select name="status">
                                    <option value="Ingin dimainkan" {{ $item->status === 'Ingin dimainkan' ? 'selected' : '' }}>
                                        Ingin dimainkan
                                    </option>

                                    <option value="Sedang dimainkan" {{ $item->status === 'Sedang dimainkan' ? 'selected' : '' }}>
                                        Sedang dimainkan
                                    </option>

                                    <option value="Selesai" {{ $item->status === 'Selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>

                                    <option value="Favorit" {{ $item->status === 'Favorit' ? 'selected' : '' }}>
                                        Favorit
                                    </option>
                                </select>

                                <button type="submit" class="update-btn">Simpan Status</button>
                            </form>
                        </div>

                        <div class="card-actions">
                            <a href="{{ route('games.show', $item->rawg_game_id) }}" class="detail-btn">
                                Lihat Detail
                            </a>

                            <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-btn" onclick="return confirm('Hapus game ini dari wishlist?')">
                                    Hapus dari Wishlist
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="rawg-note">
            Data game berasal dari <a href="https://rawg.io" target="_blank">RAWG</a>.
        </div>
    </div>

</body>
</html>