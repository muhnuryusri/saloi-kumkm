@extends('layouts.main')
@section('container')
@include('partials.navbar')
<!-- begincontent -->
{{-- begin --}}
@if ($umkm->kategori_id=="1")

<div class="card bg-dark text-white ">
    <img src="
        {{ asset('storage/'.$umkm->gambar_sampul) }}
        " class="card-img" alt="..." style="filter: brightness(20%); height:600px; object-fit: cover;object-position: top;">
    <div class="card-img-overlay container d-flex align-items-end justify-content-center">
        <div class="row col-12 mt-5 py-5 ">
            <div class="col-md-7 col-sm-12">
                <button class="btn btn-primary fw-bold border-radius px-5">{{ $umkm->kategori->nama_kategori }}</button>
                <h5 class="card-title fw-bold display-4 m-0">{{ $umkm->nama_badan_usaha }} <span class="text-primary fs-5 fw-normal">*Founder</span> <span class="fs-5 fw-normal">{{ $umkm->users->name }}</span></h5>
                <p class=" fs-5 m-0">{{ $rating_value }}
                    @php $ratenum = number_format($rating_value) @endphp
                    @for($i = 1; $i<= $ratenum ;$i++) <i class="bi bi-star-fill text-warning "></i>
                        @endfor
                        @for($j=$ratenum+1;$j<=5;$j++) <i class="bi bi-star-fill text-dark"></i>
                            @endfor
                            @if($ratings->count()>0)
                            ({{ $ratings->count() }} Ulasan)
                            @else
                            No Ratings
                            @endif
                            {{ $umkm->kelurahan }}
                </p>
                <div class="row">
                    <i class="bi bi-geo-alt-fill text-danger col-1"></i>
                    <p class="fs-5  p-0 col-11">{{ $umkm->alamat_badan_usaha }}</p>
                </div>

            </div>
            @auth
            @if(auth()->user()->level==1)
            <div class="col-md-3 col-sm-12 d-grid align-items-end ">
                <form method="POST" action="{{ route('verifikasi', $umkm->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- begin -->
                    <div class="modal fade" id="modalverifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body p-5">
                                    <!-- begin -->
                                    <div class="text-black">
                                        <div class="d-flex justify-content-center ">
                                            <i class="bi bi-check-circle bg-white text-primary align-self-center" style="font-size: 100px; "></i>
                                        </div>
                                        <p class="fs-3 fw-bold text-center m-0">Verifikasi Data?</p>
                                        <p class="text-center ">Data akan diverifikasi dan disimpan. Apakah data yang ingin diverifikasi sudah benar.</p>
                                        <div class="col m-0 mx-5 text-primary d-flex justify-content-center">
                                            <select class="form-select @error('status') is-invalid @enderror d-none " name="status" id="status">
                                                <option selected value="1">diverifikasi</option>
                                                <option value="0">Belum diverifikasi</option>
                                            </select>
                                            <select class="form-select @error('kategori') is-invalid @enderror d-none " name="kategori" id="kategori">
                                                <option selected value="1">umkm</option>
                                                <option value="2">koperasi</option>
                                            </select>
                                            <button type="button submit" class="btn btn-primary border-radius btn-submit  fw-bold px-5 mx-2">Ya</button>
                                            <button type="button" class="btn btn-light border-radius fw-bold px-5 mx-2">Tidak</button>

                                        </div>
                                    </div>
                                    <!-- end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->

                    <button class="btn btn-lg btn-primary border-3 border-primary fw-bold border-radius fs-6 py-3 px-5 text-light" type="button" data-bs-toggle="modal" data-bs-target="#modalverifikasi">Verifikasi</button>

                </form>
            </div>
            @else
            <div class="col-md-5 col-sm-12 d-flex justify-content-center align-items-end ">
                @auth
                @if(auth()->user()->id == $umkm->user_id)
                <a href="{{ route('produk', $umkm->id) }}"><button class="btn btn-lg btn-light fw-bold border-radius fs-6 py-3  me-2 text-primary"><i class="bi bi-plus-square-fill me-2"></i> Tambah Produk</button></a>
                @endif
                @endauth
                <button class="btn btn-lg btn-primary fw-bold border-radius fs-6 py-3 px-5 text-light"><i class="bi bi-share me-2"></i> Bagikan</button>
            </div>
            @endif
            @endauth


        </div>
    </div>
