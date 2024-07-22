<!DOCTYPE html>
<html>
<head>
    <title>Hasil Biodata</title>
</head>
<body>
    <h1>Hasil Biodata</h1>
    <p><strong>NIK:</strong> {{ $nik }}</p>
    <p><strong>Nama:</strong> {{ $nama }}</p>
    <p><strong>Tempat Lahir:</strong> {{ $temp_lahir }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $tgl_lahir }}</p>
    <p><strong>Kabupaten:</strong> {{ $kabupaten }}</p>
    <p><strong>Kecamatan:</strong> {{ $kecamatan }}</p>
    <p><strong>Desa:</strong> {{ $desa }}</p>
    <p><strong>Provinsi:</strong> {{ $provinsi }}</p>
    <img src="{{ asset('storage/images/'.$nama_gambar)}}" alt="{{ $nama_gambar }}" />
</body>
</html>