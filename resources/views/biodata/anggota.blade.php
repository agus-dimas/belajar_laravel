@extends('master')
@section('content')
    <div class="container-fluid mt-5">
        <h2 class="mb-4 text-center">Tabel Data Anggota</h2>
        <div class="text-right mb-3">
            <a href="{{ route('biodatas.create') }}" class="btn btn-success">Tambah Data</a>
        </div>
        <div>
            <table id="anggotaTable" class="table table-striped table-bordered table-hover" style="width:100%">
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
                            <td>{{ $loop->iteration }}</td>
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

        {{-- <div class="d-flex justify-content-center">
            {{ $biodatas->links() }}
        </div> --}}
    </div>


@endsection
