<!DOCTYPE html>
<html>
<head>
    <title>Form Daftar Akun</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #fceaff, #e3d5f9);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-color: white;
            padding: 30px 40px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(166, 109, 212, 0.2);
            width: 100%;
            max-width: 800px;
        }

        h2 {
            text-align: center;
            color: #7e3ff2;
            margin-bottom: 5px;
            font-weight: 600;
        }

        p {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
            font-size: 14px;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #a66dd4;
            outline: none;
            box-shadow: 0 0 5px rgba(166, 109, 212, 0.3);
        }

        .submit-container {
            text-align: center;
        }

        button[type="submit"] {
            padding: 10px 30px;
            background-color: #a66dd4;
            color: white;
            font-weight: bold;
            font-size: 14px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #8e56c7;
        }

        .link {
            text-align: center;
            font-size: 14px;
            margin-top: 15px;
        }

        .link a {
            color: #7e3ff2;
            text-decoration: none;
            font-weight: 500;
        }

        .link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .form-container {
                max-width: 95%;
            }

            table {
                display: block;
            }

            tr {
                display: flex;
                flex-direction: column;
            }

            td {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <form action="{{ url('daftar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>DAFTAR AKUN</h2>
        <p>Silakan isi form berikut untuk mendaftar</p>

        <table>
            <tr>
                <td>
                    <label>NIM</label>
                    <input type="text" name="nim" required>
                </td>
                <td>
                    <label>Password</label>
                    <input type="password" name="password" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" required>
                </td>
                <td>
                    <label>Ulangi Password</label>
                    <input type="password" name="password_confirmation" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Program Studi</label>
                    <select name="prodi" required>
                        <option value="">-- Pilih Prodi --</option>
                        <option value="informatika">Informatika</option>
                        <option value="sistem-informasi">Sistem Informasi</option>
                        <option value="teknik-komputer">Teknik Informasi</option>
                    </select>
                </td>
                <td>
                    <label>Foto</label>
                    <input type="file" name="foto">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Email</label>
                    <input type="email" name="email" required>
                </td>
                <td style="padding-top: 34px;">
                    <button type="submit">Daftar</button>
                </td>
            </tr>
        </table>

        <div class="link">
            Sudah punya akun? <a href="{{ url('/login') }}">Login sekarang</a>
        </div>
    </form>
</div>

</body>
</html>
