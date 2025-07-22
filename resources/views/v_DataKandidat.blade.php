<!DOCTYPE html>
<html>
<head>
    <title>Data Kandidat</title>
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
        }

        .navbar {
            background-color: #a66dd4;
            color: white;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-bar input[type="text"] {
            padding: 6px 10px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
        }

        .search-bar input[type="submit"] {
            padding: 6px 12px;
            background-color: #7e3ff2;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
        }

        .search-bar .login-button {
            background-color: white;
            color: #7e3ff2;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
        }

        .container {
            padding: 40px 30px;
        }

        h1 {
            color: #7e3ff2;
            text-align: center;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 8px 14px;
            background: #7e3ff2;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
            vertical-align: middle;
            font-size: 14px;
        }

        th {
            background-color: #a66dd4;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #faf5ff;
        }

        img {
            height: 60px;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .search-bar {
                width: 100%;
                justify-content: space-between;
            }

            .container {
                padding: 20px;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <div>
        <strong>Amikom Purwokerto</strong>
        <a href="{{ url('/') }}">Home</a>
        @if(session('user_role') === 'admin')
            <a href="{{ url('/pemilih') }}">Data Pemilih</a>
        @endif
        <a href="{{ url('/kandidat') }}">Kandidat BEM</a>
    </div>
    <div class="search-bar">
        <form action="" method="get" style="display: flex;">
            <input type="text" name="search" placeholder="Search">
            <input type="submit" value="Search">
        </form>
        <a href="{{ url('/login') }}" class="login-button">Login</a>
    </div>
</div>

<div class="container">
    <h1>DATA KANDIDAT BEM</h1>
    @if(session('user_role') === 'admin')
        <div style="text-align: right; margin-bottom: 15px;">
            <a href="{{ url('/kandidat/create') }}" class="btn">Tambah Kandidat</a>
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th rowspan="2">No Urut</th>
                <th colspan="2">Ketua & Wakil</th>
                <th rowspan="2">Visi</th>
                <th rowspan="2">Misi</th>
                <th rowspan="2">Foto</th>
            </tr>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $kandidat)
                @php
                    $ketua = collect($kandidat->detail)->first(fn($item) => strtolower($item->jabatan) === 'ketua');
                    $wakil = collect($kandidat->detail)->first(fn($item) => strtolower($item->jabatan) === 'wakil');
                @endphp
                <tr>
                    <td rowspan="2">{{ $kandidat->no_kandidat }}</td>
                    <td>{{ $ketua->nim ?? '-' }}</td>
                    <td>{{ $ketua->name ?? '-' }}</td>
                    <td rowspan="2">{{ $kandidat->visi }}</td>
                    <td rowspan="2">{{ $kandidat->misi }}</td>
                    <td rowspan="2">
                        <img src="{{ url('storage/foto_kandidat/' . $kandidat->foto_paslon) }}" alt="Foto Paslon">
                            Tidak ada
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>{{ $wakil->nim ?? '-' }}</td>
                    <td>{{ $wakil->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
