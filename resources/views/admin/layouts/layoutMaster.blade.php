<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>Admin</title>

	<meta name="description" content="" />

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

	<!-- Icons -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

	<!-- Vendors CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
	@yield('vendor-style')
	<!-- Page CSS -->
	@yield('page-style')
	<!-- Helpers -->
	<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
	<script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->
			@include('admin.layouts.sidebar')
			<!-- / Menu -->

			<!-- Layout container -->
			<div class="layout-page">
				<!-- Navbar -->
				@include('admin.layouts.navbar')
				<!-- / Navbar -->

				<!-- Content wrapper -->
				<div class="content-wrapper">
					<!-- Content -->
					@yield('content')
					<!-- / Content -->

					<!-- Footer -->
					@include('admin.layouts.footer')
					<!-- / Footer -->

					<div class="content-backdrop fade"></div>
				</div>
				<!-- Content wrapper -->
			</div>
			<!-- / Layout page -->
		</div>

		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>

		<!-- Drag Target Area To SlideIn Menu On Small Screens -->
		<div class="drag-target"></div>
	</div>
	<!-- / Layout wrapper -->

	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->
	<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
	<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
	<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
	<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

	<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
	<script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
	<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

	<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
	<!-- endbuild -->

	<!-- Vendors JS -->
	<script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
	<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
	@yield('vendor-script')
	<!-- Main JS -->
	<script src="{{ asset('assets/js/main.js') }}"></script>

	<!-- Page JS -->
	@yield('page-script')

	@if(session()->has('success-message'))
	<script>
		toastr.options = {
		maxOpened: 1,
		autoDismiss: true,
		closeButton: true,
		progressBar: true,
		positionClass:'toast-top-right',
		onclick: null,
		rtl: isRtl
		};
		toastr.success("{{ session()->get('success-message') }}");
	</script>
	@endif

</body>

</html>