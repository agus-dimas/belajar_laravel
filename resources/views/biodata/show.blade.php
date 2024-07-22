<!DOCTYPE html>
<html>
<head>
    <title>Input Biodata</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">DETAIL BIODATA</h1>
        <p>{{ $biodata->nik }}</p>
        <p>{{ $biodata->nama }}</p>
        <p>{{ $biodata->tempat_lahir }}</p>
        <img class="image img-fluid" src="/storage/{{ $biodata->gambar }}" alt="">
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
