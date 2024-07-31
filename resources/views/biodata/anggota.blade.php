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
            <a href="" class="btn btn-success">Tambah Data</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Desa</th>
                    <th>Provinsi</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
            
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm">Edit</a>
                            <form action="" method="POST" style="display:inline;">
                                @csrf
                             
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
         
            </tbody>
        </table>
    </div>
</body>
</html>
