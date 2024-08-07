<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hobi</title>
</head>
<body>
    <h1>Hobi</h1>
    <a href="{{ route('hobi.create') }}">Tambah Hobi</a>
    <ul>
        @foreach ($hobis as $hobi)
            <li>{{ $hobi->nama_hobi }}</li>
        @endforeach
    </ul>
</body>
</html>
