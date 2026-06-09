<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - GameVault</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #101624;
            color: white;
        }

        .container {
            width: 420px;
            margin: 60px auto;
            background: #151d31;
            padding: 30px;
            border-radius: 18px;
            border: 1px solid #293552;
        }

        h1 {
            margin-top: 0;
            color: #7aa2ff;
        }

        label {
            display: block;
            margin-top: 16px;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            border: 1px solid #34405e;
            background: #0f1729;
            color: white;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 13px;
            border: none;
            border-radius: 10px;
            background: #4169e1;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        a {
            color: #7aa2ff;
            text-decoration: none;
        }

        .error {
            background: #3a1d1d;
            border: 1px solid #914646;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 15px;
            color: #ffdada;
        }

        .small-text {
            margin-top: 18px;
            color: #c5cce0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Daftar Akun</h1>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">Daftar</button>
        </form>

        <div class="small-text">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>

        <div class="small-text">
            <a href="{{ route('home') }}">Kembali ke Home</a>
        </div>
    </div>

</body>
</html>