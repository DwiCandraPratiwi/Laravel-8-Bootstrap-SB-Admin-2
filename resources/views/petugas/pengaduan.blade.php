@extends('layouts.admin')
@section('content')
<section>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>NIK</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->tgl_pengaduan }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->isi_laporan }}</td>
                        <td>{{ $data->foto }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            <div class="row">
                                <a href="" class="btn btn-primary">
                                    <i class="fas fa-fw fa-info"></i>
                                </a>
                            </div>
                        </td>
                      </tr>
                    @endforeach 
                    </tbody>
            </table>
          </div>
        </div>
      </div>
</section>
@endsection