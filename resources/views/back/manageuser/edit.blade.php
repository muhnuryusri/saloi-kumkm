@extends('layouts.main')
@section('container')
@include('partials.navbar')
<!-- begincontent -->
<body style="text-align: center;">
    <div class="container my-5">
        <div class="card shadow bg-body border-radius border-0">
            <div class="card-header bg-white ">
                <div class="row justify-content-center">
                    <div class="row col-md-10 col-md-offset-1 p-0">
                        <div class="m-0 p-0">
                            <p class="fs-2 fw-bold m-0 text-start">Edit Profile</p>
                        </div>
                        {{-- <div class="col m-0 p-0 fw-bold text-primary d-flex align-items-center flex-row-reverse">
                            <i class="bi bi-chevron-right"></i>
                            <a href="/daftar-usaha-2"><p class="m-0 px-2">Lanjut</p></a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-md-offset-1 pt-4 pb-5">
                    <form method="POST" action="{{ route('manageuser.update',$user->id) }}" class="f1" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT') 
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="20" data-number-of-steps="4" style="width: 25%;"></div>
                            </div>
                            <div class="f1-step regis active fw-bold">
                                <div class="f1-step-icon fw-bold"><i class="fa fa-user"></i></div>
                                <p>1. Informasi Pribadi</p>
                            </div>
                            <div class="f1-step regis">
                                <div class="f1-step-icon"><i class="fa fa-home"></i></div>
                                <p>2. Informasi Alamat</p>
                            </div>
                            <div class="f1-step regis">
                                <div class="f1-step-icon"><i class="fa fa-address-book"></i></div>
                                <p>3. Informasi Kontak</p>
                            </div>
                            <div class="f1-step regis">
                                <div class="f1-step-icon"><i class="fa fa-check"></i></div>
                                <p>Selesai</p>
                            </div>
                            
                        </div>
                        <!-- step 1 -->
                        <fieldset>
                            <div class="row g-3 my-4">
                                <div class="col-md-9 col-sm-12">
                                    <div class="row g-3 align-items-end ">
                                        <div class="col-md-8 col-sm-12">
                                            <label for="no_ktp" class="form-label">Nomor KTP/NIK <span class="text-danger">*</span></label>
                                            <div class=" col-md-12 input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                                                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" name="no_ktp" value="{{ old('no_ktp', $user->no_ktp) }}">
                                                @error('no_ktp')
                                                <div class="invalid-feedback d-block text-start">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-grid">
                                            <div class=" col-md-12 input-group mb-3">
                                                <button class="btn btn-primary btn-block ">Verifikasi NIK</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                            <div class=" col-md-12 input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
                                                @error('name')
                                                <div class="invalid-feedback d-block text-start">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                            <div class=" col-md-12 input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
                                                @error('tempat_lahir')
                                                <div class="invalid-feedback d-block text-start">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tgl_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                            <div class=" col-md-12 input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $user->tgl_lahir) }}">
                                                @error('tgl_lahir')
                                                <div class="invalid-feedback d-block text-start">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-7 pe-0 row align-items-end ">
                                    <div class="col-sm-6 col-md-12 mb-3 text-center px-3 ">
                                        @if($user->image)
                                            <img class="rounded-circle " src="{{ old('image', $user->image) }}" id="yourimage" width="100%"  alt="" style="width:200px;height:200px;object-fit: cover;object-position: top;"><br>
                                        @else
                                            <img class="rounded-circle d-none" src="" id="yourimage" width="100%"  alt="" style="width:200px;height:200px;object-fit: cover;object-position: top;"><br>
                                        @endif
                                    </div>
                                    <div class="mb-1 col-md-12 pe-0 " >
                                        <p class="image_upload" >
                                            <input type="hidden" name="oldImages" id="" value="{{ $user->image }}">
                                            <label for="profileimage" style="display: block">
                                                <a class="btn btn-primary btn-block text-white" rel="nofollow" >Unggah Foto</a>
                                            </label>
                                            <input type="file" name="image" id="profileimage" style="display: none;"  class=" @error('image') is-invalid @enderror" value="{{ old('image', $user->image) }}">
                                            @error('image')
                                            <div class="invalid-feedback d-block text-start">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>
                        <!-- step 2 -->
                        <fieldset>
                            <div class="my-4">
                                <div class="col-12 my-4">
                                    <label for="alamat_rumah" class="form-label">Alamat Rumah <span class="text-danger">*</span></label>
                                    <div class=" col-md-12 input-group ">
                                        <span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
                                        <input type="text" class="form-control @error('alamat_rumah') is-invalid @enderror" id="alamat_rumah" name="alamat_rumah" value="{{ old('alamat_rumah', $user->alamat_rumah) }}">
                                        @error('alamat_rumah')
                                        <div class="invalid-feedback d-block text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 my-4">
                                    <label for="kota" class="form-label">Pilih Provinsi <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="kota"><i class="bi bi-building"></i></span>
                                        <select id="country" class="form-control value={{ old('kota') }} "  name="province_id">
                                            <option value="{{ old('province_id', $user->province_id) }}">{{strtolower($user->province->name)}}</option>
                                            @foreach($country as $list)
                                            <option value="{{$list->id}}">{{strtolower($list->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 my-4">
                                    <label for="kota" class="form-label">Kota/Kabupaten <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="kota"><i class="bi bi-building"></i></span>
                                        <select id="state"  name="regency_id" class="form-control" >
                                            <option value="{{ old('regency_id', $user->regency_id) }}">{{strtolower($user->regency->name)}}</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12 my-4">
                                    <label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-building"></i></span>
                                        <select id="city" name="district_id"  class="form-control @error('kecamatan') is-invalid @enderror"  >
                                            <option value="{{ old('district_id', $user->district_id) }}">{{strtolower($user->district->name)}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 my-4                                   <label for="kelurahan" class="form-label">Kelurahan <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-building"></i></span>
                                        <select id="village" name="village_id"  class="form-control value={{ old('kelurahan') }}" >
                                            <option value="{{ old('village_id', $user->village_id) }}">{{strtolower($user->village->name)}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>
                        <!-- step 3 -->
                        <fieldset>
                            <div class="my-4">
                                <div class="col-12 my-4">
                                    <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                                    <div class=" col-md-12 input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                        <div class="invalid-feedback d-block text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 my-4">
                                    <label for="no_telpon" class="form-label">No. Hp/Whatsapp <span class="text-danger">*</span></label>
                                    <div class=" col-md-12 input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                        <input type="number" class="form-control @error('no_telpon') is-invalid @enderror" id="no_telpon" name="no_telpon" value="{{ old('no_telpon', $user->no_telpon) }}">
                                        @error('no_telpon')
                                        <div class="invalid-feedback d-block text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalregistrasi"><i class="fa fa-save"></i> Selesai</button>
                            </div>
                            <!-- begin -->
                            <div class="modal fade" id="modalregistrasi" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body p-5">
                                            <!-- begin -->
                                            <div class="">
                                                <div class="d-flex justify-content-center ">
                                                    <i class="bi bi-exclamation-circle bg-white text-primary align-self-center" style="font-size: 100px; "></i>
                                                </div>
                                                <p class="fs-3 fw-bold text-center m-0">Konfirmasi Pendaftaran</p>
                                                <p class="text-center ">Pendaftaran anda akan disimpan. Apakah informasi yang anda masukkan sudah benar.</p>
                                                <div class="col m-0 mx-5 text-primary d-flex justify-content-center">
                                                    
                                                    <a type="button submit" class="btn btn-primary" data-bs-dismiss="modal" href="#modalregistrasi">Submit</a> 
                                                    
                                                    <button type="button" class="btn btn-light border-radius fw-bold px-5 mx-2 " data-bs-dismiss="modal" aria-label="Close">Tidak</button>
                                                </div>
                                            </div>
                                            <!-- end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end -->
                            
                        </fieldset>
                    </form>
                    <!-- step 4 -->
                    {{-- <fieldset>
                        <div class="">
                            <div class="col-12">
                                <!-- begin -->
                                <div class="row g-3 mt-3">
                                    <div class="d-flex justify-content-center mx-auto mt-5 mb-3">
                                        <i class="bi bi-check-lg bg-primary rounded-circle text-white align-self-center" style="font-size: 100px; padding: 3px 25px"></i>
                                    </div>
                                    <p class="fs-1 fw-bold text-center m-0">Pendaftaran Berhasil!</p>
                                    <p class="text-center fs-5">Data usaha anda telah berhasil dimasukkan kedalam data kami.</p>
                                    <div class="col m-0 mx-5 text-primary d-flex align-items-center justify-content-center">
                                        <a href="/tampilan-toko-login"><button type="button" class="btn btn-primary btn-lg border-radius fw-bold p-3"> Lihat Detail Usaha</button></a>
                                    </div>
                                    <a href="/index-login"><p class="text-center my-4 fw-bold text-secondary"><u>Kembali ke halaman utama</u></p></a>
                                </div>
                                <!-- end -->
                            </div>
                        </div>
                        
                    </fieldset> --}}
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
    @include('partials.footer1')
    @endsection