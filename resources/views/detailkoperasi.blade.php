  @extends('layouts.main')
  @section('container')
  @include('partials.navbar')
  <!-- begincontent -->
  {{-- begin --}}
  <div class="card bg-dark text-white ">
      <img src="{{ asset('storage/'.$koperasi->gambar_sampul) }}" class="card-img" alt="..." style="filter: brightness(20%); height:600px; object-fit: cover;object-position: top;">
      <div class="card-img-overlay container d-flex align-items-end">
          <div class="row col-12 mt-5 py-5 ">
              <div class="col-7">
                  <button class="btn btn-primary fw-bold border-radius px-5">{{ $koperasi->kategori->nama_kategori }}</button>
                  <h5 class="card-title fw-bold display-4 m-0">{{ $koperasi->nama_koperasi }} <span class="text-primary fs-5 fw-normal">*Ketua</span> <span class="fs-5 fw-normal">{{ auth()->user()->name }}</span></h5>
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
                      <p class="fs-5  p-0 col-11">{{ $koperasi->alamat_koperasi }}</p>
                  </div>

              </div>
              <div class="col-5  d-flex justify-content-center align-items-end ">
                  <button class="btn btn-lg btn-light border-3 border-primary fw-bold border-radius fs-6 py-3  me-2 text-primary"><i class="bi bi-pen-fill me-2"></i> Tambah Ulasan</button>
                  <button class="btn btn-lg btn-primary border-3 border-primary fw-bold border-radius fs-6 py-3 px-5 text-light"><i class="bi bi-share me-2"></i> Bagikan</button>
              </div>


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
              <li class="list-inline-item text-dark">| Struktur Organisasiiiiiiiiiiiiiii |</li>
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
          <div class="col-8">
              <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4" id="detailkoperasi">Detail Koperasi</p>
              <div class="fs-5" style="min-height: 300px">
                  <p>{{ $koperasi->detail_koperasi }}</p>
              </div>
              <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Deskripsi Koperasi</p>
              <div class="fs-5" style="min-height: 300px">
                  <p>{{ $koperasi->deskripsi_koperasi }}</p>
              </div>
              <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Struktur Organisasi</p>
              <div class="fs-5 m-5" style="min-height: 300px">
                  <div class="row gx-5">
                      <div class="col-12">
                          <img src="assets/img/foto1.jpg" class="border-radius" alt="..." style="width: 100%;  object-fit: cover; object-position: top;">
                      </div>
                  </div>
              </div>
              <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Ulasan</p>
              <div class="fs-5" style="min-height: 300px">
                  <div class="card mt-5 p-3  text-start lh-lg" style="width: 100%; border-radius:15px;height: 300px">
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
                  </div>
              </div>
          </div>

          <div class="col-4 text-center">
              <img src="{{ asset('storage/'.$koperasi->gambar_logo) }}" class="border-radius mb-5" alt="..." style="width: 80%;  object-fit: cover; object-position: top;">

              <div class="card mt-5" style="width: 100%; border-radius:15px">

                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32658826.575899865!2d99.40594303809047!3d-2.2751528804043257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1635202221309!5m2!1sid!2sid" width="100%" height="400px" style="border:0 ;border-radius:15px 15px 0 0;" allowfullscreen="" loading="lazy"></iframe>


                  <ul class="list-group list-group-flush fw-bold text-start" style="font-size: 12px;">
                      <li class="list-group-item p-1 px-3"><i class="bi bi-geo-alt-fill text-primary fs-6 "></i> {{ $koperasi->alamat_koperasi }}</li>
                      <li class="list-group-item p-1 px-3"><i class="bi bi-telephone-fill text-primary fs-6 "></i> {{ $koperasi->no_telpon }}</li>
                      <li class="list-group-item p-1 px-3 bg-body"><i class="bi bi-envelope-fill text-primary fs-6 "></i> {{ $koperasi->email_usaha }}</li>
                  </ul>

              </div>
              <div class="card mt-5" style="width: 100%; border-radius:15px">
                  <div class=" text-center">
                      <img src="assets/img/person2.jpg" class="col-6 rounded-circle m-3" style="width:300px;height:300px;object-fit: cover; object-position: top;">
                      <p class="fs-3 fw-bold text-center m-0 lh-1">{{ auth()->user()->name }}</p>
                      <p class="text-secondary fw-bold fs-5 opacity-75">Founder</p>
                  </div>
                  <ul class="list-group list-group-flush fw-bold text-start" style="font-size: 12px;">
                      <li class="list-group-item p-1 px-3"><i class="bi bi-telephone-fill text-primary fs-6 "></i> Telpon : {{ auth()->user()->no_telpon }}</li>
                      <li class="list-group-item p-1 px-3 bg-body"><i class="bi bi-envelope-fill text-primary fs-6 "></i> Email : {{ auth()->user()->email }}</li>
                  </ul>
              </div>

              <div class="card mt-5 p-3 text-start" style="width: 100%; border-radius:15px">
                  <P>Jam Buka</P>
                  <ul class="list-group list-group-flush fw-bold ">
                      <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Senin</p> <span class="text-end">{{ $koperasi->waktu_senin}}</span>
                      </li>
                      <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Selasa</p> <span class="text-end">{{ $koperasi->waktu_selasa}}</span>
                      </li>
                      <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Rabu</p> <span class="text-end">{{ $koperasi->waktu_rabu}}</span>
                      </li>
                      <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Kamis</p> <span class="text-end">{{ $koperasi->waktu_kamis}}</span>
                      </li>
                      <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Jum'at</p> <span class="text-end">{{ $koperasi->waktu_jumat}}</span>
                      </li>
                      <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Sabtu</p> <span class="text-end">{{ $koperasi->waktu_sabtu}}</span>
                      </li>
                      <li class="list-group-item p-1 d-flex justify-content-between lh-1 mt-2">
                          <p class="m-0"> Minggu</p> <span class="text-end">{{ $koperasi->waktu_minggu}}</span>
                      </li>
                  </ul>
              </div>
              <div class="card mt-5 p-3 fw-bold text-start" style="width: 100%; border-radius:15px">
                  <P>Media Sosial:</P>
                  <div class="m-0 lh-1" style="font-size: 12px">
                      <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i>{{ $koperasi->website }}</P>
                      <P class="m-0 d-flex align-items-center"><i class="bi bi-link-45deg fs-3 text-primary"></i>{{ $koperasi->instagram }}</P>

                  </div>
              </div>
          </div>


      </div>
  </div>
  {{-- end --}}

  <!-- end content -->
  @include('partials.footer2')
  @endsection