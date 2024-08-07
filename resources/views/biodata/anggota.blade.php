<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data Anggota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid mt-5">
        <h2 class="mb-4 text-center">Tabel Data Anggota</h2>
        <div class="text-right mb-3">
            <a href="{{ route('biodatas.create') }}" class="btn btn-success">Tambah Data</a>
        </div>
        <div class="table-responsive ">
            <table class="table table-hover table-striped table-bordered ">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>Provinsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($biodatas as $biodata)    
                    <tr>
                            <td>{{ $loop->iteration + $biodatas->firstItem() - 1 }}</td>
                            <td>{{ $biodata->nik }}</td>
                            <td>{{ $biodata->nama }} </td>
                            <td>{{ $biodata->temp_lahir }}</td>
                            <td>{{ $biodata->tgl_lahir }}</td>
                            <td>{{ $biodata->kabupaten }}</td>
                            <td>{{ $biodata->kecamatan }}</td>
                            <td>{{ $biodata->desa }}</td>
                            <td>{{ $biodata->provinsi }}</td>
                            <td >
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('biodatas.show', $biodata->id) }}" class="btn btn-primary btn-sm mr-2">Lihat</a>
                                    
                                    <a href="{{ route('biodatas.edit', $biodata->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $biodatas->links() }}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
