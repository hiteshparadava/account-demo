@extends('front/account-layouts/layoutMaster')

@section('vendor-style')
<!-- vendor style files -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />


@endsection

@section('page-style')
<!-- page style files -->
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	
	<!-- Users List Table -->
	<div class="card mb-4">
		<h5 class="card-header">Add New Agent/Employee/Director/Shareholder To {{ $companyDetails->name }}</h5>
		<form class="card-body" action="{{ route('user.director.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
			<input type="hidden" name="company_id" value="{{ $companyDetails->id }}">
			<div class="row g-3">
				
				<div class="mb-3 col-md-6">
					<label class="form-label" for="type">Please select the following</label>
					<select id="type" class="select2 form-select" name="type" data-allow-clear="true">
					<option value="">Select</option>
					<option value="Director">Director</option>
					<option value="Shareholder">Shareholder</option>
					<option value="Employee">Employee</option>
					<option value="Agent">Agent</option>
					</select>
					@if ($errors->has('type'))
						<span class="text-danger">{{ $errors->first('type') }}</span>
					@endif
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label" for="full_name">Full Name</label>
					<input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="Name of the Company" />
					@if ($errors->has('full_name'))
						<span class="text-danger">{{ $errors->first('full_name') }}</span>
					@endif
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label" for="address_1">Address Line 1</label>
					<input type="text" id="address_1" name="address_1" class="form-control" value="{{ old('address_1') }}" placeholder="Address Line 1" />
					@if ($errors->has('address_1'))
						<span class="text-danger">{{ $errors->first('address_1') }}</span>
					@endif
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="address_2">Address Line 2</label>
					<input type="text" id="address_2" name="address_2" class="form-control" value="{{ old('address_2') }}" placeholder="Address Line 2" />
					@if ($errors->has('address_2'))
						<span class="text-danger">{{ $errors->first('address_2') }}</span>
					@endif
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="address_3">Address Line 3</label>
					<input type="text" id="address_3" name="address_3" class="form-control" value="{{ old('address_3') }}" placeholder="Address Line 3" />
					@if ($errors->has('address_3'))
						<span class="text-danger">{{ $errors->first('address_3') }}</span>
					@endif
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="postal_code">Postal Code</label>
					<input type="text" id="postal_code" name="postal_code" class="form-control" value="{{ old('postal_code') }}" placeholder="Postal Code" />
					@if ($errors->has('postal_code'))
						<span class="text-danger">{{ $errors->first('postal_code') }}</span>
					@endif
				</div>
		
				<div class="mb-3 col-md-6">
					<label class="form-label" for="nric_no">NRIC No/FIN (Locals/PR/EP)</label>
					<input type="text" id="nric_no" name="nric_no" value="{{ old('nric_no') }}" class="form-control" placeholder="NRIC No/FIN (Locals/PR/EP)" />
					@if ($errors->has('nric_no'))
						<span class="text-danger">{{ $errors->first('nric_no') }}</span>
					@endif
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label" for="passport_no">Passport No (Foreigner)</label>
					<input type="text" id="passport_no" name="passport_no" value="{{ old('passport_no') }}" class="form-control" placeholder="Passport No" />
					@if ($errors->has('passport_no'))
						<span class="text-danger">{{ $errors->first('passport_no') }}</span>
					@endif
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label" for="passport_expiration_date">Passport expiration date (Foreigner):</label>
					<input type="text" id="passport_expiration_date" name="passport_expiration_date" class="form-control dob-picker" value="{{ old('passport_expiration_date') }}" placeholder="YYYY-MM-DD" />
					@if ($errors->has('passport_expiration_date'))
						<span class="text-danger">{{ $errors->first('passport_expiration_date') }}</span>
					@endif
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label" for="contact_no">Contact no with country code</label>
					<input type="text" id="contact_no" name="contact_no" value="{{ old('contact_no') }}" class="form-control" placeholder="Contact no with country code" />
					@if ($errors->has('contact_no'))
						<span class="text-danger">{{ $errors->first('contact_no') }}</span>
					@endif
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label" for="nationality">Nationality</label>
					<input type="text" id="nationality" name="nationality" value="{{ old('nationality') }}" class="form-control" placeholder="Nationality" />
					@if ($errors->has('nationality'))
						<span class="text-danger">{{ $errors->first('nationality') }}</span>
					@endif
				</div>
				
				<div class="mb-3 col-md-6">
					<label class="form-label" for="dob">Date of birth</label>
					<input type="text" id="dob" name="dob" class="form-control dob-picker" value="{{ old('dob') }}" placeholder="YYYY-MM-DD" />
					@if ($errors->has('dob'))
						<span class="text-danger">{{ $errors->first('dob') }}</span>
					@endif
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label" for="email">Email</label>
					<input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" />
					@if ($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label" for="share_holdings">Share holdings</label>
					<input type="text" id="share_holdings" name="share_holdings" value="{{ old('share_holdings') }}" class="form-control" placeholder="Number of shares hold" />
					@if ($errors->has('share_holdings'))
						<span class="text-danger">{{ $errors->first('share_holdings') }}</span>
					@endif
				</div>

				
			</div>
			<hr class="my-4 mx-n4" />
				<h6>Upload Document</h6>
				<div class="row g-3">

					<div class="mb-3 col-md-6">
						<label for="nric_file" class="form-label">Upload NRIC/FIN (Locals/PR/EP)</label>
						<input class="form-control" type="file" required id="nric_file" name="nric_file" accept="" />
						<!-- <div id="defaultFormControlHelp" class="form-text">
							only .doc, .docx File allowed.
						</div> -->
						@if ($errors->has('nric_file'))
							<span class="text-danger">{{ $errors->first('nric_file') }}</span>
						@endif
					</div>

					<div class="mb-3 col-md-6">
						<label for="notarised_id_card_file" class="form-label">Notarised ID card (foreigner)</label>
						<input class="form-control" type="file" required id="notarised_id_card_file" name="notarised_id_card_file" accept="" />
						<!-- <div id="defaultFormControlHelp" class="form-text">
							only .doc, .docx File allowed.
						</div> -->
						@if ($errors->has('notarised_id_card_file'))
							<span class="text-danger">{{ $errors->first('notarised_id_card_file') }}</span>
						@endif
					</div>
					<div class="mb-3 col-md-6">
						<label for="notarised_passport_file" class="form-label">Upload notarised passport (For foreigner only)</label>
						<input class="form-control" type="file" required id="notarised_passport_file" name="notarised_passport_file" accept="" />
						<!-- <div id="defaultFormControlHelp" class="form-text">
							only .doc, .docx File allowed.
						</div> -->
						@if ($errors->has('notarised_passport_file'))
							<span class="text-danger">{{ $errors->first('notarised_passport_file') }}</span>
						@endif
					</div>

					<div class="mb-3 col-md-6">
						<label for="address_proof_file" class="form-label">Upload proof of address, latest within 3 months (For foreigner only)</label>
						<input class="form-control" type="file" required id="address_proof_file" name="address_proof_file" accept="" />
						<!-- <div id="defaultFormControlHelp" class="form-text">
							only .doc, .docx File allowed.
						</div> -->
						@if ($errors->has('address_proof_file'))
							<span class="text-danger">{{ $errors->first('address_proof_file') }}</span>
						@endif
					</div>

					<div class="mb-3 col-md-8 ">
						<input class="form-check-input" type="checkbox" value="" id="customCheckPrimary" />
						<label class="form-check-label" for="customCheckPrimary"> I acknowledge all of the above information provided above are complete and accurate</label>
					</div>
				</div>
			<hr class="my-4 mx-n4" />
			
			<div class="pt-4">
			<button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
			<button type="reset" class="btn btn-label-secondary">Cancel</button>
			</div>
		</form>
	</div>

</div>
@endsection

@section('vendor-script')
<!-- vendor files -->
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('page-script')
<!-- Page js files -->
<script src="{{ asset('assets/js/form-layouts.js') }}"></script>
<script type="application/javascript">

</script>
@endsection