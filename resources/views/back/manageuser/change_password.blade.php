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
                        <div class="card-title">Ubah Password </div>
                        @if(auth()->user()->id==1)
                        <a href="{{ route('kategori.index') }}" class="btn btn-warning btn-sm ml-auto">
                            <i class="fas fa-undo"></i> Back</a>
                        @elseif(auth()->user()->id==3)
                        <a href="{{ route('kategoriumkm.index') }}" class="btn btn-warning btn-sm ml-auto">
                            <i class="fas fa-undo"></i> Back</a>
                        @elseif(auth()->user()->id==4)
                        <a href="{{ route('kategorikoper.index') }}" class="btn btn-warning btn-sm ml-auto">
                            <i class="fas fa-undo"></i> Back</a>
                        @endif

                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-primary">
                        {{ Session('success') }}
                    </div>
                    @elseif (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session('error') }}
                    </div>
                    @endif
                    <form method="POST" id="change_password_form" action="{{ route('update_password',$user->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label ">Password lama</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="old_password" autofocus>

                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label ">Password baru</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label ">Ulangi password baru</label>

                            <div class="col-md-6">
                                <input id="confirm_password" type="password" class="form-control  @error('confirm_password') is-invalid @enderror" name="confirm_password" required autocomplete="new-password">
                                @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection