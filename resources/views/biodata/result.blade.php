<!DOCTYPE html>
<html>
<head>
    <title>Hasil Biodata</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fade-in {
            animation: fadeInAnimation ease 3s;
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

        .slide-in {
            animation: slideInAnimation ease 3s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }

        @keyframes slideInAnimation {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card fade-in shadow">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Hasil Biodata</h1>
                <p><strong>NIK:</strong> {{ $nik }}</p>
                <p><strong>Nama:</strong> {{ $nama }}</p>
                <p><strong>Tempat Lahir:</strong> {{ $temp_lahir }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ $tgl_lahir }}</p>
                <p><strong>Kabupaten:</strong> {{ $kabupaten }}</p>
                <p><strong>Kecamatan:</strong> {{ $kecamatan }}</p>
                <p><strong>Desa:</strong> {{ $desa }}</p>
                <p><strong>Provinsi:</strong> {{ $provinsi }}</p>
                <div class="text-center mt-4">
                    <img class="slide-in img-fluid rounded" src="{{ asset('storage/images/'.$nama_gambar) }}" alt="{{ $nama_gambar }}" />
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
