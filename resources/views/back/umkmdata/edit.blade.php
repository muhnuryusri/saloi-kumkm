@extends('layouts.main')
@section('container')
@include('partials.navbar')
<!-- begincontent -->

<body style="text-align: center;">
    <div class="container my-5">
        <div class="card shadow bg-body border-radius border-0">
            <div class="card-header bg-white ">
                <div class="row justify-content-center">
                    <div class="row col-lg-10 col-md-11 col-sm-12 p-0">
                        <div class=" m-0 p-0">
                            <p class="fs-2 fw-bold m-0 text-start">Update UMKM</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11 col-sm-12 col-md-offset-1 pt-4 pb-5">
                    <form method="POST" action="{{ route('umkm.update',$umkm->id) }}" class="f1" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="20" data-number-of-steps="4" style="width: 20%;"></div>
                            </div>
                            <div class="f1-step active fw-bold">
                                <div class="f1-step-icon fw-bold"><i class="fa fa-user"></i></div>
                                <p>1. Informasi Badan Usaha</p>
                            </div>
                            <div class="f1-step ">
                                <div class="f1-step-icon"><i class="fa fa-file"></i></div>
                                <p>2. Informasi Produk & Jasa</p>
                            </div>
                            <div class="f1-step ">
                                <div class="f1-step-icon"><i class="fa fa-map-marker"></i></div>
                                <p>3. Informasi Lokasi Badan Usaha</p>
                            </div>
                            <div class="f1-step ">
                                <div class="f1-step-icon"><i class="fa fa-envelope"></i></div>
                                <p>4. Informasi Kontak Badan Usaha</p>
                            </div>
                            <div class="f1-step ">
                                <div class="f1-step-icon"><i class="fa fa-check"></i></div>
                                <p>Selesai</p>
                            </div>
                        </div>
                        <!-- step 1 -->
                        <fieldset>
                            <div class="row g-3 mt-3">
                                <div class="col-12">
                                    <label for="nama_badan_usaha" class="form-label">Nama Badan Usaha <span class="text-danger">*</span></label>
                                    <div class=" col-md-12 input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-credit-card-2-front"></i></span>
                                        <input class="required form-control  @error('nama_badan_usaha') is-invalid @enderror" type="text" name="nama_badan_usaha" id="nama_badan_usaha" value="{{ old('nama_badan_usaha', $umkm->nama_badan_usaha) }}">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="nib" class="form-label">Nomor Induk Badan Usaha <span class="text-danger">*</span></label>
                                    <div class=" col-md-12 input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-credit-card-2-front"></i></span>
                                        <input class="required form-control  @error('nib') is-invalid @enderror" type="text" name="nib" id="nib" value="{{ old('nib',$umkm->nib) }}">
                                        @error('nib')
                                        <div class="invalid-feedback d-block text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 d-none">
                                    <label for="kategori_id" class="form-label">Kategori<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="kategori_id"><i class="bi bi-grid-1x2-fill"></i></span>
                                        <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id">
                                            @foreach ($kategori as $row)
                                            @if(old('kategori_id',$umkm->kategori_id) == $row->id)
                                            <option value="{{ $row->id }}" selected>{{ $row->nama_kategori }}</option>
                                            @else
                                            <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 row justify-content-center">
                                    <div class="col-md-6 col-sm-11 pe-0">
                                        <div class="col-sm-6 col-md-11">
                                            <input type="hidden" name="oldImageSampul" id="" value="{{ $umkm->gambar_sampul }}">
                                            @if ($umkm->gambar_sampul)
                                            <img class="border-radius mb-3 " src="{{ asset('storage/'.$umkm->gambar_sampul) }}" id="yourimage" width="100%" alt="" style="width:100%;height:300px;object-fit: cover;
                                            object-position: top;">
                                            @else
                                            <img class="border-radius mb-3 d-none" src="#" id="yourimage" width="100%" alt="" style="width:100%;height:300px;object-fit: cover;
                                            object-position: top;">
                                            <br>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 col-md-11">
                                            <p class="image_upload">
                                                <label for="profileimage" style="display: block">
                                                    <a class="btn btn-primary btn-block text-white" rel="nofollow">Unggah Foto Sampul</a>
                                                </label>
                                                <input type="file" name="gambar_sampul" id="profileimage" style="display: none;" class=" @error('image') is-invalid @enderror" value="{{ old('gambar_sampul', $umkm->gambar_sampul) }}">
                                                @error('image')
                                            <div class="invalid-feedback d-block text-start">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-11 pe-0">
                                        <div class="col-sm-6 col-md-11">
                                            <input type="hidden" name="oldImageLogo" id="" value="{{ $umkm->gambar_logo }}">
                                            @if ($umkm->gambar_logo)
                                            <img class="border-radius mb-3 " src="{{ asset('storage/'.$umkm->gambar_logo) }}" id="yourimage2" width="100%" alt="" style="width:100%;height:300px;object-fit: cover;
                                            object-position: top;">
                                            @else
                                            <img class="border-radius mb-3 d-none" src="#" id="yourimage2" width="100%" alt="" style="width:100%;height:300px;object-fit: cover;
                                            object-position: top;">
                                            <br>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 col-md-11">
                                            <p class="image_upload">
                                                <label for="profileimage2" style="display: block">
                                                    <a class="btn btn-primary btn-block text-white" rel="nofollow">Unggah Foto Scan/Logo</a>
                                                </label>
                                                <input type="file" name="gambar_logo" id="profileimage2" style="display: none;" class=" @error('image') is-invalid @enderror" value="{{ old('gambar_logo', $umkm->gambar_logo) }}">
                                                @error('image')
                                            <div class="invalid-feedback d-block text-start">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="modal_usaha" class="form-label">Modal Usaha <span class="text-danger">*</span></label>
                                    <div class=" col-md-12 input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-credit-card-2-front"></i></span>
                                        <input class="required form-control  @error('modal_usaha') is-invalid @enderror" type="number" name="modal_usaha" id="modal_usaha" value="{{ old('modal_usaha',$umkm->modal_usaha) }}">
                                        @error('nib')
                                        <div class="invalid-feedback d-block text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <label for="npwp" class="form-label">NPWP <span class="text-danger">*</span></label>
                                    <div class=" col-md-12 input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-credit-card-2-back-fill"></i></span>
                                        <input type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp" id="npwp" value="{{ old('npwp',$umkm->npwp) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="jenis_usaha" class="form-label">Jenis Usaha / Legalitas <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="jenis_usaha"><i class="bi bi-grid-1x2-fill"></i></span>
                                        <select class="form-select @error('jenis_usaha') is-invalid @enderror" name="jenis_usaha">
                                            <option selected>{{ $umkm->jenis_usaha }}</option>
                                            <option value="PT">PT</option>
                                            <option value="CV">CV</option>
                                            <option value="Firma">Firma</option>
                                            <option value="UD">UD</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="omzet_tahunan" class="form-label">Omset Tahunan <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="omzet_tahunan"><i class="bi bi-coin"></i></span>
                                        <select class="form-select @error('omzet_tahunan') is-invalid @enderror" name="omzet_tahunan" value="{{ old('omzet_tahunan') }}">
                                            <option selected>{{ $umkm->omzet_tahunan }}</option>
                                            <option>Rp. 0 - Rp. 5.000.000</option>
                                            <option>Rp. 5.000.000 - Rp. 10.000.000</option>
                                            <option>Rp. 10.000.000 - Rp. 50.000.000</option>
                                            <option>Rp. 50.000.000 - Rp. 100.000.000</option>
                                            <option>Diatas Rp. 100.000.000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="kategori_usaha" class="form-label">KBLI <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bi bi-columns-gap"></i></span>
                                        <select class="selectpicker form-control" name="kategoriusahas[]" multiple data-live-search="true">
                                            @foreach ($kategoriusaha as $row)
                                          
                                    <!--  -->
                                   
                                    // $entities = ($umkm->kategoriusaha as $t)
                                    $entities = $t->nama_kategori->kategoriusaha_umkm ;
                                     <?php
                                    // $entities = "8,9,10,11";
                                    $entity = explode(",", $entities);
                                    ?>
                                    <option value="{{  $row->id }}" {{ (in_array($row->id, $entity)) ? 'selected' : '' }}>{{ $row->nama_kategori }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="deskripsi_usaha" class="form-label">Deskripsi Usaha<span class="text-danger">*</span></label>
                                <div class="form-floating">
                                    <textarea class="form-control @error('deskripsi_usaha') is-invalid @enderror" id="deskripsi_usaha" style="height: 200px" name="deskripsi_usaha" value="{{ old('deskripsi_usaha') }}">{{$umkm->deskripsi_usaha }}</textarea>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-md-6 ">
                                <label for="waktu_senin" class="form-label">Senin</label>

                                <div class="form-check form-switch ps-5 pe-2 py-2  rounded" style="border:1px solid #d9d9d9">
                                    <input class="form-check-input " type="checkbox" id="tutup" name="tutup" value="Tutup">
                                    <span id="ttp">Tutup</span>
                                    <div id="test" class="  input-group ps-3 my-1 align-items-center">
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_buka') is-invalid @enderror" name="jam_buka" id="jam_buka" value="{{ old('jam_buka')}}">
                                        <span class="mx-2">s/d</span>
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_tutup') is-invalid @enderror" name="jam_tutup" id="jam_tutup" value="{{ old('jam_tutup')}}">
                                    </div>
                                </div>
                                <input type="hidden" name="waktu_senin" id="waktu_senin" value="Tutup">
                            </div>
                            <!--  -->
                            <div class="col-md-6 ">
                                <label for="waktu_selasa" class="form-label">Selasa</label>
                                <div class="form-check form-switch ps-5 pe-2 py-2  rounded" style="border:1px solid #d9d9d9">
                                    <input class="form-check-input " type="checkbox" id="tutup2" name="tutup" value="Tutup">
                                    <span id="ttp2">Tutup</span>
                                    <div id="waktu2" class="  input-group ps-3 my-1 align-items-center">
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_buka2') is-invalid @enderror" name="jam_buka2" id="jam_buka2" value="{{ old('jam_buka2')}}">
                                        <span class="mx-2">s/d</span>
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_tutup2') is-invalid @enderror" name="jam_tutup2" id="jam_tutup2" value="{{ old('jam_tutup2')}}">
                                    </div>
                                </div>
                                <input type="hidden" name="waktu_selasa" id="waktu_selasa" value="Tutup">
                            </div>
                            <!--  -->
                            <div class="col-md-6 ">
                                <label for="waktu_rabu" class="form-label">Rabu</label>
                                <div class="form-check form-switch ps-5 pe-2 py-2  rounded" style="border:1px solid #d9d9d9">
                                    <input class="form-check-input " type="checkbox" id="tutup3" name="tutup" value="Tutup">
                                    <span id="ttp3">Tutup</span>
                                    <div id="waktu3" class="  input-group ps-3 my-1 align-items-center">
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_buka3') is-invalid @enderror" name="jam_buka3" id="jam_buka3" value="{{ old('jam_buka3')}}">
                                        <span class="mx-2">s/d</span>
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_tutup3') is-invalid @enderror" name="jam_tutup3" id="jam_tutup3" value="{{ old('jam_tutup3')}}">
                                    </div>
                                </div>
                                <input type="hidden" name="waktu_rabu" id="waktu_rabu" value="Tutup">
                            </div>
                            <!--  -->
                            <div class="col-md-6 ">
                                <label for="waktu_kamis" class="form-label">Kamis</label>
                                <div class="form-check form-switch ps-5 pe-2 py-2  rounded" style="border:1px solid #d9d9d9">
                                    <input class="form-check-input " type="checkbox" id="tutup4" name="tutup" value="Tutup">
                                    <span id="ttp4">Tutup</span>
                                    <div id="waktu4" class="  input-group ps-3 my-1 align-items-center">
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_buka4') is-invalid @enderror" name="jam_buka4" id="jam_buka4" value="{{ old('jam_buka4')}}">
                                        <span class="mx-2">s/d</span>
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_tutup4') is-invalid @enderror" name="jam_tutup4" id="jam_tutup4" value="{{ old('jam_tutup4')}}">
                                    </div>
                                </div>
                                <input type="hidden" name="waktu_kamis" id="waktu_kamis" value="Tutup">
                            </div>
                            <!--  -->
                            <div class="col-md-6 ">
                                <label for="waktu_jumat" class="form-label">Jumat</label>
                                <div class="form-check form-switch ps-5 pe-2 py-2  rounded" style="border:1px solid #d9d9d9">
                                    <input class="form-check-input " type="checkbox" id="tutup5" name="tutup" value="Tutup">
                                    <span id="ttp5">Tutup</span>
                                    <div id="waktu5" class="  input-group ps-3 my-1 align-items-center">
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_buka5') is-invalid @enderror" name="jam_buka5" id="jam_buka5" value="{{ old('jam_buka5')}}">
                                        <span class="mx-2">s/d</span>
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_tutup5') is-invalid @enderror" name="jam_tutup5" id="jam_tutup5" value="{{ old('jam_tutup5')}}">
                                    </div>
                                </div>
                                <input type="hidden" name="waktu_jumat" id="waktu_jumat" value="Tutup">
                            </div>
                            <!--  -->
                            <div class="col-md-6 ">
                                <label for="waktu_sabtu" class="form-label">Sabtu</label>
                                <div class="form-check form-switch ps-5 pe-2 py-2  rounded" style="border:1px solid #d9d9d9">
                                    <input class="form-check-input " type="checkbox" id="tutup6" name="tutup" value="Tutup">
                                    <span id="ttp6">Tutup</span>
                                    <div id="waktu6" class="  input-group ps-3 my-1 align-items-center">
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_buka6') is-invalid @enderror" name="jam_buka6" id="jam_buka6" value="{{ old('jam_buka6')}}">
                                        <span class="mx-2">s/d</span>
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_tutup6') is-invalid @enderror" name="jam_tutup6" id="jam_tutup6" value="{{ old('jam_tutup6')}}">
                                    </div>
                                </div>
                                <input type="hidden" name="waktu_sabtu" id="waktu_sabtu" value="Tutup">
                            </div>
                            <!--  -->
                            <div class="col-md-6 ">
                                <label for="waktu_minggu" class="form-label">minggu</label>
                                <div class="form-check form-switch ps-5 pe-2 py-2  rounded" style="border:1px solid #d9d9d9">
                                    <input class="form-check-input " type="checkbox" id="tutup7" name="tutup" value="Tutup">
                                    <span id="ttp7">Tutup</span>
                                    <div id="waktu7" class="  input-group ps-3 my-1 align-items-center">
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_buka7') is-invalid @enderror" name="jam_buka7" id="jam_buka7" value="{{ old('jam_buka7')}}">
                                        <span class="mx-2">s/d</span>
                                        <input type="time" placeholder="Buka" class="form-control @error('jam_tutup7') is-invalid @enderror" name="jam_tutup7" id="jam_tutup7" value="{{ old('jam_tutup7')}}">
                                    </div>
                                </div>
                                <input type="hidden" name="waktu_minggu" id="waktu_minggu" value="Tutup">
                            </div>
                </div>
                <div class="f1-buttons">
                    <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                </div>
                </fieldset>
                <!-- step 2 -->
                <fieldset>
                    <div class="row g-3 mt-3">
                        <div class="col-12">
                            <label for="deskripsi_produk_jasa" class="form-label">Deskripsi Produk & Jasa <span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <textarea class="form-control @error('deskripsi_produk_jasa') is-invalid @enderror" id="deskripsi_produk_jasa" name="deskripsi_produk_jasa" style="height: 200px">{{ $umkm->deskripsi_produk_jasa }}</textarea>
                            </div>
                        </div>

                        <div class="f1-buttons">
                            <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                            <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                        </div>
                </fieldset>
                <!-- step 3 -->
                <fieldset>
                    <div class="row g-3 mt-3 my-5">
                        <div class="col-12">
                            <label for="alamat_badan_usaha" class="form-label">Alamat Badan Usaha <span class="text-danger">*</span></label>
                            <div class=" col-md-12 input-group mb-3">
                                <span class="input-group-text" id="alamat_badan_usaha"><i class="bi bi-pin-map"></i></span>
                                <input type="text" class="required form-control @error('alamat_badan_usaha') is-invalid @enderror" name="alamat_badan_usaha" id="alamat_badan_usaha" value="{{ old('alamat_badan_usaha', $umkm->alamat_badan_usaha) }}">
                            </div>
                        </div>
                        <div class="col-md-3 pe-1">
                            <label for="kota" class="form-label">Pilih Provinsi <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="kota"><i class="bi bi-building"></i></span>
                                <select id="country" class="form-control value={{ old('kota') }} " name="province_id">
                                    <option value="{{ old('province_id', $umkm->province_id) }}">{{strtolower($umkm->province->name)}}</option>
                                    @foreach($country as $list)
                                    <option value="{{$list->id}}">{{strtolower($list->name)}}</option>
                                    <option value="{{$list->id}}">{{strtolower($list->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 pe-1">
                            <label for="kota" class="form-label">Kota/Kabupaten <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="kota"><i class="bi bi-building"></i></span>
                                <select id="state" name="regency_id" class="form-control value={{ old('kota') }}">
                                    <option value="{{ old('regency_id', $umkm->regency_id) }}">{{strtolower($umkm->regency->name)}}</option>
                                    <option value="">Pilih Kabupaten/Kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 pe-1">
                            <label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-building"></i></span>
                                <select id="city" class="form-control @error('kecamatan') is-invalid @enderror" name="district_id">
                                    <option value="{{ old('district_id', $umkm->district_id) }}">{{strtolower($umkm->district->name)}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <label for="kelurahan" class="form-label">Kelurahan <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-building"></i></span>
                                <select id="village" name="village_id" class="form-control value={{ old('kelurahan') }}">
                                    <option value="{{ old('village_id', $umkm->village_id) }}">{{strtolower($umkm->village->name)}}</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-6">
                            <label for="latitude" class="form-label">Latitude</label>
                            <div class=" col-md-12 input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" class="required form-control @error('latitude') is-invalid @enderror" id="lattitude" name="latitude" value="{{$umkm->latitude}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="longtitude" class="form-label">Longtitude</label>
                            <div class=" col-md-12 input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" class="required form-control @error('longtitude') is-invalid @enderror" id="longtitude" name="longtitude" value="{{$umkm->longtitude}}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div id='mapid' style='width: 100%; height: 400px;'></div>
                        </div>
                    </div>
                    <div class="f1-buttons">
                        <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                        <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                    </div>
                </fieldset>
                <!-- step 4 -->
                <fieldset>
                    <div class="row g-3 mt-3 mb-4">
                        <div class="col-12">
                            <label for="email_usaha" class="form-label">E-mail Usaha <span class="text-danger">*</span></label>
                            <div class=" col-md-12 input-group mb-3">
                                <span class="input-group-text" id="email_usaha"><i class="bi bi-envelope-fill"></i></span>
                                <input type="text" class="required form-control @error('email_usaha') is-invalid @enderror" id="email_usaha" name="email_usaha" value="{{ old('email_usaha', $umkm->email_usaha) }}">
                                @error('email_usaha')
                                <div class="invalid-feedback d-block text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="no_telpon" class="form-label">No. Telp/Whatsapp/Telegram <span class="text-danger">*</span></label>
                            <div class=" col-md-12 input-group mb-3">
                                <span class="input-group-text" id="no_telpon"><i class="bi bi-telephone-fill"></i></span>
                                <input type="number" class="required form-control @error('no_telpon') is-invalid @enderror" id="no_telpon" name="no_telpon" value="{{ old('no_telpon', $umkm->no_telpon) }}">
                                @error('no_telpon')
                                <div class="invalid-feedback d-block text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="website" class="form-label">Website</label>
                            <div class=" col-md-12 input-group mb-3">
                                <span class="input-group-text" id="website"><i class="bi bi-globe2"></i></span>
                                <input type="text" class="required form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website', $umkm->website) }}">
                                @error('website')
                                <div class="invalid-feedback d-block text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="instagram" class="form-label">Instagram</label>
                            <div class=" col-md-12 input-group mb-3">
                                <span class="input-group-text" id="instagram"><i class="bi bi-instagram"></i></span>
                                <input type="text" class="required form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ old('instagram', $umkm->instagram) }}">
                                @error('instagram')
                                <div class="invalid-feedback d-block text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="tokopedia" class="form-label">Tokopedia</label>
                            <div class=" col-md-12 input-group mb-3">
                                <span class="input-group-text" id="tokopedia"><i class="bi bi-pin-angle-fill"></i></span>
                                <input type="text" class="required form-control @error('tokopedia') is-invalid @enderror" id="tokopedia" name="tokopedia" value="{{ old('tokopedia', $umkm->tokopedia) }}">
                                @error('tokopedia')
                                <div class="invalid-feedback d-block text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="lazada" class="form-label">Lazada</label>
                            <div class=" col-md-12 input-group mb-3">
                                <span class="input-group-text" id="lazada"><i class="bi bi-pin-angle-fill"></i></span>
                                <input type="text" class="required form-control @error('lazada') is-invalid @enderror" id="lazada" name="lazada" value="{{ old('lazada', $umkm->lazada) }}">
                                @error('lazada')
                                <div class="invalid-feedback d-block text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="bukalapak" class="form-label">Bukalapak</label>
                            <div class=" col-md-12 input-group mb-3">
                                <span class="input-group-text" id="bukalapak"><i class="bi bi-pin-angle-fill"></i></span>
                                <input type="text" class="required form-control @error('bukalapak') is-invalid @enderror" id="bukalapak" name="bukalapak" value="{{ old('bukalapak', $umkm->bukalapak) }}">
                                @error('bukalapak')
                                <div class="invalid-feedback d-block text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="shopee" class="form-label">Shopee</label>
                            <div class=" col-md-12 input-group mb-3">
                                <span class="input-group-text" id="shopee"><i class="bi bi-pin-angle-fill"></i></span>
                                <input type="text" class="required form-control @error('shopee') is-invalid @enderror" id="shopee" name="shopee" value="{{ old('shopee', $umkm->shopee) }}">
                                @error('shopee')
                                <div class="invalid-feedback d-block text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="user_id" id="" value="{{ $umkm->user_id }}">
                        <input type="hidden" name="status" id="" value="{{ $umkm->status }}">
                        <input type="hidden" name="produkumkm_id" id="" value="{{ $umkm->produkumkm_id }}">
                    </div>
                    <div class="f1-buttons">
                        <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalcreateumkm"><i class="fa fa-save"></i> Selesai</button>
                    </div>
                    <!-- begin -->
                    <div class="modal fade" id="modalcreateumkm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <div class="col m-0 text-primary d-flex justify-content-center">
                                            <div class="col-md-5"><a href="/selesai-daftar-umkm"><button type="button submit" class="btn btn-primary border-radius btn-submit  fw-bold px-5 mx-2">Daftar</button></a></div>
                                            <div class="col-md-5"> <button type="button" class="btn btn-light border-radius fw-bold px-5 mx-2">Tidak</button></div>
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
            </div>
        </div>
    </div>
    </div>

    <!-- end content -->
    @push("peta")
    <script>
        var map = L.map('mapid').setView([1.4065383200734232, 127.84684996157745], 8);
        var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        map.on('click', function(e) {
            // alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
            $('#lattitude').attr('value', e.latlng.lng);
            $('#longtitude').attr('value', e.latlng.lat);
        });
    </script>
    @endpush
    @include('partials.footer1')
    @endsection