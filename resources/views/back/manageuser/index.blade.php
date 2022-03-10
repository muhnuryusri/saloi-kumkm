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
                        <div class="card-title">Data User</div>
                        <!-- <a href="#" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Tambah</a> -->
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
                                    <th scope="col">Email</th>
                                    @if(auth()->user()->level==1)
                                    <th scope="col" class="text-center">Jumlah UMKM</th>
                                    <th scope="col" class="text-center">Jumlah Koperasi</th>
                                    @elseif(auth()->user()->level==3)
                                    <th scope="col" class="text-center">Jumlah UMKM</th>
                                    @elseif(auth()->user()->level==4)
                                    <th scope="col" class="text-center">Jumlah Koperasi</th>
                                    @endif
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user as $item)
                                <tr class="align-middle ">
                                    <th scope="row">
                                        <div class="form-check-label text-center ">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <?php
                                    $jmlumkm = $item->umkms->where('kategori_id', 1);
                                    $jmlkoperasi = $item->umkms->where('kategori_id', 2);
                                    ?>
                                    @if(auth()->user()->level==1)
                                    <td class="text-center">{{$jmlumkm->count()}}</td>
                                    <td class="text-center">{{$jmlkoperasi->count()}}</td>
                                    @elseif(auth()->user()->level==3)
                                    <td class="text-center">{{$jmlumkm->count()}}</td>
                                    @elseif(auth()->user()->level==4)
                                    <td class="text-center">{{$jmlkoperasi->count()}}</td>
                                    @endif
                                    <td class="text-center" style="padding: 0 5px!important; align-text:center">
                                        @if(auth()->user()->level==1)
                                        <a href="{{route('reset_password',$item->id)}}" data-toggle="tooltip" data-placement="top" title="Reset password"><i class="fas fa-key p-1 p-2  bg-success border-radius text-light"></i></a>
                                        @elseif(auth()->user()->level==3)
                                        <a href="{{route('resetpassword',$item->id)}}" data-toggle="tooltip" data-placement="top" title="Reset password"><i class="fas fa-key p-1 p-2  bg-success border-radius text-light"></i></a>
                                        @elseif(auth()->user()->level==4)
                                        <a href="{{route('reset_password_user',$item->id)}}" data-toggle="tooltip" data-placement="top" title="Reset password"><i class="fas fa-key p-1 p-2  bg-success border-radius text-light"></i></a>
                                        @endif
                                        <a href="{{route('manageuser.edit',$item->id)}}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                        <button class="btn p-1 px-2 bg-danger border-radius text-light delete" data-id="{{ $item->id }}" data-nama="{{ $item->name }}" data-lokasi="/deleteuser/">
                                            <i class=" fas fa-trash-alt"></i>
                                        </button>
                                        <!-- <form action="{{ route('manageuser.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')<button class="btn p-1 px-2 bg-danger  border-radius text-light">
                                                <i class="fas fa-trash-alt "></i>
                                            </button>
                                        </form> -->
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

    @endsection