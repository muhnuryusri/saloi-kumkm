<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('/back/img/icon.ico') }}" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="{{ asset('/back/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['/back/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('/back/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/back/css/atlantis.min.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('/back/css/demo.css') }}">

</head>

<body>
	<div class="wrapper">

		@include('includes.header')
		<!-- Sidebar -->
		@include('includes.sidebar')

		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				@yield('content')
			</div>
			{{-- footer --}}
			@include('includes.footer')

		</div>


	</div>
	@include('includes.js')
	@include('sweetalert::alert')

	<script src="{{ asset('/back/js/plugin/datatables/datatables.min.js') }}"></script>
</body>
<script>
	$('.delete').click(function() {
		var data_id = $(this).attr('data-id');
		var data_nama = $(this).attr('data-nama');
		var lokasi = $(this).attr('data-lokasi');
		swal({
				title: "Yakin?",
				text: "Kamu akan menghapus data " + data_nama + "",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					window.location = lokasi + data_id + ""
					swal("Data berhasil dihapus!", {
						icon: "success",
					});
				} else {
					swal("Data tidak jadi dihapus!");
				}
			});
	});

</script>

</html>