<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Biodata</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Biodata</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('biodatas.update', $biodata->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $biodata->nik) }}" required>
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $biodata->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="temp_lahir">Tempat Lahir</label>
                <input type="text" class="form-control @error('temp_lahir') is-invalid @enderror" id="temp_lahir" name="temp_lahir" value="{{ old('temp_lahir', $biodata->temp_lahir) }}" required>
                @error('temp_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $biodata->tgl_lahir) }}" required>
                @error('tgl_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi">
                    <option value="{{ old('provinsi', $biodata->provinsi_id) }}">{{ old('provinsi', $biodata->provinsi_name) }}</option>
                </select>
                @error('provinsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="provinsi_name" id="selectedProvinsiName" value="{{ old('provinsi_name', $biodata->provinsi_name) }}">

            <div class="form-group">
                <label for="kabupaten">kabupaten</label>
                <select class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten">
                    <option value="{{ old('kabupaten', $biodata->kabupaten_id) }}">{{ $biodata->kabupaten_name }}</option>
                </select>
                @error('kabupaten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="kabupaten_name" id="selectedKabupatenName">

            <div class="form-group">
                <label for="kecamatan">kecamatan</label>
                <select class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan">
                    <option value="{{ old('kecamatan', $biodata->kecamatan_id) }}">{{ $biodata->kecamatan_name }}</option>
                </select>
                @error('kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="kecamatan_name" id="selectedKecamatanName">

            <div class="form-group">
                <label for="desa">Desa</label>
                <select class="form-control @error('desa') is-invalid @enderror" id="desa" name="desa">
                    <option value="{{ old('desa', $biodata->desa_id) }}">{{ $biodata->desa_name }}</option>
                </select>
                @error('kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input type="hidden" name="desa_name" id="selectedDesaName">
            </div>


            <div class="form-group">
                <label for="hobi">Hobi</label>
                <select class="form-control @error('id_hobi') is-invalid @enderror" id="id_hobi" name="id_hobi">
                    @foreach ($hobis as $h)
                        <option value="{{ $h->id }}">{{ $h->nama_hobi }}</option>
                    @endforeach
                </select>
                @error('id_hobi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if($biodata->gambar)
                <div class="form-group">
                    <label>Gambar Saat Ini:</label><br>
                    <img src="{{ asset('storage/' . $biodata->gambar) }}" alt="Gambar Biodata" class="img-thumbnail" width="150">
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('biodatas.index') }}" class="btn btn-danger">Kembali</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @include('biodata.scripts.edit')
</body>
</html>
