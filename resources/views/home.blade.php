@extends('layouts.main')
@section('container')
@include('partials.navbar')
<!-- begincontent -->
<!-- begin jumbotron -->

<div class="container">
    <div class="row justify-content-center align-items-center py-5">
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="daftarusaha col-lg-6 col-md-12 col-sm-12 ">
            <h1 class=" fw-bold lh-1">Daftarkan usaha Anda!</h1>
            <p class="opacity-50 fs-5">Daftarkan usahamu, jangkau konsumen <br>
                sebanyak-banyaknya dandapatkan benefit lainnya.
            </p>
            <button type="button" class="btn btn-primary border-radius fw-bold fs-6 px-5 py-3 mb-5" href="{{ url('/create-peminjam')}}">Baca Panduan</button>
        </div>
        <div class="col-lg-6 col-md-10 col-sm-8 text-end">
            <img alt="Logo" src="assets/img/ilustrasi.PNG" style="width: 90%" />
        </div>
    </div>
</div>
<!-- end jumbotron -->
<!-- begin our services -->
<div class="py-5 m-0">
    <div class="col-lg-12">
        <p class="display-5 fw-bold text-center py-4">Deskripsi Laporan Infografis</p>
    </div>
    <div class="col-lg-12">
        <div class="row justify-content-center mx-4">
            <div class="m-3 col-md-5 col-lg-3 col-sm-11 border border-radius bg-white text-center " style="border-radius:25px!important">
                <img src="assets/img/product.png" height="100px" class="m-4"><br>
                <p class="fw-bold fs-3 m-2 ">Produk</p>
                <p class="opacity-75 lh-sm">Ada ribuan produk yang ditawarkan oleh berbagai macam UMKM dan Koperasi anda dapat dengan mudah menemukan barang yang anda cari di sini.</p>
            </div>
            <div class="m-3 col-md-5 col-lg-3 col-sm-11 border border-radius bg-white text-center " style="border-radius:25px!important">
                <img src="assets/img/location.png" height="100px" class="m-4">
                <p class="fw-bold fs-3 m-2">Lokasi Usaha</p>
                <p class="opacity-75 lh-sm">UMKM dan Koperasi akan di filter berdasarkan lokasi per-provinsi atau per-kota/kabupaten, sehingga anda dapat dengan mudah mengetahui letak UMKM atau Koperasi favorit anda.</p>
            </div>
            <div class="m-3 col-md-5 col-lg-3 col-sm-11 border border-radius bg-white text-center " style="border-radius:25px!important">
                <img src="assets/img/statistic.png" height="100px" class="m-4">
                <p class="fw-bold fs-3 m-2">Laporan Infografis</p>
                <p class="opacity-75 lh-sm">Khusus untuk Dinas terdaftar, tersedia laporan berbentuk tabel dan infografis yang dapat digunakan untuk pengawasan UMKM dan Koperasi, serta penyelenggaraan kegiatan yang tepat sasaran.</p>
            </div>
        </div>
    </div>
