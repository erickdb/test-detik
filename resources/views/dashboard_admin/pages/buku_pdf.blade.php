<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        text-align: center;
        margin: 20px auto;
    }

    h1 {
        font-size: 2em;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    thead {
        background-color: #f2f2f2;
    }

    .text-center {
        text-align: center;
    }

    .file-link {
        color: #007BFF;
        text-decoration: none;
    }
</style>
<body>
    <div class="container">
        <h1>Digital Library</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>User</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($buku as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ ucfirst($row->judul) }}</td>
                        <td>{{ ucfirst($row->getKategori->nama_kategori) }}</td>
                        <td>{{ ucfirst($row->getUser->name) }}</td>
                        <td>{{ ucfirst($row->deskripsi) }}</td>
                        <td>{{ ucfirst($row->jumlah) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>