  @extends('layouts.main')
  @section('container')
  @include('partials.navbar')
  <!-- begincontent -->
  {{-- begin --}}


  <div class="card bg-dark text-white ">
      <img src="
        {{ asset('storage/'.$umkm->gambar_sampul) }}
        " class="card-img" alt="..." style="filter: brightness(20%); height:600px; object-fit: cover;object-position: top;">
      <div class="card-img-overlay container d-flex align-items-end">
          <div class="row col-12 mt-5 py-5 ">
              <div class="col-7">
                  <button class="btn btn-primary fw-bold border-radius px-5">{{ $umkm->kategori->nama_kategori }}</button>
                  <h5 class="card-title fw-bold display-4 m-0">{{ $umkm->nama_badan_usaha }} <span class="text-primary fs-5 fw-normal">*Founder</span> <span class="fs-5 fw-normal">{{ $umkm->users->name }}</span></h5>
                  <p class=" fs-5 m-0">4,8
                      <i class="bi bi-star-fill text-warning "></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      (3 Ulasan)
                  </p>
                  <div class="row">
                      <i class="bi bi-geo-alt-fill text-danger col-1"></i>
                      <p class="fs-5  p-0 col-11">{{ $umkm->alamat_badan_usaha }}</p>
                  </div>

              </div>

              <div class="col-5  d-flex justify-content-center align-items-end ">
                  <a href="#"><button class="btn btn-lg btn-light fw-bold border-radius fs-6 py-3  me-2 text-primary"><i class="bi bi-plus-square-fill me-2"></i> Tambah Ulasan</button></a>
                  <button class="btn btn-lg btn-primary fw-bold border-radius fs-6 py-3 px-5 text-light"><i class="bi bi-share me-2"></i> Bagikan</button>
              </div>
              @Auth
              @Endauth

          </div>
      </div>
  </div>
  {{-- end --}}

  {{-- begin --}}
  <div class="container text-center py-4">
      <ul class="list-inline fs-4 fw-bold opacity-75">
          <a href="#">
              <li class="list-inline-item text-dark">| Detail Usahaaaaaaaaaa |</li>
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
                  <p>{{ $umkm->deskripsi_usaha }}</p>
              </div>
              <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Deskripsi Produk dan Jasa</p>
              <div class="fs-5" style="min-height: 300px">
                  <p>{{ $umkm->deskripsi_produk_jasa }}</p>
              </div>
              <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Galeri Produk dan Jasa</p>
              <div class="fs-5 m-5" style="min-height: 300px">

              </div>
              <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Ulasan</p>
              <div class="fs-5" style="min-height: 300px">
                  <div class="card mt-5 p-3  text-start lh-lg " style="width: 100%; border-radius:15px;min-height: 300px">
                      @auth
                      <div class="">
                          <P class="m-0 p-0 col ">Ringkasan Ulasan</P>
                          <p class=" fs-5 m-0">4,8
                              <i class="bi bi-star-fill text-warning "></i>
                              <i class="bi bi-star-fill text-warning"></i>
                              <i class="bi bi-star-fill text-warning"></i>
                              <i class="bi bi-star-fill text-warning"></i>
                              <i class="bi bi-star-fill text-warning"></i>
                              (3 Ulasan)
                          </p>
                          <div class="row lh-1 align-items-center mb-3">
                              <div class="col-auto pe-2 ps-3 text-end">
                                  <img src="{{ $umkm->users->image }}" class="rounded-circle" style="height:40px;width:40px;object-fit: cover;
                                object-position: top;">
                              </div>
                              <div class=" col-6 p-0">
                                  <q class="fs-5 fw-bold m-0 " style="font-size:12px;">Founder</q>
                              </div>

                          </div>
                          <div class="row lh-1 align-items-center mb-3">
                              <div class="col-auto pe-2 ps-3 text-end">
                                  <img src="{{ $umkm->users->image }}" class="rounded-circle" style="height:40px;width:40px;object-fit: cover;
                                object-position: top;">
                              </div>
                              <div class=" col-6 p-0">
                                  <q class="fs-5 fw-bold m-0 " style="font-size:12px;">Founder</q>
                              </div>

                          </div>
                          <div class="row lh-1 align-items-center mb-3">
                              <div class="col-auto pe-2 ps-3 text-end">
                                  <img src="{{ $umkm->users->image }}" class="rounded-circle" style="height:40px;width:40px;object-fit: cover;
                                object-position: top;">
                              </div>
                              <div class=" col-6 p-0">
                                  <q class="fs-5 fw-bold m-0 " style="font-size:12px;">Founder</q>
                              </div>

                          </div>
                          <div class="row lh-1 align-items-center mb-3">
                              <div class="col-auto pe-2 ps-3 text-end">
                                  <img src="{{ $umkm->users->image }}" class="rounded-circle" style="height:40px;width:40px;object-fit: cover;
                                object-position: top;">
                              </div>
                              <div class=" col-6 p-0">
                                  <q class="fs-5 fw-bold m-0 " style="font-size:12px;">Founder</q>
                              </div>
                          </div>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary border-radius" data-bs-toggle="modal" data-bs-target="#modaltambahulasan">
                              Tambah Ulasan
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="modaltambahulasan" tabindex="-1" aria-labelledby="modaltambahulasanLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title fw-bold fs-3 text-center" id="exampleModalLabel">Dress Shop</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          <div class="row">
                                              <div class="col-md-auto">

                                              </div>
                                              <div class="col-md-auto">

                                              </div>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Save changes</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      @else
                      <div class="row align-items-center">
                          <div class="col-md-13 text-center">
                              <p>Silahkan login terlebih dahulu untuk memberika ulasan & rating</p>
                              <button type="button" class="btn btn-outline-primary mx-2 border-radius" data-bs-toggle="modal" data-bs-target="#modalmasuk">
                                  Masuk
                              </button>
                          </div>
                      </div>
                      @endauth
                      <div class="row lh-1 align-items-center mb-3">
                          <div class="col-auto pe-2 ps-3 text-end">
                              <img src="{{ $umkm->users->image }}" class="rounded-circle" style="height:40px;width:40px;object-fit: cover;
                            object-position: top;">
                          </div>
                          <div class=" col-6 p-0">
                              <q class="fs-5 fw-bold m-0 " style="font-size:12px;">Founder</q>
                          </div>

                      </div>
                  </div>
              </div>
          </div>

          <div class="col-4 text-center">
              <img src="{{ asset('storage/'.$umkm->gambar_logo) }}" class="border-radius mb-5" alt="..." style="width: 80%;  object-fit: cover; object-position: top;">

              <div class="card mt-5" style="width: 100%; border-radius:15px">

                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32658826.575899865!2d99.40594303809047!3d-2.2751528804043257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1635202221309!5m2!1sid!2sid" width="100%" height="400px" style="border:0 ;border-radius:15px 15px 0 0;" allowfullscreen="" loading="lazy"></iframe>


                  <ul class="list-group list-group-flush fw-bold text-start" style="font-size: 12px;">
                      <li class="list-group-umkm p-1 px-3"><i class="bi bi-geo-alt-fill text-primary fs-6 "></i> {{ $umkm->alamat_badan_usaha }}</li>
                      <li class="list-group-umkm p-1 px-3"><i class="bi bi-telephone-fill text-primary fs-6 "></i> {{ $umkm->no_telpon }}</li>
                      <li class="list-group-umkm p-1 px-3 bg-body"><i class="bi bi-envelope-fill text-primary fs-6 "></i> {{ $umkm->email_usaha }}</li>
                  </ul>

              </div>
              <div class="card mt-5" style="width: 100%; border-radius:15px">
                  <div class=" text-center">
                      <img src="{{$umkm->users->image}}" class="rounded-circle m-3" style="width:80%;height:300px;object-fit: cover; object-position: top;">
                      <p class="fs-3 fw-bold text-center m-0 lh-1">{{ $umkm->users->name }}</p>
                      <p class="text-secondary fw-bold fs-5 opacity-75">Founder</p>
                  </div>
                  <ul class="list-group list-group-flush fw-bold text-start" style="font-size: 12px;">
                      <li class="list-group-umkm p-1 px-3"><i class="bi bi-telephone-fill text-primary fs-6 "></i> Telpon : {{ $umkm->users->no_telpon }}</li>
                      <li class="list-group-umkm p-1 px-3 bg-body"><i class="bi bi-envelope-fill text-primary fs-6 "></i> Email : {{ $umkm->users->email }}</li>
                  </ul>
              </div>

              <div class="card mt-5 p-3 text-start" style="width: 100%; border-radius:15px">
                  <P>Jam Buka</P>
                  <ul class="list-group list-group-flush fw-bold ">
                      <li class="list-group-umkm p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Senin</p> <span class="text-end">{{ $umkm->waktu_senin}}</span>
                      </li>
                      <li class="list-group-umkm p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Selasa</p> <span class="text-end">{{ $umkm->waktu_selasa}}</span>
                      </li>
                      <li class="list-group-umkm p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Rabu</p> <span class="text-end">{{ $umkm->waktu_rabu}}</span>
                      </li>
                      <li class="list-group-umkm p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Kamis</p> <span class="text-end">{{ $umkm->waktu_kamis}}</span>
                      </li>
                      <li class="list-group-umkm p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Jum'at</p> <span class="text-end">{{ $umkm->waktu_jumat}}</span>
                      </li>
                      <li class="list-group-umkm p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Sabtu</p> <span class="text-end">{{ $umkm->waktu_sabtu}}</span>
                      </li>
                      <li class="list-group-umkm p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Minggu</p> <span class="text-end">{{ $umkm->waktu_minggu}}</span>
                      </li>
                  </ul>
              </div>
              <div class="card mt-5 p-3 fw-bold text-start" style="width: 100%; border-radius:15px">
                  <P>Toko:</P>
                  <div class="m-0 lh-1" style="font-size: 12px">
                      <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i>{{ $umkm->tokopedia }}</P>
                      <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i>{{ $umkm->lazada }}</P>
                      <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i> {{ $umkm->shopee }}</P>
                      <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i>{{ $umkm->shopee }}</P>
                  </div>
              </div>
          </div>


      </div>
  </div>
  {{-- end --}}


  <!-- end content -->
  @include('partials.footer2')
  @endsection