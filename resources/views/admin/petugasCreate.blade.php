@extends('layouts.admin')
@section('content') 
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Data Petugas</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('petugas.index') }}" class="btn btn-primary">
            Kembali
        </a>
        <br><br>
        <div class="table-responsive">
            <form class="form-signin" action="{{ route('petugas.store') }}" method="POST">
                @method("POST")
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Nama Petugas</label>
                    <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" placeholder="Masukkan nik" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="Masukkan Username" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Telp</label>
                    <input type="text" name="telp" id="telp" class="form-control" placeholder="Telepon" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="" selected disabled hidden>--Select Level--</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