</div>
{{-- end --}}

{{-- begin --}}
<div class="container text-center py-4">
    <ul class="list-inline fs-4 fw-bold opacity-75">
        <a href="#">
            <li class="list-inline-item text-dark">| Detail Usaha |</li>
        </a>
        <a href="#">
            <li class="list-inline-item text-dark">| Deskripsi Produk dan Jasa |</li>
        </a>
        <a href="#">
            <li class="list-inline-item text-dark">| Galeri Produk dan Jasa |</li>
        </a>
        <a href="#">
            <li class="list-inline-item text-dark">| Ulasan |</li>
        </a>
    </ul>
</div>
{{-- end --}}

{{-- begin --}}
<div class="container my-5 ">
    <div class="row g-5">
        <div class="col-md-8 col-sm-12">
            <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4" id="detailusaha">Detail Usaha</p>
            <div class="fs-5" style="min-height: 300px">
                <p style="word-break: break-all;">{{ $umkm->deskripsi_usaha }}</p>
            </div>
            <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Deskripsi Produk dan Jasa</p>
            <div class="fs-5" style="min-height: 300px">
                <p style="word-break: break-all;">{{ $umkm->deskripsi_produk_jasa }}</p>
            </div>
            <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Galeri Produk dan Jasa</p>
            <div class="fs-5 m-5" style="min-height: 300px">
                <div class="row gx-5">
                    @forelse ($umkm->produkumkm as $row)
                    <div class="col-4">
                        <img src="{{ asset('storage/'.$row->gambar_produk) }}" class="border-radius" alt="..." style="width: 100%;  object-fit: cover; object-position: top;">
                        <p class="text-center p-1">{{ $row->nama_produk }}</p>
                    </div>
                    @empty
                    <p>Belum ada data yang ditambahkan</p>
                    @endforelse
                </div>
            </div>
            <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Ulasan</p>
            <div class="fs-5" style="min-height: 300px">
                <div class="card mt-5 p-3  text-start lh-lg" style="width: 100%; border-radius:15px;min-height: 300px">
                    @auth
                    <div class="">
                        <P class="m-0 p-0 col ">Ringkasan Ulasan</P>

                        <p class=" fs-5 m-0">
                            {{ $rating_value }}
                            @php $ratenum = number_format($rating_value) @endphp
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
                        @forelse ($ratings as $row)
                        <div class="row lh-1 align-items-center mb-3">
                            <div class="col-auto pe-2 ps-3 text-end">
                                <img src="{{ $row->user->image }}" class="rounded-circle" style="height:40px;width:40px;object-fit: cover;
                                object-position: top;">
                            </div>
                            <div class=" col-6 p-0">
                                <q class="fs-5 fw-bold m-0 " style="font-size:12px;">{{$row->review}}</q>
                            </div>
                        </div>
                        @empty
                        <p>Belum ada data yang ditambahkan</p>
                        @endforelse

                        @if(auth()->user()->level!=1)
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary border-radius" data-bs-toggle="modal" data-bs-target="#modaltambahulasan">
                            Tambah Ulasan
                        </button>
                        <!-- Modal rating-->
                        <div class="modal fade" id="modaltambahulasan" tabindex="-1" aria-labelledby="modaltambahulasanLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="GET" action="{{ route('add-rating') }}">
                                    @csrf
                                    <div class="modal-content">
                                        <input type="hidden" name="umkm_id" value="{{$umkm->id}}">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold fs-6 text-center" id="exampleModalLabel">{{ $umkm->nama_badan_usaha }} </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body ">
                                            <div class="row">
                                                <div class="col-auto pe-0">
                                                    <img src="{{ auth()->user()->image}}" class="rounded-circle px-0" style="height:40px;width:40px;object-fit: cover;
                                                    object-position: top;">
                                                </div>
                                                <div class="col-10">
                                                    <p class="fs-4 fw-bold mb-0 lh-1">{{Auth()->user()->name}}</p>
                                                    <p class="text-muted mb-1" style="font-size: 12px;">Memposting untuk publik</p>
                                                    <p class="text-muted mb-0 lh-1" style=" font-size: 12px;">Rating:</p>
                                                    <div class=" rating-css">
                                                        <div class="star-icon p-0">
                                                            @if($user_rating)
                                                            @for($i = 1; $i<= $user_rating->stars_rated ;$i++)
                                                                <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                                                <label for="rating{{$i}}" class="fa fa-star"></label>
                                                                @endfor
                                                                @for($j=$user_rating->stars_rated+1;$j<=5;$j++) <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                                                    <label for="rating{{$j}}" class="fa fa-star"></label>
                                                                    @endfor

                                                                    @else

                                                                    <input type="radio" checked value="1" name="product_rating" id="rating1">
                                                                    <label for="rating1" checked class="fa fa-star"></label>
                                                                    <input type="radio" checked value="2" name="product_rating" id="rating2">
                                                                    <label for="rating2" checked class="fa fa-star"></label>
                                                                    <input type="radio" checked value="3" name="product_rating" id="rating3">
                                                                    <label for="rating3" checked class="fa fa-star"></label>
                                                                    <input type="radio" checked value="4" name="product_rating" id="rating4">
                                                                    <label for="rating4" checked class="fa  fa-star"></label>
                                                                    <input type="radio" checked value="5" name="product_rating" id="rating5">
                                                                    <label for="rating5" checked class="fa fa-star"></label>
                                                                    @endif
                                                        </div>
                                                    </div>
                                                    @if($user_rating)
                                                    <div class="mb-3">
                                                        <textarea class="form-control" id="review" name="review" rows="6" placeholder="Bagikan pengalaman anda mengenai UMKM ini." style="font-size: 12px;" required>{{$user_rating->review}}</textarea>
                                                    </div>
                                                    @else
                                                    <div class="my-3">
                                                        <textarea class="form-control" id="review" name="review" rows="6" placeholder="Bagikan pengalaman anda mengenai UMKM ini." style="font-size: 12px;" required></textarea>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Posting</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end modal -->
                        @else
                        @endif
                    </div>

                    @else
                    <div class="row align-items-center">
                        <div class="col-md-13 text-center">
                            <p>Silahkan login terlebih dahulu untuk memberika ulasan & rating</p>
                            <button type="button" class="btn btn-primary px-5 border-radius" data-bs-toggle="modal" data-bs-target="#modalmasuk">
                                Masuk
                            </button>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 text-center">
            <img src="{{ asset('storage/'.$umkm->gambar_logo) }}" class="border-radius mb-5" alt="..." style="width: 80%;  object-fit: cover; object-position: top;">

            <div class="card mt-5" style="width: 100%; border-radius:15px">
                <div id='map-usaha' style='width: 100%; height: 400px;'></div>
                <ul class="list-group list-group-flush fw-bold text-start" style="font-size: 12px;">
                    <li class="list-group-item p-1 px-3"><i class="bi bi-geo-alt-fill text-primary fs-6 "></i> {{ $umkm->alamat_badan_usaha }}</li>
                    <li class="list-group-item p-1 px-3"><i class="bi bi-telephone-fill text-primary fs-6 "></i> {{ $umkm->no_telpon }}</li>
                    <li class="list-group-item p-1 px-3 bg-body"><i class="bi bi-envelope-fill text-primary fs-6 "></i> {{ $umkm->email_usaha }}</li>
                </ul>

            </div>
            <div class="card mt-5" style="width: 100%; border-radius:15px">
                <div class=" text-center">
                    <img src="{{ $umkm->users->image }}" class="rounded-circle m-3" style="width:80%;height:18rem;object-fit: cover; object-position: top;">
                    <p class="fs-3 fw-bold text-center m-0 lh-1">{{ $umkm->users->name }}</p>
                    <p class="text-secondary fw-bold fs-5 opacity-75">Founder</p>
                </div>
                <ul class="list-group list-group-flush fw-bold text-start" style="font-size: 12px;">
                    <li class="list-group-item p-1 px-3"><i class="bi bi-telephone-fill text-primary fs-6 "></i> Telpon : {{ $umkm->users->no_telpon }}</li>
                    <li class="list-group-item p-1 px-3 bg-body"><i class="bi bi-envelope-fill text-primary fs-6 "></i> Email : {{ $umkm->users->email }}</li>
                </ul>
            </div>

            <div class="card mt-5 p-3 text-start" style="width: 100%; border-radius:15px">
                <P>Jam Buka</P>
                <ul class="list-group list-group-flush fw-bold ">
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Senin</p> <span class="text-end">{{ $umkm->waktu_senin}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Selasa</p> <span class="text-end">{{ $umkm->waktu_selasa}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Rabu</p> <span class="text-end">{{ $umkm->waktu_rabu}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Kamis</p> <span class="text-end">{{ $umkm->waktu_kamis}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Jum'at</p> <span class="text-end">{{ $umkm->waktu_jumat}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Sabtu</p> <span class="text-end">{{ $umkm->waktu_sabtu}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Minggu</p> <span class="text-end">{{ $umkm->waktu_minggu}}</span>
                    </li>
                </ul>
            </div>
            <div class="card mt-5 p-3 fw-bold text-start" style="width: 100%; border-radius:15px">
                <P>Toko:</P>
                <div class="m-0 lh-1" style="font-size: 12px">
                    <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i>{{ $umkm->tokopedia }}</P>
                    <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i>{{ $umkm->lazada }}</P>
                    <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i> {{ $umkm->bukalapak }}</P>
                    <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i>{{ $umkm->shopee }}</P>
                </div>
            </div>
        </div>


    </div>
</div>
{{-- end --}}
{{-- ------------------------------------------------------------------------ --}}
@else
<div class="card bg-dark text-white ">
    <img src="
        {{ asset('storage/'.$umkm->gambar_sampul) }}
        " class="card-img" alt="..." style="filter: brightness(20%); height:600px; object-fit: cover;object-position: top;">
    <div class="card-img-overlay container d-flex align-items-end justify-content-center">
        <div class="row col-12 mt-5 py-5 ">
            <div class="col-md-7 col-sm-12">
                <button class="btn btn-primary fw-bold border-radius px-5">{{ $umkm->kategori->nama_kategori }}</button>
                <h5 class="card-title fw-bold display-4 m-0">{{ $umkm->nama_badan_usaha }} <span class="text-primary fs-5 fw-normal">*Founder</span> <span class="fs-5 fw-normal">{{ $umkm->users->name }}</span></h5>
                <p class=" fs-5 m-0">{{ $rating_value }}
                    @php $ratenum = number_format($rating_value) @endphp
                    @for($i = 1; $i<= $ratenum ;$i++) <i class="bi bi-star-fill text-warning "></i>
                        @endfor
                        @for($j=$ratenum+1;$j<=5;$j++) <i class="bi bi-star-fill text-dark"></i>
                            @endfor
                            @if($ratings->count()>0)
                            ({{ $ratings->count() }} Ulasan)
                            @else
                            No Ratings
                            @endif
                            {{ $umkm->kelurahan }}
                </p>
                <div class="row">
                    <i class="bi bi-geo-alt-fill text-danger col-1"></i>
                    <p class="fs-5  p-0 col-11">{{ $umkm->alamat_badan_usaha }}</p>
                </div>

            </div>
            @auth
            @if(auth()->user()->level==1||auth()->user()->level==3||auth()->user()->level==4)
            <div class="col-md-3 col-sm-12 d-grid align-items-end ">
                <form method="POST" action="{{ route('admin.update', $umkm->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- begin -->
                    <div class="modal fade" id="modalverifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body p-5">
                                    <!-- begin -->
                                    <div class="text-black">
                                        <div class="d-flex justify-content-center ">
                                            <i class="bi bi-check-circle bg-white text-primary align-self-center" style="font-size: 100px; "></i>
                                        </div>
                                        <p class="fs-3 fw-bold text-center m-0">Verifikasi Data?</p>
                                        <p class="text-center ">Data akan diverifikasi dan disimpan. Apakah data yang ingin diverifikasi sudah benar.</p>
                                        <div class="col m-0 mx-5 text-primary d-flex justify-content-center">
                                            <select class="form-select @error('status') is-invalid @enderror d-none " name="status" id="status">
                                                <option selected value="1">diverifikasi</option>
                                                <option value="0">Belum diverifikasi</option>
                                            </select>
                                            <select class="form-select @error('kategori') is-invalid @enderror d-none " name="kategori" id="kategori">
                                                <option selected value="2">koperasi</option>
                                                <option value="1">umkm</option>

                                            </select>
                                            <button type="button submit" class="btn btn-primary border-radius btn-submit  fw-bold px-5 mx-2">Ya</button>
                                            <button type="button" class="btn btn-light border-radius fw-bold px-5 mx-2">Tidak</button>

                                        </div>
                                    </div>
                                    <!-- end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->

                    <button class="btn btn-lg btn-primary border-3 border-primary fw-bold border-radius fs-6 py-3 px-5 text-light" type="button" data-bs-toggle="modal" data-bs-target="#modalverifikasi">Verifikasi</button>

                </form>
            </div>
            @else
            <div class="col-md-5 col-sm-12 d-flex justify-content-center align-items-end ">
                <a href="#tambahulasan"><button class="btn btn-lg btn-light fw-bold border-radius fs-6 py-3  me-2 text-primary"><i class="bi bi-plus-square-fill me-2"></i> Tambah Ulasan</button></a>
                <button class="btn btn-lg btn-primary fw-bold border-radius fs-6 py-3 px-5 text-light"><i class="bi bi-share me-2"></i> Bagikan</button>
            </div>
            @endif
            @endauth


        </div>
    </div>
</div>
{{-- end --}}

{{-- begin --}}
<div class="container text-center py-4">
    <ul class="list-inline fs-4 fw-bold opacity-75">
        <a href="#">
            <li class="list-inline-item text-dark">| Detail Koperasi |</li>
        </a>
        <a href="#">
            <li class="list-inline-item text-dark">| Deskripsi Koperasi |</li>
        </a>
        <a href="#">
            <li class="list-inline-item text-dark">| Struktur Organisasi |</li>
        </a>
        <a href="#">
            <li class="list-inline-item text-dark">| Ulasan |</li>
        </a>
    </ul>
</div>
{{-- end --}}

{{-- begin --}}
<div class="container my-5 ">
    <div class="row g-5">
        <div class="col-md-8 col-sm-12">
            <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4" id="detailusaha">Detail Koperasi</p>
            <div class="fs-5" style="min-height: 300px">
                <p style="word-break: break-all;">{{ $umkm->deskripsi_usaha }}</p>
            </div>
            <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Deskripsi Koperasi</p>
            <div class="fs-5" style="min-height: 300px">
                <p style="word-break: break-all;">{{ $umkm->deskripsi_produk_jasa }}</p>
            </div>
            <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Struktur Organisasi</p>
            <div class="fs-5 m-5" style="min-height: 300px">
                <div class="row gx-5">
                    <div class="col-12">
                        <img src="{{ asset('storage/'.$umkm->gambar_struktur_organisasi) }}" class="border-radius" alt="..." style="width: 100%;  object-fit: cover; object-position: top;">
                    </div>
                </div>
            </div>
            <p id="tambahulasan" class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Ulasan</p>
            <div class="fs-5" style="min-height: 300px">
                <div class="card mt-5 p-3  text-start lh-lg" style="width: 100%; border-radius:15px;height: 300px">
                    @auth
                    <div class="">
                        <P class="m-0 p-0 col ">Ringkasan Ulasan</P>

                        <p class=" fs-5 m-0">
                            {{ $rating_value }}
                            @php $ratenum = number_format($rating_value) @endphp
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
                        @forelse ($ratings as $row)
                        <div class="row lh-1 align-items-center mb-3">
                            <div class="col-auto pe-2 ps-3 text-end">
                                <img src="{{ $row->user->image }}" class="rounded-circle" style="height:40px;width:40px;object-fit: cover;
                                object-position: top;">
                            </div>
                            <div class=" col-6 p-0">
                                <q class="fs-5 fw-bold m-0 " style="font-size:12px;">{{$row->review}}</q>
                            </div>
                        </div>
                        @empty
                        <p>Belum ada data yang ditambahkan</p>
                        @endforelse

                        @if(auth()->user()->level!=1)

                        <!-- Button trigger modal -->
                        <button type="button"  class="btn btn-primary border-radius" data-bs-toggle="modal" data-bs-target="#modaltambahulasan">
                            Tambah Ulasan
                        </button>
                        <!-- Modal rating-->
                        <div class="modal fade" id="modaltambahulasan" tabindex="-1" aria-labelledby="modaltambahulasanLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="GET" action="{{ route('add-rating') }}">
                                    @csrf
                                    <div class="modal-content">
                                        <input type="hidden" name="umkm_id" value="{{$umkm->id}}">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold fs-6 text-center" id="exampleModalLabel">{{ $umkm->nama_badan_usaha }} </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body ">
                                            <div class="row">
                                                <div class="col-auto pe-0">
                                                    <img src="{{ auth()->user()->image}}" class="rounded-circle px-0" style="height:40px;width:40px;object-fit: cover;
                                                    object-position: top;">
                                                </div>
                                                <div class="col-10">
                                                    <p class="fs-4 fw-bold mb-0 lh-1">{{Auth()->user()->name}}</p>
                                                    <p class="text-muted mb-1" style="font-size: 12px;">Memposting untuk publik</p>
                                                    <p class="text-muted mb-0 lh-1" style=" font-size: 12px;">Rating:</p>
                                                    <div class=" rating-css">
                                                        <div class="star-icon p-0">
                                                            @if($user_rating)
                                                            @for($i = 1; $i<= $user_rating->stars_rated ;$i++)
                                                                <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                                                <label for="rating{{$i}}" class="fa fa-star"></label>
                                                                @endfor
                                                                @for($j=$user_rating->stars_rated+1;$j<=5;$j++) <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                                                    <label for="rating{{$j}}" class="fa fa-star"></label>
                                                                    @endfor

                                                                    @else

                                                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                                    <label for="rating1" class="fa fa-star"></label>
                                                                    <input type="radio" value="2" name="product_rating" checked id="rating2" checked>
                                                                    <label for="rating2" class="fa fa-star"></label>
                                                                    <input type="radio" value="3" name="product_rating" checked id="rating3">
                                                                    <label for="rating3" class="fa fa-star"></label>
                                                                    <input type="radio" value="4" name="product_rating" checked id="rating4">
                                                                    <label for="rating4" class="fa fa-star"></label>
                                                                    <input type="radio" value="5" name="product_rating" checked id="rating5">
                                                                    <label for="rating5" class="fa fa-star"></label>
                                                                    @endif
                                                        </div>
                                                    </div>
                                                    @if($user_rating)
                                                    <div class="mb-3">
                                                        <textarea class="form-control" id="review" name="review" rows="6" placeholder="Bagikan pengalaman anda mengenai UMKM ini." style="font-size: 12px;" required>{{$user_rating->review}}</textarea>
                                                    </div>
                                                    @else
                                                    <div class="my-3">
                                                        <textarea class="form-control" id="review" name="review" rows="6" placeholder="Bagikan pengalaman anda mengenai UMKM ini." style="font-size: 12px;" required></textarea>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Posting</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end modal -->
                        @else
                        @endif
                    </div>

                    @else
                    <div class="row align-items-center">
                        <div class="col-md-13 text-center">
                            <p>Silahkan login terlebih dahulu untuk memberika ulasan & rating</p>
                            <button type="button" class="btn btn-primary px-5 border-radius" data-bs-toggle="modal" data-bs-target="#modalmasuk">
                                Masuk
                            </button>
                        </div>
                    </div>
                    @endauth

                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 text-center">
            <img src="{{ asset('storage/'.$umkm->gambar_logo) }}" class="border-radius mb-5" alt="..." style="width: 80%;  object-fit: cover; object-position: top;">

            <div class="card mt-5" style="width: 100%; border-radius:15px">
                <div id='map-usaha' style='width: 100%; height: 400px;'></div>
                <ul class="d-none">
                    <li class="" id="longitude" data-longitude="{{ $umkm->longtitude }}">{{ $umkm->longtitude }}</li>
                    <li class="" id="latitude" data-langitude="{{ $umkm->latitude }}">{{ $umkm->latitude }}</li>
                </ul>
                <ul class="list-group list-group-flush fw-bold text-start" style="font-size: 12px;">
                    <li class="list-group-item p-1 px-3"><i class="bi bi-geo-alt-fill text-primary fs-6 "></i> {{ $umkm->alamat_badan_usaha }}</li>
                    <li class="list-group-item p-1 px-3"><i class="bi bi-telephone-fill text-primary fs-6 "></i> {{ $umkm->no_telpon }}</li>
                    <li class="list-group-item p-1 px-3 bg-body"><i class="bi bi-envelope-fill text-primary fs-6 "></i> {{ $umkm->email_usaha }}</li>
                </ul>

            </div>
            <div class="card mt-5" style="width: 100%; border-radius:15px">
                <div class=" text-center">
                    <img src="{{ $umkm->users->image }}" class="rounded-circle m-3" style="width:80%;height:18rem;object-fit: cover; object-position: top;">
                    <p class="fs-3 fw-bold text-center m-0 lh-1">{{ $umkm->users->name }}</p>
                    <p class="text-secondary fw-bold fs-5 opacity-75">Founder</p>
                </div>
                <ul class="list-group list-group-flush fw-bold text-start" style="font-size: 12px;">
                    <li class="list-group-item p-1 px-3"><i class="bi bi-telephone-fill text-primary fs-6 "></i> Telpon : {{ $umkm->users->no_telpon }}</li>
                    <li class="list-group-item p-1 px-3 bg-body"><i class="bi bi-envelope-fill text-primary fs-6 "></i> Email : {{ $umkm->users->email }}</li>
                </ul>
            </div>

            <div class="card mt-5 p-3 text-start" style="width: 100%; border-radius:15px">
                <P>Jam Buka</P>
                <ul class="list-group list-group-flush fw-bold ">
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Senin</p> <span class="text-end">{{ $umkm->waktu_senin}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Selasa</p> <span class="text-end">{{ $umkm->waktu_selasa}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Rabu</p> <span class="text-end">{{ $umkm->waktu_rabu}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Kamis</p> <span class="text-end">{{ $umkm->waktu_kamis}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Jum'at</p> <span class="text-end">{{ $umkm->waktu_jumat}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Sabtu</p> <span class="text-end">{{ $umkm->waktu_sabtu}}</span>
                    </li>
                    <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                        <p class="m-0"> Minggu</p> <span class="text-end">{{ $umkm->waktu_minggu}}</span>
                    </li>
                </ul>
            </div>
            <div class="card mt-5 p-3 fw-bold text-start" style="width: 100%; border-radius:15px">
                <P>Tautan:</P>
                <div class="m-0 lh-1" style="font-size: 12px">
                    <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i>{{ $umkm->website }}</P>
                    <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i>{{ $umkm->instagram }}</P>
                </div>
            </div>
        </div>


    </div>
</div>
{{-- end --}}
@endif

<!-- end content -->


@push('scripts')

<script>
    var longitude = $('#longitude').text();
    var latitude = $('#latitude').text();
    const defaultLocation = [latitude, longitude]
    mapboxgl.accessToken = '{{ env("MAPBOX_KEY") }}';
    var map = new mapboxgl.Map({
        container: 'map-usaha',
        center: defaultLocation,
        zoom: 9.15
    });

    const style = "streets-v11"
    //light-v10,outdoors-v11,satellite-v9,streets-v11, dark-v10
    map.setStyle(`mapbox://styles/mapbox/${style}`)
    map.addControl(new mapboxgl.NavigationControl())

    const marker1 = new mapboxgl.Marker()
        .setLngLat([latitude, longitude])
        .addTo(map);
    L.Control.geocoder().addTo(map);
</script>
@endpush

@include('partials.footer2')
@endsection