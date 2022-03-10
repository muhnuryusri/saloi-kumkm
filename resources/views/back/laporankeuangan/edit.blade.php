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
                        <div class="card-title">Form Tambah Laporan Keuangan</div>
                        <a href="{{ route('laporankeuangan.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('laporankeuangan.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kategori">Judul Laporan</label>
                            <input type="text" class="form-control @error('nama_laporan') is-invalid @enderror" id="text" name="nama_laporan" placeholder="" value="{{ old('nama_laporan', $laporankeuangan->nama_laporan) }}">
                            @error('nama_laporan')
                            <div class="invalid-feedback d-block text-start">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori">Bulan</label>
                            <select class="form-control @error('bulan') is-invalid @enderror" id="exampleFormControlSelect1" name="bulan" value="{{ old('bulan') }}">
                                <option selected>{{ $laporankeuangan->bulan }}</option>
                                <option>Januari</option>
                                <option>Februari</option>
                                <option>Maret</option>
                                <option>April</option>
                                <option>Mei</option>
                                <option>Juni</option>
                                <option>Juli</option>
                                <option>Agustus</option>
                                <option>September</option>
                                <option>Oktober</option>
                                <option>November</option>
                                <option>Desember</option>
                            </select>
                            @error('bulan')
                            <div class="invalid-feedback d-block text-start">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" min="2000" max="2030" class="form-control @error('tahun') is-invalid @enderror" id="text" placeholder="" name="tahun" value="{{ old('tahun',$laporankeuangan->tahun) }}">
                            @error('tahun')
                            <div class="invalid-feedback d-block text-start">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="laporan">Ganti File</label>
                            <input type="hidden" name="oldLaporan" id="" value="{{ $laporankeuangan->laporan }}">
                            <input type="file" class="form-control @error('laporan') is-invalid @enderror" id="inputGroupFile02" name="laporan" value="{{ old('laporan', $laporankeuangan->laporan) }}">
                            @error('laporan')
                            <div class="invalid-feedback d-block text-start">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm px-4" type="submit">Save</button>
                            <button class="btn btn-danger btn-sm px-4" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection