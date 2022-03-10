@extends('layouts.default')
@section('content')
<!-- begincontent -->
<div class="container">
    <p class="display-3 fw-bold text-primary m-0 pt-5">Admin</p>
    <p class="fs-4 fw-bold">Kelola UMKM dan Koperasi</p>
    <div class="row ">
        <div class="col-8">
            <input type="search" class="form-control border-radius" aria-label="Username" aria-describedby="basic-addon1" >
        </div>
        <div class="col-2">
            <select class="form-select border-radius" aria-label="Default select example">
                <option selected>Jenis</option>
                <option value="1">...</option>
            </select>
        </div>
        <div class="col-2">
            <select class="form-select border-radius" aria-label="Default select example">
                <option selected>Status</option>
                <option value="1">...</option>
            </select>
        </div>
    </div>
    <div class="my-4">
        <table class="table table-hover table-borderless table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Status</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Aksi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($umkm as $item)
                <tr class="align-middle">
                    <th scope="row">
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </th>
                    <td>{{ $item->nama_badan_usaha }}</td>
                    <td>{{ $item->kategori->nama_kategori }}</td>
                    <td>
                        @if ($item->status == '1')
                        <button type="button" class="btn btn-primary rounded-pill px-5">Diverifikasi</
                            @else
                            
                            <button type="button" class="btn btn-outline-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalverifikasi">Belum Diverifikasi</button>
                            
                            
                            @endif
                        </td>
                        <td>{{ $item->alamat_badan_usaha }}</td>
                        <td style="min-width:100px">
                            <i class="bi bi-pencil-fill p-1 px-2 bg-primary border-radius text-light"></i>
                            <i class="bi bi-trash-fill p-1 px-2 bg-danger border-radius text-light" data-bs-toggle="modal" data-bs-target="#exampleModal3"></i>
                        </td >
                        <td class="text-center"><a href="{{ route('detailumkm', $item->slug) }}" ><button type="button" class="btn btn-primary px-5">Detail</button></a></td>
                    </tr>
                    @endforeach
                    @foreach ($koperasi as $item)
                    <tr class="align-middle">
                        <th scope="row">
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </th>
                        <td>{{ $item->nama_koperasi }}</td>
                        <td>{{ $item->kategori->nama_kategori }}</td>
                        <td>
                            @if ($item->status == '1')
                            <button type="button" class="btn btn-primary rounded-pill px-5">Diverifikasi</
                                @else
                                
                                <button type="button" class="btn btn-outline-primary rounded-pill px-4" >Belum Diverifikasi</button>
                                <!-- begin -->
                                <div class="modal fade" id="modalverifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body p-5">
                                                <!-- begin -->
                                                <div class="">
                                                    <div class="d-flex justify-content-center ">
                                                        <i class="bi bi-check-circle bg-white text-primary align-self-center" style="font-size: 100px; "></i>
                                                    </div>
                                                    <p class="fs-3 fw-bold text-center m-0">Verifikasi Data?</p>
                                                    <p class="text-center ">Data akan diverifikasi dan disimpan. Apakah data yang ingin diverifikasi sudah benar.</p>
                                                    <div class="col m-0 mx-5 text-primary d-flex justify-content-center">
                                                        <a href="{{ route('umkm.edit',$item->id) }}"><button type="button submit" class="btn btn-primary border-radius btn-submit  fw-bold px-5 mx-2">Ya</button></a>
                                                        <button type="button" class="btn btn-light border-radius fw-bold px-5 mx-2">Tidak</button>
                                                    </div>
                                                </div>
                                                <!-- end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                                
                                @endif
                            </td>
                            <td>{{ $item->alamat_koperasi }}</td>
                            <td style="min-width:100px">
                                <i class="bi bi-pencil-fill p-1 px-2 bg-primary border-radius text-light"></i>
                                <i class="bi bi-trash-fill p-1 px-2 bg-danger border-radius text-light" data-bs-toggle="modal" data-bs-target="#exampleModal3"></i>
                            </td >
                            <td class="text-center"><a href="{{ route('detailkoperasi', $item->slug) }}" ><button type="button" class="btn btn-primary px-5">Detail</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-around">
                <div class="col mb-5">
                    <p>Menampilkan 1-20 dari 50 data</p>
                </div>
                <div class="col">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        
        <!-- end content -->
         
        @include('partials.footer1')
        @endsection