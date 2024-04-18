@extends('front/account-layouts/layoutMaster')

@section('vendor-style')
<!-- vendor style files -->
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
@endsection

@section('page-style')
<!-- page style files -->
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="row g-4 mb-4">
		<div class="col-sm-6 col-xl-3">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-start justify-content-between">
						<div class="content-left">
							<span>Session</span>
							<div class="d-flex align-items-center my-1">
								<h4 class="mb-0 me-2">21,459</h4>
								<span class="text-success">(+29%)</span>
							</div>
							<span>Total Users</span>
						</div>
						<span class="badge bg-label-primary rounded p-2">
							<i class="ti ti-user ti-sm"></i>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-start justify-content-between">
						<div class="content-left">
							<span>Paid Users</span>
							<div class="d-flex align-items-center my-1">
								<h4 class="mb-0 me-2">4,567</h4>
								<span class="text-success">(+18%)</span>
							</div>
							<span>Last week analytics </span>
						</div>
						<span class="badge bg-label-danger rounded p-2">
							<i class="ti ti-user-plus ti-sm"></i>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-start justify-content-between">
						<div class="content-left">
							<span>Active Users</span>
							<div class="d-flex align-items-center my-1">
								<h4 class="mb-0 me-2">19,860</h4>
								<span class="text-danger">(-14%)</span>
							</div>
							<span>Last week analytics</span>
						</div>
						<span class="badge bg-label-success rounded p-2">
							<i class="ti ti-user-check ti-sm"></i>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-start justify-content-between">
						<div class="content-left">
							<span>Pending Users</span>
							<div class="d-flex align-items-center my-1">
								<h4 class="mb-0 me-2">237</h4>
								<span class="text-success">(+42%)</span>
							</div>
							<span>Last week analytics</span>
						</div>
						<span class="badge bg-label-warning rounded p-2">
							<i class="ti ti-user-exclamation ti-sm"></i>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('vendor-script')
<!-- vendor files -->
<script src="../../assets/vendor/libs/moment/moment.js"></script>
<script src="../../assets/vendor/libs/datatables/jquery.dataTables.js"></script>
<script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="../../assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
<script src="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
<script src="../../assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
<script src="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
<script src="../../assets/vendor/libs/jszip/jszip.js"></script>
<script src="../../assets/vendor/libs/pdfmake/pdfmake.js"></script>
<script src="../../assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
<script src="../../assets/vendor/libs/datatables-buttons/buttons.print.js"></script>
<script src="../../assets/vendor/libs/select2/select2.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
@endsection

@section('page-script')
<!-- Page js files -->
<script src="../../assets/js/app-user-list.js"></script>
@endsection