</div>
</section>
<!-- end our services -->
<!-- begin our slider 1 -->
<div id="myslider">
    <div class="card bg-dark text-white ">
        <img src="assets/img/cafe-2.jpg" class="card-img" alt="..." style="filter: brightness(30%); min-height:700px; object-fit: cover;object-position: top;">
        <div class="card-img-overlay container">
            <div class="d-flex justify-content-evenly my-5">
                <div class="bg-white p-2 border-radius fs-6 ">
                    <button class="btn btn-lg btn-primary fs-6 fw-bold border-radius px-5">Semua</button>
                    <button class="btn btn-lg btn-white fs-6 fw-bold border-radius px-5 text-muted">UMKM</button>
                    <button class="btn btn-lg btn-white fs-6 fw-bold border-radius px-5 text-muted">Koperasi</button>
                </div>
            </div>
            <div class="row mt-5 py-5">
                <div class="col-md-6 col-sm-12">
                    <h5 class="card-title fw-bold display-4 m-0">Cafe Tenang <span class="fs-5 fw-normal">(UMKM)</span></h5>
                    <p class=" fs-5 m-0">4,8
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        (3 Ulasan)
                    </p>
                    <p class="fs-5 opacity-75">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur delectus sed culpa, odio consequatur tempora voluptas architecto repellat officia molestias rem veniam quidem non cumque nobis doloribus temporibus quia? Repellendus.
                    </p>
                    <div class="row">
                        <i class="bi bi-geo-alt-fill text-danger col-1"></i>
                        <p class="fs-5  p-0 col-11"> Jl. Baru, Jailolo, Kab. Halmahera Barat, Maluku Utara</p>
                    </div>
                    <button class="btn btn-lg btn-primary fw-bold border-radius px-5 fs-6">Kunjungi</button>
                </div>
                <div class="col-md-6 col-sm-12 text-center">
                    <img src="assets/img/person2.jpg" class="col-md-6 col-sm-12 mx-auto  rounded-circle m-3" style="width:300px;height:300px;object-fit: cover; object-position: top;">
                    <p class="fs-3 fw-bold text-center m-0">1Indri Pratiwi Ramadhani</p>
                    <p class="text-white fs-5 opacity-75">Founder</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-dark text-white ">
        <img src="assets/img/cafe-2.jpg" class="card-img" alt="..." style="filter: brightness(30%); min-height:700px; object-fit: cover;object-position: top;">
        <div class="card-img-overlay container">
            <div class="d-flex justify-content-evenly my-5">
                <div class="bg-white p-2 border-radius fs-6 ">
                    <button class="btn btn-lg btn-primary fs-6 fw-bold border-radius px-5">Semua</button>
                    <button class="btn btn-lg btn-white fs-6 fw-bold border-radius px-5 text-muted">UMKM</button>
                    <button class="btn btn-lg btn-white fs-6 fw-bold border-radius px-5 text-muted">Koperasi</button>
                </div>
            </div>
            <div class="row mt-5 py-5">
                <div class="col-md-6 col-sm-12">
                    <h5 class="card-title fw-bold display-4 m-0">Cafe Tenang <span class="fs-5 fw-normal">(UMKM)</span></h5>
                    <p class=" fs-5 m-0">4,8
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        (3 Ulasan)
                    </p>
                    <p class="fs-5 opacity-75">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur delectus sed culpa, odio consequatur tempora voluptas architecto repellat officia molestias rem veniam quidem non cumque nobis doloribus temporibus quia? Repellendus.
                    </p>
                    <div class="row">
                        <i class="bi bi-geo-alt-fill text-danger col-1"></i>
                        <p class="fs-5  p-0 col-11"> Jl. Baru, Jailolo, Kab. Halmahera Barat, Maluku Utara</p>

                    </div>
                    <button class="btn btn-lg btn-primary fw-bold border-radius px-5 fs-6">Kunjungi</button>
                </div>
                <div class="col-md-6 col-sm-12 text-center">
                    <img src="assets/img/person2.jpg" class="col-md-6 col-sm-12 mx-auto rounded-circle m-3" style="width:300px;height:300px;object-fit: cover; object-position: top;">
                    <p class="fs-3 fw-bold text-center m-0">2Indri Pratiwi Ramadhani</p>
                    <p class="text-white fs-5 opacity-75">Founder</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-dark text-white ">
        <img src="assets/img/cafe-2.jpg" class="card-img" alt="..." style="filter: brightness(30%); min-height:700px; object-fit: cover;object-position: top;">
        <div class="card-img-overlay container">
            <div class="col-sm-10 d-flex justify-content-evenly my-5">
                <div class="bg-white p-2 border-radius fs-6 ">
                    <button class="btn btn-lg btn-primary fs-6 fw-bold border-radius px-5">Semua</button>
                    <button class="btn btn-lg btn-white fs-6 fw-bold border-radius px-5 text-muted">UMKM</button>
                    <button class="btn btn-lg btn-white fs-6 fw-bold border-radius px-5 text-muted">Koperasi</button>
                </div>
            </div>
            <div class="row mt-5 py-5">
                <div class="col-md-6 col-sm-12">
                    <h5 class="card-title fw-bold display-4 m-0">Cafe Tenang <span class="fs-5 fw-normal">(UMKM)</span></h5>
                    <p class=" fs-5 m-0">4,8
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        (3 Ulasan)
                    </p>
                    <p class="fs-5 opacity-75">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur delectus sed culpa, odio consequatur tempora voluptas architecto repellat officia molestias rem veniam quidem non cumque nobis doloribus temporibus quia? Repellendus.
                    </p>
                    <div class="row">
                        <i class="bi bi-geo-alt-fill text-danger col-1"></i>
                        <p class="fs-5  p-0 col-11"> Jl. Baru, Jailolo, Kab. Halmahera Barat, Maluku Utara</p>
                    </div>
                    <button class="btn btn-lg btn-primary fw-bold border-radius px-5 fs-6">Kunjungi</button>
                </div>
                <div class="col-md-6 col-sm-12 text-center">
                    <img src="assets/img/person2.jpg" class="col-md-6 col-sm-12 mx-auto rounded-circle m-3" style="width:300px;height:300px;object-fit: cover; object-position: top;">
                    <p class="fs-3 fw-bold text-center m-0">3Indri Pratiwi Ramadhani</p>
                    <p class="text-white fs-5 opacity-75">Founder</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end our slider 1 -->
