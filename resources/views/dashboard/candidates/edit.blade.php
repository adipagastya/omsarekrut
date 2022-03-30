@extends('dashboard.layouts.main')

@section('container')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ $title }}</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-lg-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Diri</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/workfields/{{ $candidate->id }}">
            @method('put')
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Nama Kandidat</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->name) }}" required>
              </div>
              <div class="form-group">
                <label>Tanggal Lamaran</label>
                <input type="text" class="form-control" placeholder="Tanggal Lamaran" name="name">
              </div>
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label">wilayah</label>
                  <input type="text" class="form-control" placeholder="Wilayah" name="name">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Bidang Pekerjaan</label>
                  <input type="text" class="form-control" placeholder="Bidang Pekerjaan" name="name">
                </div>
              </div>
              <div class="form-group">
                <label>Wilayah</label>
                <select class="form-control" name="name">
                  <option value="{{ $candidate->status }}" selected>{{ $candidate->status }}</option>
                  <option value="" disabled>------------</option>
                  <option value="Belum Diproses">Belum Diproses</option>
                  <option value="Screening">Screening</option>
                  <option value="Interview">Interview</option>
                  <option value="Interview Lanjutan">Interview Lanjutan</option>
                  <option value="Diterima">Diterima</option>
                  <option value="Ditolak">Ditolak</option>
                </select>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="submit" class="btn btn-primary">Kembali</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
        <!-- /.card -->
      </div>
    </div>
    <!--/.col (left) -->
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection