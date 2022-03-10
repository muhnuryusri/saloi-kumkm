@extends('layouts.main')
@section('container')
@include('partials.navbar')

<!-- begincontent -->
<div class="container">
    <a href="{{ route('listumkm', $umkm->slug) }}">
        <p class="fw-bold text-primary m-0 pt-5"><i class="bi bi-chevron-left"></i> Kembali</p>
    </a>
    <p class="display-3 fw-bold text-primary m-0 ">{{ $umkm->nama_badan_usaha }}</p>
    <p class="fs-4 fw-bold">List Produk UMKM</p>
    <div class="row ">
        <div class="col-8">
            <input type="text" class="form-control border-radius" aria-label="Username" aria-describedby="basic-addon1">
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
            @if (Session::has('success'))
            <div class="alert alert-primary">
                {{ Session('success') }}
            </div>
            @endif
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </th>
                    <th scope="col">Nomor Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($umkm->produkumkm as $item)
                <tr class="align-middle">
                    <th scope="row">
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </th>
                    <td>{{ $item->nomor_produk }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->stok }}
                    </td>
                    <td>{{ $item->harga }}</td>
                    <td>
                        <a id="set_dtl" class="btn btn-primary border-radius btn-sm" data-bs-toggle="modal" data-bs-target="#detail_produk" item-namaproduk="<?= $item->nama_produk ?>" nomor-produk="{{$item->nomor_produk}}" stok="{{$item->stok}}" harga="{{$item->harga}}" umkm-id="{{$item->umkm_id}}" gambar-produk="{{$item->gambar_produk}}"><i class="fas fa-pen text-white"></i></a>
                        <!-- Modal -->
                        <div class="modal fade" id="detail_produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title fw-bold fs-5" id="exampleModalLabel">Edit produk UMKM</p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body mt-4 mx-4 mb-0">
                                        <div class="mb-4 row">
                                            <label for="input" class="col-sm-3 col-form-label">Nama Produk</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="input" class="col-sm-3 col-form-label">Nomor Produk</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nomor_produk" id="">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="input" class="col-sm-3 col-form-label">Stok</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="stok" id="">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="input" class="col-sm-3 col-form-label">Harga</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="harga" id="">
                                            </div>
                                        </div>
                                        <div class="mb-4 row d-none">
                                            <label for="input" class="col-sm-3 col-form-label">UMKM id</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="umkm_id" id="" value="{{ $umkm->id }}">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="input" class="col-sm-3 col-form-label">Gambar Produk</label>
                                            <div class="col-md-3 col-sm-7 pe-0 row align-items-end ">
                                                <div class="mb-1 col-md-12 pe-0 ">
                                                    <p class="image_upload">
                                                        <label for="profileimage" style="display: block">
                                                            <a class="btn btn-primary btn-block text-white" rel="nofollow">Unggah Foto</a>
                                                        </label>
                                                        <input type="file" name="gambar_produk" id="profileimage2" style="display: none;" class=" @error('gambar_produk') is-invalid @enderror">
                                                        @error('gambar_produk')
                                                    <div class="invalid-feedback d-block text-start">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                    </p>
                                                </div>
                                                <div class="col-sm-12 col-md-12 px-3 ">
                                                    <img class="d-none" src="#" id="yourimage2" width="100%" alt="" style="width:100%;height:200px;object-fit: cover;
                                                    object-position: top;"><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('produkumkm.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm border-radius">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </td>
                    <td class="text-center"><button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#gambar_produk">Detail</button></td>

                    <!-- Modal -->
                    <div class="modal fade" id="gambar_produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset('storage/'.$item->gambar_produk) }}" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Data masih kosong</td>
                </tr>
                @endforelse

            </tbody>
        </table>
        <div class="row text-center">
            <div class="col-md-3 offset-md-9"><a href="#"><i class="bi bi-plus-circle-fill display-2" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></a></div>
        </div>
        {{-- begin --}}
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-header">
                        <p class="modal-title fw-bold fs-5" id="exampleModalLabel">Tambah produk UMKM</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mt-4 mx-4 mb-0">
                        <form method="POST" action="{{ route('produkumkm.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 row">
                                <label for="input" class="col-sm-3 col-form-label">Nama Produk</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_produk" id="">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="input" class="col-sm-3 col-form-label">Nomor Produk</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nomor_produk" id="">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="input" class="col-sm-3 col-form-label">Stok</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="stok" id="">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="input" class="col-sm-3 col-form-label">Harga</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="harga" id="">
                                </div>
                            </div>
                            <div class="mb-4 row d-none">
                                <label for="input" class="col-sm-3 col-form-label">UMKM id</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="umkm_id" id="" value="{{ $umkm->id }}">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="input" class="col-sm-3 col-form-label">Gambar Produk</label>
                                <div class="col-md-3 col-sm-7 pe-0 row align-items-end ">
                                    <div class="mb-1 col-md-12 pe-0 ">
                                        <p class="image_upload">
                                            <label for="profileimage" style="display: block">
                                                <a class="btn btn-primary btn-block text-white" rel="nofollow">Unggah Foto</a>
                                            </label>
                                            <input type="file" name="gambar_produk" id="profileimage" style="display: none;" class=" @error('gambar_produk') is-invalid @enderror">
                                            @error('gambar_produk')
                                        <div class="invalid-feedback d-block text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </p>
                                    </div>
                                    <div class="col-sm-12 col-md-12 px-3 ">
                                        <img class="d-none" src="#" id="yourimage" width="100%" alt="" style="width:100%;height:200px;object-fit: cover;
                                        object-position: top;"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end --}}
        </div>
    </div>
</div>
</div>
<!-- end content -->
<script>
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var nama_produk = $(this).item(namaproduk);
            // var nama_produk = $(this).data('nama-produk');
            // var nama_produk = $(this).data('nama-produk');
            // var nama_produk = $(this).data('nama-produk');
            // var nama_produk = $(this).data('nama-produk');
            // var nama_produk = $(this).data('nama-produk');
            // $('#nama_produk').val(nama_produk);
            // $('#nama_produk').val(nama_produk);
            // $('#nama_produk').val(nama_produk);
            // $('#nama_produk').val(nama_produk);
            // $('#nama_produk').val(nama_produk);
            $('#nama_produk').val(nama_produk);
        })
    })
</script>

@include('partials.footer1')
@endsection