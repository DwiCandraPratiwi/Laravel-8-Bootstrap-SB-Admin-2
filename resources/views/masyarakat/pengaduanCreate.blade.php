@extends('layouts.home')
@section('content') 
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Pengaduan</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('masyarakat.listPengaduan') }}" class="btn btn-primary">
            Kembali
        </a>
        <br><br>
        <div class="table-responsive">
            <form class="form-signin" action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @method("POST")
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Pengaduan</label>
                    <input type="text" name="tgl_pengaduan" id="tgl_pengaduan" value="{{ $tgl_pengaduan }}" class="form-control" placeholder="Masukkan Nama Lengkap" required readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" value="{{ $nik }}" placeholder="Masukkan nik" required autofocus readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Isi Laporan</label>
                    <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="10" placeholder="Tulis laporan anda" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Foto</label>
                    <input type="file" name="foto" accept="image/" id="foto" aria-label="Pilih Gambar" class="form-control" required>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
