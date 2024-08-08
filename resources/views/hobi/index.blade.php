<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hobi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
        <form class="form-inline my-2 my-lg-0" action="{{ route('hobi.index') }}" method="GET">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Hobi" value="{{ request('search') }}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

      </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Hobi</h1>
        <div class="text-right mb-3">
            <a href="{{ route('hobi.create') }}" class="btn btn-success my-2 my-sm-0">Tambah Hobi</a>
        </div>
       <div class="table-responsive ">
       <table class="table table-hover table-striped table-bordered ">
       <thead class="thead-light-blue">
                   <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Hobi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hobis as $index => $hobi)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $hobi->nama_hobi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
