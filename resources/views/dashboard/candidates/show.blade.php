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
            <h3 class="card-title">Foto Kandidat</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/workfields/{{ $candidate->id }}">
            @method('put')
            @csrf
            <div class="card-body">
              <img class="img-fluid pad" src="{{ asset('storage/'.$candidate->profile) }}" alt="Photo">
            </div>
          </form>
        </div>
        <!-- /.card -->
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
                <p>
                  {{ $candidate->studies }}
                </p>
              </div>
              <div class="form-group">
                <label>No Telepon</label>
                <p>
                  {{ $candidate->phone }}
                </p>
              </div>
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
              {{-- <div class="form-group">
                <label>Scan Ijazah</label>
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" value="{{ $candidate->study_certificate }}"> 
                  <span class="input-group-append">
                    <a class="btn btn-info btn-flat" href="{{ route('getimage',$candidate->study_certificate) }}"> Download</a>
                    {{-- <button type="button" class="btn btn-info btn-flat">Download</button> --}}
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label>Sertifikat pendukung</label>
                  @foreach ($certificates as $certificate)
                  <div class="input-group input-group-sm mt-2">
                    <input type="text" class="form-control" value="Sertifikat penunjang {{ $loop->iteration }}"> 
                      <span class="input-group-append">
                        <a class="btn btn-info btn-flat" href="{{ route('getimage', $certificate->img_address) }}"> Download</a>
                        {{-- {{route('getfile', 'lr-file.png')}} --}}
                    {{-- <button type="button" class="btn btn-info btn-flat">Download</button> --}}
                    </span>
                  </div>
                  @endforeach
              </div> 

            </div>
          </form>
        </div>


        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Scan Ijasah</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/workfields/{{ $candidate->id }}">
            @method('put')
            @csrf
            <div class="card-body">
              <img class="img-fluid pad" src="{{ asset('storage/'.$candidate->study_certificate) }}" alt="Photo">
            </div>
          </form>
        </div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Scan Transcript</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/workfields/{{ $candidate->id }}">
            @method('put')
            @csrf
            <div class="card-body">
              <img class="img-fluid pad" src="{{ asset('storage/'.$candidate->transcript) }}" alt="Photo">
            </div>
          </form>
        </div>

        <!-- /.card -->
        @foreach ($workexps as $workexp)
        @if ($candidate->work_exp_id == $workexp->id_candidate)
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Pengalaman Kerja</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/workfields/{{ $candidate->id }}">
            @method('put')
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Nama Instansi</label>
                <p>
                  {{ $workexp->name }}
                </p>
              </div>
              <div class="form-group">
                <label>Tahun</label>
                <p>
                  {{ $workexp->year }}
                </p>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <p>
                  {{ $workexp->description }}
                </p>
              </div>
            </div>
          </form>
        </div>
        @endif
        @endforeach
        <!-- /.card -->

        {{-- <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Sertifikat Penunjuang</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/workfields/{{ $candidate->id }}">
            @method('put')
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Sertifikat - 1</label>
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" value="sertifikat 1"> 
                    <span class="input-group-append">
                  <button type="button" class="btn btn-info btn-flat">Download</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label>Sertifikat - 2</label>
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" value="sertifikat 2"> 
                    <span class="input-group-append">
                  <button type="button" class="btn btn-info btn-flat">Download</button>
                  </span>
                </div>
              </div>
            </div>
          </form>
        </div> --}}
        <!-- /.card -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Bidang Pekerjaan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/workfields/{{ $candidate->id }}">
            @method('put')
            @csrf
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