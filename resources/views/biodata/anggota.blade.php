<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data Anggota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tabel Data Anggota</h2>
        <div class="text-right mb-3">
            <a href="/biodata/create" class="btn btn-success">Tambah Data</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Desa</th>
                    <th>Provinsi</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($biodata as $biodata)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $biodata->nik }}</td>
                        <td>{{ $biodata->nama }}</td>
                        <td>{{ $biodata->temp_lahir }}</td>
                        <td>{{ $biodata->tgl_lahir }}</td>
                        <td>{{ $biodata->kabupaten }}</td>
                        <td>{{ $biodata->kecamatan }}</td>
                        <td>{{ $biodata->desa }}</td>
                        <td>{{ $biodata->provinsi }}</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm">Edit</a>
                            <form action="" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
