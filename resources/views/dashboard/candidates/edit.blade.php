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
            <h3 class="card-title">Ubah status</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/candidates/{{ $candidate->id }}">
            @method('put')
            @csrf
            <div class="card-body">
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label>Nama Kandidat</label>
                  <p>
                    {{ $candidate->name }}
                  </p>
                </div>
                <div class="col-md-6">
                  <label>Tanggal Lamaran</label>
                  <p>
                    {{ $candidate->application_date }}
                  </p>
                </div>
              </div>
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label">Bidang Pekerjaan</label>
                  <p>
                    @foreach ($workfields as $workfield)
                    {{ $candidate->workfield_id == $workfield->id ? $workfield->name : '' }}
                    @endforeach
                  </p>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Wilayah</label>
                  <p>
                    @foreach ($regions as $region)
                    {{ $candidate->region_id == $region->id ? $region->name : ''}}
                    @endforeach
                  </p>
                </div>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
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
              <a href="/dashboard/candidates" class="btn btn-danger">Kembali</a>
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