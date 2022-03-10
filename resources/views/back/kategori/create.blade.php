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
                        <div class="card-title">Form Kategori</div>
                        @if(auth()->user()->id==1)
                        <a href="{{ route('kategori.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
                        @elseif(auth()->user()->id==3)
                        <a href="{{ route('kategoriumkm.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
                        @elseif(auth()->user()->id==4)
                        <a href="{{ route('kategorikoper.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('kategori.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="kategori">Nama Kategori</label>
                                    <input type="text" class="form-control" id="text" placeholder="Enter Kategori" name="nama_kategori">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection