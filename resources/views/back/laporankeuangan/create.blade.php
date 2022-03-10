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
                            <input type="text" class="form-control @error('nama_laporan') is-invalid @enderror" id="text" name="nama_laporan" placeholder="" value="{{ old('nama_laporan') }}">
                            @error('nama_laporan')
                            <div class="invalid-feedback d-block text-start">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori">Bulan</label>
                            <select class="form-control" id=" pilih-bulan" name="bulan">
                                @foreach(['Januari'=>'Januari','Februari'=>'Februari','Maret'=>'Maret','April'=>'April','Mei'=>'Mei','Juni'=>'Juni','Juli'=>'Juli','Agustus'=>'Agustus','September'=>'September','Oktober'=>'Oktober','November'=>'November','Desember'=>'Desember'] as $key => $value)
                                <option value="{{ $key }}" {{ old('bulan') === $key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>

                            @error('bulan')
                            <div class="invalid-feedback d-block text-start">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" min="2000" max="2030" class="form-control @error('tahun') is-invalid @enderror" id="text" placeholder="" name="tahun" value="{{ old('tahun') }}">
                            @error('tahun')
                            <div class="invalid-feedback d-block text-start">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="laporan">Upload File</label>
                            <input type="hidden" class="d-none form-control" name="umkm_id" value="{{ $umkm->id }}">
                            <input type="file" class="form-control @error('laporan') is-invalid @enderror" id="inputGroupFile02" name="laporan">
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