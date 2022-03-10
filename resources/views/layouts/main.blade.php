<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/slick/slick.css">
    <link rel="stylesheet" href="/assets/slick/slick-theme.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="/assets/css/wizard.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    {{-- --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    {{-- --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">


    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
    <link href="{{asset('back/select/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!-- @stack('styles') -->
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <title>UMKM dan Koperasi |</title>
</head>

<body>

    <!-- begincontent -->
    @yield('container')
    <!-- end content -->

    <!-- Modal -->
    <div class="modal fade" id="modalmasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <div class="row justify-content-between ">
                        <div class="col-4 pt-1 pe-0">
                            <p class="fs-1 fw-bold mb-5 align-bottom">Masuk</p>
                        </div>
                        <div class="col-4 ps-0">
                            <span class="navbar-brand fs-1 text-primary p-0 mb-5 " href="#">umkm</span>
                        </div>
                        <div class="col-4 text-end"><i class="bi bi-x-circle-fill text-primary" data-bs-dismiss="modal" aria-label="Close" style="font-size: 3rem;  padding: 1px 5px; border-radius: 3px;"></i>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label ">Email <span class="text-danger">*</span></label>
                            <div class="col-auto p-0">
                                <div class="input-group">
                                    <div class="input-group-text "><i class="bi bi-envelope-fill"></i></div>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                                </div>
                                @error('email')
                                <div class="invalid-feedback d-block text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label ">Password <span class="text-danger">*</span></label>
                            <div class="col-auto p-0">
                                <div class="input-group">
                                    <div class="input-group-text "><i class="bi bi-unlock-fill"></i></div>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-check text-start">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Ingat saya</label>
                        </div>
                        <a href="{{ url('/create-peminjam')}}"><button type="submit" class="w-100 btn btn-primary border-radius">Masuk</button></a>
                        <p class="mt-2 text-center">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- @stack('scriptes') -->
    <script>
        jQuery(document).ready(function() {
            jQuery('#country').change(function() {
                let cid = jQuery(this).val();
                jQuery('#state').html('<option value="">Pilih Kabupaten/Kota</option>')
                jQuery.ajax({
                    url: '/getState',
                    type: 'post',
                    data: 'cid=' + cid + '&_token={{csrf_token()}}',
                    success: function(result) {
                        jQuery('#state').html(result)
                    }
                });
            });

            jQuery('#state').change(function() {
                let sid = jQuery(this).val();
                jQuery.ajax({
                    url: '/getCity',
                    type: 'post',
                    data: 'sid=' + sid + '&_token={{csrf_token()}}',
                    success: function(result) {
                        jQuery('#city').html(result)
                    }
                });
            });

            jQuery('#city').change(function() {
                let sid = jQuery(this).val();
                jQuery.ajax({
                    url: '/getVillage',
                    type: 'post',
                    data: 'sid=' + sid + '&_token={{csrf_token()}}',
                    success: function(result) {
                        jQuery('#village').html(result)
                    }
                });
            });

        });
    </script>
    <script type="text/javascript" src="{{asset('back/select/js/bootstrap-select.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="/assets/js/wizard.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/assets/slick/slick.js"></script>


    {{-- begin script untuk preview gambar--}}
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#yourimage').attr('src', e.target.result);
                    $('#yourimage').removeClass("d-none");
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profileimage").change(function() {
            readURL(this);
        });

        function gambarURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#yourimage2').attr('src', e.target.result);
                    $('#yourimage2').removeClass("d-none");
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profileimage2").change(function() {
            gambarURL(this);
        });

        function imageURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#yourimage3').attr('src', e.target.result);
                    $('#yourimage3').removeClass("d-none");
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profileimage3").change(function() {
            imageURL(this);
        });
    </script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script> --}}


    <script>
        jQuery(document).ready(function() {
            jQuery('#kategori').change(function() {
                let cid = jQuery(this).val();
                jQuery('#kategoriusaha').html('<option value="">Pilih kategori usaha</option>')
                jQuery.ajax({
                    url: '/getKategoriusaha',
                    type: 'post',
                    data: 'cid=' + cid + '&_token={{csrf_token()}}',
                    success: function(result) {
                        jQuery('#kategoriusaha').html(result)
                    }
                });
            });
        });
    </script>
    {{-- end --}}


    <!-- script untuk slick -->
    <script>
        $(document).ready(function() {
            $('#myslider').slick({
                dots: true,
                infinite: true,
                autoplay: false,
                autoplaySpeed: 7000,
                slidesToShow: 1,
                slidesToScroll: 1,

            })
        })
    </script>
    <!-- end script untuk slick -->
    <!-- script untuk slick -->
    <script>
        $(document).ready(function() {
            $('#myslider2').slick({

                infinite: true,
                autoplay: true,
                arrows: true,
                autoplaySpeed: 7000,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 990,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            })
        })
    </script>
    <script type="text/javascript" src="/assets/js/jscript.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <!-- end script untuk slick -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    @stack('scripts')
    @stack('peta')
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

</body>


</html>