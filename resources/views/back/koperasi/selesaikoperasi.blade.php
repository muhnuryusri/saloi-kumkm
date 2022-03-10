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
                        <div class="">
                            <p class="fs-2 fw-bold m-0 text-start">Daftar Usaha</p>
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
                    <div class="f1" >
                        <div class="f1-steps">
                            <div class="f1-progressfinish">
                                <div class="f1-progress-line" data-now-value="100" data-number-of-steps="4" style="width: 25%;"></div>
                            </div>
                            <div class="f1-step regis active fw-bold">
                                <div class="f1-step-icon fw-bold"><i class="fa fa-user"></i></div>
                                <p>1. Informasi Pribadi</p>
                            </div>
                            <div class="f1-step regis active fw-bold">
                                <div class="f1-step-icon"><i class="fa fa-home"></i></div>
                                <p>2. Informasi Alamat</p>
                            </div>
                            <div class="f1-step regis active fw-bold">
                                <div class="f1-step-icon"><i class="fa fa-address-book"></i></div>
                                <p>3. Informasi Kontak</p>
                            </div>
                            <div class="f1-step regis active fw-bold">
                                <div class="f1-step-icon"><i class="fa fa-check"></i></div>
                                <p>Selesai</p>
                            </div>
                            
                        </div>
                       
                    </div>
                    <!-- step 4 -->
                    <fieldset>
                       <!-- begin -->
					<form class="row g-3 mt-3">
						<div class="col-12">
							<!-- begin -->
						<div class="">
							<div class="d-flex justify-content-center mx-auto mt-5 mb-3">
								<i class="bi bi-check-lg bg-primary rounded-circle text-white align-self-center" style="font-size: 100px; padding: 3px 25px"></i>
							</div>
							<p class="fs-1 fw-bold text-center m-0">Pendaftaran Berhasil!</p>
							<p class="text-center fs-5">Data koperasi anda telah berhasil dimasukkan kedalam data kami.</p>
							<div class="col m-0 mx-5 text-primary d-flex align-items-center justify-content-center">
								<a href="/detailkoperasi"><button type="button" class="btn btn-primary btn-lg border-radius fw-bold p-3"> Lihat Detail Koperasi</button></a>
							</div>
							<a href="/home"><p class="text-center my-4 fw-bold text-secondary"><u>Kembali ke halaman utama</u></p></a>
						</div>
						<!-- end -->
						</div>
						
						
					</form>
					<!-- end -->
                    </fieldset>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
    @include('partials.footer1')
    @endsection