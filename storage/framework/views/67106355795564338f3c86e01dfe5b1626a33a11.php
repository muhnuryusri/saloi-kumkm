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
                    
                    " href="/">Beranda</a>
                 </li>
                 <li class="nav-item mx-3 dropdown">
                     <a class="nav-link" href="/list-umkm" role="button">
                         UMKM
                     </a>
                 </li>
                 <li class="nav-item mx-3 dropdown">
                     <a class="nav-link" href="/list-umkm" role="button">
                         Koperasi
                     </a>
                 </li>
                 <li class="nav-item mx-3">
                     <a class="nav-link" href="#">Kontak Kami</a>
                 </li>
                 <?php if(auth()->guard()->check()): ?>
                 <?php if(auth()->user()->level==1): ?>
                 <li class="nav-item mx-3">
                     <a class="nav-link" href="/dashboardadmin">Admin</a>
                 </li>
                 <?php endif; ?>
                 <?php endif; ?>
                 <?php if(auth()->guard()->check()): ?>
                 <?php if(auth()->user()->level==2): ?>
                 <li class="nav-item mx-3">
                     <a class="nav-link" href="/dashboard">Dashboard</a>
                 </li>
                 <?php endif; ?>
                 <?php endif; ?>
                 <?php if(auth()->guard()->check()): ?>
                 <?php if(auth()->user()->level==3): ?>
                 <li class="nav-item mx-3">
                     <a class="nav-link" href="/dashboardumkm">Admin</a>
                 </li>
                 <?php endif; ?>
                 <?php endif; ?>
                 <?php if(auth()->guard()->check()): ?>
                 <?php if(auth()->user()->level==4): ?>
                 <li class="nav-item mx-3">
                     <a class="nav-link" href="/dashboardkoperasi">Admin</a>
                 </li>
                 <?php endif; ?>
                 <?php endif; ?>
             </ul>

             <?php if(auth()->guard()->check()): ?>
             <form class="d-flex ms-3">
                 <!-- Button trigger modal -->
                 <div class="dropdown dropstart">
                     <img src="<?php echo e(auth()->user()->image); ?>" alt="" class="img-thumbnail dropdown-toggle rounded-circle" style="height:50px;width:50px;object-fit: cover;
                    object-position: top;" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                     <ul class="dropdown-menu" style=" width:max-content">
                         <li>
                             <div class="dropdown-header row">
                                 <div class="row d-flex align-items-center mx-1">
                                     <div class="col p-0">
                                         <img src="<?php echo e(auth()->user()->image); ?>" class="img-thumbnail rounded-circle opacity-50 border-3" style="height:50px; width:50px; object-fit: cover;
                                    object-position: top;">
                                     </div>
                                     <div class="col mx-2 p-0">
                                         <p class="fs-5 fw-bold m-0"><?php echo e(auth()->user()->name); ?></p>
                                         <p class="m-0 text-secondary" style="font-size:12px;"><?php echo e(auth()->user()->email); ?> | <?php echo e(auth()->user()->no_telpon); ?> </p>
                                     </div>
                                 </div>

                             </div>
                         </li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>
                         <li><a class="dropdown-item" href="<?php echo e(route('editprofile',auth()->user()->id)); ?>">Edit Profile</a></li>
                         <?php if(auth()->user()->level==2): ?>
                         <li><a class="dropdown-item" href="<?php echo e(route('umkm.create')); ?>">Daftar UMKM</a></li>
                         <li><a class="dropdown-item" href="<?php echo e(route('koperasi.create')); ?>">Daftar Koperasi</a></li>
                         <?php endif; ?>
                         <li>
                             <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                 <?php echo csrf_field(); ?>
                                 <button type="submit" class="dropdown-item text-danger d-none">Keluar2</button>
                             </form>
                             <form action="/logout" method="post">
                                 <?php echo csrf_field(); ?>
                                 <button type="submit" class="dropdown-item text-danger">Keluar</button>
                             </form>
                         </li>
                     </ul>
                 </div>
             </form>
             <?php else: ?>
             <form class="d-flex">
                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-outline-primary mx-2 border-radius" data-bs-toggle="modal" data-bs-target="#modalmasuk">
                     Masuk
                 </button>

                 <a href="<?php echo e(route('register')); ?>"><button type="button" class="btn btn-primary mx-2 border-radius">
                         Daftar
                     </button></a>
                 
             </form>
             <?php endif; ?>




         </div>
     </div>
 </nav>
 <!-- end navbar --><?php /**PATH E:\Documents\Pallaka Studio\saloi-kumkm\resources\views/partials/navbar.blade.php ENDPATH**/ ?>