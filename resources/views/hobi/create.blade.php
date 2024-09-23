@include('layout.style')
@include('layout.nav')
    <div class="container mt-5">

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


        <h1 class="text-center mb-4">Tambah Hobi</h1>
        <form action="{{ route('hobi.store') }}" method="POST" class="border p-4 shadow-sm bg-light rounded">
            @csrf

            <div class="form-group">
                <label for="nama_hobi">Nama Hobi</label>
                <input type="text" class="form-control @error('nama_hobi') is-invalid @enderror" name="nama_hobi" id="nama_hobi" placeholder="Nama Hobi">
                @error('nama_hobi')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control @error('nama_hobi') is-invalid @enderror" name="deskripsi" id="deskripsi" placeholder="Deskripsi" rows="3"></textarea>
                @error('nama_hobi')
                            <div class="invalide-feedback">{{ $message }}</div>
                @enderror
                </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('hobi.index') }}" class="btn btn-danger white">Batal</a>
        </form>
    </div>
