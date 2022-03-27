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
            <h3 class="card-title">Ubah data role user</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/users/{{ $user->id }}">
            @method('put')
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Nama User</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama User" name="name" required value="{{ old('name', $user->name) }}">
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" required value="{{ old('email', $user->email) }}">
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <!-- radio -->
              <div class="form-group">
                <label>Role</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="is_admin" value="0" required {{ old('is_admin', $user->is_admin) == '0'? 'checked' : ''}}>
                  <label class="form-check-label">User</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) == '1'? 'checked' : ''}}>
                  <label class="form-check-label">Admin</label>
                </div>
                @error('is_admin')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
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