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
      <div class="col-12">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
            </div>
        @endif

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel data <?= strtolower($title)  ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Kandidat</th>
                  <th>Tanggal Lamaran</th>
                  <th>Wilayah</th>
                  <th>Bidang Pekerjaan </th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($candidates as $candidates)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $candidates->name }}</td>
                  <td>{{ $candidates->application_date }}</td>
                  <td> @foreach ($regions as $region)
                    {{ $candidates->region_id == $region->id ? $region->name : ''}}
                    @endforeach</td>
                  <td>@foreach ($workfields as $workfield)
                    {{ $candidates->workfield_id == $workfield->id ? $workfield->name : '' }}
                    @endforeach </td>
                  <td>
                      <a href="/dashboard/candidates/{{ $candidates->id }}" class="badge bg-info p-2"><i class="fas fa-eye"></i></a>
                      <a href="/dashboard/candidates/{{ $candidates->id }}/edit" class="badge bg-warning p-2"><i class="fas fa-pen"></i></a>
                      <form action="/dashboard/candidates/{{ $candidates->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0 p-2" onclick="return confirm('Anda yakin?')"><i class="fas fa-trash"></i></button>
                      </form>
                  </td>
                </tr>
                @endforeach
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection