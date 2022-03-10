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
                        <div class="card-title">Edit Kategori <i>{{ $kategori->nama_kategori }}</i>
                        </div>
                        @if(auth()->user()->level==1)
                        <a href="{{ route('kategori.index') }}" class="btn btn-warning btn-sm ml-auto">
                            <i class="fas fa-undo"></i> Back</a>
                        @elseif(auth()->user()->level==3)
                        <a href="{{ route('kategoriumkm.index') }}" class="btn btn-warning btn-sm ml-auto">
                            <i class="fas fa-undo"></i> Back</a>
                        @elseif(auth()->user()->level==4)
                        <a href="{{ route('kategorikoper.index') }}" class="btn btn-warning btn-sm ml-auto">
                            <i class="fas fa-undo"></i> Back</a>
                        @endif

                    </div>
                </div>
                <div class="card-body">
                    @if(auth()->user()->level==1)
                    <form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="email2">Nama Kategori</label>
                            <input type="text" class="form-control" id="text" value="{{ $kategori->nama_kategori }}" placeholder="Enter Kategori" name="nama_kategori">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        </div>
                    </form>
                    @elseif(auth()->user()->level==3)
                    <form method="POST" action="{{ route('kategoriumkm.update', $kategori->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="email2">Nama Kategori</label>
                            <input type="text" class="form-control" id="text" value="{{ $kategori->nama_kategori }}" placeholder="Enter Kategori" name="nama_kategori">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        </div>
                    </form>
                    @elseif(auth()->user()->level==4)
                    <form method="POST" action="{{ route('kategorikoper.update', $kategori->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="email2">Nama Kategori</label>
                            <input type="text" class="form-control" id="text" value="{{ $kategori->nama_kategori }}" placeholder="Enter Kategori" name="nama_kategori">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        </div>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection