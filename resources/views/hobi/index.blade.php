@extends('master')
@section('content')
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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hobis as $index => $hobi)
                    <tr>
                        <td>{{ $loop->iteration + $hobis->firstItem() - 1 }}</td>
                        <td>{{ $hobi->nama_hobi }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#exampleModal" data-id="{{ $hobi->id }}">Lihat</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--Belajar fitur Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Hobi</h5>
          </div>
          <div class="modal-body">
            <h4 id="modalHobiName"></h4>
            <p id="modalHobiDescription"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">kembali</button>
          </div>
        </div>
      </div>
    </div>
@endsection