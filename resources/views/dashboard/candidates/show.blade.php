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
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->name) }}" required>
              </div>
              <div class="form-group">
                <label>No Telepon</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->phone) }}" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->email) }}" required>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->place_birth) }}" required>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->date_birth) }}" required>
              </div>
            </div>
          </form>
        </div>
        <!-- /.card -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Pendidikan Terakhir</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/workfields/{{ $candidate->id }}">
            @method('put')
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Nama Universitas / Institut / Sekolah</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->studies) }}" required>
              </div>
              <div class="form-group">
                <label>No Telepon</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->phone) }}" required>
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->major) }}" required>
              </div>
              <div class="form-group">
                <label>Tingkat Pendidikan</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->edu_level) }}" required>
              </div>
              <div class="form-group">
                <label>Tahun Lulus</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->grad_year) }}" required>
              </div>
              <div class="form-group">
                <label>Scan Ijazah</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->study_certificate) }}" required>
              </div>
              <div class="form-group">
                <label>Scan Transcript</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name', $candidate->transcript ) }}" required>
              </div>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!--/.col (left) -->
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection