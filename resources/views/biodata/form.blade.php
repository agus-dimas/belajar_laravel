@include('layout.style')
@include('layout.nav')
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
        <form action="{{ route('biodatas.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                    name="nik">
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    name="nama">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="temp_lahir">Tempat Lahir</label>
                <input type="text" class="form-control @error('temp_lahir') is-invalid @enderror" id="temp_lahir"
                    name="temp_lahir">
                @error('temp_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                    name="tgl_lahir">
                @error('tgl_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi_id">
                    <option value="">Pilih</option>
                </select>
                @error('provinsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="provinsi_name" id="selectedProvinsiName">

            <div class="form-group">
                <label for="kabupaten">kabupaten</label>
                <select class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten"
                    name="kabupaten_id">
                    <option value="">Pilih</option>
                </select>
                @error('kabupaten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="kabupaten_name" id="selectedKabupatenName">

            <div class="form-group">
                <label for="kecamatan">kecamatan</label>
                <select class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan"
                    name="kecamatan_id">
                    <option value="">Pilih</option>
                </select>
                @error('kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="kecamatan_name" id="selectedKecamatanName">

            <div class="form-group">
                <label for="desa">Desa</label>
                <select class="form-control @error('desa') is-invalid @enderror" id="desa" name="desa_id">
                    <option value="">Pilih</option>
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
                <label for="gambar">Foto</label>
                <input type="file" class="form-control form-control @error('gambar') is-invalid @enderror"
                    id="gambar" name="gambar">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('biodatas.index') }}" class="btn btn-danger white">Batal</a>
        </form>
    </div>
@include('biodata.scripts.tambah')
