 <!-- Begin navbar -->
 <nav class="navbar navbar-expand-lg navbar-light shadow p-0 px-3 bg-body rounded sticky-top ">
     <div class="container ">
         <a class="navbar-brand fs-2 text-primary pb-3" href="/">
             <img src="/assets/img/saloi.PNG" alt="" height="35px">
         </a>
         <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-start">
                 <li class="nav-item mx-3">
                     <a class="nav-link 
                    {{-- {{ ($title === 'Home')? 'active' : '' }} --}}
                    " href="/">Beranda</a>
                 </li>
                 <li class="nav-item mx-3 dropdown">
                     <a class="nav-link" href="#" role="button">
                         UMKM
                     </a>
                 </li>
                 <li class="nav-item mx-3 dropdown">
                     <a class="nav-link" href="#" role="button">
                         Koperasi
                     </a>
                 </li>
                 <li class="nav-item mx-3">
                     <a class="nav-link" href="#">Kontak Kami</a>
                 </li>
                 @auth
                 @if(auth()->user()->level==1)
                 <li class="nav-item mx-3">
                     <a class="nav-link" href="/admin">Admin</a>
                 </li>
                 @endif
                 @endauth
             </ul>

             @auth
             <form class="d-flex ms-3">
                 <!-- Button trigger modal -->
                 <div class="dropdown dropstart">
                     <img src="{{ auth()->user()->image}}" alt="" class="img-thumbnail dropdown-toggle rounded-circle" style="height:50px;width:50px;object-fit: cover;
                    object-position: top;" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                     <ul class="dropdown-menu" style=" width:max-content">
                         <li>
                             <div class="dropdown-header row">
                                 <div class="row d-flex align-items-center mx-1">
                                     <div class="col p-0">
                                         <img src="{{ auth()->user()->image}}" class="img-thumbnail rounded-circle opacity-50 border-3" style="height:50px; width:50px; object-fit: cover;
                                    object-position: top;">
                                     </div>
                                     <div class="col mx-2 p-0">
                                         <p class="fs-5 fw-bold m-0">{{ auth()->user()->name }}</p>
                                         <p class="m-0 text-secondary" style="font-size:12px;">{{ auth()->user()->email }} | {{ auth()->user()->no_telpon }} </p>
                                     </div>
                                 </div>

                             </div>
                         </li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>
                         <li><a class="dropdown-item" href="{{route('editprofile',auth()->user()->id)}}">Edit Profile</a></li>
                         @if(auth()->user()->level==2)
                         <li><a class="dropdown-item" href="{{ route('umkm.create') }}">Daftar UMKM</a></li>
                         <li><a class="dropdown-item" href="{{ route('koperasi.create') }}">Daftar Koperasi</a></li>
                         @endif

                         <li><a class="dropdown-item" href="#">Laporan Keuangan</a></li>
                         <li>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                 @csrf
                                 <button type="submit" class="dropdown-item text-danger d-none">Keluar2</button>
                             </form>
                             <form action="/logout" method="post">
                                 @csrf
                                 <button type="submit" class="dropdown-item text-danger">Keluar</button>
                             </form>
                         </li>
                     </ul>
                 </div>
             </form>
             @else
             <form class="d-flex">
                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-outline-primary mx-2 border-radius" data-bs-toggle="modal" data-bs-target="#modalmasuk">
                     Masuk
                 </button>

                 <a href="{{ route('register') }}"><button type="button" class="btn btn-primary mx-2 border-radius">
                         Daftar
                     </button></a>
                 {{-- <button type="button" class="btn btn-primary mx-2 border-radius" data-bs-toggle="modal" data-bs-target="#modaldaftar">
                    Daftar
                </button> --}}
             </form>
             @endauth




         </div>
     </div>
 </nav>
 <!-- end navbar -->