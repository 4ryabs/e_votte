<!DOCTYPE html>
<html>
<head>
    <title>Data Pemilih</title>
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

        .search-bar .login-button {
            background-color: white;
            color: #7e3ff2;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
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

        .container {
            padding: 40px 30px;
        }

        h1 {
            color: #7e3ff2;
            text-align: center;
            margin-bottom: 30px;
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
            max-height: 50px;
            border-radius: 6px;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .d-inline {
            display: inline;
        }

        .d-flex {
            display: flex;
            gap: 5px;
            justify-content: center;
        }



        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
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

            .search-bar {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <div>
        <strong>Amikom Purwokerto</strong>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/pemilih') }}">Data Pemilih</a>
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
    <h1>DATA PEMILIH</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Foto</th>
                <th>Validasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->nim }}</td>
                    <td>{{ $row->prodi }}</td>
                    <td>
                        <img src="{{ asset('storage/foto/' . $row->foto) }}" alt="foto">
                    </td>
                    <td>
                        <div class="d-flex">
                            @if($row->validasi != 'Tervalidasi')
                                <form action="{{ url('validasi/' . $row->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Validasi</button>
                                </form>

                                <form action="{{ url('hapus/' . $row->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            @else
                                <button class="btn btn-secondary" disabled>Tervalidasi</button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
