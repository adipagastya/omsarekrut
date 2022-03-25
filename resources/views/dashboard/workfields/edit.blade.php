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
            <h3 class="card-title">Ubah data pekerjaan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/workfields/{{ $workfield->id }}">
            @method('put')
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Nama Pekerjaan</label>
                <input type="text" class="form-control" placeholder="Nama Pekerjaan" name="name" value="{{ old('name', $workfield->name) }}" required>
              </div>
              
              <!-- select -->
              <div class="form-group">
                <label>Wilayah</label>
                <select class="form-control" name="region_id" required>
                  @foreach ($regions as $region)
                      @if (old('region_id', $workfield->region_id) == $region->id)
                          <option value="{{ $region->id }}" selected>{{ $region->name }}</option>
                      @else
                          <option value="{{ $region->id }}">{{ $region->name }}</option>
                      @endif
                  @endforeach
                </select>
              </div>
              <!-- radio -->
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="type" value="Medical" checked>
                  <label class="form-check-label">Medical</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="type" value="Non Medical">
                  <label class="form-check-label">Non Medical</label>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
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