<!-- begin our slider 2 -->
<div class="container-fluid py-5 bg-light">
    <p class="text-center text-dark mx-auto display-5 fw-bold ">UMKM & Koperasi Terbaru</p>
    <div class="row justify-content-center  align-items-center">
        <div id="myslider2" style="width: 95%">
            @forelse ($umkm as $item)
            {{-- begin --}}
            <div class=" col-sm-12 p-0">
                <div class="card border-radius  m-3 p-0" style=" height:600px ">
                    <img src=" {{ asset('storage/'.$item->gambar_sampul) }}" class="card-img-top" alt="..." style="height:200px; object-fit: cover;
                            object-position: top;">
                    <div class="p-3 pb-0">
                        <a href="{{ route('listumkm', $item->slug) }}">
                            <h5 class="card-title fw-bold fs-2 m-0 text-black">{{ $item->nama_badan_usaha }}</h5>
                        </a>

                        @php

                        $ratings = DB::table('ratings')->where('umkm_id', $item->id)->get();
                        $rating_sum = DB::table('ratings')->where('umkm_id', $item->id)->sum('stars_rated');
                        $user_rating = DB::table('ratings')->where('umkm_id', $item->id)->where('user_id', Auth::id())->first();

                        if ($ratings->count() > 0) {
                        $rating_value = $rating_sum / $ratings->count();
                        } else {
                        $rating_value = 0;
                        }

                        @endphp
                        @php
                        $ratenum = number_format($rating_value);
                        @endphp
                        <p class="fw-bold fs-6 m-0">{{ $rating_value }}
                            @for($i = 1; $i<= $ratenum ;$i++) <i class="bi bi-star-fill text-warning "></i>
                                @endfor
                                @for($j=$ratenum+1;$j<=5;$j++) <i class="bi bi-star-fill text-dark"></i>
                                    @endfor
                                    @if($ratings->count()>0)
                                    ({{ $ratings->count() }} Ulasan)
                                    @else
                                    No Ratings
                                    @endif
                        </p>
                        <p class="m-0">
                            <span class="badge rounded-pill bg-primary">{{ $item->kategori->nama_kategori }}</span>

                            @foreach ($item->kategoriusaha as $tag)
                            <span class="badge rounded-pill bg-secondary">
                                {{ $tag->nama_kategori}}
                            </span>
                            @endforeach
                        </p>
                    </div>
                    <div class="card-body p-0 pt-3 mx-3 mb-3 d-flex align-items-center justify-content-center text-center" style="height: 150px; overflow:hidden;">
                        {{ $item->deskripsi_usaha }}
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between px-2">
                            <p class="fs-6 fw-bold col-6 m-0 p-0">
                                <i class="bi bi-geo-alt-fill text-danger"></i> {{strtolower( $item->province->name )}}
                            </p>

                            <div class="col-6 row lh-1 align-items-center">
                                <div class=" col-7 p-0">
                                    <p class="fw-bold m-0 mt-n3 text-end">{{ $item->users->name }}</p>
                                    <p class="text-secondary m-0 text-end py-1" style="font-size:12px;">Founder</p>
                                </div>
                                <div class="col-5 px-2">
                                    <img src="{{ ($item->users->image) }}" class=" rounded-circle" style="height:40px;width:40px;object-fit: cover;
                                    object-position: top;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end --}}
            @empty
            <p class="text-center text-warning fs-1 fw-bold">data tidak ditemukan</p>
            @endforelse

        </div>
    </div>
    <div class="col-lg-12 d-flex justify-content-center mt-3">
        <a href="/list-umkm"><button class="btn btn-lg btn-primary fw-bold border-radius px-5 py-3">Lihat Semua</button></a>
    </div>
