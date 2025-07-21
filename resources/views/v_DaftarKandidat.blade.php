<!DOCTYPE html>
<html>
<head>
    <title>Form Daftar Kandidat</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fceaff, #e3d5f9);
            margin: 0;
            padding: 60px 0; /* Tambahkan padding atas & bawah */
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 45px 50px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(166, 109, 212, 0.2);
            width: 100%;
            max-width: 700px;
        }

        h2 {
            text-align: center;
            color: #7e3ff2;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #7e3ff2;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        label {
            display: block;
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #a66dd4;
            outline: none;
            box-shadow: 0 0 5px rgba(166, 109, 212, 0.3);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        button {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #a66dd4;
            color: white;
            font-weight: bold;
            font-size: 15px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #8e56c7;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 25px 20px;
                max-width: 95%;
            }

            table,
            tr {
                display: block;
                width: 100%;
            }

            td {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <a href="{{ url('/kandidat') }}" class="back">← Kembali ke Data Kandidat</a>
    <h2>Form Pendaftaran Kandidat BEM</h2>

    <form action="{{ url('/kandidat') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <table>
            <tr>
                <td style="width: 50%;">
                    <label>Nama Ketua</label>
                    <input type="text" name="name_ketua" required>
                </td>
                <td style="width: 50%;">
                    <label>NIM Ketua</label>
                    <input type="text" name="nim_ketua" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nama Wakil Ketua</label>
                    <input type="text" name="name_wakil" required>
                </td>
                <td>
                    <label>NIM Wakil Ketua</label>
                    <input type="text" name="nim_wakil" required>
                </td>
            </tr>
        </table>

        <div style="padding-right: 10px; padding-left: 10px;">
            <label style="padding-top: 10px;">Visi</label>
            <textarea name="visi" required></textarea>

            <label style="padding-top: 10px;">Misi</label>
            <textarea name="misi" required></textarea>

            <label style="padding-top: 10px;">Nomor Urut Kandidat</label>
            <input type="number" name="no_kandidat" required>

            <label style="padding-top: 10px;">Foto Pasangan Kandidat</label>
            <input type="file" name="foto_paslon" required>

            <button type="submit">Simpan</button>
        </div>
    </form>
</div>

</body>
</html>
