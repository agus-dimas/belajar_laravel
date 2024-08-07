<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fade-in {
            animation: fadeInAnimation ease 2s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        .card {
            border-radius: 15px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            display: block;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card fade-in shadow-lg">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Data Anggota</h1>
                <div class="row">
                    <div class="col-md-4 text-center">
                    <img class="img-fluid rounded" src="/storage/{{ $gambar_path }}/{{ $nama_gambar }}" alt="{{ $nama_gambar }}" />
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <th>NIK</th>
                                <td>{{ $nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $nama }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $temp_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $tgl_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Kabupaten</th>
                                <td>{{ $kabupaten }}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>{{ $kecamatan }}</td>
                            </tr>
                            <tr>
                                <th>Desa</th>
                                <td>{{ $desa }}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>{{ $provinsi }}</td>
                            </tr>
                            <tr>
                                <th>Hobi</th>
                                <td>{{ $nama_hobi }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $deskripsi }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('biodatas.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
