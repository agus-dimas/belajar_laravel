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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <select class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi">
                    <option value="">Pilih</option>
                </select>
                @error('provinsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kabupaten">kabupaten</label>
                <select class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten">
                    <option value="">Pilih</option>
                </select>
                @error('kabupaten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kecamatan">kecamatan</label>
                <select class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan">
                    <option value="">Pilih</option>
                </select>
                @error('kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="desa">Desa</label>
                <select class="form-control @error('desa') is-invalid @enderror" id="desa" name="desa">
                    <option value="">Pilih</option>
                </select>
                @error('kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script>
        function wilayahTemplate(res) {
            return res.name;
        };
        $('#provinsi, #kabupaten, #kecamatan, #desa').select2({
            placeholder: 'Pilih ...',
        });

        $.ajax({
            url: '/list-provinsi'
        }).done(function(data) {
            var res = $.map(data, function(obj) {
                return {
                    id: obj.id,
                    text: obj.name
                };
            });
            $('#provinsi').select2({
                placeholder: "Pilih Provinsi",
                data: res,
            });
        });

        $('#provinsi').on('change', function(e) {
            e.preventDefault();
            const provinsiId = $(this).val();
            $('#kabupaten').val(null).trigger('change');
            $('#kabupaten').select2('destroy');
           
            if (provinsiId) {
                $.ajax({
                    url: `/list-kabupaten/${provinsiId}`
                }).done(function(data) {
                    var res = $.map(data, function(obj) {
                        return {
                            id: obj.id,
                            text: obj.name
                        };
                    });
                    $('#kabupaten').select2({
                        placeholder: "Pilih Kabupaten",
                        data: res,
                    });
                });
           }
        });

        $('#kabupaten').on('change', function(e) {
        e.preventDefault();
        const kabupatenId = $(this).val();
        $('#kecamatan').val(null).trigger('change');
      
 
        if (kabupatenId) {
            $.ajax({
                url: `/list-kecamatan/${kabupatenId}`
            }).done(function(data) {
                var res = $.map(data, function(obj) {
                    return {
                        id: obj.id,
                        text: obj.name
                    };
                });
                $('#kecamatan').select2({
                    placeholder: "Pilih Kecamatan",
                    data: res,
                });
            });
        }
    });

    $('#kecamatan').on('change', function(e) {
        e.preventDefault();
        const kecamatanId = $(this).val();
        $('#desa').val(null).trigger('change');
 

        if (kecamatanId) {
            $.ajax({
                url: `/list-desa/${kecamatanId}`
            }).done(function(data) {
                var res = $.map(data, function(obj) {
                    return {
                        id: obj.id,
                        text: obj.name
                    };
                });
                $('#desa').select2({
                    placeholder: "Pilih Desa",
                    data: res,
                });
            });
        }
    });
       
    </script>
</body>

</html>
