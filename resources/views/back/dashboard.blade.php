@extends('layouts.default')
@section('content')

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">

	<div class="row">
		@if(auth()->user()->level==1)
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-primary bubble-shadow-small">
								<i class="fas fa-users"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total User</p>
								<h4 class="card-title">{{ $user->count() }}</h4>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-info bubble-shadow-small">
								<i class="fas fa-shapes"></i>
							</div>
						</div>

						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total Produk</p>
								<h4 class="card-title">{{ $produkumkm->count() }}</h4>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-success bubble-shadow-small">
								<i class="fas fa-store"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total UMKM</p>
								<h4 class="card-title">{{ $umkm->where('kategori_id', 1)->count() }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-secondary bubble-shadow-small">
								<i class="fas fa-building"></i>

							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total Koperasi</p>
								<h4 class="card-title">{{ $umkm->where('kategori_id', 2)->count() }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@elseif(auth()->user()->level==2)
		<div class="col-sm-6 col-md-4">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-info bubble-shadow-small">
								<i class="fas fa-shapes"></i>
							</div>
						</div>

						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total Produk</p>
								<h4 class="card-title">{{ $produkumkm->count() }}</h4>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-success bubble-shadow-small">
								<i class="fas fa-store"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total UMKM</p>
								<h4 class="card-title">{{ $umkm->where('kategori_id', 1)->count() }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-secondary bubble-shadow-small">
								<i class="fas fa-building"></i>

							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total Koperasi</p>
								<h4 class="card-title">{{ $umkm->where('kategori_id', 2)->count() }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		@elseif(auth()->user()->level==3)
		<div class="col-sm-6 col-md-4">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-primary bubble-shadow-small">
								<i class="fas fa-users"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total User</p>
								<h4 class="card-title">{{ $user->count() }}</h4>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-info bubble-shadow-small">
								<i class="fas fa-shapes"></i>
							</div>
						</div>

						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total Produk</p>
								<h4 class="card-title">{{ $produkumkm->count() }}</h4>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-success bubble-shadow-small">
								<i class="fas fa-store"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total UMKM</p>
								<h4 class="card-title">{{ $umkm->where('kategori_id', 1)->count() }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@elseif(auth()->user()->level==4 )
		<div class="col-sm-6 col-md-4">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-primary bubble-shadow-small">
								<i class="fas fa-users"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total User</p>
								<h4 class="card-title">{{ $user->count() }}</h4>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="col-sm-6 col-md-4">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-secondary bubble-shadow-small">
								<i class="fas fa-building"></i>

							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Total Koperasi</p>
								<h4 class="card-title">{{ $umkm->where('kategori_id', 2)->count() }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
	<div class="row">
		@if(auth()->user()->level==3)
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="h5 fw-bold">UMKM Terbaru</div>
					</div>
				</div>
				<div class="card-body">


				</div>
			</div>
		</div>
		@elseif(auth()->user()->level==4 )
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="h5 fw-bold">Koperasi Terbaru</div>
					</div>
				</div>
				<div class="card-body">


				</div>
			</div>
		</div>
		@else
		<div class="col-md-6">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="h5 fw-bold">UMKM Terbaru</div>
					</div>
				</div>
				<div class="card-body">


				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="h5 fw-bold">Koperasi Terbaru</div>
					</div>
				</div>
				<div class="card-body">


				</div>
			</div>
		</div>
		@endif
	</div>
	{{-- <div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Artikel Terpopuler</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
					
					</div>

				</div>
			</div>
		</div>
	</div> --}}
</div>
@endsection