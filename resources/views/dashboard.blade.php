<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - GameVault</title>

    <style>
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

        .card {
            background: #151d31;
            border: 1px solid #293552;
            padding: 26px;
            border-radius: 18px;
            margin-top: 20px;
        }

        button {
            padding: 10px 16px;
            border-radius: 10px;
            border: none;
            background: #d9534f;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .success {
            background: #12351f;
            border: 1px solid #2f8f4e;
            padding: 12px;
            border-radius: 10px;
            color: #b9ffd0;
            margin-bottom: 18px;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">GameVault</div>

        <div>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('games.index') }}">Cari Game</a>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <h1>Dashboard</h1>

        <div class="card">
            <h2>Halo, {{ auth()->user()->name }}</h2>
            <p>Email: {{ auth()->user()->email }}</p>
            <p>
                Ini adalah dashboard awal. Nanti halaman ini akan berisi ringkasan wishlist,
                jumlah komentar, dan aktivitas user di GameVault.
            </p>
        </div>
    </div>

</body>
</html>