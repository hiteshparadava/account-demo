@extends('admin/layouts/layoutMaster')

@section('vendor-style')
<!-- vendor style files -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('page-style')
<!-- page style files -->
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Document /</span> Update Document</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<h5 class="card-header">Update Document</h5>
				<!-- Account -->
				<hr class="my-0" />
				<div class="card-body">
					<form action="{{ route('admin.document.update',$document->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="title" class="form-label">Title</label>
								<input type="text" class="form-control" id="title" name="title" value="{{ $document->title }}" />
								@if ($errors->has('title'))
									<span class="text-danger">{{ $errors->first('title') }}</span>
								@endif
							</div>
							<div class="mb-3 col-md-6">
								<label for="document" class="form-label">Document</label>
								<input class="form-control" type="file" id="document" name="document" accept=".doc, .docx" />
								<div id="defaultFormControlHelp" class="form-text">
									only .doc, .docx File allowed.
								</div>
								<div id="defaultFormControlHelp" class="form-text">
									<a href="{{ asset('storage/'.$document->file) }}" class="text-body" download><i class="ti ti-download ti-sm mx-2"></i></a>Download Existing File.
								</div>
								
								@if ($errors->has('document'))
									<span class="text-danger">{{ $errors->first('document') }}</span>
								@endif
							</div>
							
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Submit</button>
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
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

@endsection

@section('page-script')

<!-- Page js files -->
<!-- <script src="{{ asset('assets/js/pages-account-settings-account.js"></script> -->

@endsection