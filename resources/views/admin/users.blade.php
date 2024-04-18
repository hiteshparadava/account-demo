@extends('admin/layouts/layoutMaster')

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
	<h4 class="fw-bold py-3 mb-4"> Users </h4>
	
	<!-- Users List Table -->
	<div class="card">
		<div class="card-datatable table-responsive">
			<table class="datatables-users table border-top">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a>
									<a href="{{ route('admin.user.detail',$user->id) }}" class="text-body"><i class="ti ti-eye ti-sm mx-2"></i></a>
									<a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a>
									<div class="dropdown-menu dropdown-menu-end m-0">
										<a href="" class="dropdown-item">View</a>
										<a href="javascript:;" class="dropdown-item">Suspend</a>
									</div>
								</div>
							</td>
						</tr>
						
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- Offcanvas to add new user -->
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
			<div class="offcanvas-header">
				<h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
				<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
				<form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
					<div class="mb-3">
						<label class="form-label" for="add-user-fullname">Full Name</label>
						<input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="userFullname" aria-label="John Doe" />
					</div>
					<div class="mb-3">
						<label class="form-label" for="add-user-email">Email</label>
						<input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="userEmail" />
					</div>
					<div class="mb-3">
						<label class="form-label" for="add-user-contact">Contact</label>
						<input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact" />
					</div>
					<div class="mb-3">
						<label class="form-label" for="add-user-company">Company</label>
						<input type="text" id="add-user-company" class="form-control" placeholder="Web Developer" aria-label="jdoe1" name="companyName" />
					</div>
					<div class="mb-3">
						<label class="form-label" for="country">Country</label>
						<select id="country" class="select2 form-select">
							<option value="">Select</option>
							<option value="Australia">Australia</option>
							<option value="Bangladesh">Bangladesh</option>
							<option value="Belarus">Belarus</option>
							<option value="Brazil">Brazil</option>
							<option value="Canada">Canada</option>
							<option value="China">China</option>
							<option value="France">France</option>
							<option value="Germany">Germany</option>
							<option value="India">India</option>
							<option value="Indonesia">Indonesia</option>
							<option value="Israel">Israel</option>
							<option value="Italy">Italy</option>
							<option value="Japan">Japan</option>
							<option value="Korea">Korea, Republic of</option>
							<option value="Mexico">Mexico</option>
							<option value="Philippines">Philippines</option>
							<option value="Russia">Russian Federation</option>
							<option value="South Africa">South Africa</option>
							<option value="Thailand">Thailand</option>
							<option value="Turkey">Turkey</option>
							<option value="Ukraine">Ukraine</option>
							<option value="United Arab Emirates">United Arab Emirates</option>
							<option value="United Kingdom">United Kingdom</option>
							<option value="United States">United States</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label" for="user-role">User Role</label>
						<select id="user-role" class="form-select">
							<option value="subscriber">Subscriber</option>
							<option value="editor">Editor</option>
							<option value="maintainer">Maintainer</option>
							<option value="author">Author</option>
							<option value="admin">Admin</option>
						</select>
					</div>
					<div class="mb-4">
						<label class="form-label" for="user-plan">Select Plan</label>
						<select id="user-plan" class="form-select">
							<option value="basic">Basic</option>
							<option value="enterprise">Enterprise</option>
							<option value="company">Company</option>
							<option value="team">Team</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
					<button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
				</form>
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
<!-- <script src="../../assets/js/app-user-list.js"></script> -->
<script type="application/javascript">
$(function() {
  var dt_basic_table = $('.datatables-users');

  if (dt_basic_table.length) {
    dt_basic = dt_basic_table.DataTable({
      columns: [
        { data: 'id' },
        { data: 'name' },
        { data: 'email' },
        { data: '' }
      ],
	  columnDefs: [
		{
          // Actions
          targets: -1,
          title: 'Actions',
          searchable: false,
          orderable: false,
        }
      ],
      order: [[0, 'desc']],
      displayLength: 10,
      lengthMenu: [10, 25, 50, 75, 100],
	  language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Search..'
      },
      buttons: [
      ],
    });
  }
});
</script>
@endsection