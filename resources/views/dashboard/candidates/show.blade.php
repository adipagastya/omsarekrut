@extends('dashboard.layouts.main')

@section('container')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ $title }}</h1>
      </div>
      <div class="col-sm-6">
        <a href="/dashboard/candidates/{{ $candidate->id }}/edit" class="btn btn-success p-2 float-right"><i class="fas fa-check mr-2"></i>Konfirmasi</a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-lg-4">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Foto Kandidat</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <img class="img-fluid pad" src="{{ asset('candidate-image/'.$candidate->profile) }}" alt="Photo">
          </div>
        </div>
        <!-- /.card -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Bidang Pekerjaan</h3>
          </div>
          <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label>Wilayah</label>
                <p>
                  @foreach ($regions as $region)
                  {{ $candidate->region_id == $region->id ? $region->name : '' }}@endforeach
                </p>
              </div>
              <div class="form-group">
                <label>Bidang Pekerjaan</label>
                <p>
                  @foreach ($workfields as $workfield)
                  {{ $candidate->workfield_id == $workfield->id ? $workfield->name : '' }}@endforeach
                </p>
              </div>
              <div class="form-group">
                <label>Tipe</label>
                <p>
                  @foreach ($workfields as $workfield)
                  {{ $candidate->workfield_id == $workfield->id ? $workfield->type : '' }}@endforeach
                </p>
              </div>
            </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->

      <div class="col-lg-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Diri</h3>
          </div>
          <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <p>
                  {{ $candidate->name }}
                </p>
              </div>
              <div class="form-group">
                <label>No Telepon</label>
                <p>
                  {{ $candidate->phone }}
                </p>
              </div>
              <div class="form-group">
                <label>Email</label>
                <p>
                  {{ $candidate->email }}
                </p>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                <p>
                  {{ $candidate->place_birth }}
                </p>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <p>
                {{ $candidate->date_birth }}
                </p>
              </div>
            </div>
        </div>
        <!-- /.card -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Pendidikan Terakhir</h3>
          </div>
          <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label>Nama Universitas / Institut / Sekolah</label>
                <p>
                  {{ $candidate->studies }}
                </p>
              </div>
              {{-- <div class="form-group">
                <label>No Telepon</label>
                <p>
                  {{ $candidate->phone }}
                </p>
              </div> --}}
              <div class="form-group">
                <label>Jurusan</label>
                <p>
                  {{ $candidate->major }}
                </p>
              </div>
              <div class="form-group">
                <label>Tingkat Pendidikan</label>
                <p>
                  {{ $candidate->edu_level }}
                </p>
              </div>
              <div class="form-group">
                <label>Tahun Lulus</label>
                <p>
                  {{ $candidate->grad_year }}
                </p>
              </div>
              <label>Scan Ijazah</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan Ijazah" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button">View</button>
                  <button class="btn btn-success" type="button">Download</button>
                </div>
              </div>
              <br>
              <label>Scan Transkrip</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan Transkrip" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button">View</button>
                  <button class="btn btn-success" type="button">Download</button>
                </div>
              </div>
            </div>
        </div>
        <!-- /.card -->
        @foreach ($workexps as $workexp)
        @if ($candidate->work_exp_id == $workexp->id_candidate)
        @if ($workexp->work_name != null)
        <!-- /.card -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Pengalaman Kerja</h3>
          </div>
          <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label>Nama Instansi</label>
                <p>
                  {{ $workexp->work_name }}
                </p>
              </div>
              <div class="form-group">
                <label>Jabatan</label>
                <p>
                  {{ $workexp->position }}
                </p>
              </div>
              <div class="form-group">
                <label>Tanggal Mulai</label>
                <p>
                  {{ $workexp->start_year }}
                </p>
              </div>
              <div class="form-group">
                <label>Tanggal Berhenti</label>
                <p>
                  {{ $workexp->end_year }}
                </p>
              </div>
              <div class="form-group">
                <label>Lama Kerja</label>
                <p> <?php
                $age = date_diff(date_create($workexp->end_year), date_create($workexp->start_year));
                  echo $age->format("%y tahun %m bulan"); 
                ?>
                </p>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <p>
                  {{ $workexp->description }}
                </p>
              </div>
            </div>
        </div>
        @endif
        @endif
        @endforeach

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Dokumen Kelengkapan</h3>
          </div>
          <!-- /.card-header -->
            <div class="card-body">
              <label>Scan SKCK</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan SKCK" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button">View</button>
                  <button class="btn btn-success" type="button">Download</button>
                </div>
              </div>
              <br>
              <label>Scan Surat Sehat</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Surat Sehat" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button">View</button>
                  <button class="btn btn-success" type="button">Download</button>
                </div>
              </div>
              <br>
              <label>Scan STR</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan STR" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button">View</button>
                  <button class="btn btn-success" type="button">Download</button>
                </div>
              </div>
              <br>
              <label>Scan Sertifikat Pendukung</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Sertifikat penunjang" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button">View</button>
                  <button class="btn btn-success" type="button">Download</button>
                </div>
              </div>
              <br>
            </div>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!--/.col (left) -->
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection