@extends('front/account-layouts/layoutMaster')

@section('vendor-style')
<!-- vendor style files -->

<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
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
					<a class="nav-link " href="{{ route('user.profile') }}"><i class="ti-xs ti ti-users me-1"></i> Profile Details</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="{{ route('user.documents') }}"><i class="ti-xs ti ti-lock me-1"></i> Documents</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:void(0);"><i class="ti-xs ti ti-file-description me-1"></i> Billing</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:void(0);"><i class="ti-xs ti ti-bell me-1"></i> Plans</a>
				</li>
			</ul>
			<div class="card mb-4">
				<!-- Account -->
				<div class="card">
					<div class="card-datatable table-responsive">
						<table class="datatables-users table border-top">
							<thead>
								<tr>
									<th>Id</th>
									<th>Title</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($documents as $document)
									<tr>
										<td>{{ $document->id }}</td>
										<td>{{ $document->title }}</td>
										<td>
											<div class="d-flex align-items-center">
												<a href="{{ route('user.document.download',[$document->id]) }}" class="text-body"><i class="ti ti-download ti-sm mx-2"></i></a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /Account -->
			</div>
		</div>
	</div>
</div>
@endsection

@section('vendor-script')
<!-- vendor files -->


<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>

@endsection

@section('page-script')

<!-- Page js files -->
<!-- <script src="{{ asset('assets/js/pages-account-settings-account.js')}}"></script> -->
<script type="application/javascript">
$(function() {
  var dt_basic_table = $('.datatables-users');

  if (dt_basic_table.length) {
    dt_basic = dt_basic_table.DataTable({
      columns: [
        { data: 'id' },
        { data: 'title' },
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
	  dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
	$('div.head-label').html('<a href="{{ route("user.document.download.all") }}" class="btn btn-primary"><i class="ti ti-download me-sm-1"></i>Download All Documents</a>');
  }
});

</script>
@endsection