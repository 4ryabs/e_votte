<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fceaff, #e3d5f9);
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: white;
            padding: 40px 50px;
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 0 20px rgba(166, 109, 212, 0.2);
        }

        h2 {
            text-align: center;
            color: #7e3ff2;
            margin-bottom: 10px;
            font-weight: 600;
        }

        p {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
            font-size: 14px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 500;
            font-size: 14px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: border 0.3s, box-shadow 0.3s;
        }

        input:focus {
            border-color: #a66dd4;
            box-shadow: 0 0 5px rgba(166, 109, 212, 0.3);
            outline: none;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #a66dd4;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #8e56c7;
        }

        .link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }

        .link a {
            color: #7e3ff2;
            text-decoration: none;
            font-weight: 500;
        }

        .link a:hover {
            text-decoration: underline;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-top: 15px;
            border-radius: 8px;
            border: 1px solid #f5c6cb;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <h2>Login</h2>
        <p>Masukkan email dan password Anda</p>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <button type="submit">Login</button>

        <div class="link">
            Belum punya akun? <a href="{{ url('/daftar') }}">Daftar di sini</a>
        </div>
    </form>
</div>

</body>
</html>
