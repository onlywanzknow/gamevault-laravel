<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya - GameVault</title>

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

        .container {
            padding: 50px 8%;
        }

        .header {
            margin-bottom: 28px;
        }

        h1 {
            margin: 0 0 10px 0;
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

        .layout {
            display: grid;
            grid-template-columns: 0.8fr 1.2fr;
            gap: 24px;
            align-items: start;
        }

        .card {
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 20px;
            padding: 24px;
        }

        .profile-avatar {
            width: 90px;
            height: 90px;
            border-radius: 24px;
            background: linear-gradient(135deg, #4169e1, #7aa2ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .profile-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .profile-email {
            color: #aeb8d4;
            line-height: 1.5;
            margin-bottom: 18px;
        }

        .profile-row {
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 14px;
            padding: 14px;
            margin-top: 12px;
        }

        .profile-label {
            color: #8892b0;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .profile-value {
            color: white;
            font-weight: bold;
        }

        .stats-grid {
            margin-top: 18px;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .stat-card {
            background: #0f1729;
            border: 1px solid #293552;
            border-radius: 14px;
            padding: 14px;
        }

        .stat-label {
            color: #aeb8d4;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .stat-number {
            color: #7aa2ff;
            font-size: 26px;
            font-weight: bold;
        }

        .form-section {
            margin-bottom: 24px;
        }

        .form-section h2 {
            margin-top: 0;
            margin-bottom: 8px;
        }

        .form-note {
            color: #aeb8d4;
            line-height: 1.6;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .form-grid {
            display: grid;
            gap: 16px;
        }

        .form-group label {
            display: block;
            color: #d6defa;
            margin-bottom: 7px;
            font-size: 14px;
        }

        input {
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

        .divider {
            height: 1px;
            background: #293552;
            margin: 24px 0;
        }

        .save-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: #4169e1;
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 15px;
        }

        .save-btn:hover {
            background: #3158c9;
        }

        .actions {
            margin-top: 22px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .primary-link,
        .secondary-link {
            display: inline-block;
            padding: 12px 16px;
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

        @media (max-width: 950px) {
            .layout {
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

            h1 {
                font-size: 31px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .actions {
                display: grid;
            }

            .primary-link,
            .secondary-link {
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
            <a href="{{ route('dashboard') }}">Dashboard</a>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="header">
            <h1>Profil Saya</h1>

            <p class="subtitle">
                Kelola informasi akun GameVault kamu. Nama dan email dapat diubah,
                sedangkan password hanya berubah jika kamu mengisi bagian ganti password.
            </p>
        </div>

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

        <div class="layout">
            <div class="card">
                <div class="profile-avatar">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <div class="profile-name">{{ $user->name }}</div>
                <div class="profile-email">{{ $user->email }}</div>

                <div class="profile-row">
                    <div class="profile-label">Tanggal Daftar</div>
                    <div class="profile-value">
                        {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                    </div>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-label">Wishlist</div>
                        <div class="stat-number">{{ $wishlistCount }}</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-label">Komentar</div>
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
                </div>

                <div class="actions">
                    <a href="{{ route('dashboard') }}" class="primary-link">Dashboard</a>
                    <a href="{{ route('wishlist.index') }}" class="secondary-link">Wishlist</a>
                </div>
            </div>

            <div class="card">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-section">
                        <h2>Informasi Akun</h2>

                        <div class="form-note">
                            Bagian ini digunakan untuk mengubah nama dan email akun.
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label>Nama</label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name', $user->name) }}"
                                    required
                                >
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                    required
                                >
                            </div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="form-section">
                        <h2>Ganti Password</h2>

                        <div class="form-note">
                            Kosongkan bagian password jika kamu tidak ingin mengganti password.
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label>Password Saat Ini</label>
                                <input
                                    type="password"
                                    name="current_password"
                                    placeholder="Isi password lama jika ingin ganti password"
                                >
                            </div>

                            <div class="form-group">
                                <label>Password Baru</label>
                                <input
                                    type="password"
                                    name="new_password"
                                    placeholder="Minimal 6 karakter"
                                >
                            </div>

                            <div class="form-group">
                                <label>Konfirmasi Password Baru</label>
                                <input
                                    type="password"
                                    name="new_password_confirmation"
                                    placeholder="Ulangi password baru"
                                >
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="save-btn">
                        Simpan Perubahan Profil
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>