	<div class="main-header">
		<!-- Logo Header -->
		<div class="logo-header" data-background-color="blue">
			<a class="navbar-brand fs-2 fw-bold pb-2" href="#"><img src="/assets/img/saloi2.PNG" alt="" height="50px"></a>
			{{-- <a href="#" class="logo">
				<img src="/assets/img/apple.svg" alt="navbar brand" class="navbar-brand">
			</a> --}}
			<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
					<i class="icon-menu"></i>
				</span>
			</button>
			<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
			<div class="nav-toggle">
				<button class="btn btn-toggle toggle-sidebar">
					<i class="icon-menu"></i>
				</button>
			</div>
		</div>
		<!-- End Logo Header -->

		<!-- Navbar Header -->
		<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

			<div class="container-fluid">
				<!-- <div class="collapse" id="search-nav">
					<form class="navbar-left navbar-form nav-search mr-md-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<button type="submit" class="btn btn-search pr-1">
									<i class="fa fa-search search-icon"></i>
								</button>
							</div>
							<input type="text" placeholder="Search ..." class="form-control">
						</div>
					</form>
				</div> -->
				<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

					<li class="nav-item dropdown hidden-caret">
						<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
							<div class="avatar-sm">
								<img src="{{ auth()->user()->image}}" alt="..." class="avatar-img rounded-circle">
							</div>
						</a>
						<ul class="dropdown-menu dropdown-user animated fadeIn">
							<div class="dropdown-user-scroll ">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="{{auth()->user()->image}}" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>{{ auth()->user()->name }}</h4>
											<p class="text-muted">{{auth()->user()->email}}</p>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">My Profile</a>
									<a class="dropdown-item" href="{{route('editprofile',auth()->user()->id)}}">Edit Profile</a>
									<div class="dropdown-divider"></div>

									<form action="/logout" method="post">
										@csrf
										<button type="submit" class="dropdown-item ">Logout</button>
									</form>
								</li>
							</div>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<!-- End Navbar -->
	</div>