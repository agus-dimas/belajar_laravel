<!DOCTYPE html>
<html>
<head>
    <title>Input Biodata</title>
 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">INPUT BIODATA</h1>
        <form action="/biodata/result" method="POST" enctype="multipart/form-data">
       
            @csrf
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" >
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" >
            </div>
            <div class="form-group">
                <label for="temp_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="temp_lahir" name="temp_lahir" >
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" >
            </div>
            <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <input type="text" class="form-control" id="kabupaten" name="kabupaten" >
            </div>
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" >
            </div>
            <div class="form-group">
                <label for="desa">Desa</label>
                <input type="text" class="form-control" id="desa" name="desa" >
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" class="form-control" id="provinsi" name="provinsi" >
            </div>
            <div class="form-group">
                <label for="gambar">Foto</label>
                <input type="file" class="form-control" id="gambar" name="gambar" >
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
