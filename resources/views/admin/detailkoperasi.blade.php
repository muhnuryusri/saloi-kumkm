  @extends('layouts.main')
  @section('container')
  @include('partials.navbar')
  <!-- begincontent -->
  {{-- begin --}}
  <div class="card bg-dark text-white ">
      <img src="
            {{ asset('storage/'.$koperasi->gambar_sampul) }}
            " class="card-img" alt="..." style="filter: brightness(20%); height:600px; object-fit: cover;object-position: top;">
      <div class="card-img-overlay container d-flex align-items-end justify-content-center">
          <div class="row col-12 mt-5 py-5 ">
              <div class="col-md-7 col-sm-12">
                  <button class="btn btn-primary fw-bold border-radius px-5">{{ $koperasi->kategori->nama_kategori }}</button>
                  <h5 class="card-title fw-bold display-4 m-0">{{ $koperasi->nama_badan_usaha }} <span class="text-primary fs-5 fw-normal">*Founder</span> <span class="fs-5 fw-normal">{{ $koperasi->users->name }}</span></h5>
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
                              {{ $koperasi->kelurahan }}
                  </p>
                  <div class="row">
                      <i class="bi bi-geo-alt-fill text-danger col-1"></i>
                      <p class="fs-5  p-0 col-11">{{ $koperasi->alamat_badan_usaha }}</p>
                  </div>

              </div>
              <div class="col-md-3 col-sm-12 d-grid align-items-end ">
                  <form method="POST" action="{{ route('admin.update', $koperasi->id) }}">
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
              <li class="list-inline-item text-dark">| Deskripsi Kllllloperasi |</li>
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
                  <p style="word-break: break-all;">{{ $koperasi->deskripsi_usaha }}</p>
              </div>
              <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Deskripsi Koperasi</p>
              <div class="fs-5" style="min-height: 300px">
                  <p style="word-break: break-all;">{{ $koperasi->deskripsi_produk_jasa }}</p>
              </div>
              <p class="bg-primary text-light fw-bold px-4 py-2 border-radius fs-4">Struktur Organisasi</p>
              <div class="fs-5 m-5" style="min-height: 300px">
                  <div class="row gx-5">
                      <div class="col-12">
                          <img src="{{ asset('storage/'.$koperasi->gambar_struktur_organisasi) }}" class="border-radius" alt="..." style="width: 100%;  object-fit: cover; object-position: top;">
                      </div>
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
                          <p></p>
                          @endforelse

                      </div>

                      @else
                      <div class="row align-items-center">
                          <div class="col-md-13 text-center">
                              <p>Silahkan login terlebih dahulu untuk memberika ulasan & rating</p>
                              <button type="button" class="btn btn-primary border-radius px-5">Masuk</button>
                          </div>
                      </div>
                      @endauth
                  </div>
              </div>
          </div>

          <div class="col-md-4 col-sm-12 text-center">
              <img src="{{ asset('storage/'.$koperasi->gambar_logo) }}" class="border-radius mb-5" alt="..." style="width: 80%;  object-fit: cover; object-position: top;">

              <div class="card mt-5" style="width: 100%; border-radius:15px">
                  <div id='map-usaha' style='width: 100%; height: 400px;'></div>
                  <ul class="d-none">
                      <li class="" id="longitude" data-longitude="{{ $koperasi->longtitude }}">{{ $koperasi->longtitude }}</li>
                      <li class="" id="latitude" data-langitude="{{ $koperasi->latitude }}">{{ $koperasi->latitude }}</li>
                  </ul>
                  <ul class="list-group list-group-flush fw-bold text-start" style="font-size: 12px;">
                      <li class="list-group-item p-1 px-3"><i class="bi bi-geo-alt-fill text-primary fs-6 "></i> {{ $koperasi->alamat_badan_usaha }}</li>
                      <li class="list-group-item p-1 px-3"><i class="bi bi-telephone-fill text-primary fs-6 "></i> {{ $koperasi->no_telpon }}</li>
                      <li class="list-group-item p-1 px-3 bg-body"><i class="bi bi-envelope-fill text-primary fs-6 "></i> {{ $koperasi->email_usaha }}</li>
                  </ul>

              </div>
              <div class="card mt-5" style="width: 100%; border-radius:15px">
                  <div class=" text-center">
                      <img src="{{ $koperasi->users->image }}" class="rounded-circle m-3" style="width:80%;height:18rem;object-fit: cover; object-position: top;">
                      <p class="fs-3 fw-bold text-center m-0 lh-1">{{ $koperasi->users->name }}</p>
                      <p class="text-secondary fw-bold fs-5 opacity-75">Founder</p>
                  </div>
                  <ul class="list-group list-group-flush fw-bold text-start" style="font-size: 12px;">
                      <li class="list-group-item p-1 px-3"><i class="bi bi-telephone-fill text-primary fs-6 "></i> Telpon : {{ $koperasi->users->no_telpon }}</li>
                      <li class="list-group-item p-1 px-3 bg-body"><i class="bi bi-envelope-fill text-primary fs-6 "></i> Email : {{ $koperasi->users->email }}</li>
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
                  <P>Tautan:</P>
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