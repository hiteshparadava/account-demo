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
		<h5 class="card-header">Add New Company</h5>
		<form class="card-body" action="{{ route('user.company.store') }}" method="POST">
		@csrf
			<h6>1. Company Details</h6>
			<div class="row g-3">
				<div class="mb-3 col-md-6">
					<label class="form-label" for="name">Name of the Company</label>
					<input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name of the Company" />
					@if ($errors->has('name'))
						<span class="text-danger">{{ $errors->first('name') }}</span>
					@endif
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="number">Company Number</label>
					<input type="text" id="number" name="number" value="{{ old('number') }}" class="form-control" placeholder="Company Number" />
					@if ($errors->has('name'))
						<span class="text-danger">{{ $errors->first('number') }}</span>
					@endif
				</div>
			</div>
			<hr class="my-4 mx-n4" />
			<h6>2.Registered Address of the Company</h6>
			<div class="row g-3">
				<div class="mb-3 col-md-6">
					<label class="form-label" for="address_1">Address Line 1</label>
					<input type="text" id="address_1" name="address_1" class="form-control" value="{{ old('address_1') }}" placeholder="Address Line 1" />
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="address_2">Address Line 2</label>
					<input type="text" id="address_2" name="address_2" class="form-control" value="{{ old('address_2') }}" placeholder="Address Line 2" />
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="address_3">Address Line 3</label>
					<input type="text" id="address_3" name="address_3" class="form-control" value="{{ old('address_3') }}" placeholder="Address Line 3" />
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="postal_code">Postal Code</label>
					<input type="text" id="postal_code" name="postal_code" class="form-control" value="{{ old('postal_code') }}" placeholder="Postal Code" />
				</div>
			</div>
			<hr class="my-4 mx-n4" />
			<h6>3.Principal Address of Business</h6>
			<div class="row g-3">
				<div class="mb-3 col-md-6">
					<label class="form-label" for="address_1">Address Line 1</label>
					<input type="text" id="address_1" name="principal_address_1" class="form-control" value="{{ old('principal_address_1') }}" placeholder="Address Line 1" />
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="address_2">Address Line 2</label>
					<input type="text" id="address_2" name="principal_address_2" class="form-control" value="{{ old('principal_address_2') }}" placeholder="Address Line 2" />
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="address_3">Address Line 3</label>
					<input type="text" id="address_3" name="principal_address_3" class="form-control" value="{{ old('principal_address_3') }}" placeholder="Address Line 3" />
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="postal_code">Postal Code</label>
					<input type="text" id="postal_code" name="principal_postal_code" class="form-control" value="{{ old('principal_postal_code') }}" placeholder="Postal Code" />
				</div>
			</div>

			<hr class="my-4 mx-n4" />
			<h6>4. Other Info</h6>
			<div class="row g-3">
				<div class="mb-3 col-md-6">
					<label class="form-label" for="multicol-country">Currency of capital of the company</label>
					<select id="multicol-country" class="select2 form-select" name="currency" data-allow-clear="true">
					<option value="">Select</option>
					<option value="SGD">Singapore Dollars (SGD)</option>
					<option value="INR">Indian Rupees (INR)</option>
					</select>
				</div>
				
				<div class="mb-3 col-md-6">
					<label class="form-label" for="multicol-first-name">Number of shares issued by the company</label>
					<input type="text" id="multicol-first-name" name="number_of_shares_issued_by_the_company" value="{{ old('number_of_shares_issued_by_the_company') }}" class="form-control" placeholder="Number of shares issued by the company" />
				</div>
				
				<div class="mb-3 col-md-6 select2-primary">
					<label class="form-label" for="multicol-language">Principal SSIC activity of the company</label>
					<select id="multicol-language" name="principal_SSIC_activity[]" class="select2 form-select" multiple>
						<option value="01111">Fruit vegetable growing (non-hydroponics)</option>
						<option value="01111">Leafy vegetable growing (non-hydroponics)</option>
						<option value="01111">Market gardening, fruit vegetable</option>
						<option value="01111">Market gardening, leafy vegetable</option>
						<option value="01111">Tomato growing (non-hydroponics)</option>
						<option value="01111">Spinach growing (non-hydroponics)</option>
						<option value="01111">Eggplant growing (non-hydroponics)</option>
						<option value="01113">Mushroom growing</option>
						<option value="01112">Root crop growing</option>
						<option value="01119">Food crop growing, under cover</option>
					</select>
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="multicol-first-name">Description of the company’s principal activities (optional)</label>
					<input type="text" id="multicol-first-name" name="description_of_principal_SSIC_activity" value="{{ old('description_of_principal_SSIC_activity') }}" class="form-control" placeholder="Number of shares issued by the company" />
				</div>
				<div class="mb-3 col-md-6 select2-primary">
					<label class="form-label" for="multicol-language">Secondary SSIC activity of the company</label>
					<select id="multicol-language2" name="secondary_SSIC_activity[]" class="select2 form-select" multiple>
						<option value="01111">Fruit vegetable growing (non-hydroponics)</option>
						<option value="01111">Leafy vegetable growing (non-hydroponics)</option>
						<option value="01111">Market gardening, fruit vegetable</option>
						<option value="01111">Market gardening, leafy vegetable</option>
						<option value="01111">Tomato growing (non-hydroponics)</option>
						<option value="01111">Spinach growing (non-hydroponics)</option>
						<option value="01111">Eggplant growing (non-hydroponics)</option>
						<option value="01113">Mushroom growing</option>
						<option value="01112">Root crop growing</option>
						<option value="01119">Food crop growing, under cover</option>
					</select>
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="multicol-first-name">Description of the company’s Secondary activities (optional)</label>
					<input type="text" id="multicol-first-name" name="description_of_secondary_SSIC_activity" value="{{ old('description_of_secondary_SSIC_activity') }}" class="form-control" placeholder="Number of shares issued by the company" />
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="multicol-first-name">Issued capital of the company</label>
					<input type="text" id="multicol-first-name" name="issued_capital_of_company" class="form-control" value="{{ old('issued_capital_of_company') }}" placeholder="Issued capital of the company" />
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="multicol-first-name">Paid up capital of the company</label>
					<input type="text" id="multicol-first-name" name="paid_up_capital_of_company" class="form-control" value="{{ old('paid_up_capital_of_company') }}" placeholder="Paid up capital of the company" />
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label" for="multicol-birthdate">Financial year end of the Company</label>
					<input type="text" id="multicol-birthdate" name="financial_year_end_date" class="form-control dob-picker" value="{{ old('financial_year_end_date') }}" placeholder="YYYY-MM-DD" />
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