@extends('front/account-layouts/layoutMaster')

@section('vendor-style')
<!-- vendor style files -->
<link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endsection

@section('page-style')
<!-- page style files -->
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills flex-column flex-md-row mb-4">
				<li class="nav-item">
					<a class="nav-link active" href="{{ route('user.profile') }}"><i class="ti-xs ti ti-users me-1"></i> Profile Details</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('user.documents') }}"><i class="ti-xs ti ti-lock me-1"></i> Documents</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:void(0);"><i class="ti-xs ti ti-file-description me-1"></i> Billing</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:void(0);"><i class="ti-xs ti ti-bell me-1"></i> Plans</a>
				</li>
			</ul>
			<div class="card mb-4">
				<h5 class="card-header">Profile Details</h5>
				<!-- Account -->
				<hr class="my-0" />
				<div class="card-body">
					<form action="{{ route('user.detail.update') }}" method="POST">
					@csrf
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="phone_number" class="form-label">Phone Number</label>
								<input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" />
							</div>
							<div class="mb-3 col-md-6">
								<label for="company_name" class="form-label">Company Name</label>
								<input type="text" class="form-control" id="company_name" name="company_name" value="{{ $user->company_name }}" />
							</div>
							<div class="mb-3 col-md-6">
								<label for="company_no" class="form-label">Company No</label>
								<input type="text" class="form-control" id="company_no" name="company_no" value="{{ $user->company_no }}" />
							</div>
							<div class="mb-3 col-md-6">
								<label for="director" class="form-label">Director</label>
								<input type="text" class="form-control" id="director" name="director" value="{{ $user->director }}" />
							</div>
							
							<div class="mb-3 col-md-6">
								<label for="address" class="form-label">Address</label>
								<input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" />
							</div>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Save changes</button>
						</div>
					</form>
				</div>
				<!-- /Account -->
			</div>
		</div>
	</div>
</div>
@endsection

@section('vendor-script')
<!-- vendor files -->
<script src="../../assets/vendor/libs/select2/select2.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

@endsection

@section('page-script')

<!-- Page js files -->
<!-- <script src="../../assets/js/pages-account-settings-account.js"></script> -->

@endsection