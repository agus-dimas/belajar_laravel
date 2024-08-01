<!DOCTYPE html>
<html>
<head>
    <title>Input Biodata</title>
 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .is-invalid {
            border-color: #dc3545;
        }
    </style>
</head>
<body>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="mt-5">INPUT BIODATA</h1>
        <form action="/biodatum/result" method="POST" enctype="multipart/form-data">
       
            @csrf
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" >
                @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" >
                @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="temp_lahir">Tempat Lahir</label>
                <input type="text" class="form-control @error('temp_lahir') is-invalid @enderror" id="temp_lahir" name="temp_lahir" >
                @error('temp_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" >
                @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <input type="text" class="form-control @error('tgl_lahir') is-invalid @enderror" id="kabupaten" name="kabupaten" >
                @error('kabupaten')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" >
                @error('kecamatan')
                            <div class="invalid-feedback">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="desa">Desa</label>
                <input type="text" class="form-control form-control @error('desa') is-invalid @enderror" id="desa" name="desa" >
                @error('desa')
                            <div class="invalid-feedback">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" class="form-control form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" >
                @error('provinsi')
                            <div class="invalid-feedback">{{ $message}}</div>
                @enderror
            
            </div>
            <div class="form-group">
                <label for="gambar">Foto</label>
                <input type="file" class="form-control form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" >
                @error('gambar')
                            <div class="invalid-feedback">{{ $message}}</div>
                @enderror
            
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/biodatum" class="btn btn-danger white">Batal</a>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
