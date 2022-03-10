@extends('layouts.main')
@section('container')
@include('partials.navbar')

<!-- begincontent -->
<div class="container-fluid">
    <div class="row">
        <!-- begin-->
        <div class=" col-md-6 col-sm-12 my-4">
            <div class="mx-3">
                <p class="fs-4 fw-bold">Pencarian UMKM/Koperasi</p>
                <hr class="mb-4">

                <form action="/list-umkm" method="GET">
                    <div class="row ps-3 mt-5 mb-2">
                        <div class=" col-md-8 input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Cari Usaha/Produk" value="{{ request('search') }}">
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="input-group mb-3">
                                <select id="kategori" class="form-control  " name="kategori">
                                    @if(request('kategori'))
                                    <option value="">Semua</option>
                                    @foreach($kategori as $item)
                                    <option value="{{$item->nama_kategori}}" {{ (request("kategori") == $item->nama_kategori ? "selected":"") }}>{{($item->nama_kategori)}}</option>
                                    @endforeach
                                    @else
                                    <p>
                                        <option value="">Semua</option>
                                        @foreach($kategori as $item)
                                        <option value="{{$item->nama_kategori}}">{{($item->nama_kategori)}}</option>
                                        @endforeach
                                    </p>
                                    @endif
                                </select>
                            </div>


                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4 pe-1">
                            <label for="kota" class="form-label">Kota/Kabupaten </label>
                            <div class="input-group mb-3">
                                <select id="state" name="regency_id" class="form-control value={{ old('kota') }}">
                                    <option value="">Semua Kabupaten/Kota</option>
                                    @foreach($state as $list)
                                    <option value="{{$list->id}}" {{ (request("regency_id") == $list->id ? "selected":"") }}>{{strtolower($list->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 pe-1">
                            <label for="kecamatan" class="form-label">Kecamatan </label>
                            <div class="input-group mb-3">
                                <select id="city" class="form-control @error('kecamatan') is-invalid @enderror" name="district_id">
                                    <option value="" >Semua Kecamatan</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <label for="kelurahan" class="form-label">Kelurahan </label>
                            <div class="input-group mb-3">
                                <select id="village" name="village_id" class="form-control value={{ old('kelurahan') }}">
                                    <option value="">Semua Kelurahan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid my-3">
                        <button class="btn btn-submit btn-primary text-white" type="submit">Cari</button>
                    </div>
                </form>
            </div>
            @forelse ($umkm as $item)
            {{-- begin --}}
            <div class="card shadow px-3 pb-3 my-3 bg-body rounded border-0 " style="border-radius: 15px!important">
                <div class="row">
                    <div class="col-md-6 col-sm-12 mt-3">
                        <a href="{{ route('listumkm', $item->slug) }}">
                            <h5 class=" fw-bold fs-4 m-0 text-black">{{ $item->nama_badan_usaha }}</h5>
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
                        <div class="d-flex align-items-center">
                            <i class="bi bi-geo-alt-fill text-danger"></i>
                            <p class="p-0 fw-bold m-1" style="font-size: smaller;"> {{ strtolower($item->district->name) }}, {{ strtolower($item->province->name) }}</p>

                        </div>
                        <p style="height: 100px; overflow:hidden;">{{ $item->deskripsi_usaha }}</p>
                        <hr>
                        <div class="row lh-1 align-items-center">
                            <div class="col-auto pe-2 ps-3 text-end">
                                <img src="{{ $item->users->image }}" class="rounded-circle" style="height:40px;width:40px;object-fit: cover;
                                object-position: top;">
                            </div>
                            <div class=" col-6 p-0">
                                <p class="fw-bold m-0 mt-n3">{{ $item->users->name }}</p>
                                <p class="text-secondary m-0 " style="font-size:12px;">Founder</p>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12 d-flex align-items-center mt-3">

                        <div class="position-absolute d-flex gap-1 top-0 start-0 mt-2 ms-4 ">

                            <a href="/list-umkm?kategori={{ $item->kategori->nama_kategori }}">
                                <p class=" text- bg-white opacity-50  py-1 px-2 border-radius fw-bold" style="font-size:10px;">{{ $item->kategori->nama_kategori}}</p>
                            </a>
                            @foreach ($item->kategoriusaha as $tag)
                            <a href="/list-umkm?kategoriusaha={{ $tag->nama_kategori }}">
                                <p class=" bg-white opacity-50 py-1 px-2 border-radius fw-bold" style="font-size:10px;">{{ $tag->nama_kategori}}</p>
                            </a>
                            @endforeach
                            @if($item->kategorikoperasi_id)
                            <a href="/list-umkm?kategorikoperasi={{ $item->kategorikoperasi->slug }}">
                                <p class=" text- bg-white opacity-50  py-1 px-2 border-radius fw-bold" style="font-size:10px;">{{ $item->kategorikoperasi->nama_kategori}}</p>
                            </a>
                            @endif
                        </div>

                        <img src=" {{ asset('storage/'.$item->gambar_sampul) }} " class=" border-radius" alt="..." style="width: 100%; height:250px; object-fit: cover;
                        object-position: top;">
                    </div>
                </div>
            </div>
            {{-- end --}}
            @empty
            <p class=" text-center fs-2 fw-bold">No post found</p>
            @endforelse


            <div class="row justify-content-end m-0">
                <div class="col-auto">
                    <ul class="pagination pg-primary">
                        {{ $umkm->links() }}
                    </ul>
                </div>
            </div>
        </div>
        <!-- {{ asset('storage/'.$item->gambar_sampul) }} -->

        <!-- end-->


        <!-- begin-->
        <div class="col-md-6 col-sm-12 peta-pencarian">
            <div id='mapid' style='width: 100%; height: 100vh;'></div>
        </div>
        <!-- end-->

    </div>
</div>

<!-- end content -->

<script>
    jQuery(document).ready(function() {
        jQuery('#country').change(function() {
            let cid = jQuery(this).val();
            jQuery('#state').html('<option value="">Pilih Kabupaten/Kota</option>')
            jQuery.ajax({
                url: '/getState',
                type: 'post',
                data: 'cid=' + cid + '&_token={{csrf_token()}}',
                success: function(result) {
                    jQuery('#state').html(result)
                }
            });
        });

        jQuery('#state').show(function() {
            let sid = jQuery(this).val();
            jQuery.ajax({
                url: '/getCity',
                type: 'post',
                data: 'sid=' + sid + '&_token={{csrf_token()}}',
                success: function(result) {
                    jQuery('#city').html(result)
                }
            });
        });

        jQuery('#city').show(function() {
            let sid = jQuery(this).val();
            jQuery.ajax({
                url: '/getVillage',
                type: 'post',
                data: 'sid=' + sid + '&_token={{csrf_token()}}',
                success: function(result) {
                    jQuery('#village').html(result)
                }
            });
        });

    });
</script>
@push("peta")
<script>
    var map = L.map('mapid').setView([1.4065383200734232, 127.84684996157745], 8);
    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    $(Document).ready(function() {
        $.getJSON('titik/json', function(data) {
            $.each(data, function(index) {
                var html = '<div class"card"><img class="rounded my-1"style="border" width="250px"src=" http://127.0.0.1:8000/storage/' + data[index].gambar_sampul + ' " ><br><div class="card-img-overlay"><h5 class="text-white ps-2 fw-bold "> ' + data[index].nama_badan_usaha + '</h5></div><strong>' + data[index].nama_badan_usaha + '</strong>';

                L.marker([parseFloat(data[index].longtitude), parseFloat(data[index].latitude)]).addTo(map).bindPopup(html).openPopup();
            })
        })
    })
</script>
@endpush
@include('partials.footer2')
@endsection