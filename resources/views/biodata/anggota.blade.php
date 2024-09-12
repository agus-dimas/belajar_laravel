<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data Anggota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        .thead-light-blue {
                background-color: #cce5ff;
                color: black;
            }

    </style>
</head>
<body>
    <!-- navigasi -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">BELAJAR LARAVEL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('biodatas.index') }}">Anggota <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('hobi.index') }}">Hobi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
    <form class="form-inline my-2 my-lg-0" action="{{ route('biodatas.index') }}" method="GET">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" value="{{ request('search') }}">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
      </div>
    </nav>


    <div class="container-fluid mt-5">
        <h2 class="mb-4 text-center">Tabel Data Anggota</h2>
        <div class="text-right mb-3">
            <a href="{{ route('biodatas.create') }}" class="btn btn-success">Tambah Data</a>
        </div>
        <div class="table-responsive ">
            <table class="table table-hover table-striped table-bordered ">
                <thead class="thead-light-blue">
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
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
                            <td>{{ $biodata->provinsi_name }}</td>
                            <td>{{ $biodata->kabupaten_name }}</td>
                            <td>{{ $biodata->kecamatan_name }}</td>
                            <td>{{ $biodata->desa_name }}</td>
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
<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3 " >
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
    </ul>
    <p class="text-center text-body-secondary">© 2024 Company, Inc</p>
  </footer>
</div>
</html>
