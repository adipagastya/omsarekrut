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
              <div class="form-group">
                <label>Alamat KTP</label>
                <p>
                {{ $candidate->address }}
                </p>
              </div>
              <div class="form-group">
                <label>Alamat Domisili</label>
                <p>
                {{ $candidate->residence_address }}
                </p>
              </div>
              <label>Scan KTP</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan KTP" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#ktpModalCenter">View</button>
                  <a href="{{ route('getCandidateImage', $candidate->personal_id_card) }}" class="btn btn-success" type="button" >Download</a>


                    <!-- Modal -->
                    <div class="modal fade" id="ktpModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">KTP</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <img class="img-fluid" src="{{ asset('candidate-image/'.$candidate->personal_id_card) }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal -->
 
                 </div>
               </div>
               <br>
               <label>Scan Kartu Keluarga</label>
               <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan Kartu Keluarga" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#kkModalCenter">View</button>
                  <a href="{{ route('getCandidateImage', $candidate->family_id_card) }}" class="btn btn-success" type="button" >Download</a>


                    <!-- Modal -->
                    <div class="modal fade" id="kkModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Kartu Keluarga</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <img class="img-fluid" src="{{ asset('candidate-image/'.$candidate->family_id_card) }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal -->
 
                 </div>
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
                  <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#ijazahModalCenter">View</button>
                  <a href="{{ route('getCandidateImage', $candidate->study_certificate) }}" class="btn btn-success" type="button" >Download</a>


                    <!-- Modal -->
                    <div class="modal fade" id="ijazahModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ijazah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <img class="img-fluid" src="{{ asset('candidate-image/'.$candidate->study_certificate) }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal -->
 
                 </div>
               </div>
               <br>
                @if (!$candidate->transcript == null)
                    
               
               <label>Scan Transkrip</label>
               <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan Transkrip" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#transkripModalCenter">View</button>
                  <a href="{{ route('getCandidateImage', $candidate->transcript) }}" class="btn btn-success" type="button" >Download</a>

                    <!-- Modal -->
                    <div class="modal fade" id="transkripModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Transkrip Nilai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <img class="img-fluid" src="{{ asset('candidate-image/'.$candidate->transcript) }}">
                          </div>
                        </div>
                      </div>
                    </div>
                   <!-- End Modal -->

                </div>
              </div>
              @endif
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
              @if (!$candidate->skck == null)
              <label>Scan SKCK</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan SKCK" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#skckModalCenter" >View</button>
                  <a href="{{ route('getCandidateImage', $candidate->skck) }}" class="btn btn-success" type="button" >Download</a>
                  <!-- Modal -->
                  <div class="modal fade" id="skckModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">SKCK</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <img class="img-fluid" src="{{ asset('candidate-image/'.$candidate->skck) }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              @endif
              @if (!$candidate->health_information == null)
                  
              <label>Scan Surat Sehat</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan Surat Sehat" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#suratSehatModalCenter">View</button>
                  <a href="{{ route('getCandidateImage', $candidate->health_information) }}" class="btn btn-success" type="button" >Download</a>

                  <!-- Modal -->
                  <div class="modal fade" id="suratSehatModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Surat Keterangan Sehat</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <img class="img-fluid" src="{{ asset('candidate-image/'.$candidate->health_information) }}">
                        </div>
                      </div>
                    </div>
                  </div>
                 <!-- End Modal -->
                </div>
              </div>
              <br>
              @endif

              @if (!$candidate->str_certificate == null)
              <label>Scan STR</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan STR" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#strModalCenter">View</button>
                  <a href="{{ route('getCandidateImage', $candidate->str_certificate) }}" class="btn btn-success" type="button" >Download</a>
                    <!-- Modal -->
                    <div class="modal fade" id="strModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">STR / STRA /STRTTK</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <img class="img-fluid" src="{{ asset('candidate-image/'.$candidate->str_certificate) }}">
                          </div>
                        </div>
                      </div>
                    </div>
                   <!-- End Modal -->

                </div>
              </div>
              <br>
              @endif


              @if (!$candidate->certificate_address == null)
                  
              <br>
              <label>Scan Pendukung</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan STR" readonly>
                <div class="input-group-append">
                  {{-- <a href="{{ link_to_asset('candidate-image/'.$candidate->str_certificate) }}" class="btn btn-outline-success" type="button">View</a> --}}
                  <a href="{{ asset('candidate-image/'.$candidate->certificate_address) }}" target="_blank" class="btn btn-outline-success" type="button">View</a>
                  {{-- <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#strModalCenter">View</button> --}}
                  <a href="{{ route('getCandidateImage',$candidate->certificate_address) }}" class="btn btn-success" type="button" >Download</a>
                 

                </div>
              </div>
              <br>
              @endif
          


              {{-- @if (!$certificates->isEmpty())
              <label>Scan Sertifikat Pendukung</label>
              @foreach ($certificates as $certificate)
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Scan Sertifikat Pendukung" readonly>
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#srtPendukungModalCenter">View</button>
                  <a href="{{ route('getimage', $certificate->img_address) }}" class="btn btn-success" type="button" >Download</a>
              
                      <!-- Modal -->
                  <div class="modal fade" id="srtPendukungModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Dokumen Penunjang</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <img class="img-fluid" src="{{ asset('certificates/'.$certificate->img_address) }}">
                        </div>
                      </div>
                    </div>
                  </div>
                 <!-- End Modal -->

                </div>
              </div>

              @endforeach
              @endif
              <br> --}}

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