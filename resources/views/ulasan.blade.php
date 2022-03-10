@extends('layouts.default')
@section('content')

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">

    </div>
</div>
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Ulasan</div>

                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-primary">
                        {{ Session('success') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-hover table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10px;">No</th>
                                    <th scope="col">Nama Bada Usaha</th>
                                    <th scope="col">Kategori</th>
                                    <!-- <th scope="col">Review</th> -->
                                    <th scope="col">Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1
                                ?>
                                @forelse ($umkm as $item)
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

                                <tr class="align-middle">
                                    <th scope="row">
                                        {{ $no++ }}
                                    </th>
                                    <td>{{ $item->nama_badan_usaha }}</td>
                                    <td>{{ $item->kategori->nama_kategori }}</td>
                                    <!-- <td>

                                        @forelse ($item->ratings as $row)
                                        <p>{{ $row->review }}</p>
                                        @empty
                                        <p>-</p>
                                        @endforelse
                                    </td> -->
                                    <td>
                                        <p class="fw-bold fs-6 m-0">{{ $rating_value }}

                                            @for($i = 1; $i<= $ratenum ;$i++) <i class="fas fa-star text-warning "></i>
                                                @endfor
                                                @for($j=$ratenum+1;$j<=5;$j++) <i class="fas fa-star text-dark"></i>
                                                    @endfor
                                                    @if($ratings->count()>0)
                                                    ({{ $ratings->count() }} Ulasan)
                                                    @else
                                                    No Ratings
                                                    @endif
                                        </p>
                                    </td>


                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">Data tidak ditemukan</td>
                                </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection