<!doctype html>
<html lang="en">

<head>
    <!-- required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" >

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/formstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>OMSA Medic | {{ $title }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/img/favico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favico/favicon-16x16.png">
    <link rel="manifest" href="/img/favico/site.webmanifest"> 
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a href="https://www.omsamedic.com/" class="navbar-brand"><img src="img/logo.png" alt="" width="150px"></a>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="mb-5 mt-5 text-center"><b>{{ $title }}</b> - OMSA MEDIC</h3>

        @if (session()->has('success'))
        <script>
            Swal.fire({
                title: 'LAMARAN TERKIRIM',
                text: '{{ session("success")  }}',
                icon: 'success',
                showConfirmButton: false, 
                showCloseButton:true
            })
        </script>
        @endif
        
        <form action="/" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex" id="flexContainer">

                <div class="me-4 col-3" id="fotoForm">
                    <div class="col-12">
                        <img id="file-ip-1-preview" src="img/default.jpg" alt="" style="max-width: 100%; height: auto;">
                        <input type="file" id="pp" name="profile" style="display:none;" onchange="showPreview(event);" class="@error('profile') is-invalid @enderror">
                        <a class="btn btn-primary mt-3" type="button" style="width: 100%;" id="button" name="button" value="Upload" onclick="thisFileUpload();">Upload Foto</a>
                        @error('profile')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mt-5">

                       
                    <div class="mb-3"><b>BIDANG PEKERJAAN</b></div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Wilayah</label>
                        <select class="form-select @error('region_id') is-invalid @enderror" name="region_id" id="wilayah" >
                            <option selected>Pilih Wilayah</option>
                            <option disabled value="">------------------</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                        @error('region_id')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror   
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Posisi</label>
                        <select class="form-select @error('workfield_id') is-invalid @enderror" name="workfield_id" id="posisi">
                            <option>Pilih Posisi</option>
                            <option disabled value="">------------------</option>
                        </select>
                        @error('workfield_id')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    </div>

                </div>
               

                <div class="col-9" id="idForm">

                    <input type="hidden" name="application_date" value="<?= date("Y/m/d") ?>">

                    <div class="mb-3"><b>DATA DIRI</b></div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="No. Telepon" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control @error('place_birth') is-invalid @enderror" placeholder="Tempat Lahir" name="place_birth" value="{{ old('place_birth') }}">
                            @error('place_birth')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('date_birth') is-invalid @enderror" name="date_birth" value="{{ old('date_birth') }}">
                            @error('date_birth')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>                        
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto KTP</label>
                        <input type="file" class="form-control @error('personal_id_card') is-invalid @enderror" name="personal_id_card">
                        <span class="badge bg-danger mt-2">*Pastikan gambar berformat .jpg dengan ukuran <800kb</span>
                        @error('personal_id_card')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto KK</label>
                        <input type="file" class="form-control @error('family_id_card') is-invalid @enderror" name="family_id_card">
                        <span class="badge bg-danger mt-2">*Pastikan gambar berformat .jpg dengan ukuran <800kb</span>
                        @error('family_id_card')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Scan SKCK</label>
                        <input type="file" class="form-control @error('skck') is-invalid @enderror" name="skck">
                        <span class="badge bg-danger mt-2">*Pastikan gambar berformat .jpg dengan ukuran <800kb</span>
                        @error('skck')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Surat Keterangan Sehat</label>
                        <input type="file" class="form-control @error('health_information') is-invalid @enderror" name="health_information">
                        <span class="badge bg-danger mt-2">*Pastikan gambar berformat .jpg dengan ukuran <800kb</span>
                        @error('health_information')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                   

                    <div class="mb-3">
                        <label class="form-label">Alamat Sesuai KTP</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat Sesuai KTP" name="address" value="{{ old('address') }}">
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Domisili</label>
                        <input type="text" class="form-control @error('residence_address') is-invalid @enderror" placeholder="Alamat Domisili" name="residence_address" value="{{ old('residence_address') }}">
                        @error('residence_address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3"><b>KONTAK YANG DAPAT DIHUBUNGI</b></div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('family_name') is-invalid @enderror" placeholder="Nama" name="family_name" value="{{ old('family_name') }}">
                      
                        @error('family_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hubungan</label>
                        <input type="text" class="form-control @error('family_status') is-invalid @enderror" placeholder="Hubungan" name="family_status" value="{{ old('family_status') }}">
                        <span class="badge bg-secondary mt-2">contohnya ayah, ibu, wali , dll</span>
                        @error('family_status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No telp</label>
                        <input type="text" class="form-control @error('family_phone') is-invalid @enderror" placeholder="No telp" name="family_phone" value="{{ old('ffamily_phone') }}">
                        @error('family_phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3"><b>PENDIDIKAN TERAKHIR</b></div>

                    <div class="mb-3">
                        <label class="form-label">Nama Universitas / Institut / Sekolah</label>
                        <input type="text" class="form-control @error('studies') is-invalid @enderror" placeholder="Nama Universitas / Institut / Sekolah" name="studies" value="{{ old('studies') }}">
                        @error('studies')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control @error('major') is-invalid @enderror" placeholder="Jurusan" name="major" value="{{ old('major') }}">
                        @error('major')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tingkat</label>
                            <select class="form-select @error('edu_level') is-invalid @enderror" name="edu_level" >
                                <option selected>Pilih Pendidikan Terakhir</option>
                                <option value="SMA/K">SMA/K</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Sarjana">Sarjana</option>
                                
                            </select>
                            @error('edu_level')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror   
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tahun Lulus</label>
                            <input type="text" class="form-control @error('grad_year') is-invalid @enderror" placeholder="Tahun" name="grad_year" value="{{ old('grad_year') }}">
                            @error('grad_year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Scan Ijazah</label>
                            <input type="file" class="form-control @error('study_certificate') is-invalid @enderror" name="study_certificate">
                            <span class="badge bg-danger mt-2">*Pastikan gambar berformat .jpg dengan ukuran <800kb</span>
                            @error('study_certificate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Scan Transkrip</label>
                            <input type="file" class="form-control @error('transcript') is-invalid @enderror" name="transcript">
                            <span class="badge bg-danger mt-2">*Pastikan gambar berformat .jpg dengan ukuran <800kb</span>
                            @error('transcript')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3" id="checkdisplay">
                        <label class="form-label">Sertifikat STR</label>
                        <input type="file" class="form-control @error('str_certificate') is-invalid @enderror" name="str_certificate">
                        <span class="badge bg-secondary mt-2">* wajib diisi untuk pelamar medis </span>
                        @error('str_certificate')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
        

                    <div class="mb-3"><b>PENGALAMAN KERJA</b></div>

                    <div class="mb-3">
                        <label class="form-label">Nama Instansi</label>
                        <input type="text" class="form-control" placeholder="Nama Instansi" name="work_name" value="Nama Instansi" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Pimpinan</label>
                        <input type="text" class="form-control" placeholder="Nama Pimpinan" name="lead_name" value="Nama Pimpinan" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">telp Pimpinan</label>
                        <input type="number" class="form-control" placeholder="No telp Pimpinan " name="lead_phone_number" value="telp pimpinan" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Posisi</label>
                        <input type="text" class="form-control" placeholder="Posisi terakhir" name="position" value="posisi terakhir" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" placeholder="Tahun" name="start_year" value="{{ date('Y-m-d') }}" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Resign</label>
                        <input type="date" class="form-control" placeholder="Tahun" name="end_year" value="{{ date('Y-m-d') }}" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi..." rows="3" name="description">Deskripsi</textarea>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Nama Instansi</label>
                        <input type="text" class="form-control" placeholder="Nama Instansi" name="work_namei" value="Nama Instansi" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Pimpinan</label>
                        <input type="text" class="form-control" placeholder="Nama Pimpinan" name="lead_namei" value="Nama Pimpinan" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">telp Pimpinan</label>
                        <input type="number" class="form-control" placeholder="No telp Pimpinan " name="lead_phone_numberi" value="telp pimpinan" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Posisi</label>
                        <input type="text" class="form-control" placeholder="Posisi terakhir" name="positioni" value="posisi terakhir" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" placeholder="Tahun" name="start_yeari" value="{{ date('Y-m-d') }}" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Resign</label>
                        <input type="date" class="form-control" placeholder="Tahun" name="end_yeari" value="{{ date('Y-m-d') }}" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi..." rows="3" name="descriptioni">Deskripsi</textarea>
                    </div>

                    <div class="mb-3"><b>SERTIFIKAT PENUNJANG</b></div>

                    <div class="mb-3">
                        <div class="input-group hdtuto control-group lst increment" >
                            <input type="file" name="img_address[]" class="myfrm form-control @error('img_address[]') is-invalid @enderror">
                            <div class="input-group-btn"> 
                            <button class="btn btn-success btn-add-sertif" type="button"><i class="fldemo glyphicon glyphicon-plus" onclick="showModal()"></i>Add</button>
                            </div>
                            @error('img_address[]')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <span class="badge bg-danger mt-2">*Pastikan gambar berformat .jpg dengan ukuran <800kb</span>
                        <div class="clone hide d-none">
                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                            <input type="file" name="img_address[]" class="myfrm form-control @error('img_address[]') is-invalid @enderror">
                            <div class="input-group-btn"> 
                                <button class="btn btn-danger btn-remove-sertif" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                            @error('img_address[]')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <button class="w-20 btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal")">Kirim Lamaran</button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Lamaran Anda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Pastikan semua data sudah benar! kirim lamaran?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </div>
                </div>
            </div>

        </form>


    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center" id="txtReserved">
                <span class="text-muted">© <?= date("Y") ?>, OMSA GROUP. All right reserved</span>
            </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex" id="icoSosmed">
                <li class="ms-3">
                    <a href="https://www.facebook.com/omsamedic/" class="text-muted">
                        <i class="bi bi-facebook"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a href="https://www.instagram.com/omsa.medic" class="text-muted">
                        <i class="bi bi-instagram"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a href="https://www.youtube.com/channel/UCi9JBjs0vbY9i3uV8L7-lag" class="text-muted">
                        <i class="bi bi-youtube"></i>
                    </a>
                </li>
            </ul>
        </footer>
    </div>

    <script src=" js/bootstrap.bundle.min.js">
    </script>
    <script src="js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    
    <script>
        function thisFileUpload() {
            document.getElementById("pp").click();
        };
    </script>
    
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        

    </script>
    
    <script>

        $(document).ready(function(){

            $('#wilayah').on('change',function(){

                var regionsId = $(this).val(); 
                if(regionsId){
                    $.ajax({
                        url:'/recruit/'+regionsId, 
                        type:'GET', 
                        data:{"_token":"{{ csrf_token() }}"}, 
                        dataType:"json", 
                        success:function(data){ 

                            if(data.length > 0){
                                $('#posisi').empty();
                                $('#posisi').append('<option hidden>Pilih Posisi</option>'); 
                                $.each(data, function(index, showdata){
                                $('select[name="workfield_id"]').append('<option value="'+ showdata.id +'">' + showdata.name+ '</option>');
                                })
                            }else{
                                $('#posisi').empty();
                                $('#posisi').append('<option>Tidak ada lowongan </option>'); 
                            }

                        }
                    }); 
                }

            })





            // ============== tambah dan hapus input sertifikat ==============

         
                var increment = 0 
                $(".btn-add-sertif").click(function(){ 
                     if(increment < 2){
                        increment = increment + 1 
                        var lsthmtl = $(".clone").html();
                        $(".increment").after(lsthmtl);
                     } 
                });  

                $("body").on("click",".btn-remove-sertif",function(){ 
                    increment = increment - 1
                    $(this).parents(".hdtuto").remove();
                });
        // ============== akhir tambah dan hapus input sertifikat ==============

            })
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
    
    </html>