@extends('layouts.default')
@section('content')

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">

    </div>
</div>
<div class="page-inner mt--5 pb-0">
    <div class="row">
        <div class="col-md-12">
            @if(auth()->user()->level == 3)
            <div class="row">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="h5 fw-bold">Kategori UMKM</div>
                                <a href="{{ route('kategoriumkm.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Tambah Kategori</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('success'))
                            <div class="alert alert-primary">
                                {{ Session('success') }}
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table id="basic-datatables" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th>Nama Kategori</th>
                                            <th width="20%" class="text-center" style="padding: 0 5px!important">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no=1
                                        @endphp
                                        @forelse ($kategoriusaha as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            @if(auth()->user()->level==1)
                                            <td class="text-center" style="padding: 0 5px!important; align-text:center">
                                                <a href="{{ route('kategori.edit',$row->id) }}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                                <!-- <form action="{{ route('kategori.destroy', $row->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')<button class="btn p-1 px-2 bg-danger  border-radius text-light">
                                                        <i class="fas fa-trash-alt "></i>
                                                    </button>

                                                </form> -->

                                            </td>
                                            @elseif(auth()->user()->level==3)
                                            <td class="text-center" style="padding: 0 5px!important; align-text:center">
                                                <a href="{{ route('kategoriumkm.edit',$row->id) }}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                                <form action="{{ route('kategoriumkm.destroy', $row->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')<button class="btn p-1 px-2 bg-danger  border-radius text-light">
                                                        <i class="fas fa-trash-alt "></i>
                                                    </button>

                                                </form>

                                            </td>
                                            @elseif(auth()->user()->level==4)
                                            <td class="text-center" style="padding: 0 5px!important; align-text:center">
                                                <a href="{{ route('kategorikoper.edit',$row->id) }}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                                <form action="{{ route('kategorikoper.destroy', $row->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')<button class="btn p-1 px-2 bg-danger  border-radius text-light">
                                                        <i class="fas fa-trash-alt "></i>
                                                    </button>

                                                </form>

                                            </td>
                                            @endif

                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-danger">Data masih kosong</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            @elseif(auth()->user()->level == 4)

            <div class="row">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="h5 fw-bold">Kategori Koperasi</div>
                                <a href="{{ route('kategorikoper.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Tambah Kategori</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('success2'))
                            <div class="alert alert-primary">
                                {{ Session('success2') }}
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table id="basic-datatables" class="table table-bordered">
                                    <thead class="border">
                                        <tr>
                                            <th width="10%">No</th>
                                            <th>Nama Kategori</th>
                                            <th width="20%" class="text-center" style="padding: 0 5px!important">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no=1
                                        @endphp
                                        @forelse ($kategorikoperasi as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td class="text-center" style="padding: 0 5px!important; align-text:center">
                                                <a href="{{ route('kategorikoper.edit',$row->id) }}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                                <button class="btn p-1 px-2 bg-danger border-radius text-light delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama_kategori }}" data-lokasi="/deletekategorikoper/">
                                                    <i class=" fas fa-trash-alt"></i>
                                                </button>
                                                <!-- <form action="{{ route('kategorikoper.destroy', $row->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')<button class="btn p-1 px-2 bg-danger  border-radius text-light">
                                                        <i class="fas fa-trash-alt "></i>
                                                    </button>

                                                </form> -->

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-danger">Data masih kosong</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @else
            <div class="row">
                <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="h5 fw-bold">Kategori UMKM</div>
                                <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Tambah Kategori</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- @if (Session::has('success'))
                            <div class="alert alert-primary">
                                {{ Session('success') }}
                            </div>
                            @endif -->
                            <div class="table-responsive">
                                <table id="basic-datatables" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th>Nama Kategori</th>
                                            <th width="20%" class="text-center" style="padding: 0 5px!important">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no=1
                                        @endphp
                                        @forelse ($kategoriusaha as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td class="text-center" style="padding: 0 5px!important; align-text:center">
                                                <a href="{{ route('kategori.edit',$row->id) }}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                                <button class="btn p-1 px-2 bg-danger border-radius text-light delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama_kategori }}" data-lokasi="/deletekategoriumkm/">
                                                    <i class=" fas fa-trash-alt"></i>
                                                </button>
                                                <!-- <form action="{{ route('kategori.destroy', $row->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')<button class="btn p-1 px-2 bg-danger  border-radius text-light">
                                                        <i class="fas fa-trash-alt "></i>
                                                    </button>

                                                </form> -->

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-danger">Data masih kosong</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="h5 fw-bold">Kategori Koperasi</div>
                                <a href="{{ route('kategorikoperasi.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Tambah Kategori</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- @if (Session::has('success2'))
                            <div class="alert alert-primary">
                                {{ Session('success2') }}
                            </div>
                            @endif -->
                            <div class="table-responsive">
                                <table id="add-row_length" class="table table-bordered">
                                    <thead class="border">
                                        <tr>
                                            <th width="10%">No</th>
                                            <th>Nama Kategori</th>
                                            <th width="20%" class="text-center" style="padding: 0 5px!important">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kategorikoperasi as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td class="text-center" style="padding: 0 5px!important; align-text:center">
                                                <a href="{{ route('kategorikoperasi.edit',$row->id) }}"><i class="fas fa-pen-alt p-1 p-2  bg-primary border-radius text-light"></i></a>
                                                <button class="btn p-1 px-2 bg-danger border-radius text-light delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama_kategori }}" data-lokasi="/deletekategorikoperasi/">
                                                    <i class=" fas fa-trash-alt"></i>
                                                </button>


                                                <!-- <form action="{{ route('kategorikoperasi.destroy', $row->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')<button class="btn p-1 px-2 bg-danger  border-radius text-light">
                                                        <i class="fas fa-trash-alt "></i>
                                                    </button>

                                                </form> -->

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-danger">Data masih kosong</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                <div class="row justify-content-between m-0">
                                    <div class="col-auto">
                                        Showing {{ $kategorikoperasi->firstItem()? : '0'}}
                                        to {{ $kategorikoperasi->lastItem()? : '0' }}
                                        of {{ $kategorikoperasi->total() }} entries
                                    </div>
                                    <div class="col-auto">
                                        <ul class="pagination pg-primary">
                                            {{ $kategorikoperasi->links() }}

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
    </div>
</div>

@endsection