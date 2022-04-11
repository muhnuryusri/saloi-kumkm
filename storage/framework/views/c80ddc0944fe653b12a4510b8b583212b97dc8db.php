
<?php $__env->startSection('container'); ?>
<?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- begincontent -->

<body style="text-align: center;">
    <div class="container my-5">
        <div class="card shadow bg-body border-radius border-0">
            <div class="card-header bg-white ">
                <div class="row justify-content-center">
                    <div class="row col-md-10 col-md-offset-1 p-0">
                        <div class="m-0 p-0">
                            <p class="fs-2 fw-bold m-0 text-start">Registrasi</p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-md-offset-1 pt-4 pb-5">
                    <form method="POST" action="<?php echo e(route('register')); ?>" class="f1" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="20" data-number-of-steps="4" style="width: 25%;"></div>
                            </div>
                            <div class="f1-step regis active fw-bold">
                                <div class="f1-step-icon fw-bold"><i class="fa fa-user"></i></div>
                                <p>1. Informasi Pribadi</p>
                            </div>
                            <div class="f1-step regis">
                                <div class="f1-step-icon"><i class="fa fa-home"></i></div>
                                <p>2. Informasi Alamat</p>
                            </div>
                            <div class="f1-step regis">
                                <div class="f1-step-icon"><i class="fa fa-address-book"></i></div>
                                <p>3. Informasi Kontak</p>
                            </div>
                            <div class="f1-step regis">
                                <div class="f1-step-icon"><i class="fa fa-check"></i></div>
                                <p>Selesai</p>
                            </div>

                        </div>
                        <!-- step 1 -->
                        <fieldset>
                            <div class="row g-3 my-4 justify-content-center">
                                <div class="col-md-9 col-sm-12">
                                    <div class="row g-3 align-items-end ">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="no_ktp" class="form-label">Nomor KTP/NIK <span class="text-danger">*</span></label>
                                            <div class=" col-md-12 input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                                                <input type="text" class="required form-control <?php $__errorArgs = ['no_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="no_ktp" name="no_ktp" value="<?php echo e(old('no_ktp')); ?>">
                                                <?php $__errorArgs = ['no_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block text-start">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                            <div class=" col-md-12 input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" class="required form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e(old('name')); ?>">
                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block text-start">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                            <div class=" col-md-12 input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                                <input type="text" class="required form-control <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tempat_lahir" name="tempat_lahir" value="<?php echo e(old('tempat_lahir')); ?>">
                                                <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block text-start">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tgl_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                            <div class=" col-md-12 input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tgl_lahir" name="tgl_lahir" value="<?php echo e(old('tgl_lahir')); ?>">
                                                <?php $__errorArgs = ['tgl_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block text-start">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-7 row align-items-end">
                                    <div class="col-sm-12 col-md-12 px-3 text-center mb-3">
                                        <img class="rounded-circle d-none" src="#" id="yourimage" width="100%" alt="" style="width:200px;height:200px;object-fit: cover;
                                        object-position: top;"><br>
                                    </div>
                                    <div class="mb-1 col-md-12 ">
                                        <p class="image_upload">
                                            <label for="profileimage" style="display: block">
                                                <a class="btn btn-primary btn-block text-white" rel="nofollow">Unggah Foto</a>
                                            </label>
                                            <input type="file" name="image" id="profileimage" style="display: none;" class=" <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block text-start mt--3">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="f1-buttons">
                                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>
                        <!-- step 2 -->
                        <fieldset>
                            <div class="my-4">
                                <div class="col-12 my-4">
                                    <label for="alamat_rumah" class="form-label">Alamat Rumah<span class="text-danger">*</span></label>
                                    <div class=" col-md-12 input-group ">
                                        <span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
                                        <input type="text" class="required form-control <?php $__errorArgs = ['alamat_rumah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="alamat_rumah" name="alamat_rumah" value="<?php echo e(old('alamat_rumah')); ?>">
                                        <?php $__errorArgs = ['alamat_rumah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block text-start">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 my-4">
                                    <label for="province_id" class="form-label">Pilih Provinsi <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="province_id"><i class="bi bi-building"></i></span>
                                        <select id="country" class="form-control" value="<?php echo e(old('province_id')); ?> " name="province_id">
                                            <option value="">Pilih Provinsi</option>
                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($list->id); ?>"><?php echo e(strtolower($list->name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 my-4">
                                    <label for="regency_id" class="form-label">Kota/Kabupaten <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="regency_id"><i class="bi bi-building"></i></span>
                                        <select id="state" name="regency_id" class="form-control">
                                            <option value="<?php echo e(old('state') === $list->id ? 'selected' : ''); ?>" >Pilih Kabupaten/Kota</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 my-4">
                                    <label for="district_id" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-building"></i></span>
                                        <select id="city" name="district_id" class="form-control <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 my-4 "><label for="village_id" class="form-label">Kelurahan <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-building"></i></span>
                                        <select id="village" name="village_id" class="form-control value=<?php echo e(old('village_id')); ?>">
                                            <option value="">Pilih Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>
                        <!-- step 3 -->
                        <fieldset>
                            <div class="my-4">
                                <div class="col-12 my-4">
                                    <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                                    <div class=" col-md-12 input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                        <input type="email" class="required form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block text-start">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-12 my-4">
                                    <label for="no_telpon" class="form-label">No. Hp/Whatsapp <span class="text-danger">*</span></label>
                                    <div class=" col-md-12 input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                        <input type="number" class="required form-control <?php $__errorArgs = ['no_telpon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="no_telpon" name="no_telpon" value="<?php echo e(old('no_telpon')); ?>">
                                        <?php $__errorArgs = ['no_telpon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block text-start">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-12 my-4">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <div class="col-md-12 input-group">
                                        <div class="input-group-text "><i class="bi bi-unlock-fill"></i></div>
                                        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password" required>
                                    </div>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback d-block text-start">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12 my-4">
                                    <label for="password" class="form-label">Confirmasi Password <span class="text-danger">*</span></label>
                                    <div class="col-md-12 input-group">
                                        <div class="input-group-text "><i class="bi bi-unlock-fill"></i></div>
                                        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalregistrasi"><i class="fa fa-save"></i> Selesai</button>
                            </div>
                            <!-- begin -->
                            <div class="modal fade" id="modalregistrasi" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body p-5">
                                            <!-- begin -->
                                            <div class="">
                                                <div class="d-flex justify-content-center ">
                                                    <i class="bi bi-exclamation-circle bg-white text-primary align-self-center" style="font-size: 100px; "></i>
                                                </div>
                                                <p class="fs-3 fw-bold text-center m-0">Konfirmasi Pendaftaran</p>
                                                <p class="text-center ">Pendaftaran anda akan disimpan. Apakah informasi yang anda masukkan sudah benar.</p>
                                                <div class="col m-0 mx-5 text-primary d-flex justify-content-center">

                                                    <a type="button submit" class="btn btn-primary" data-bs-dismiss="modal" href="#modalregistrasi">Submit</a>

                                                    <button type="button" class="btn btn-light border-radius fw-bold px-5 mx-2 " data-bs-dismiss="modal" aria-label="Close">Tidak</button>
                                                </div>
                                            </div>
                                            <!-- end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end -->

                        </fieldset>
                    </form>
                    <!-- step 4 -->
                    

                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
    <?php echo $__env->make('partials.footer1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Documents\Pallaka Studio\saloi-kumkm\resources\views/auth/register.blade.php ENDPATH**/ ?>