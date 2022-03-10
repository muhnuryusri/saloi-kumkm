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
                        <div class="card-title">Laporan Keuangan</div>
                        @if(auth()->user()->level==2)
                        <a href="{{ route('createlaporankoperasi',$umkm->id) }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Tambah</a>
                        @endif
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
                                    <th scope="col">
                                        <div class="form-check-label text-center">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </th>
                                    <th scope="col">Judul Laporan</th>
                                    <th scope="col">File Laporan</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col" width="80px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($umkm->laporankeuangan as $item)
                                <tr class="align-middle">
                                    <th scope="row">
                                        <div class="form-check-label text-center ">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </th>
                                    <td>{{ $item->nama_laporan }}</td>
                                    <td class="text-start"><a href="{{ asset('storage/'.$item->laporan) }}"><button type="button" class="btn btn-warning text-dark btn-round py-0 px-3 mx-1" download="">Unduh</button></a></td>
                                    <td>{{ $item->bulan }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td class="text-center" style="padding: 0 5px!important; align-text:center">
                                        @if(auth()->user()->level==2)
                                        <a href="{{ route('laporankeuangan.edit',$item->id) }}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                        <button class="btn p-1 px-2 bg-danger border-radius text-light delete" data-id="{{ $item->id }}" data-nama="{{ $item->nama_badan_usaha }}" data-lokasi="/deletelaporan/">
                                            <i class=" fas fa-trash-alt"></i>
                                        </button>
                                        <!-- <form action="{{ route('laporankeuangan.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')<button class="btn p-1 px-2 bg-danger  border-radius text-light">
                                                <i class="fas fa-trash-alt "></i>
                                            </button>

                                        </form> -->
                                        @elseif(auth()->user()->level==4)
                                        <button class="btn p-1 px-2 bg-danger border-radius text-light delete" data-id="{{ $item->id }}" data-nama="{{ $item->nama_badan_usaha }}" data-lokasi="/deletelaporankeuangan/">
                                            <i class=" fas fa-trash-alt"></i>
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-danger">Data masih kosong</td>
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