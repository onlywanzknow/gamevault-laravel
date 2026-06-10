<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Tidak Ditemukan - GameVault</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #101624;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .card {
            width: 100%;
            max-width: 620px;
            background: #151d31;
            border: 1px solid #293552;
            border-radius: 24px;
            padding: 34px;
            text-align: center;
        }

        .code {
            font-size: 72px;
            font-weight: bold;
            color: #7aa2ff;
            margin-bottom: 10px;
        }

        h1 {
            margin: 0 0 12px 0;
            font-size: 32px;
        }

        p {
            color: #c5cce0;
            line-height: 1.7;
            margin-bottom: 26px;
        }

        .actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        a {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .primary {
            background: #4169e1;
            color: white;
        }

        .secondary {
            background: #1d263b;
            color: #d6defa;
            border: 1px solid #34405e;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="code">404</div>

        <h1>Halaman tidak ditemukan</h1>

        <p>
            Halaman yang kamu buka tidak tersedia atau alamatnya salah.
            Kamu bisa kembali ke Home atau membuka katalog game.
        </p>

        <div class="actions">
            <a href="{{ route('home') }}" class="primary">Kembali ke Home</a>
            <a href="{{ route('games.index') }}" class="secondary">Cari Game</a>
        </div>
    </div>

</body>
</html>