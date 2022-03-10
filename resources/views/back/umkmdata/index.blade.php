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
                        <div class="card-title">Data UMKM</div>
                        @if(auth()->user()->level==2)
                        <a href="{{ route('umkm.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Tambah</a>
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col" width="80px">Aksi</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($umkm as $item)
                                <tr class="align-middle">
                                    <th scope="row">
                                        <div class="form-check-label text-center ">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </th>
                                    <td>{{ $item->nama_badan_usaha }}</td>
                                    <td>{{ $item->kategori->nama_kategori }}</td>
                                    <td>
                                        @if ($item->status == '1')
                                        <button type="button" class="btn btn-primary btn-round px-5">Diverifikasi</ @else <button type="button" class="btn btn-outline-primary btn-round px-4 mx-1" data-bs-toggle="modal" data-bs-target="#modalverifikasi">Belum Diverifikasi</button>


                                        @endif
                                    </td>
                                    <td>{{ $item->alamat_badan_usaha }}</td>
                                    <td class="text-center" style="padding: 0 5px!important; align-text:center">
                                        @if(auth()->user()->level==1)
                                        <a href="{{ route('umkmdata.edit',$item->id) }}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                        <button class="btn p-1 px-2 bg-danger border-radius text-light delete" data-id="{{ $item->id }}" data-nama="{{ $item->nama_badan_usaha }}" data-lokasi="/deleteumkm/">
                                            <i class=" fas fa-trash-alt"></i>
                                        </button>
                                        @elseif(auth()->user()->level==2)
                                        <a href="{{ route('umkmdatauser.edit',$item->id) }}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                        <button class="btn p-1 px-2 bg-danger border-radius text-light delete" data-id="{{ $item->id }}" data-nama="{{ $item->nama_badan_usaha }}" data-lokasi="/deleteumkmuser/">
                                            <i class=" fas fa-trash-alt"></i>
                                        </button>
                                        @elseif(auth()->user()->level==3)
                                        <a href="{{ route('adminumkm.edit',$item->id) }}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                        @elseif(auth()->user()->level==4)
                                        <a href="{{ route('adminkoperasi.edit',$item->id) }}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                        @endif



                                        <!-- <form action="{{ route('umkm.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')<button class="btn p-1 px-2 bg-danger  border-radius text-light">
                                                <i class="fas fa-trash-alt "></i>
                                            </button>
                                        </form> -->
                                    </td>
                                    <td class="text-center">
                                        @if(auth()->user()->level==1 || auth()->user()->level==3 || auth()->user()->level==4)
                                        <a href="{{ route('detailumkm', $item->slug) }}">
                                            @elseif(auth()->user()->level==2)
                                            <a href="{{ route('umkmdatauser.show', $item->slug) }}">
                                                @else
                                                <a href="{{ route('listumkm', $item->slug) }}">
                                                    @endif
                                                    <button type="button" class="btn btn-primary px-5">Detail</button></a>
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