</div>
<!-- end our slider 2 -->
<!-- begin daftar -->
<section class="bg-white">
    <div class="container py-5 ">
        <div class="bg-primary border-radius text-center text-light py-5 mx-auto">
            <p class="display-6 fw-bold mt-5">Tunggu apa lagi? <br> ayo daftarkan usahamu sekarang</p>
            @if(auth()->user())
            <a href="{{ route('umkm.create') }}">
                @else
                <a href="{{ route('register') }}">
                    @endif
                    <button class="btn btn-lg btn-light text-dark fw-bold border-radius px-5 mb-5">Daftar</button></a>
        </div>
    </div>
</section>
<!-- end daftar -->
<!-- begin peta -->
<section>
    <div class="container-fluid bg-primary">
        <div class="container-fluid py-4">
            <div class="col border-radius text-center text-light py-3 mx-auto display-6 fw-bold ">Peta Penyebaran UMKM dan Koperasi</div>
        </div>


    </div>
    <div class="container-fluid my-0 p-0 bg-primary">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32658826.575899865!2d99.40594303809047!3d-2.2751528804043257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1635202221309!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>
<section>
    <div class="container-fluid  my-0 p-0" style="overflow-x: hidden">
        <div class=" row justify-content-center bg-primary fw-bold fs-5 py-5 px-0">
            <div class="col-md-4 col-sm-12 border-radius text-center text-light py-3 px-0 ">
                <p class="display-2 fw-bold m-0">6</p>
                <hr style="width: 20%; color:white" class="mx-auto my-0 opacity-100">
                <p>UMKM dan Koperasi Terbaru<br> Bulan Ini.</p>
            </div>
            <div class="col-md-4 col-sm-12  border-radius text-center text-light py-3 px-0 ">
                <p class="display-2 fw-bold m-0">368</p>
                <hr style="width: 20%; color:white" class="mx-auto my-0 opacity-100">
                <p>Total Jumlah UMKM.</p>
            </div>
            <div class="col-md-4 col-sm-12 border-radius text-center text-light py-3 px-0 ">
                <p class="display-2 fw-bold m-0">183</p>
                <hr style="width: 20%; color:white" class="mx-auto my-0 opacity-100">
                <p>Total Jumlah Koperasi.</p>
            </div>
        </div>
    </div>
</section>
<!-- end peta -->
<!-- begin pertanyaan -->
<section class="container hubungikami py-5 my-5">
    <div class=" row justify-content-center align-items-center ">
        <div class="col-lg-8 ">
            <p class="fs-1 fw-bold m-0 p-0 ">Punya pertanyaan?</p>
            <p class="text-secondary fs-3 ">Hubungi kami.</p>
        </div>
        <div class="col-lg-2">
            <button class="btn btn-lg btn-primary border-radius">Kontak Kami</button>
        </div>
    </div>
</section>
<!-- end pertanyaan -->
<!-- end content -->

@include('partials.footer2')
@endsection