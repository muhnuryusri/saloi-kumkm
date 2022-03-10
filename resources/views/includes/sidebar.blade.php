<!-- Sidebar -->
<div class="sidebar sidebar-style-1">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content pb-3">
			<ul class="nav nav-primary">
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Main</h4>
				</li>
				@if(auth()->user()->level==1)
				<li class="nav-item {{ ($title === 'Dashboard')? 'bg-light active' : '' }}">
					<a href="{{ route('dashboardadmin.index') }}">
						<i class="fas fa-home"></i>
						<p>Beranda</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Badan Usaha</h4>
				</li>
				<li class="nav-item {{ ($title === 'Kategori')? 'bg-light active' : '' }}">
					<a href="{{ route('kategori.index') }}">
						<i class="fas fa-shapes"></i>
						<p>Kategori</p>
					</a>
				</li>
				<li class="nav-item {{ ($title === 'Umkm')? 'bg-light active' : '' }}">
					<a href="{{ route('umkmdata.index') }}">
						<i class="fas fa-store"></i>
						<p>UMKM</p>
					</a>
				</li>
				<li class="nav-item {{ ($title === 'Koperasi')? 'bg-light active' : '' }}">
					<a href="{{ route('koperasidata.index') }}">
						<i class="fas fa-building"></i>
						<p>Koperasi</p>
					</a>
				</li>
				<li class="nav-item {{ ($title === 'Managemen User')? 'bg-light active' : '' }}">
					<a href="{{ route('manageuser.index') }}">
						<i class="fas fa-users"></i>
						<p>Managemen User</p>
					</a>
				</li>
				@elseif(auth()->user()->level==2)
				<li class="nav-item {{ ($title === 'Dashboard')? 'bg-light active' : '' }}">
					<a href="{{ route('dashboard.index') }}">
						<i class="fas fa-home"></i>
						<p>Beranda</p>
					</a>
				</li>
				<li class="nav-item ">
					<a href="{{route('manageuser.edit',auth()->user()->id)}}">
						<i class="fas fa-user-edit"></i>
						<p>Sunting profil</p>
					</a>
				</li>
				<li class="nav-item {{ ($title === 'Pesan')? 'bg-light active' : '' }}">
					<a href="#">
						<i class="fas fa-envelope"></i>
						<p>Pesan</p>
					</a>
				</li>
				<li class="nav-item {{ ($title === 'Ubah Password')? 'bg-light active' : '' }}">
					<a href="{{ route('change_password') }}">
						<i class="fas fa-unlock"></i>
						<p>Ubah password</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Badan Usaha</h4>
				</li>
				<li class="nav-item {{ ($title === 'Umkm')? 'bg-light active' : '' }}">
					<a href="{{ route('umkmdatauser.index') }}">
						<i class="fas fa-store"></i>
						<p>UMKM</p>
					</a>
				</li>
				<li class="nav-item {{ ($title === 'Koperasi')? 'bg-light active' : '' }}">
					<a href="{{ route('koperasidatauser.index') }}">
						<i class="fas fa-building"></i>
						<p>Koperasi</p>
					</a>
				</li>
				<li class="nav-item {{ ($title === 'Ulasan')? 'bg-light active' : '' }}">
					<a href="{{ route('ulasan') }}">
						<i class="
						fas fa-comments"></i>
						<p>Ulasan</p>
					</a>
				</li>
				@elseif(auth()->user()->level==3)
				<li class="nav-item {{ ($title === 'Dashboard')? 'bg-light active' : '' }}">
					<a href="{{ route('dashboardumkm.index') }}">
						<i class="fas fa-home"></i>
						<p>Beranda</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Badan Usaha</h4>
				</li>
				<li class="nav-item {{ ($title === 'Kategori')? 'bg-light active' : '' }}">
					<a href="{{ route('kategoriumkm.index') }}">
						<i class="fas fa-shapes"></i>
						<p>Kategori</p>
					</a>
				</li>
				<li class="nav-item {{ ($title === 'Umkm')? 'bg-light active' : '' }}">
					<a href="{{ route('adminumkm.index') }}">
						<i class="fas fa-store"></i>
						<p>UMKM</p>
					</a>
				</li>
				<li class="nav-item {{ ($title === 'Managemen User')? 'bg-light active' : '' }}">
					<a href="{{ route('manageuserumkm.index') }}">
						<i class="fas fa-users"></i>
						<p>Managemen User</p>
					</a>
				</li>
				@elseif(auth()->user()->level==4)
				<li class="nav-item {{ ($title === 'Dashboard')? 'bg-light active' : '' }}">
					<a href="{{ route('dashboardkoperasi.index') }}">
						<i class="fas fa-home"></i>
						<p>Beranda</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Badan Usaha</h4>
				</li>
				<li class="nav-item {{ ($title === 'Kategori')? 'bg-light active' : '' }}">
					<a href="{{ route('kategorikoper.index') }}">
						<i class="fas fa-shapes"></i>
						<p>Kategori</p>
					</a>
				</li>
				<li class="nav-item {{ ($title === 'Koperasi')? 'bg-light active' : '' }}">
					<a href="{{ route('adminkoperasi.index') }}">
						<i class="fas fa-building"></i>
						<p>Koperasi</p>
					</a>
				</li>
				<li class="nav-item {{ ($title === 'Managemen User')? 'bg-light active' : '' }}">
					<a href="{{ route('manageuserkoperasi.index') }}">
						<i class="fas fa-users"></i>
						<p>Managemen User</p>
					</a>
				</li>
				@endif

			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->