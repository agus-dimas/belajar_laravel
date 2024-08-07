<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Hobi</title>
</head>
<body>
    <h1>Tambah Hobi</h1>
    <form action="{{ route('hobi.store') }}" method="POST">
        @csrf
        <label for="nama_hobi">Nama Hobi</label>
        <input type="text" name="nama_hobi" id="nama_hobi" placeholder="Nama Hobi">
        <br>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi"></textarea>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
