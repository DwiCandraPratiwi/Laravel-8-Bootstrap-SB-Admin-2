@extends('layouts.admin')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <a href="{{ route('petugas.create') }}" class="btn btn-primary">
                Tambah Petugas
            </a>
            <br><br>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Password</th>
                <th>Telp</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_petugas }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->password }}</td>
                <td>{{ $data->telp }}</td>
                <td>{{ $data->level }}</td>
                <td>
                    <a href="{{ route('petugas.edit', $data->id_petugas) }}" class="btn btn-primary">
                        <i class="fas fa-fw fa-edit"></i>
                    </a>
                    <button action="{{ route('petugas.destroy', $data->id_petugas) }}" method="POST" 
                        type="submit" class="btn btn-danger" onclick="confirm('Yakin ingin menghapus?')">
                        @csrf 
                        @method('DELETE')
                        <i class="fas fa-fw fa-trash"></i>
                    </button>
                </td>
              </tr>
            @endforeach 
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection
