<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/formstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>OMSA Medic | {{ $title }}</title>
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            </div>
        @endif
        
        <form action="/" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex" id="flexContainer">
                <div class="me-4 col-3" id="fotoForm">
                    <img id="file-ip-1-preview" src="img/default.jpg" alt="" style="max-width: 100%; height: auto;">
                    <input type="file" id="pp" name="profile" style="display:none;" onchange="showPreview(event);" required />
                    <a class="btn btn-primary mt-3" type="button" style="width: 100%;" id="button" name="button" value="Upload" onclick="thisFileUpload();">Upload Foto</a>
                </div>

                <div class="col-9" id="idForm">

                    <input type="hidden" name="application_date" value="<?= date("Y/m/d") ?>">

                    <div class="mb-3"><b>DATA DIRI</b></div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="No. Telepon" name="phone" value="{{ old('phone') }}" required>
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control @error('place_birth') is-invalid @enderror" placeholder="Tempat Lahir" name="place_birth" value="{{ old('place_birth') }}" required>
                            @error('place_birth')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('date_birth') is-invalid @enderror" name="date_birth" value="{{ old('date_birth') }}" required>
                            @error('date_birth')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3"><b>PENDIDIKAN TERAKHIR</b></div>

                    <div class="mb-3">
                        <label class="form-label">Nama Universitas / Institut / Sekolah</label>
                        <input type="text" class="form-control @error('studies') is-invalid @enderror" placeholder="Nama Universitas / Institut / Sekolah" name="studies" value="{{ old('studies') }}" required>
                        @error('studies')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control @error('major') is-invalid @enderror" placeholder="Jurusan" name="major" value="{{ old('major') }}" required>
                        @error('major')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tingkat</label>
                            <input type="text" class="form-control @error('edu_level') is-invalid @enderror" placeholder="Tingkat" name="edu_level" value="{{ old('edu_level') }}" required>
                            @error('edu_level')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tahun</label>
                            <input type="text" class="form-control @error('grad_year') is-invalid @enderror" placeholder="Tahun" name="grad_year" value="{{ old('grad_year') }}" required>
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
                            <input type="file" class="form-control @error('study_certificate') is-invalid @enderror" name="study_certificate" required>
                            <span class="badge bg-danger mt-2">*Pastikan gambar berformat .jpg dengan ukuran <800kb</span>
                            @error('study_certificate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Scan Transkrip</label>
                            <input type="file" class="form-control @error('transcript') is-invalid @enderror" name="transcript" required>
                            <span class="badge bg-danger mt-2">*Pastikan gambar berformat .jpg dengan ukuran <800kb</span>
                            @error('transcript')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
        

                    <div class="mb-3"><b>PENGALAMAN KERJA</b></div>

                    <div class="mb-3">
                        <label class="form-label">Nama Instansi</label>
                        <input type="text" class="form-control" placeholder="Nama Instansi" name="work_name" value="Nama Instansi" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="number" class="form-control" placeholder="Tahun" name="work_year" value="0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi..." rows="3" name="description">Deskripsi</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Instansi</label>
                        <input type="text" class="form-control" placeholder="Nama Instansi" name="work_name1" value="Nama Instansi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="number" class="form-control" placeholder="Tahun" name="work_year1" value="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi..." rows="3" name="description1">Deskripsi</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Instansi</label>
                        <input type="text" class="form-control" placeholder="Nama Instansi" name="work_name2" value="Nama Instansi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="number" class="form-control" placeholder="Tahun" name="work_year2" value="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi..." rows="3" name="description2">Deskripsi</textarea>
                    </div>

                    <div class="mb-3"><b>SERTIFIKAT PENUNJANG</b></div>

                    <div class="mb-3">
                        <div class="input-group hdtuto control-group lst increment" >
                            <input type="file" name="img_address[]" class="myfrm form-control @error('img_address[]') is-invalid @enderror">
                            <div class="input-group-btn"> 
                            <button class="btn btn-success btntambah" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                            @error('img_address[]')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="clone hide d-none">
                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                            <input type="file" name="img_address[]" class="myfrm form-control @error('img_address[]') is-invalid @enderror">
                            <div class="input-group-btn"> 
                                <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                            @error('img_address[]')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3"><b>BIDANG PEKERJAAN</b></div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Wilayah</label>
                        <select class="form-select" name="region_id" id="wilayah" required>
                            <option selected>Pilih Wilayah</option>
                            <option disabled value="">------------------</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Posisi</label>
                        <select class="form-select" name="workfield_id" id="posisi" required>
                            <option value="">Pilih Posisi</option>
                            <option disabled value="">------------------</option>
                        </select>
                    </div>
                    <button class="w-20 btn btn-success" type="submit" id="btSubmit" onclick="return confirm('Pastikan semua data sudah benar!, kirim lamaran?')">Kirim Lamaran</button>
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
        })

            

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            console.log("ini jalan saat gagagl upload");
           
            var increment = 0 
        $(".btn-success").click(function(){ 
            console.log("jalan tambah ");
            if(increment < 2){
                increment = increment + 1 
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
            } 
        });  
        $("body").on("click",".btn-danger",function(){ 
            console.log("remove jalan");
            increment = increment - 1
            $(this).parents(".hdtuto").remove();
        });

        // $("body").on("click",".btn-success",function(){ 
        //     if(increment < 2){
        //         increment = increment + 1 
        //     var lsthmtl = $(".clone").html();
        //     $(".increment").after(lsthmtl);
        //     } 
        // });

        

        });
    </script>
    
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/config.js" type="text/javascript"></script>
    </body>
    
    </html>